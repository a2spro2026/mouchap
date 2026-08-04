<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOUCHAP — Administration</title>
    <link rel="icon" type="image/png" href="{{ asset('images/mouchap-logo.png') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-dashboard-body">
    <div class="admin-shell">
        {{-- Sidebar --}}
        <aside class="admin-sidebar" aria-label="Menu administration">
            <div class="admin-sidebar__brand">
                <img
                    src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}"
                    alt=""
                    class="admin-sidebar__logo"
                >
                <div>
                    <p class="admin-sidebar__name">MOUCHAP</p>
                    <p class="admin-sidebar__role">Administration</p>
                </div>
            </div>

            <div class="admin-sidebar__glow" aria-hidden="true"></div>

            <p class="admin-sidebar__heading">
                <span class="admin-sidebar__heading-dot"></span>
                Tableau de bord lumineux
            </p>

            <nav class="admin-sidebar__nav">
                {{-- Fournisseurs --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9.5 12 4l9 5.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5Z"/><path stroke-linecap="round" d="M9 21V12h6v9"/></svg>
                        </span>
                        <span class="admin-side-link__label">Fournisseurs</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#fiche-fournisseur" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path stroke-linecap="round" d="M14 2v6h6M8 13h8M8 17h6"/></svg></span>
                            <span>Fiche Fournisseur</span>
                        </a>
                        <a href="#bon-achat" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M6 2h12v4H6zM4 6h16l-1.5 14H5.5L4 6z"/><path stroke-linecap="round" d="M9 10v6M15 10v6"/></svg></span>
                            <span>Bon D'achat</span>
                        </a>
                        <a href="#reglement-achat" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" d="M2 10h20M6 15h4"/></svg></span>
                            <span>Règlement Achat</span>
                        </a>
                        <a href="#balance-fournisseur" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M5 8h14M7 12h10M9 16h6"/></svg></span>
                            <span>Balance Fournisseur</span>
                        </a>
                    </div>
                </div>

                {{-- Stock --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3.3 7 12 12l8.7-5M12 22V12"/></svg>
                        </span>
                        <span class="admin-side-link__label">Stock</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#fiche-produit" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20.6 8.5 12 3 3.4 8.5 12 14l8.6-5.5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3.4 15.5 12 21l8.6-5.5M3.4 12 12 17.5 20.6 12"/></svg></span>
                            <span>Fiche Produit</span>
                        </a>
                        <a href="#mouvement-produit" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4 4 4M17 8v12m0 0 4-4m-4 4-4-4"/></svg></span>
                            <span>Mouvement Produit</span>
                        </a>
                    </div>
                </div>

                {{-- Livraison --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M1 3h15v13H1zM16 8h4l3 5v3h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                        </span>
                        <span class="admin-side-link__label">Livraison</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#fiche-ste-livraison" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14"/><path stroke-linecap="round" d="M9 21v-6h6v6"/></svg></span>
                            <span>Fiche Ste Livraison</span>
                        </a>
                        <a href="#etat-technique" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a4 4 0 0 1 0 5.6l-6.8 6.8a2 2 0 0 1-2.8 0l-.1-.1a2 2 0 0 1 0-2.8l6.8-6.8a4 4 0 0 1 5.6 0Z"/><path stroke-linecap="round" d="M11 9.5 14.5 13"/></svg></span>
                            <span>Etat Technique</span>
                        </a>
                    </div>
                </div>

                {{-- Affiliés --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path stroke-linecap="round" stroke-linejoin="round" d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </span>
                        <span class="admin-side-link__label">Affiliés</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#fiche-affilie" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><path stroke-linecap="round" d="M16 11h4"/></svg></span>
                            <span>Fiche Affilié</span>
                        </a>
                        <a href="#gestion-paiement" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" d="M2 10h20"/><circle cx="16" cy="15" r="1.5"/></svg></span>
                            <span>Gestion Paiement</span>
                        </a>
                        <a href="#balance-affilie" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3M4 10h16M7 10l2 11h6l2-11M9 14h6"/></svg></span>
                            <span>Balance Affilié</span>
                        </a>
                    </div>
                </div>

                {{-- Client --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        </span>
                        <span class="admin-side-link__label">Client</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#fiche-client" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path stroke-linecap="round" d="M19 8v6M16 11h6"/></svg></span>
                            <span>Fiche Client</span>
                        </a>
                        <a href="#bon-commande" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path stroke-linecap="round" d="M9 12h6M9 16h4"/></svg></span>
                            <span>Bon Commande</span>
                        </a>
                        <a href="#reglements-ventes" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
                            <span>Règlements Ventes</span>
                        </a>
                        <a href="#balance-ventes" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M7 14l4-4 3 3 5-6"/></svg></span>
                            <span>Balance Ventes</span>
                        </a>
                    </div>
                </div>

                {{-- Charges --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 1v22M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </span>
                        <span class="admin-side-link__label">Charges</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#etat-charges" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg></span>
                            <span>Etat Charges</span>
                        </a>
                        <a href="#balance-charges" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M4 7h16M6 12h12M8 17h8"/></svg></span>
                            <span>Balance Charges</span>
                        </a>
                    </div>
                </div>

                {{-- Configuration --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9c.3.6.9 1 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z"/></svg>
                        </span>
                        <span class="admin-side-link__label">Configurations</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#utilisateur" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
                            <span>Utilisateur</span>
                        </a>
                        <a href="#parametres" class="admin-sublink">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg></span>
                            <span>Paramètres</span>
                            <span class="admin-sublink__hint">Ville · Règlement · Banque</span>
                        </a>
                    </div>
                </div>
            </nav>

            <a href="{{ url('/') }}" class="admin-sidebar__back">← Retour au site</a>
        </aside>

        {{-- Main --}}
        <div class="admin-main">
            <header class="admin-topbar">
                <div>
                    <p class="admin-topbar__eyebrow">Espace privé</p>
                    <h1 class="admin-topbar__title">Tableau de bord</h1>
                </div>
                <div class="admin-topbar__actions">
                    <div class="admin-notif" id="admin-notif">
                        <button type="button" class="admin-notif__btn" id="admin-notif-btn" aria-expanded="false" aria-controls="admin-notif-panel" title="Notifications">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.7 21a2 2 0 0 1-3.4 0"/>
                            </svg>
                            <span class="admin-notif__badge" id="admin-notif-badge" hidden>0</span>
                        </button>
                        <div class="admin-notif__panel" id="admin-notif-panel" hidden>
                            <div class="admin-notif__head">
                                <p>Demandes d'affiliation</p>
                                <span id="admin-notif-count">0 en attente</span>
                            </div>
                            <div class="admin-notif__list" id="admin-notif-list">
                                <p class="admin-notif__empty">Aucune nouvelle demande.</p>
                            </div>
                        </div>
                    </div>
                    <div class="admin-topbar__user">
                        <span class="admin-topbar__avatar">B</span>
                        <div>
                            <p class="admin-topbar__user-name">Bilal</p>
                            <p class="admin-topbar__user-role">Admin</p>
                        </div>
                    </div>
                </div>
            </header>

            {{-- KPI cards verrouillées (ne défilent pas) --}}
            <section class="admin-kpi" aria-label="Indicateurs clés">
                <article class="kpi-card kpi-card--affiliates" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Nombre Affiliés</p>
                    <p class="kpi-card__value">15 240</p>
                    <p class="kpi-card__meta">Réseau actif</p>
                </article>

                <article class="kpi-card kpi-card--sales" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Total Ventes</p>
                    <p class="kpi-card__value">248 900</p>
                    <p class="kpi-card__meta">Commandes validées</p>
                </article>

                <article class="kpi-card kpi-card--charges" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Total Charges</p>
                    <p class="kpi-card__value">62 450</p>
                    <p class="kpi-card__meta">DH ce mois</p>
                </article>

                <article class="kpi-card kpi-card--city" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Ville Active</p>
                    <p class="kpi-card__value">Casablanca</p>
                    <p class="kpi-card__meta">Top performance</p>
                </article>

                <article class="kpi-card kpi-card--revenue" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Total Revenue Affiliés</p>
                    <p class="kpi-card__value">4.8M</p>
                    <p class="kpi-card__meta">DH générés</p>
                </article>
            </section>

            <section class="admin-table-wrap" aria-label="Commandes">
                <div class="admin-table-scroll">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Nom Affilié</th>
                                <th>Ville Liv</th>
                                <th>Réf Cmd</th>
                                <th>Désignation</th>
                                <th>Qte</th>
                                <th>Prix/U</th>
                                <th>Sous-Total</th>
                                <th>Action</th>
                                <th>Statue</th>
                                <th>Etat Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>04/08/2026</td>
                                <td>Sara Amrani</td>
                                <td>Casablanca</td>
                                <td>CMD-24081</td>
                                <td>Robe rose gold</td>
                                <td>2</td>
                                <td>450 DH</td>
                                <td>900 DH</td>
                                <td>
                                    <button type="button" class="admin-action-btn" title="Voir" aria-label="Voir">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                </td>
                                <td>
                                    <select class="status-select status-select--confirme" data-status>
                                        <option value="confirme" selected>Confirmé</option>
                                        <option value="annulee">Annulée</option>
                                        <option value="reporte">Reporté</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="stock-select stock-select--dispo" data-stock>
                                        <option value="dispo" selected>Dispo</option>
                                        <option value="faible">Faible</option>
                                        <option value="rupture">Repture</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>03/08/2026</td>
                                <td>Youssef Benali</td>
                                <td>Rabat</td>
                                <td>CMD-24075</td>
                                <td>Sac MOUCHAP</td>
                                <td>1</td>
                                <td>320 DH</td>
                                <td>320 DH</td>
                                <td>
                                    <button type="button" class="admin-action-btn" title="Voir" aria-label="Voir">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                </td>
                                <td>
                                    <select class="status-select status-select--reporte" data-status>
                                        <option value="confirme">Confirmé</option>
                                        <option value="annulee">Annulée</option>
                                        <option value="reporte" selected>Reporté</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="stock-select stock-select--faible" data-stock>
                                        <option value="dispo">Dispo</option>
                                        <option value="faible" selected>Faible</option>
                                        <option value="rupture">Repture</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>02/08/2026</td>
                                <td>Imane Tazi</td>
                                <td>Marrakech</td>
                                <td>CMD-24070</td>
                                <td>Blazer rose</td>
                                <td>3</td>
                                <td>580 DH</td>
                                <td>1 740 DH</td>
                                <td>
                                    <button type="button" class="admin-action-btn" title="Voir" aria-label="Voir">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                </td>
                                <td>
                                    <select class="status-select status-select--annulee" data-status>
                                        <option value="confirme">Confirmé</option>
                                        <option value="annulee" selected>Annulée</option>
                                        <option value="reporte">Reporté</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="stock-select stock-select--rupture" data-stock>
                                        <option value="dispo">Dispo</option>
                                        <option value="faible">Faible</option>
                                        <option value="rupture" selected>Repture</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>01/08/2026</td>
                                <td>Karim El Fassi</td>
                                <td>Fès</td>
                                <td>CMD-24061</td>
                                <td>Pantalon crème</td>
                                <td>2</td>
                                <td>390 DH</td>
                                <td>780 DH</td>
                                <td>
                                    <button type="button" class="admin-action-btn" title="Voir" aria-label="Voir">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                </td>
                                <td>
                                    <select class="status-select status-select--confirme" data-status>
                                        <option value="confirme" selected>Confirmé</option>
                                        <option value="annulee">Annulée</option>
                                        <option value="reporte">Reporté</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="stock-select stock-select--dispo" data-stock>
                                        <option value="dispo" selected>Dispo</option>
                                        <option value="faible">Faible</option>
                                        <option value="rupture">Repture</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>31/07/2026</td>
                                <td>Nadia Chraibi</td>
                                <td>Tanger</td>
                                <td>CMD-24055</td>
                                <td>Chapeau beige</td>
                                <td>1</td>
                                <td>210 DH</td>
                                <td>210 DH</td>
                                <td>
                                    <button type="button" class="admin-action-btn" title="Voir" aria-label="Voir">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                </td>
                                <td>
                                    <select class="status-select status-select--reporte" data-status>
                                        <option value="confirme">Confirmé</option>
                                        <option value="annulee">Annulée</option>
                                        <option value="reporte" selected>Reporté</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="stock-select stock-select--faible" data-stock>
                                        <option value="dispo">Dispo</option>
                                        <option value="faible" selected>Faible</option>
                                        <option value="rupture">Repture</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.querySelectorAll('[data-menu-toggle]').forEach((toggle) => {
            toggle.addEventListener('click', () => {
                const menu = toggle.closest('.admin-menu');
                const isOpen = menu.classList.contains('is-open');

                // Ferme toutes les sections
                document.querySelectorAll('.admin-menu').forEach((item) => {
                    item.classList.remove('is-open');
                    const btn = item.querySelector('[data-menu-toggle]');
                    btn?.classList.remove('is-active');
                    btn?.setAttribute('aria-expanded', 'false');
                });

                // Reclic sur la même section = fermer ; sinon ouvrir celle-ci
                if (!isOpen) {
                    menu.classList.add('is-open');
                    toggle.classList.add('is-active');
                    toggle.setAttribute('aria-expanded', 'true');
                }
            });
        });

        document.querySelectorAll('.admin-sublink').forEach((link) => {
            link.addEventListener('click', () => {
                document.querySelectorAll('.admin-sublink').forEach((item) => item.classList.remove('is-active'));
                link.classList.add('is-active');
            });
        });

        const statusClassMap = {
            confirme: 'status-select--confirme',
            annulee: 'status-select--annulee',
            reporte: 'status-select--reporte',
        };

        const stockClassMap = {
            dispo: 'stock-select--dispo',
            faible: 'stock-select--faible',
            rupture: 'stock-select--rupture',
        };

        const syncSelectClass = (select, map) => {
            Object.values(map).forEach((cls) => select.classList.remove(cls));
            const next = map[select.value];
            if (next) {
                select.classList.add(next);
            }
        };

        document.querySelectorAll('[data-status]').forEach((select) => {
            syncSelectClass(select, statusClassMap);
            select.addEventListener('change', () => syncSelectClass(select, statusClassMap));
        });

        document.querySelectorAll('[data-stock]').forEach((select) => {
            syncSelectClass(select, stockClassMap);
            select.addEventListener('change', () => syncSelectClass(select, stockClassMap));
        });
    </script>
</body>
</html>
