<?php

namespace App\Console\Commands;

use App\Models\AffiliationRequest;
use App\Models\Affilie;
use App\Models\Message;
use App\Models\Order;
use App\Support\MouchapCodes;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeduplicateAffilies extends Command
{
    protected $signature = 'mouchap:dedupe-affilies {--dry-run : Show actions without deleting}';

    protected $description = 'Merge duplicate affiliates sharing the same CIN or contact';

    public function handle(): int
    {
        $dry = (bool) $this->option('dry-run');
        $kept = 0;
        $removed = 0;

        DB::transaction(function () use ($dry, &$kept, &$removed) {
            $groups = [];

            // Group by normalized full name (same person re-registered many times).
            // Do NOT merge different people who share a CIN by mistake.
            foreach (Affilie::query()->orderBy('id')->get() as $affilie) {
                $name = mb_strtolower(trim(preg_replace('/\s+/', ' ', (string) $affilie->nom_complet) ?? ''));
                $key = $name !== '' ? 'name:'.$name : 'id:'.$affilie->id;
                $groups[$key][] = $affilie;
            }

            foreach ($groups as $key => $items) {
                if (count($items) < 2) {
                    continue;
                }

                /** @var Affilie $keeper */
                $keeper = $items[0];
                $keeper->cin = MouchapCodes::normalizeCin($keeper->cin);
                $keeper->contact = preg_replace('/\D+/', '', (string) $keeper->contact) ?: $keeper->contact;
                $keeper->nom_complet = trim(preg_replace('/\s+/', ' ', (string) $keeper->nom_complet));
                if (! $dry) {
                    $keeper->save();
                }
                $kept++;

                foreach (array_slice($items, 1) as $dup) {
                    $this->line("Keep #{$keeper->id} ({$keeper->code}) — remove #{$dup->id} ({$dup->code}) [{$key}]");

                    if ($dry) {
                        $removed++;
                        continue;
                    }

                    AffiliationRequest::query()
                        ->where('affilie_id', $dup->id)
                        ->update(['affilie_id' => $keeper->id]);

                    Order::query()
                        ->where('affilie_id', $dup->id)
                        ->update(['affilie_id' => $keeper->id]);

                    Message::query()
                        ->where('affilie_id', $dup->id)
                        ->update(['affilie_id' => $keeper->id]);

                    $dup->delete();
                    $removed++;
                }
            }
        });

        $this->info(($dry ? '[dry-run] ' : '')."Groups kept: {$kept}, duplicates removed: {$removed}");
        $this->info('Remaining affiliates: '.Affilie::query()->count());

        return self::SUCCESS;
    }
}
