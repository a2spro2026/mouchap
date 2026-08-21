<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MOUCHAP — Espace Affilié</title>
    <link rel="icon" type="image/png" href="{{ asset('images/mouchap-logo.png') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="aff-space-body">
    <div class="aff-shell">
        <aside class="aff-sidebar" aria-label="Menu affilié">
            <div class="aff-sidebar__aura" aria-hidden="true"></div>
            <div class="aff-sidebar__brand">
                <span class="aff-sidebar__logo-ring">
                    <img
                        src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}"
                        alt=""
                        class="aff-sidebar__logo"
                    >
                </span>
                <div>
                    <p class="aff-sidebar__name">MOUCHAP</p>
                    <p class="aff-sidebar__role">Espace Affilié</p>
                </div>
            </div>

            <nav class="aff-sidebar__nav">
                <a href="#accueil" class="aff-side-link is-active" data-aff-nav="accueil">
                    <span class="aff-side-link__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-9.5Z"/><path stroke-linecap="round" d="M9 21V12h6v9"/></svg>
                    </span>
                    <span>Accueil</span>
                </a>
                <a href="#catalogue" class="aff-side-link" data-aff-nav="catalogue">
                    <span class="aff-side-link__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20.6 8.5 12 3 3.4 8.5 12 14l8.6-5.5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3.4 15.5 12 21l8.6-5.5M3.4 12 12 17.5 20.6 12"/></svg>
                    </span>
                    <span>Catalogue</span>
                </a>

                <div class="aff-menu" id="aff-menu-commande">
                    <button type="button" class="aff-side-link aff-menu__toggle" data-aff-menu-toggle aria-expanded="false">
                        <span class="aff-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path stroke-linecap="round" d="M9 12h6M9 16h4"/></svg>
                        </span>
                        <span>Commande</span>
                        <span class="aff-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="aff-submenu">
                        <a href="#bon-commande" class="aff-sublink" data-aff-nav="bon-commande">
                            <span class="aff-sublink__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path stroke-linecap="round" d="M14 2v6h6M9 13h6M9 17h4"/></svg>
                            </span>
                            <span>Bon de Commande</span>
                        </a>
                        <a href="#balance-commande" class="aff-sublink" data-aff-nav="balance-commande">
                            <span class="aff-sublink__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M7 14l4-4 3 3 5-6"/></svg>
                            </span>
                            <span>Balance Commande</span>
                        </a>
                        <a href="#balance-paiement" class="aff-sublink" data-aff-nav="balance-paiement">
                            <span class="aff-sublink__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" d="M2 10h20"/><circle cx="16" cy="15" r="1.4"/></svg>
                            </span>
                            <span>Balance Paiement</span>
                        </a>
                    </div>
                </div>

                <a href="#messages" class="aff-side-link" data-aff-nav="messages">
                    <span class="aff-side-link__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v12H5.2L4 17.5V4z"/><path stroke-linecap="round" d="M8 8h8M8 12h5"/></svg>
                    </span>
                    <span>Messages</span>
                    <span class="aff-side-link__badge" id="aff-msg-badge" hidden>0</span>
                </a>
                <a href="#profil" class="aff-side-link" data-aff-nav="profil">
                    <span class="aff-side-link__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </span>
                    <span>Mon profil</span>
                </a>
            </nav>

            <button type="button" class="aff-sidebar__logout" id="aff-logout">Déconnexion</button>
        </aside>

        <div class="aff-main">
            <header class="aff-navbar">
                <div class="aff-navbar__left">
                    <button type="button" class="aff-navbar__menu" id="aff-menu-toggle" aria-label="Menu">
                        <span></span><span></span><span></span>
                    </button>
                    <div>
                        <p class="aff-navbar__eyebrow">Bienvenue</p>
                        <h1 class="aff-navbar__title" id="aff-welcome-title">Espace Affilié</h1>
                    </div>
                </div>
                <div class="aff-navbar__right">
                    <div class="aff-navbar__user">
                        <span class="aff-navbar__avatar" id="aff-avatar">A</span>
                        <div>
                            <p class="aff-navbar__user-name" id="aff-user-name">Affilié</p>
                            <p class="aff-navbar__user-role" id="aff-user-login">—</p>
                        </div>
                    </div>
                </div>
            </header>

            <section class="aff-view is-active" id="aff-view-accueil" data-aff-view="accueil">
                <article class="aff-confirm" id="aff-confirm-banner" hidden>
                    <p class="aff-confirm__eyebrow">Message de confirmation</p>
                    <h2 class="aff-confirm__title">Votre affiliation est validée</h2>
                    <p class="aff-confirm__text" id="aff-confirm-text"></p>
                </article>

                <div class="aff-cards aff-cards--cmd" aria-label="Indicateurs commandes">
                    <article class="aff-stat aff-stat--ok">
                        <div class="aff-stat__glow" aria-hidden="true"></div>
                        <p class="aff-stat__kicker">Validées</p>
                        <p class="aff-stat__title">Confirmées</p>
                        <p class="aff-stat__value" id="aff-cmd-confirmees">0</p>
                        <p class="aff-stat__hint">commandes abouties</p>
                    </article>
                    <article class="aff-stat aff-stat--ko">
                        <div class="aff-stat__glow" aria-hidden="true"></div>
                        <p class="aff-stat__kicker">Refusées</p>
                        <p class="aff-stat__title">Annulées</p>
                        <p class="aff-stat__value" id="aff-cmd-annulees">0</p>
                        <p class="aff-stat__hint">commandes stoppées</p>
                    </article>
                    <article class="aff-stat aff-stat--retour">
                        <div class="aff-stat__glow" aria-hidden="true"></div>
                        <p class="aff-stat__kicker">Renvois</p>
                        <p class="aff-stat__title">Retours</p>
                        <p class="aff-stat__value" id="aff-cmd-retour">0</p>
                        <p class="aff-stat__hint">articles renvoyés</p>
                    </article>
                    <article class="aff-stat aff-stat--total">
                        <div class="aff-stat__glow" aria-hidden="true"></div>
                        <p class="aff-stat__kicker">Cumul</p>
                        <p class="aff-stat__title">Montant confirmé</p>
                        <p class="aff-stat__value" id="aff-cmd-total-confirmees">0 DH</p>
                        <p class="aff-stat__hint">total des validées</p>
                    </article>
                    <article class="aff-stat aff-stat--revenue">
                        <div class="aff-stat__glow" aria-hidden="true"></div>
                        <p class="aff-stat__kicker">Performance</p>
                        <p class="aff-stat__title">Revenu</p>
                        <p class="aff-stat__value" id="aff-cmd-revenue">0 DH</p>
                        <p class="aff-stat__hint">chiffre généré</p>
                    </article>
                </div>

                <div class="admin-table-wrap admin-table-wrap--panel aff-cmd-table-wrap">
                    <div class="admin-table-scroll">
                        <table class="admin-table admin-table--aff-cmd" id="aff-cmd-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>N° Cmd</th>
                                    <th>Réf Prod</th>
                                    <th>Désignation</th>
                                    <th>Nom Client</th>
                                    <th>Ville</th>
                                    <th>Contact</th>
                                    <th>Qte</th>
                                    <th>Montant</th>
                                    <th>Statue</th>
                                </tr>
                            </thead>
                            <tbody id="aff-cmd-tbody"></tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="aff-view" id="aff-view-catalogue" data-aff-view="catalogue" hidden>
                <div class="admin-panel__toolbar aff-cmd-toolbar">
                    <div>
                        <p class="admin-panel__eyebrow">Espace Affilié</p>
                        <h2 class="aff-panel__title" style="margin:0.2rem 0 0">Catalogue</h2>
                    </div>
                </div>

                <div class="aff-season-cards" aria-label="Saisons">
                    <button type="button" class="aff-season-card" data-saison="ete">
                        <span class="aff-season-card__label">Été</span>
                    </button>
                    <button type="button" class="aff-season-card" data-saison="printemps">
                        <span class="aff-season-card__label">Printemps</span>
                    </button>
                    <button type="button" class="aff-season-card" data-saison="automne">
                        <span class="aff-season-card__label">Automne</span>
                    </button>
                    <button type="button" class="aff-season-card" data-saison="hiver">
                        <span class="aff-season-card__label">Hiver</span>
                    </button>
                </div>

                <div class="admin-table-wrap admin-table-wrap--panel aff-cmd-table-wrap">
                    <div class="admin-table-scroll">
                        <table class="admin-table admin-table--aff-cat">
                            <thead>
                                <tr>
                                    <th>Réf</th>
                                    <th>Désignation</th>
                                    <th>Catégorie</th>
                                    <th>Famille</th>
                                    <th>Saison</th>
                                    <th>Size</th>
                                    <th>Qte disponible</th>
                                    <th>Média</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="aff-cat-tbody"></tbody>
                        </table>
                    </div>
                </div>

                {{-- Galerie saison --}}
                <div class="aff-season-gallery" id="aff-season-gallery" hidden>
                    <div class="aff-season-gallery__head">
                        <h3 class="aff-panel__title" id="aff-season-gallery-title">Saison</h3>
                        <button type="button" class="admin-btn admin-btn--ghost" id="aff-season-gallery-back">Retour</button>
                    </div>
                    <div class="aff-season-grid" id="aff-season-grid"></div>
                </div>
            </section>

            {{-- Bon de Commande --}}
            <section class="aff-view" id="aff-view-bon-commande" data-aff-view="bon-commande" hidden>
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Commande</p>
                            <h2 class="aff-panel__title" style="margin:0.2rem 0 0">Bon de Commande</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="bn-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost" data-aff-nav="accueil">Fermer</button>
                        </div>
                    </div>
                    <div class="admin-table-wrap admin-table-wrap--panel aff-cmd-table-wrap">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--bn">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>N° Bn</th>
                                        <th>Réf</th>
                                        <th>Désignation</th>
                                        <th>Catégorie</th>
                                        <th>Famille</th>
                                        <th>Size</th>
                                        <th>Qte</th>
                                        <th>Prix/U</th>
                                        <th>Sous-Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="bn-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Balance Commande --}}
            <section class="aff-view" id="aff-view-balance-commande" data-aff-view="balance-commande" hidden>
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Commande</p>
                            <h2 class="aff-panel__title" style="margin:0.2rem 0 0">Balance Commande</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="bal-cmd-print">Imprimer</button>
                            <button type="button" class="admin-btn admin-btn--ghost" data-aff-nav="accueil">Fermer</button>
                        </div>
                    </div>
                    <div class="admin-table-wrap admin-table-wrap--panel aff-cmd-table-wrap">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--bal-cmd" id="bal-cmd-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>N° Bn</th>
                                        <th>Nom Client</th>
                                        <th>Montant</th>
                                        <th>Marge</th>
                                        <th>Statue</th>
                                    </tr>
                                </thead>
                                <tbody id="bal-cmd-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Balance Paiement --}}
            <section class="aff-view" id="aff-view-balance-paiement" data-aff-view="balance-paiement" hidden>
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Commande</p>
                            <h2 class="aff-panel__title" style="margin:0.2rem 0 0">Balance Paiement</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--ghost" data-aff-nav="accueil">Fermer</button>
                        </div>
                    </div>
                    <div class="admin-table-wrap admin-table-wrap--panel aff-cmd-table-wrap">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--bal-paie">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>N° Bn</th>
                                        <th>Nom Client</th>
                                        <th>Date Paie</th>
                                        <th>Reçu</th>
                                    </tr>
                                </thead>
                                <tbody id="bal-paie-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Menu téléchargement --}}
            <div class="aff-dl-menu" id="aff-dl-menu" hidden>
                <button type="button" data-dl-format="original" id="aff-dl-original">Télécharger le média</button>
                <button type="button" data-dl-format="pdf" id="aff-dl-pdf">Télécharger PDF</button>
            </div>

            {{-- Panneau commande catalogue --}}
            <div class="product-sheet" id="aff-order-sheet" hidden aria-hidden="true">
                <div class="product-sheet__backdrop" data-aff-order-close></div>
                <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="aff-order-title">
                    <div class="product-sheet__header">
                        <div>
                            <p class="product-sheet__eyebrow">Catalogue · Commande</p>
                            <h3 class="product-sheet__title" id="aff-order-title">Commander</h3>
                        </div>
                        <button type="button" class="product-sheet__x" data-aff-order-close aria-label="Fermer">×</button>
                    </div>
                    <form class="product-sheet__form" id="aff-order-form" novalidate>
                        @csrf
                        <input type="hidden" id="aff-order-product-id">
                        <label class="admin-field">
                            <span class="admin-field__label">Réf</span>
                            <input type="text" id="aff-order-ref" class="admin-field__input" readonly>
                        </label>
                        <label class="admin-field">
                            <span class="admin-field__label">Titre</span>
                            <input type="text" id="aff-order-designation" class="admin-field__input" readonly>
                        </label>
                        <label class="admin-field">
                            <span class="admin-field__label" id="aff-order-qte-label">Qte</span>
                            <input type="number" id="aff-order-qte" class="admin-field__input" min="1" step="1" value="1" required>
                        </label>
                        <fieldset class="aff-check-group">
                            <legend class="admin-field__label">Size</legend>
                            <div class="aff-check-list" id="aff-order-sizes"></div>
                        </fieldset>
                        <fieldset class="aff-check-group">
                            <legend class="admin-field__label">Couleur</legend>
                            <div class="aff-check-list" id="aff-order-couleurs"></div>
                        </fieldset>
                        <div class="product-sheet__footer">
                            <button type="button" class="admin-btn admin-btn--ghost" data-aff-order-close>Fermer</button>
                            <button type="submit" class="admin-btn admin-btn--primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Panneau saisie Bon de Commande --}}
            <div class="product-sheet" id="bn-sheet" hidden aria-hidden="true">
                <div class="product-sheet__backdrop" data-bn-sheet-close></div>
                <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="bn-sheet-title">
                    <div class="product-sheet__header">
                        <div>
                            <p class="product-sheet__eyebrow">Commande · Livraison</p>
                            <h3 class="product-sheet__title" id="bn-sheet-title">Nouveau bon</h3>
                        </div>
                        <button type="button" class="product-sheet__x" data-bn-sheet-close aria-label="Fermer">×</button>
                    </div>
                    <form class="product-sheet__form" id="bn-form" novalidate>
                        <input type="hidden" id="bn-uid">
                        <input type="hidden" id="bn-product-id">
                        <div class="product-sheet__row">
                            <label class="admin-field">
                                <span class="admin-field__label">Date</span>
                                <input type="date" id="bn-date" class="admin-field__input" readonly required>
                            </label>
                            <label class="admin-field">
                                <span class="admin-field__label">N° Bn</span>
                                <input type="text" id="bn-ncmd" class="admin-field__input" value="Auto" readonly>
                            </label>
                        </div>
                        <label class="admin-field">
                            <span class="admin-field__label">Réf</span>
                            <select id="bn-ref" class="admin-field__input" required>
                                <option value="">Sélectionner une référence…</option>
                            </select>
                            <p class="bn-stock-info" id="bn-stock-info" hidden>
                                Stock disponible : <strong id="bn-stock-qte">0</strong>
                            </p>
                        </label>
                        <label class="admin-field">
                            <span class="admin-field__label">Désignation</span>
                            <input type="text" id="bn-designation" class="admin-field__input" readonly required>
                        </label>
                        <div class="product-sheet__row">
                            <label class="admin-field">
                                <span class="admin-field__label">Catégorie</span>
                                <input type="text" id="bn-categorie" class="admin-field__input" readonly>
                            </label>
                            <label class="admin-field">
                                <span class="admin-field__label">Famille</span>
                                <input type="text" id="bn-famille" class="admin-field__input" readonly>
                            </label>
                        </div>
                        <div class="product-sheet__row">
                            <label class="admin-field">
                                <span class="admin-field__label">Size</span>
                                <select id="bn-size" class="admin-field__input" required>
                                    <option value="">—</option>
                                </select>
                            </label>
                            <label class="admin-field">
                                <span class="admin-field__label">Qte</span>
                                <input type="number" id="bn-qte" class="admin-field__input" min="1" step="1" value="1" required>
                            </label>
                        </div>
                        <div class="product-sheet__row">
                            <label class="admin-field">
                                <span class="admin-field__label">Prix/U (DH)</span>
                                <input type="number" id="bn-prix" class="admin-field__input" min="0" step="0.01" value="0" readonly required>
                            </label>
                            <label class="admin-field">
                                <span class="admin-field__label">Sous-Total (DH)</span>
                                <input type="text" id="bn-sous-total" class="admin-field__input" value="0 DH" readonly>
                            </label>
                        </div>
                        <p class="product-sheet__hint" id="bn-send-hint">Valider envoie la commande à l’administration pour livraison.</p>
                        <div class="product-sheet__footer">
                            <button type="button" class="admin-btn admin-btn--ghost" data-bn-sheet-close>Fermer</button>
                            <button type="submit" class="admin-btn admin-btn--primary" id="bn-submit-btn">Valider</button>
                        </div>
                    </form>
                </div>
            </div>

            <section class="aff-view" id="aff-view-messages" data-aff-view="messages" hidden>
                <div class="aff-panel">
                    <h2 class="aff-panel__title">Messages</h2>
                    <div class="aff-messages" id="aff-messages-list">
                        <p class="aff-panel__text">Aucun message.</p>
                    </div>
                </div>
            </section>

            <section class="aff-view" id="aff-view-profil" data-aff-view="profil" hidden>
                <div class="aff-panel">
                    <h2 class="aff-panel__title">Mon profil</h2>
                    <dl class="affilie-view__grid" id="aff-profil-grid"></dl>
                </div>
            </section>
        </div>
    </div>

    <script>
        (() => {
            const csrfToken = () =>
                document.querySelector('meta[name="csrf-token"]')?.content ||
                document.querySelector('input[name="_token"]')?.value || '';
            const api = window.mouchapApi || (async (url, options = {}) => {
                const opts = { credentials: 'same-origin', ...options };
                const headers = {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken(),
                    ...(options.headers || {}),
                };
                if (opts.body && !(opts.body instanceof FormData) && typeof opts.body === 'object') {
                    headers['Content-Type'] = 'application/json';
                    opts.body = JSON.stringify(opts.body);
                }
                opts.headers = headers;
                const response = await fetch(url, opts);
                const data = await response.json().catch(() => ({}));
                if (!response.ok) throw new Error(data.message || 'Erreur serveur');
                return data;
            });

            let session = null;
            let inboxCache = [];
            let ordersCache = [];

            const boot = async () => {
                try {
                    session = await api('/api/auth/affilie/me');
                } catch {
                    window.location.href = '{{ url('/') }}';
                    return false;
                }
                return true;
            };

            const loadInbox = () => inboxCache;
            const saveInbox = (items) => { inboxCache = items; };
            const myMessages = () => inboxCache;
            const refreshInbox = async () => {
                try { inboxCache = await api('/api/affilie/messages'); } catch { inboxCache = []; }
                return inboxCache;
            };

            const escapeHtml = (value) =>
                String(value ?? '')
                    .replaceAll('&', '&amp;')
                    .replaceAll('<', '&lt;')
                    .replaceAll('>', '&gt;')
                    .replaceAll('"', '&quot;');

            const refreshProfile = async () => {
                try {
                    session = await api('/api/auth/affilie/me');
                } catch {
                    // ignore
                }

                const name = session.nom_complet || 'Affilié';
                document.getElementById('aff-welcome-title').textContent = `Bonjour, ${name.split(' ')[0]}`;
                document.getElementById('aff-user-name').textContent = name;
                document.getElementById('aff-user-login').textContent = session.login || '—';
                document.getElementById('aff-avatar').textContent = (name.trim()[0] || 'A').toUpperCase();

                const grid = document.getElementById('aff-profil-grid');
                if (grid) {
                    const rows = [
                        ['ID', session.id],
                        ['Nom Complet', session.nom_complet],
                        ['Titre', session.titre],
                        ['Contact', session.contact],
                        ['Ville', session.ville],
                        ['Banque', session.banque],
                        ['Rib', session.rib],
                        ['Type Paiement', session.type_paiement],
                        ['Statue', session.statue === 'susp' ? 'Susp' : 'Actif'],
                        ['Login', session.login],
                    ];
                    grid.innerHTML = rows
                        .map(
                            ([label, value]) => `<div class="affilie-view__item">
                                <dt>${escapeHtml(label)}</dt>
                                <dd>${escapeHtml(value || '—')}</dd>
                            </div>`
                        )
                        .join('');
                }
            };

            const renderMessages = async () => {
                await refreshInbox();
                const messages = myMessages().sort(
                    (a, b) => new Date(b.created_at || 0) - new Date(a.created_at || 0)
                );
                const badge = document.getElementById('aff-msg-badge');
                const unread = messages.filter((m) => !m.read).length;
                if (badge) {
                    if (unread > 0) {
                        badge.hidden = false;
                        badge.textContent = String(unread);
                    } else {
                        badge.hidden = true;
                    }
                }

                const confirm = messages.find((m) => m.type === 'validation' && !m.read);
                const banner = document.getElementById('aff-confirm-banner');
                const confirmText = document.getElementById('aff-confirm-text');
                if (banner && confirmText) {
                    if (confirm && !banner.dataset.shown) {
                        banner.dataset.shown = confirm.id || '1';
                        banner.hidden = false;
                        banner.classList.remove('is-hiding');
                        confirmText.textContent = confirm.body || '';

                        window.clearTimeout(banner._hideTimer);
                        banner._hideTimer = window.setTimeout(() => {
                            banner.classList.add('is-hiding');
                            window.setTimeout(() => {
                                banner.hidden = true;
                                banner.classList.remove('is-hiding');
                                saveInbox(
                                    loadInbox().map((msg) =>
                                        msg.id === confirm.id ? { ...msg, read: true } : msg
                                    )
                                );
                                renderMessages();
                            }, 320);
                        }, 5000);
                    } else if (!confirm) {
                        banner.hidden = true;
                        banner.classList.remove('is-hiding');
                    }
                }

                const list = document.getElementById('aff-messages-list');
                if (!list) return;
                if (!messages.length) {
                    list.innerHTML = '<p class="aff-panel__text">Aucun message.</p>';
                    return;
                }
                list.innerHTML = messages
                    .map((msg) => {
                        const date = msg.created_at
                            ? new Date(msg.created_at).toLocaleString('fr-FR')
                            : '';
                        return `<article class="aff-message ${msg.read ? '' : 'is-unread'}" data-msg-id="${escapeHtml(msg.id)}">
                            <div class="aff-message__top">
                                <strong>${escapeHtml(msg.title || 'Message')}</strong>
                                <span>${escapeHtml(date)}</span>
                            </div>
                            <p>${escapeHtml(msg.body || '')}</p>
                        </article>`;
                    })
                    .join('');
            };

            const ORDERS_KEY = 'mouchap_orders';
            const CATALOGUE_KEY = 'mouchap_catalogue';
            const logoImg = @json(asset('images/mouchap-logo.png'));
            const markImg = @json(asset('images/mouchap-mark.png'));
            const heroImg = @json(asset('images/hero-mouchap.png'));

            const saisonLabels = {
                hiver: 'Hiver',
                automne: 'Automne',
                printemps: 'Printemps',
                ete: 'Été',
            };

            const loadCatalogue = () => {
                try {
                    const raw = localStorage.getItem(CATALOGUE_KEY);
                    if (!raw) {
                        localStorage.setItem(CATALOGUE_KEY, JSON.stringify([]));
                        return [];
                    }
                    const parsed = JSON.parse(raw);
                    return Array.isArray(parsed) ? parsed : [];
                } catch {
                    return [];
                }
            };

            const refreshCatalogueFromServer = async () => {
                try {
                    const response = await fetch('/api/catalogue/products', {
                        headers: { Accept: 'application/json' },
                    });
                    if (!response.ok) throw new Error();
                    const items = await response.json();
                    localStorage.setItem(
                        CATALOGUE_KEY,
                        JSON.stringify(Array.isArray(items) ? items : [])
                    );
                    renderCatalogueTable();
                    if (currentSaison) renderSeasonGallery(currentSaison);
                } catch {
                    renderCatalogueTable();
                }
            };

            const isVideoProduct = (product) =>
                product?.media_type === 'video' ||
                String(product?.photo || '').startsWith('data:video/');

            const renderCatalogueMedia = (product, className = 'product-thumb') => {
                if (!product.photo) {
                    return `<span class="${className} product-thumb--empty">—</span>`;
                }
                const src = escapeHtml(product.photo);
                const controls = className === 'aff-cat-item__asset' ? ' controls' : '';
                return isVideoProduct(product)
                    ? `<video src="${src}" class="${className}"${controls} muted playsinline preload="metadata" aria-label="Vidéo produit"></video>`
                    : `<img src="${src}" alt="${escapeHtml(product.designation || '')}" class="${className}">`;
            };

            let currentSaison = null;
            let dlProduct = null;

            const renderCatalogueTable = (saisonFilter = null) => {
                const tbody = document.getElementById('aff-cat-tbody');
                if (!tbody) return;
                let items = loadCatalogue();
                if (saisonFilter) {
                    items = items.filter((p) => p.saison === saisonFilter);
                }
                if (!items.length) {
                    tbody.innerHTML = `<tr><td colspan="9" class="admin-table__empty">Aucun produit.</td></tr>`;
                    return;
                }
                tbody.innerHTML = items
                    .map((p) => {
                        const media = renderCatalogueMedia(p);
                        const canOrder = Number(p.qte || 0) > 0;
                        return `<tr data-product-id="${escapeHtml(p.id)}">
                            <td>${escapeHtml(p.ref)}</td>
                            <td>${escapeHtml(p.designation)}</td>
                            <td>${escapeHtml(p.categorie)}</td>
                            <td>${escapeHtml(p.famille)}</td>
                            <td>${escapeHtml(saisonLabels[p.saison] || p.saison || '—')}</td>
                            <td>${escapeHtml(p.size)}</td>
                            <td><strong>${escapeHtml(p.qte ?? 0)}</strong></td>
                            <td>${media}</td>
                            <td>
                                <div class="admin-actions">
                                    <button type="button" class="admin-action-btn admin-action-btn--view" data-cat-action="view" title="Voir le média" aria-label="Voir">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.5 12s3.5-6.5 9.5-6.5S21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="2.5"/></svg>
                                    </button>
                                    <button type="button" class="admin-action-btn admin-action-btn--edit" data-cat-action="download" title="Télécharger" aria-label="Télécharger">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14"/></svg>
                                    </button>
                                    <button type="button" class="admin-action-btn admin-action-btn--order" data-cat-action="order" title="Commander" aria-label="Commander" ${canOrder ? '' : 'disabled'}>
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path stroke-linecap="round" d="M9 12h6M9 16h4"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>`;
                    })
                    .join('');
            };

            const renderSeasonGallery = (saison) => {
                currentSaison = saison;
                const gallery = document.getElementById('aff-season-gallery');
                const grid = document.getElementById('aff-season-grid');
                const tableWrap = document.querySelector('#aff-view-catalogue .aff-cmd-table-wrap');
                const seasonCards = document.querySelector('.aff-season-cards');
                document.getElementById('aff-season-gallery-title').textContent =
                    `Saison ${saisonLabels[saison] || saison}`;

                const items = loadCatalogue().filter((p) => p.saison === saison);
                if (gallery) gallery.hidden = false;
                if (tableWrap) tableWrap.hidden = true;
                if (seasonCards) seasonCards.hidden = true;

                document.querySelectorAll('.aff-season-card').forEach((btn) => {
                    btn.classList.toggle('is-active', btn.dataset.saison === saison);
                });

                if (!grid) return;
                if (!items.length) {
                    grid.innerHTML = `<p class="aff-panel__text">Aucun article pour cette saison.</p>`;
                    return;
                }

                grid.innerHTML = items
                    .map((p) => {
                        const media = p.photo
                            ? renderCatalogueMedia(p, 'aff-cat-item__asset')
                            : `<img src="${escapeHtml(logoImg)}" alt="${escapeHtml(p.designation)}" class="aff-cat-item__asset">`;
                        return `<article class="aff-cat-item" data-product-id="${escapeHtml(p.id)}">
                            <div class="aff-cat-item__media">
                                ${media}
                            </div>
                            <h4 class="aff-cat-item__title">${escapeHtml(p.designation)}</h4>
                            <p class="aff-cat-item__stock">${escapeHtml(p.qte ?? 0)} disponible(s)</p>
                            <div class="aff-cat-item__actions">
                                <button type="button" class="admin-action-btn" data-cat-action="download" title="Télécharger" aria-label="Télécharger">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14"/></svg>
                                </button>
                                <button type="button" class="admin-action-btn" data-cat-action="cart" title="Panier" aria-label="Panier" ${Number(p.qte || 0) < 1 ? 'disabled' : ''}>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.5L21 8H7"/></svg>
                                </button>
                            </div>
                        </article>`;
                    })
                    .join('');
            };

            const closeSeasonGallery = () => {
                currentSaison = null;
                const gallery = document.getElementById('aff-season-gallery');
                const tableWrap = document.querySelector('#aff-view-catalogue .aff-cmd-table-wrap');
                const seasonCards = document.querySelector('.aff-season-cards');
                if (gallery) gallery.hidden = true;
                if (tableWrap) tableWrap.hidden = false;
                if (seasonCards) seasonCards.hidden = false;
                document.querySelectorAll('.aff-season-card').forEach((btn) => btn.classList.remove('is-active'));
                renderCatalogueTable();
            };

            const mediaExtension = (product, mime = '') => {
                if (mime.includes('webm')) return 'webm';
                if (mime.includes('ogg')) return 'ogv';
                if (mime.includes('mp4') || isVideoProduct(product)) return 'mp4';
                if (mime.includes('png')) return 'png';
                if (mime.includes('webp')) return 'webp';
                if (mime.includes('gif')) return 'gif';
                return 'jpg';
            };

            const downloadOriginalMedia = async (product) => {
                const src = product.photo || logoImg;
                try {
                    const res = await fetch(src);
                    const blob = await res.blob();
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    const ext = mediaExtension(product, blob.type);
                    a.download = `${(product.ref || 'produit').replace(/[^\w-]+/g, '_')}.${ext}`;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    URL.revokeObjectURL(url);
                } catch {
                    const a = document.createElement('a');
                    a.href = src;
                    a.download = `${product.ref || 'produit'}.${mediaExtension(product)}`;
                    a.target = '_blank';
                    a.click();
                }
            };

            const downloadAsPdf = (product) => {
                if (isVideoProduct(product)) {
                    downloadOriginalMedia(product);
                    return;
                }
                const src = product.photo || logoImg;
                const win = window.open('', '_blank', 'width=800,height=900');
                if (!win) {
                    alert('Autorisez les pop-ups pour le PDF.');
                    return;
                }
                win.document.write(`<!DOCTYPE html><html><head><meta charset="utf-8"><title>${escapeHtml(product.designation || 'Produit')}</title>
                    <style>body{margin:0;font-family:Georgia,serif;text-align:center;padding:1.5rem}img{max-width:100%;height:auto}h1{font-size:1.2rem}</style></head>
                    <body><h1>${escapeHtml(product.designation || '')} · ${escapeHtml(product.ref || '')}</h1>
                    <img src="${escapeHtml(src)}" alt="">
                    <script>window.onload=function(){window.print();}<\/script></body></html>`);
                win.document.close();
            };

            const openOrderSheet = (product) => {
                const sheet = document.getElementById('aff-order-sheet');
                if (!sheet || !product) return;
                document.getElementById('aff-order-product-id').value = product.id;
                document.getElementById('aff-order-ref').value = product.ref || '';
                document.getElementById('aff-order-designation').value = product.designation || '';
                const availableQuantity = Number(product.qte || 0);
                const quantityInput = document.getElementById('aff-order-qte');
                quantityInput.value = 1;
                quantityInput.max = String(availableQuantity);
                document.getElementById('aff-order-qte-label').textContent =
                    `Qte — ${availableQuantity} disponible(s)`;

                const sizes = product.sizes || String(product.size || 'M').split(/[\/,\s]+/).filter(Boolean);
                const couleurs = product.couleurs || ['Noir', 'Beige', 'Blanc'];

                document.getElementById('aff-order-sizes').innerHTML = sizes
                    .map(
                        (s, i) => `<label class="aff-check"><input type="checkbox" name="size" value="${escapeHtml(s)}" ${i === 0 ? 'checked' : ''}> <span>${escapeHtml(s)}</span></label>`
                    )
                    .join('');
                document.getElementById('aff-order-couleurs').innerHTML = couleurs
                    .map(
                        (c, i) => `<label class="aff-check"><input type="checkbox" name="couleur" value="${escapeHtml(c)}" ${i === 0 ? 'checked' : ''}> <span>${escapeHtml(c)}</span></label>`
                    )
                    .join('');

                sheet.hidden = false;
                sheet.setAttribute('aria-hidden', 'false');
                document.body.classList.add('product-sheet-open');
            };

            const closeOrderSheet = () => {
                const sheet = document.getElementById('aff-order-sheet');
                if (!sheet) return;
                sheet.hidden = true;
                sheet.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('product-sheet-open');
            };

            const hideDlMenu = () => {
                const menu = document.getElementById('aff-dl-menu');
                if (menu) menu.hidden = true;
                dlProduct = null;
            };

            const showDownloadMenu = (product, button) => {
                dlProduct = product;
                const menu = document.getElementById('aff-dl-menu');
                const original = document.getElementById('aff-dl-original');
                const pdf = document.getElementById('aff-dl-pdf');
                if (!menu) return;

                const video = isVideoProduct(product);
                if (original) {
                    original.textContent = video
                        ? 'Télécharger la vidéo'
                        : 'Télécharger la photo';
                }
                if (pdf) pdf.hidden = video;

                const rect = button.getBoundingClientRect();
                menu.style.top = `${rect.bottom + 6}px`;
                menu.style.left = `${Math.min(rect.left, window.innerWidth - 200)}px`;
                menu.hidden = false;
            };

            document.querySelectorAll('[data-saison]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    hideDlMenu();
                    renderSeasonGallery(btn.dataset.saison);
                });
            });

            document.getElementById('aff-season-gallery-back')?.addEventListener('click', () => {
                hideDlMenu();
                closeSeasonGallery();
            });

            document.getElementById('aff-season-grid')?.addEventListener('click', (event) => {
                const btn = event.target.closest('[data-cat-action]');
                if (!btn) return;
                const card = btn.closest('.aff-cat-item');
                const id = card?.dataset.productId;
                const product = loadCatalogue().find((p) => p.id === id);
                if (!product) return;

                if (btn.dataset.catAction === 'cart') {
                    hideDlMenu();
                    openBonFromProduct(product);
                    return;
                }

                if (btn.dataset.catAction === 'download') {
                    showDownloadMenu(product, btn);
                }
            });

            document.getElementById('aff-cat-tbody')?.addEventListener('click', (event) => {
                const btn = event.target.closest('[data-cat-action]');
                if (!btn) return;
                const id = btn.closest('tr')?.dataset.productId;
                const product = loadCatalogue().find((p) => String(p.id) === String(id));
                if (!product) return;

                if (btn.dataset.catAction === 'view' && product.photo) {
                    window.open(product.photo, '_blank', 'noopener');
                }
                if (btn.dataset.catAction === 'download') {
                    showDownloadMenu(product, btn);
                }
                if (btn.dataset.catAction === 'order') {
                    hideDlMenu();
                    openBonFromProduct(product);
                }
            });

            document.getElementById('aff-dl-menu')?.addEventListener('click', (event) => {
                const btn = event.target.closest('[data-dl-format]');
                if (!btn || !dlProduct) return;
                if (btn.dataset.dlFormat === 'original') downloadOriginalMedia(dlProduct);
                if (btn.dataset.dlFormat === 'pdf') downloadAsPdf(dlProduct);
                hideDlMenu();
            });

            document.addEventListener('click', (event) => {
                const menu = document.getElementById('aff-dl-menu');
                if (!menu || menu.hidden) return;
                if (menu.contains(event.target) || event.target.closest('[data-cat-action="download"]')) return;
                hideDlMenu();
            });

            document.querySelectorAll('[data-aff-order-close]').forEach((el) => {
                el.addEventListener('click', closeOrderSheet);
            });

            document.getElementById('aff-order-form')?.addEventListener('submit', async (event) => {
                event.preventDefault();
                const productId = document.getElementById('aff-order-product-id').value;
                const product = loadCatalogue().find((p) => p.id === productId);
                const sizes = [...document.querySelectorAll('#aff-order-sizes input:checked')].map((i) => i.value);
                const couleurs = [...document.querySelectorAll('#aff-order-couleurs input:checked')].map((i) => i.value);
                const qte = Number(document.getElementById('aff-order-qte').value || 1);

                if (!product || qte < 1 || qte > Number(product.qte || 0)) {
                    alert(`Quantité indisponible. Stock actuel : ${Number(product?.qte || 0)}.`);
                    return;
                }

                if (!sizes.length) {
                    alert('Choisissez au moins une taille.');
                    return;
                }
                if (!couleurs.length) {
                    alert('Choisissez au moins une couleur.');
                    return;
                }

                const submitButton = event.currentTarget.querySelector('[type="submit"]');
                submitButton.disabled = true;
                submitButton.textContent = 'Validation…';

                try {
                    const result = await api(`/api/catalogue/products/${product.id}/order`, {
                        method: 'POST',
                        body: { qte, sizes, couleurs },
                    });
                    const updatedProduct = result.product;
                    const catalogue = loadCatalogue().map((item) =>
                        String(item.id) === String(updatedProduct.id) ? updatedProduct : item
                    );
                    localStorage.setItem(CATALOGUE_KEY, JSON.stringify(catalogue));
                    try { ordersCache = await api('/api/affilie/orders'); } catch {}
                } catch (error) {
                    alert(error.message || 'Commande impossible.');
                    await refreshCatalogueFromServer();
                    submitButton.disabled = false;
                    submitButton.textContent = 'Valider';
                    return;
                }

                submitButton.disabled = false;
                submitButton.textContent = 'Valider';
                closeOrderSheet();
                renderCatalogueTable();
                if (currentSaison) renderSeasonGallery(currentSaison);
                alert('Commande envoyée. Statut : Reportée (en attente de validation admin).');
            });

            const statueLabel = {
                confirme: 'Livrée',
                livree: 'Livrée',
                annulee: 'Annulée',
                reporte: 'Reportée',
                retour: 'Retour',
            };

            const statueClass = {
                confirme: 'aff-statue-pill--ok',
                livree: 'aff-statue-pill--ok',
                annulee: 'aff-statue-pill--ko',
                reporte: 'aff-statue-pill--warn',
                retour: 'aff-statue-pill--retour',
            };

            const formatAffDate = (value) => {
                if (!value) return '—';
                if (/^\d{4}-\d{2}-\d{2}$/.test(value)) {
                    const [y, m, d] = value.split('-');
                    return `${d}/${m}/${y}`;
                }
                const d = new Date(value);
                return Number.isNaN(d.getTime()) ? value : d.toLocaleDateString('fr-FR');
            };

            const formatMoney = (n) => `${Number(n || 0).toLocaleString('fr-MA')} DH`;
            const todayInput = () => new Date().toISOString().slice(0, 10);

            const actionIconsBn = {
                view: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.5 12s3.5-6.5 9.5-6.5S21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="2.5"/></svg>',
                edit: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12.5 4.5l7 7"/><path d="M4 20l.8-4.2L15.5 5.1a1.8 1.8 0 0 1 2.5 0l.9.9a1.8 1.8 0 0 1 0 2.5L7.2 20.2 3 21z"/></svg>',
                del: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16"/><path d="M9 7V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/><path d="M6.5 7l.8 12.2A1.5 1.5 0 0 0 8.8 20.5h6.4a1.5 1.5 0 0 0 1.5-1.3L17.5 7"/><path d="M10 11v6M14 11v6"/></svg>',
            };

            const loadOrders = () => ordersCache;
            const saveOrders = (items) => { ordersCache = items; };
            const myOrders = () => ordersCache;
            const refreshMyOrders = async () => {
                try { ordersCache = await api('/api/affilie/orders'); } catch { ordersCache = []; }
                return ordersCache;
            };

            const openBnSheet = async (order = null, preset = null) => {
                const sheet = document.getElementById('bn-sheet');
                if (!sheet) return;
                await refreshCatalogueFromServer().catch(() => {});
                fillBnRefOptions();

                const readOnly = !!(order && order.viewOnly) || !!(preset && preset.viewOnly);
                document.getElementById('bn-sheet-title').textContent = order
                    ? (readOnly ? 'Détail du bon' : 'Modifier le bon')
                    : 'Nouveau bon';
                document.getElementById('bn-uid').value = order?.uid || order?.id || '';
                document.getElementById('bn-date').value = order?.date || todayInput();
                document.getElementById('bn-ncmd').value = order?.n_cmd || 'Auto';
                document.getElementById('bn-qte').value = order?.qte || 1;

                const productId = order?.product_id || preset?.id || '';
                const ref = order?.ref_prod || preset?.ref || '';
                const refSelect = document.getElementById('bn-ref');
                if (ref && ![...refSelect.options].some((o) => o.value === ref)) {
                    const opt = document.createElement('option');
                    opt.value = ref;
                    opt.textContent = ref;
                    opt.dataset.productId = productId || '';
                    refSelect.appendChild(opt);
                }
                refSelect.value = ref;
                const fromCatalogue = findCatalogueProduct(ref, productId);
                const fromPreset = preset && preset.ref ? preset : null;
                applyBnProduct(
                    fromCatalogue || fromPreset || {
                        id: productId,
                        ref,
                        designation: order?.designation,
                        categorie: order?.categorie,
                        famille: order?.famille,
                        size: order?.size || (order?.sizes || [])[0] || '',
                        prix: order?.prix_u,
                    },
                    order?.size || (order?.sizes || [])[0] || ''
                );
                updateBnSousTotal();

                sheet.querySelectorAll('input, select').forEach((el) => {
                    if (el.type === 'hidden') return;
                    if (el.id === 'bn-date' || el.id === 'bn-ncmd' || el.id === 'bn-designation'
                        || el.id === 'bn-categorie' || el.id === 'bn-famille' || el.id === 'bn-prix'
                        || el.id === 'bn-sous-total') {
                        el.disabled = true;
                        return;
                    }
                    el.disabled = readOnly;
                });
                const saveBtn = document.getElementById('bn-submit-btn');
                if (saveBtn) saveBtn.hidden = readOnly;
                const hint = document.getElementById('bn-send-hint');
                if (hint) hint.hidden = readOnly;
                sheet.hidden = false;
                sheet.setAttribute('aria-hidden', 'false');
                document.body.classList.add('product-sheet-open');
            };

            const fillBnRefOptions = () => {
                const select = document.getElementById('bn-ref');
                if (!select) return;
                const current = select.value;
                const items = loadCatalogue().filter((p) => p.etat !== 'inactif');
                select.innerHTML = `<option value="">Sélectionner une référence…</option>`
                    + items.map((p) => `<option value="${escapeHtml(p.ref)}" data-product-id="${escapeHtml(p.id)}">${escapeHtml(p.ref)} — ${escapeHtml(p.designation || '')}</option>`).join('');
                if (current) select.value = current;
            };

            const findCatalogueProduct = (ref, productId = '') => {
                const items = loadCatalogue();
                if (productId) {
                    const byId = items.find((p) => String(p.id) === String(productId));
                    if (byId) return byId;
                }
                return items.find((p) => String(p.ref) === String(ref)) || null;
            };

            const parseProductSizes = (sizeValue) => {
                const raw = String(sizeValue || '').trim();
                if (!raw) return [];
                return raw.split(/[/|,;]+/).map((s) => s.trim()).filter(Boolean);
            };

            const fillBnSizeOptions = (sizeValue, preferred = '') => {
                const select = document.getElementById('bn-size');
                if (!select) return;
                const sizes = parseProductSizes(sizeValue);
                if (!sizes.length && preferred) sizes.push(preferred);
                select.innerHTML = sizes.length
                    ? sizes.map((s) => `<option value="${escapeHtml(s)}">${escapeHtml(s)}</option>`).join('')
                    : `<option value="">—</option>`;
                if (preferred && [...select.options].some((o) => o.value === preferred)) {
                    select.value = preferred;
                } else if (sizes.length) {
                    select.value = sizes[0];
                }
            };

            const updateBnStockInfo = (product) => {
                const info = document.getElementById('bn-stock-info');
                const stockEl = document.getElementById('bn-stock-qte');
                const qteInput = document.getElementById('bn-qte');
                if (!info || !stockEl) return;
                if (!product || product.ref == null && !product.id) {
                    info.hidden = true;
                    info.classList.remove('is-low', 'is-empty');
                    if (qteInput) qteInput.removeAttribute('max');
                    return;
                }
                const stock = Math.max(0, Number(product.qte ?? 0));
                stockEl.textContent = String(stock);
                info.hidden = false;
                info.classList.toggle('is-empty', stock <= 0);
                info.classList.toggle('is-low', stock > 0 && stock <= 5);
                if (qteInput) {
                    if (stock > 0) {
                        qteInput.max = String(stock);
                        const current = Number(qteInput.value || 1);
                        if (current > stock) qteInput.value = String(stock);
                        if (current < 1) qteInput.value = '1';
                    } else {
                        qteInput.max = '0';
                        qteInput.value = '1';
                    }
                }
            };

            const applyBnProduct = (product, preferredSize = '') => {
                if (!product) {
                    updateBnStockInfo(null);
                    return;
                }
                document.getElementById('bn-product-id').value = product.id || '';
                document.getElementById('bn-designation').value = product.designation || '';
                document.getElementById('bn-categorie').value = product.categorie || '';
                document.getElementById('bn-famille').value = product.famille || '';
                document.getElementById('bn-prix').value = product.prix ?? product.prix_u ?? 0;
                fillBnSizeOptions(product.size || preferredSize, preferredSize || parseProductSizes(product.size)[0] || '');
                updateBnStockInfo(product);
            };

            const updateBnSousTotal = () => {
                const prix = Number(document.getElementById('bn-prix')?.value || 0);
                const qte = Number(document.getElementById('bn-qte')?.value || 1);
                const el = document.getElementById('bn-sous-total');
                if (el) el.value = formatMoney(Math.round(prix * qte * 100) / 100);
            };

            const closeBnSheet = () => {
                const sheet = document.getElementById('bn-sheet');
                if (!sheet) return;
                sheet.hidden = true;
                sheet.setAttribute('aria-hidden', 'true');
                if (document.getElementById('aff-order-sheet')?.hidden !== false) {
                    document.body.classList.remove('product-sheet-open');
                }
            };

            const openBonFromProduct = (product) => {
                showView('bon-commande');
                document.querySelector('#aff-menu-commande')?.classList.add('is-open');
                openBnSheet(null, product);
            };

            const orderSizeLabel = (o) => o.size || (Array.isArray(o.sizes) && o.sizes.length ? o.sizes[0] : '—');

            const renderBonCommande = async () => {
                await refreshMyOrders();
                const tbody = document.getElementById('bn-tbody');
                if (!tbody) return;
                const orders = myOrders();
                if (!orders.length) {
                    tbody.innerHTML = `<tr><td colspan="11" class="admin-table__empty">Aucun bon de commande. Cliquez sur Ajouter.</td></tr>`;
                    return;
                }
                tbody.innerHTML = orders.map((o) => `<tr data-uid="${escapeHtml(o.uid || o.id)}">
                    <td>${escapeHtml(formatAffDate(o.date))}</td>
                    <td>${escapeHtml(o.n_cmd || '—')}</td>
                    <td>${escapeHtml(o.ref_prod || '—')}</td>
                    <td>${escapeHtml(o.designation || '—')}</td>
                    <td>${escapeHtml(o.categorie || '—')}</td>
                    <td>${escapeHtml(o.famille || '—')}</td>
                    <td>${escapeHtml(orderSizeLabel(o))}</td>
                    <td>${escapeHtml(o.qte ?? 0)}</td>
                    <td>${escapeHtml(formatMoney(o.prix_u))}</td>
                    <td>${escapeHtml(formatMoney(o.montant))}</td>
                    <td>
                        <div class="admin-actions">
                            <button type="button" class="admin-action-btn admin-action-btn--view" data-bn-action="view" title="Voir">${actionIconsBn.view}</button>
                            <button type="button" class="admin-action-btn admin-action-btn--edit" data-bn-action="edit" title="Modifier">${actionIconsBn.edit}</button>
                            <button type="button" class="admin-action-btn admin-action-btn--danger" data-bn-action="delete" title="Supprimer">${actionIconsBn.del}</button>
                        </div>
                    </td>
                </tr>`).join('');
            };

            const renderBalanceCommande = async () => {
                await refreshMyOrders();
                const tbody = document.getElementById('bal-cmd-tbody');
                if (!tbody) return;
                const orders = myOrders();
                if (!orders.length) {
                    tbody.innerHTML = `<tr><td colspan="6" class="admin-table__empty">Aucune commande.</td></tr>`;
                    return;
                }
                tbody.innerHTML = orders.map((o) => {
                    const st = o.statue === 'confirme' ? 'livree' : (o.statue || 'reporte');
                    return `<tr data-uid="${escapeHtml(o.uid || o.id)}">
                        <td>${escapeHtml(formatAffDate(o.date))}</td>
                        <td>${escapeHtml(o.n_cmd || '—')}</td>
                        <td>${escapeHtml(o.nom_client || '—')}</td>
                        <td>${escapeHtml(formatMoney(o.montant))}</td>
                        <td>${escapeHtml(formatMoney(o.marge))}</td>
                        <td>
                            <select class="aff-bal-statue ${statueClass[st] || ''}" data-bal-statue>
                                <option value="livree" ${st === 'livree' ? 'selected' : ''}>Livrée</option>
                                <option value="annulee" ${st === 'annulee' ? 'selected' : ''}>Annulée</option>
                                <option value="reporte" ${st === 'reporte' ? 'selected' : ''}>Reportée</option>
                            </select>
                        </td>
                    </tr>`;
                }).join('');

                tbody.querySelectorAll('[data-bal-statue]').forEach((select) => {
                    select.onchange = async () => {
                        const uid = select.closest('tr')?.dataset.uid;
                        try {
                            const updated = await api(`/api/affilie/orders/${uid}`, {
                                method: 'POST',
                                body: { statue: select.value },
                            });
                            ordersCache = ordersCache.map((o) => (String(o.uid || o.id) === String(uid) ? updated : o));
                            renderBalanceCommande();
                            renderBalancePaiement();
                        } catch (e) {
                            alert(e.message || 'Mise à jour impossible');
                        }
                    };
                });
            };

            const renderBalancePaiement = async () => {
                await refreshMyOrders();
                const tbody = document.getElementById('bal-paie-tbody');
                if (!tbody) return;
                const orders = myOrders();
                if (!orders.length) {
                    tbody.innerHTML = `<tr><td colspan="5" class="admin-table__empty">Aucun paiement.</td></tr>`;
                    return;
                }
                tbody.innerHTML = orders.map((o) => `<tr data-uid="${escapeHtml(o.uid || o.id)}">
                    <td>${escapeHtml(formatAffDate(o.date))}</td>
                    <td>${escapeHtml(o.n_cmd || '—')}</td>
                    <td>${escapeHtml(o.nom_client || '—')}</td>
                    <td><input type="date" class="aff-inline-date" data-bal-date-paie value="${escapeHtml(o.date_paie || '')}"></td>
                    <td>
                        <select class="aff-bal-recu" data-bal-recu>
                            <option value="oui" ${o.recu === 'oui' ? 'selected' : ''}>Oui</option>
                            <option value="non" ${o.recu !== 'oui' ? 'selected' : ''}>Non</option>
                        </select>
                    </td>
                </tr>`).join('');

                const patchField = async (uid, body) => {
                    const updated = await api(`/api/affilie/orders/${uid}`, { method: 'POST', body });
                    ordersCache = ordersCache.map((o) => (String(o.uid || o.id) === String(uid) ? updated : o));
                };

                tbody.querySelectorAll('[data-bal-date-paie]').forEach((input) => {
                    input.onchange = async () => {
                        try {
                            await patchField(input.closest('tr')?.dataset.uid, { date_paie: input.value || null });
                        } catch (e) { alert(e.message || 'Erreur'); }
                    };
                });
                tbody.querySelectorAll('[data-bal-recu]').forEach((select) => {
                    select.onchange = async () => {
                        try {
                            await patchField(select.closest('tr')?.dataset.uid, { recu: select.value });
                        } catch (e) { alert(e.message || 'Erreur'); }
                    };
                });
            };

            const printBalanceCommande = () => {
                const orders = myOrders();
                const win = window.open('', '_blank', 'noopener,noreferrer,width=980,height=720');
                if (!win) { alert('Autorisez les pop-ups.'); return; }
                const rows = orders.map((o) => {
                    const st = o.statue === 'confirme' ? 'livree' : o.statue;
                    return `<tr>
                        <td>${escapeHtml(formatAffDate(o.date))}</td>
                        <td>${escapeHtml(o.n_cmd || '')}</td>
                        <td>${escapeHtml(o.nom_client || '')}</td>
                        <td>${escapeHtml(formatMoney(o.montant))}</td>
                        <td>${escapeHtml(formatMoney(o.marge))}</td>
                        <td>${escapeHtml(statueLabel[st] || st)}</td>
                    </tr>`;
                }).join('') || `<tr><td colspan="6">Aucune commande</td></tr>`;
                win.document.write(`<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Balance Commande</title>
                    <style>body{font-family:Georgia,serif;padding:20px;color:#2a1520}table{width:100%;border-collapse:collapse;font-size:12px}th,td{border:1px solid #d7b7c0;padding:8px;text-align:center}th{background:#6b1e3a;color:#fff}</style></head>
                    <body><h1>Balance Commande</h1><p>MOUCHAP · ${escapeHtml(session?.nom_complet || '')}</p>
                    <table><thead><tr><th>Date</th><th>N° Bn</th><th>Nom Client</th><th>Montant</th><th>Marge</th><th>Statue</th></tr></thead>
                    <tbody>${rows}</tbody></table>
                    <script>window.onload=function(){window.print();}<\/script></body></html>`);
                win.document.close();
            };

            const renderCommandes = async () => {
                await refreshMyOrders();
                const orders = myOrders();
                const confirmees = orders.filter((o) => o.statue === 'confirme' || o.statue === 'livree');
                const annulees = orders.filter((o) => o.statue === 'annulee');
                const retours = orders.filter((o) => o.statue === 'retour');
                const totalConfirmees = confirmees.reduce((sum, o) => sum + Number(o.montant || 0), 0);

                document.getElementById('aff-cmd-confirmees').textContent = String(confirmees.length);
                document.getElementById('aff-cmd-annulees').textContent = String(annulees.length);
                document.getElementById('aff-cmd-retour').textContent = String(retours.length);
                document.getElementById('aff-cmd-total-confirmees').textContent = formatMoney(totalConfirmees);
                document.getElementById('aff-cmd-revenue').textContent = formatMoney(totalConfirmees);

                const tbody = document.getElementById('aff-cmd-tbody');
                if (!tbody) return;

                if (!orders.length) {
                    tbody.innerHTML = `<tr><td colspan="10" class="admin-table__empty">Aucune commande pour le moment.</td></tr>`;
                    return;
                }

                tbody.innerHTML = orders
                    .map((o) => {
                        const st = o.statue === 'confirme' ? 'livree' : (o.statue || 'reporte');
                        return `<tr>
                            <td>${escapeHtml(formatAffDate(o.date))}</td>
                            <td>${escapeHtml(o.n_cmd || '—')}</td>
                            <td>${escapeHtml(o.ref_prod || '—')}</td>
                            <td>${escapeHtml(o.designation || '—')}</td>
                            <td>${escapeHtml(o.nom_client || '—')}</td>
                            <td>${escapeHtml(o.ville || '—')}</td>
                            <td>${escapeHtml(o.contact || '—')}</td>
                            <td>${escapeHtml(o.qte ?? 0)}</td>
                            <td>${escapeHtml(formatMoney(o.montant))}</td>
                            <td><span class="aff-statue-pill ${statueClass[st] || ''}">${escapeHtml(statueLabel[st] || st)}</span></td>
                        </tr>`;
                    })
                    .join('');
            };

            const showView = (viewId) => {
                document.querySelectorAll('.aff-view').forEach((view) => {
                    const active = view.dataset.affView === viewId;
                    view.classList.toggle('is-active', active);
                    view.hidden = !active;
                });
                document.querySelectorAll('[data-aff-nav]').forEach((link) => {
                    link.classList.toggle('is-active', link.dataset.affNav === viewId);
                });

                const commandeViews = ['bon-commande', 'balance-commande', 'balance-paiement'];
                const menu = document.getElementById('aff-menu-commande');
                if (menu) {
                    const open = commandeViews.includes(viewId);
                    menu.classList.toggle('is-open', open);
                    menu.querySelector('[data-aff-menu-toggle]')?.setAttribute('aria-expanded', String(open));
                }

                const titles = {
                    accueil: 'Espace Affilié',
                    catalogue: 'Catalogue',
                    'bon-commande': 'Bon de Commande',
                    'balance-commande': 'Balance Commande',
                    'balance-paiement': 'Balance Paiement',
                    messages: 'Messages',
                    profil: 'Mon profil',
                };
                const titleEl = document.getElementById('aff-welcome-title');
                if (titleEl) titleEl.textContent = titles[viewId] || 'Espace Affilié';

                if (viewId === 'messages') {
                    const inbox = loadInbox().map((msg) =>
                        msg.affilie_id === session.id || msg.login === session.login
                            ? { ...msg, read: true }
                            : msg
                    );
                    saveInbox(inbox);
                    renderMessages();
                }
                if (viewId === 'accueil') renderCommandes();
                if (viewId === 'catalogue') {
                    hideDlMenu();
                    closeSeasonGallery();
                    refreshCatalogueFromServer();
                }
                if (viewId === 'bon-commande') renderBonCommande();
                if (viewId === 'balance-commande') renderBalanceCommande();
                if (viewId === 'balance-paiement') renderBalancePaiement();
            };

            document.querySelectorAll('[data-aff-menu-toggle]').forEach((btn) => {
                btn.addEventListener('click', () => {
                    const menu = btn.closest('.aff-menu');
                    const open = !menu.classList.contains('is-open');
                    menu.classList.toggle('is-open', open);
                    btn.setAttribute('aria-expanded', String(open));
                });
            });

            document.getElementById('bn-add-btn')?.addEventListener('click', () => openBnSheet());
            document.querySelectorAll('[data-bn-sheet-close]').forEach((el) => {
                el.addEventListener('click', closeBnSheet);
            });
            document.getElementById('bal-cmd-print')?.addEventListener('click', printBalanceCommande);

            document.getElementById('bn-tbody')?.addEventListener('click', async (event) => {
                const btn = event.target.closest('[data-bn-action]');
                if (!btn) return;
                const uid = btn.closest('tr')?.dataset.uid;
                const order = myOrders().find((o) => String(o.uid || o.id) === String(uid));
                if (!order) return;
                const action = btn.dataset.bnAction;
                if (action === 'view') openBnSheet({ ...order, viewOnly: true });
                if (action === 'edit') openBnSheet(order);
                if (action === 'delete' && confirm(`Supprimer le bon ${order.n_cmd} ?`)) {
                    try {
                        await api(`/api/affilie/orders/${uid}`, { method: 'DELETE' });
                        await renderBonCommande();
                    } catch (e) { alert(e.message || 'Suppression impossible'); }
                }
            });

            document.getElementById('bn-form')?.addEventListener('submit', async (event) => {
                event.preventDefault();
                const form = event.target;
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }
                const uid = document.getElementById('bn-uid').value;
                const ref = document.getElementById('bn-ref').value.trim();
                const product = findCatalogueProduct(ref, document.getElementById('bn-product-id').value);
                const qte = Number(document.getElementById('bn-qte').value || 1);
                const stock = Number(product?.qte ?? 0);
                if (product && stock >= 0 && qte > stock) {
                    alert(`Stock insuffisant. Disponible : ${stock}`);
                    return;
                }
                const payload = {
                    date: document.getElementById('bn-date').value || todayInput(),
                    ref_prod: ref,
                    designation: document.getElementById('bn-designation').value.trim(),
                    categorie: document.getElementById('bn-categorie').value.trim(),
                    famille: document.getElementById('bn-famille').value.trim(),
                    size: document.getElementById('bn-size').value.trim(),
                    sizes: [document.getElementById('bn-size').value.trim()].filter(Boolean),
                    qte,
                    prix_u: Number(document.getElementById('bn-prix').value || 0),
                    nom_client: session?.nom_complet || '—',
                    ville: session?.ville || '—',
                    contact: session?.contact || '—',
                    statue: 'reporte',
                    product_id: product?.id
                        ? Number(product.id)
                        : (document.getElementById('bn-product-id').value
                            ? Number(document.getElementById('bn-product-id').value)
                            : null),
                };
                const submitBtn = document.getElementById('bn-submit-btn');
                if (submitBtn) submitBtn.disabled = true;
                try {
                    if (uid) {
                        await api(`/api/affilie/orders/${uid}`, { method: 'POST', body: payload });
                    } else {
                        await api('/api/affilie/orders', { method: 'POST', body: payload });
                    }
                    closeBnSheet();
                    await renderBonCommande();
                    await renderCommandes();
                    alert('Commande envoyée à l’administration pour livraison.');
                } catch (e) {
                    alert(e.message || 'Envoi impossible');
                } finally {
                    if (submitBtn) submitBtn.disabled = false;
                }
            });

            document.getElementById('bn-ref')?.addEventListener('change', async () => {
                const select = document.getElementById('bn-ref');
                const chosenRef = select.value;
                const chosenId = select.selectedOptions[0]?.dataset.productId || '';
                try { await refreshCatalogueFromServer(); } catch {}
                fillBnRefOptions();
                select.value = chosenRef;
                const product = findCatalogueProduct(chosenRef, chosenId);
                applyBnProduct(product);
                updateBnSousTotal();
            });

            document.getElementById('bn-qte')?.addEventListener('input', updateBnSousTotal);
            document.getElementById('bn-prix')?.addEventListener('input', updateBnSousTotal);

            document.querySelectorAll('[data-aff-nav]').forEach((link) => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    showView(link.dataset.affNav);
                    document.querySelector('.aff-shell')?.classList.remove('is-sidebar-open');
                });
            });

            document.getElementById('aff-menu-toggle')?.addEventListener('click', () => {
                document.querySelector('.aff-shell')?.classList.toggle('is-sidebar-open');
            });

            document.getElementById('aff-logout')?.addEventListener('click', async () => {
                try { await api('/api/auth/affilie/logout', { method: 'POST' }); } catch {}
                window.location.href = '{{ url('/') }}';
            });

            window.addEventListener('storage', (event) => {
                if (event.key === ORDERS_KEY) {
                    const active = document.getElementById('aff-view-accueil')?.classList.contains('is-active');
                    if (active) renderCommandes();
                }
            });

            (async () => {
                const ok = await boot();
                if (!ok) return;
                await refreshProfile();

            renderMessages();
            renderCommandes();
            })();
        })();
    </script>
</body>
</html>
