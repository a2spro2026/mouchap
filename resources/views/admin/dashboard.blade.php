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

            <button type="button" class="admin-sidebar__heading" data-admin-view="commandes" id="admin-home-link">
                <span class="admin-sidebar__heading-dot"></span>
                Tableau de Bord
            </button>

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
                        <a href="#fiche-fournisseur" class="admin-sublink" data-admin-view="fiche-fournisseur">
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
                        <a href="#fiche-produit" class="admin-sublink" data-admin-view="fiche-produit">
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
                        <a href="#fiche-affilie" class="admin-sublink" data-admin-view="fiche-affilie">
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
                    <h1 class="admin-topbar__title">Tableau de Bord</h1>
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

            {{-- Vue Commandes (accueil) --}}
            <section class="admin-view is-active" id="admin-view-commandes" data-view="commandes" aria-label="Commandes">
                <div class="admin-table-wrap">
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
                            <tbody id="orders-tbody">
                                {{-- rempli en JS --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            {{-- Vue Fiche Produit --}}
            <section class="admin-view" id="admin-view-fiche-produit" data-view="fiche-produit" hidden aria-label="Fiche Produit">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Stock</p>
                            <h2 class="admin-panel__title">Fiche Produit</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="product-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost" id="product-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--products">
                                <thead>
                                    <tr>
                                        <th>Réf</th>
                                        <th>Désignation</th>
                                        <th>Catégorie</th>
                                        <th>Famille</th>
                                        <th>Size</th>
                                        <th>Qte</th>
                                        <th>Prix/U</th>
                                        <th>Photo</th>
                                        <th>Actions</th>
                                        <th>Statue</th>
                                        <th>Etat</th>
                                    </tr>
                                </thead>
                                <tbody id="products-tbody">
                                    {{-- rempli en JS --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Vue Fiche Affilié --}}
            <section class="admin-view" id="admin-view-fiche-affilie" data-view="fiche-affilie" hidden aria-label="Fiche Affilié">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Affiliés</p>
                            <h2 class="admin-panel__title">Fiche Affilié</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="affilie-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost" id="affilie-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--affilies">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Nom Complet</th>
                                        <th>Titre</th>
                                        <th>Contact</th>
                                        <th>Ville</th>
                                        <th>Banque</th>
                                        <th>Rib</th>
                                        <th>Type Paiement</th>
                                        <th>Statue</th>
                                        <th>Login</th>
                                        <th>Mot de Passe</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="affilies-tbody">
                                    {{-- rempli en JS --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Vue Fiche Fournisseur --}}
            <section class="admin-view" id="admin-view-fiche-fournisseur" data-view="fiche-fournisseur" hidden aria-label="Fiche Fournisseur">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Fournisseurs</p>
                            <h2 class="admin-panel__title">Fiche Fournisseur</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="fournisseur-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost" id="fournisseur-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--fournisseurs">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>ID</th>
                                        <th>Nom Fournisseur</th>
                                        <th>Ville</th>
                                        <th>Contact</th>
                                        <th>Type Régl</th>
                                        <th>Banque</th>
                                        <th>ICE</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="fournisseurs-tbody">
                                    {{-- rempli en JS --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="product-sheet" id="product-sheet" hidden aria-hidden="true">
        <div class="product-sheet__backdrop" data-product-sheet-close></div>
        <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="product-sheet-title">
            <div class="product-sheet__header">
                <div>
                    <p class="product-sheet__eyebrow">Stock · Produit</p>
                    <h3 class="product-sheet__title" id="product-sheet-title">Nouveau produit</h3>
                </div>
                <button type="button" class="product-sheet__x" data-product-sheet-close aria-label="Fermer">×</button>
            </div>

            <form class="product-sheet__form" id="product-form" novalidate>
                <input type="hidden" name="id" id="product-id">

                <label class="admin-field">
                    <span class="admin-field__label">Réf</span>
                    <input type="text" name="ref" id="product-ref" class="admin-field__input" required placeholder="ex. PRD-001">
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Désignation</span>
                    <input type="text" name="designation" id="product-designation" class="admin-field__input" required placeholder="Nom du produit">
                </label>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Catégorie</span>
                        <input type="text" name="categorie" id="product-categorie" class="admin-field__input" required placeholder="ex. Robes">
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Famille</span>
                        <input type="text" name="famille" id="product-famille" class="admin-field__input" required placeholder="ex. Femme">
                    </label>
                </div>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Size</span>
                        <input type="text" name="size" id="product-size" class="admin-field__input" required placeholder="ex. S / M / L">
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Qte</span>
                        <input type="number" name="qte" id="product-qte" class="admin-field__input" required min="0" step="1" placeholder="0">
                    </label>
                </div>

                <label class="admin-field">
                    <span class="admin-field__label">Prix/U (DH)</span>
                    <input type="number" name="prix" id="product-prix" class="admin-field__input" required min="0" step="0.01" placeholder="0">
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Photo</span>
                    <input type="file" name="photo" id="product-photo" class="admin-field__input admin-field__input--file" accept="image/*">
                    <div class="product-sheet__preview" id="product-photo-preview" hidden>
                        <img src="" alt="Aperçu photo" id="product-photo-img">
                    </div>
                </label>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Statue</span>
                        <select name="statue" id="product-statue" class="admin-field__input">
                            <option value="dispo">Dispo</option>
                            <option value="faible">Faible</option>
                            <option value="rupture">Rupture</option>
                        </select>
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Etat</span>
                        <select name="etat" id="product-etat" class="admin-field__input">
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                    </label>
                </div>

                <div class="product-sheet__footer">
                    <button type="button" class="admin-btn admin-btn--ghost" data-product-sheet-close>Annuler</button>
                    <button type="submit" class="admin-btn admin-btn--primary" id="product-save-btn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Feuille de saisie affilié --}}
    <div class="product-sheet" id="affilie-sheet" hidden aria-hidden="true">
        <div class="product-sheet__backdrop" data-affilie-sheet-close></div>
        <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="affilie-sheet-title">
            <div class="product-sheet__header">
                <div>
                    <p class="product-sheet__eyebrow">Affiliés · Fiche</p>
                    <h3 class="product-sheet__title" id="affilie-sheet-title">Nouvel affilié</h3>
                </div>
                <button type="button" class="product-sheet__x" data-affilie-sheet-close aria-label="Fermer">×</button>
            </div>

            <form class="product-sheet__form" id="affilie-fiche-form" novalidate>
                <input type="hidden" name="id" id="affilie-fiche-id">

                <label class="admin-field">
                    <span class="admin-field__label">Date</span>
                    <input type="date" name="date" id="affilie-fiche-date" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Nom Complet</span>
                    <input type="text" name="nom_complet" id="affilie-fiche-nom" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Titre</span>
                    <input type="text" name="titre" id="affilie-fiche-titre" class="admin-field__input" required>
                </label>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Contact</span>
                        <input type="tel" name="contact" id="affilie-fiche-contact" class="admin-field__input" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" required>
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Ville</span>
                        <input type="text" name="ville" id="affilie-fiche-ville" class="admin-field__input" required>
                    </label>
                </div>

                <label class="admin-field">
                    <span class="admin-field__label">Banque</span>
                    <input type="text" name="banque" id="affilie-fiche-banque" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Rib</span>
                    <input type="text" name="rib" id="affilie-fiche-rib" class="admin-field__input" inputmode="numeric" pattern="[0-9]{24}" maxlength="24" required>
                </label>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Type Paiement</span>
                        <select name="type_paiement" id="affilie-fiche-paiement" class="admin-field__input">
                            <option value="Esp">Esp</option>
                            <option value="Vir">Vir</option>
                            <option value="Vers">Vers</option>
                            <option value="Chq">Chq</option>
                            <option value="Eff">Eff</option>
                        </select>
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Statue</span>
                        <select name="statue" id="affilie-fiche-statue" class="admin-field__input">
                            <option value="actif">Actif</option>
                            <option value="susp">Susp</option>
                        </select>
                    </label>
                </div>

                <label class="admin-field">
                    <span class="admin-field__label">Login</span>
                    <input type="text" name="login" id="affilie-fiche-login" class="admin-field__input" required placeholder="ex. nom@mouchap.com">
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Mot de Passe</span>
                    <input type="text" name="password" id="affilie-fiche-password" class="admin-field__input" required>
                </label>

                <div class="product-sheet__footer">
                    <button type="button" class="admin-btn admin-btn--ghost" data-affilie-sheet-close>Annuler</button>
                    <button type="submit" class="admin-btn admin-btn--primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Panneau consultation affilié --}}
    <div class="product-sheet" id="affilie-view-sheet" hidden aria-hidden="true">
        <div class="product-sheet__backdrop" data-affilie-view-close></div>
        <div class="product-sheet__panel product-sheet__panel--view" role="dialog" aria-modal="true" aria-labelledby="affilie-view-title">
            <div class="product-sheet__header">
                <div>
                    <p class="product-sheet__eyebrow">Affiliés · Consultation</p>
                    <h3 class="product-sheet__title" id="affilie-view-title">Fiche affilié</h3>
                </div>
                <button type="button" class="product-sheet__x" data-affilie-view-close aria-label="Fermer">×</button>
            </div>

            <div class="affilie-view" id="affilie-view-body">
                {{-- rempli en JS --}}
            </div>

            <div class="product-sheet__footer">
                <button type="button" class="admin-btn admin-btn--ghost" data-affilie-view-close>Fermer</button>
                <button type="button" class="admin-btn admin-btn--primary" id="affilie-view-edit">Modifier</button>
            </div>
        </div>
    </div>

    {{-- Feuille de saisie fournisseur --}}
    <div class="product-sheet" id="fournisseur-sheet" hidden aria-hidden="true">
        <div class="product-sheet__backdrop" data-fournisseur-sheet-close></div>
        <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="fournisseur-sheet-title">
            <div class="product-sheet__header">
                <div>
                    <p class="product-sheet__eyebrow">Fournisseurs · Fiche</p>
                    <h3 class="product-sheet__title" id="fournisseur-sheet-title">Nouveau fournisseur</h3>
                </div>
                <button type="button" class="product-sheet__x" data-fournisseur-sheet-close aria-label="Fermer">×</button>
            </div>

            <form class="product-sheet__form" id="fournisseur-form" novalidate>
                <input type="hidden" name="uid" id="fournisseur-uid">

                <label class="admin-field">
                    <span class="admin-field__label">Date</span>
                    <input type="date" name="date" id="fournisseur-date" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">ID</span>
                    <input type="text" name="id" id="fournisseur-id" class="admin-field__input" readonly>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Nom Fournisseur</span>
                    <input type="text" name="nom" id="fournisseur-nom" class="admin-field__input" required>
                </label>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Ville</span>
                        <input type="text" name="ville" id="fournisseur-ville" class="admin-field__input" required>
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Contact</span>
                        <input type="tel" name="contact" id="fournisseur-contact" class="admin-field__input" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" required>
                    </label>
                </div>

                <label class="admin-field">
                    <span class="admin-field__label">Type Régl</span>
                    <select name="type_regl" id="fournisseur-type-regl" class="admin-field__input" required>
                        <option value="Esp">Esp</option>
                        <option value="Vir">Vir</option>
                        <option value="Vers">Vers</option>
                        <option value="Chq">Chq</option>
                        <option value="Eff">Eff</option>
                    </select>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Banque</span>
                    <input type="text" name="banque" id="fournisseur-banque" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">ICE</span>
                    <input type="text" name="ice" id="fournisseur-ice" class="admin-field__input" required placeholder="ex. 001234567000012">
                </label>

                <div class="product-sheet__footer">
                    <button type="button" class="admin-btn admin-btn--ghost" data-fournisseur-sheet-close>Fermer</button>
                    <button type="submit" class="admin-btn admin-btn--primary" id="fournisseur-save-btn">Valider</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Panneau consultation fournisseur --}}
    <div class="product-sheet" id="fournisseur-view-sheet" hidden aria-hidden="true">
        <div class="product-sheet__backdrop" data-fournisseur-view-close></div>
        <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="fournisseur-view-title">
            <div class="product-sheet__header">
                <div>
                    <p class="product-sheet__eyebrow">Fournisseurs · Consultation</p>
                    <h3 class="product-sheet__title" id="fournisseur-view-title">Fiche fournisseur</h3>
                </div>
                <button type="button" class="product-sheet__x" data-fournisseur-view-close aria-label="Fermer">×</button>
            </div>
            <div class="affilie-view" id="fournisseur-view-body"></div>
            <div class="product-sheet__footer">
                <button type="button" class="admin-btn admin-btn--ghost" data-fournisseur-view-close>Fermer</button>
                <button type="button" class="admin-btn admin-btn--primary" id="fournisseur-view-edit">Modifier</button>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[data-menu-toggle]').forEach((toggle) => {
            toggle.addEventListener('click', () => {
                const menu = toggle.closest('.admin-menu');
                const isOpen = menu.classList.contains('is-open');

                document.querySelectorAll('.admin-menu').forEach((item) => {
                    item.classList.remove('is-open');
                    const btn = item.querySelector('[data-menu-toggle]');
                    btn?.classList.remove('is-active');
                    btn?.setAttribute('aria-expanded', 'false');
                });

                if (!isOpen) {
                    menu.classList.add('is-open');
                    toggle.classList.add('is-active');
                    toggle.setAttribute('aria-expanded', 'true');
                }
            });
        });

        const statusClassMap = {
            confirme: 'status-select--confirme',
            annulee: 'status-select--annulee',
            reporte: 'status-select--reporte',
            retour: 'status-select--retour',
        };

        const stockClassMap = {
            dispo: 'stock-select--dispo',
            faible: 'stock-select--faible',
            rupture: 'stock-select--rupture',
        };

        const etatClassMap = {
            actif: 'etat-select--actif',
            inactif: 'etat-select--inactif',
        };

        const syncSelectClass = (select, map) => {
            Object.values(map).forEach((cls) => select.classList.remove(cls));
            const next = map[select.value];
            if (next) {
                select.classList.add(next);
            }
        };

        /* ——— Commandes admin (partagées avec espace affilié) ——— */
        const ORDERS_KEY = 'mouchap_orders';
        const ordersTbody = document.getElementById('orders-tbody');

        const defaultOrders = [
            {
                id: 'o1',
                date: '2026-08-04',
                affilie_nom: 'Sara Amrani',
                ville: 'Casablanca',
                n_cmd: 'CMD-24081',
                ref_prod: 'PRD-001',
                designation: 'Robe rose gold',
                nom_client: 'Lina Kadiri',
                contact: '0611223344',
                qte: 2,
                prix_u: 450,
                montant: 900,
                statue: 'confirme',
                stock: 'dispo',
            },
            {
                id: 'o2',
                date: '2026-08-03',
                affilie_nom: 'Youssef Benali',
                ville: 'Rabat',
                n_cmd: 'CMD-24075',
                ref_prod: 'PRD-002',
                designation: 'Sac MOUCHAP',
                nom_client: 'Omar Saidi',
                contact: '0622334455',
                qte: 1,
                prix_u: 320,
                montant: 320,
                statue: 'reporte',
                stock: 'faible',
            },
            {
                id: 'o3',
                date: '2026-08-02',
                affilie_nom: 'Imane Tazi',
                ville: 'Marrakech',
                n_cmd: 'CMD-24070',
                ref_prod: 'PRD-003',
                designation: 'Blazer rose',
                nom_client: 'Sara Bennani',
                contact: '0633445566',
                qte: 3,
                prix_u: 580,
                montant: 1740,
                statue: 'annulee',
                stock: 'rupture',
            },
            {
                id: 'o4',
                date: '2026-08-01',
                affilie_nom: 'Karim El Fassi',
                ville: 'Fès',
                n_cmd: 'CMD-24061',
                ref_prod: 'PRD-004',
                designation: 'Pantalon crème',
                nom_client: 'Hicham Alaoui',
                contact: '0644556677',
                qte: 2,
                prix_u: 390,
                montant: 780,
                statue: 'confirme',
                stock: 'dispo',
            },
            {
                id: 'o5',
                date: '2026-07-31',
                affilie_nom: 'Nadia Chraibi',
                ville: 'Tanger',
                n_cmd: 'CMD-24055',
                ref_prod: 'PRD-005',
                designation: 'Chapeau beige',
                nom_client: 'Meryem Zahra',
                contact: '0655667788',
                qte: 1,
                prix_u: 210,
                montant: 210,
                statue: 'retour',
                stock: 'faible',
            },
        ];

        const loadOrders = () => {
            try {
                const raw = localStorage.getItem(ORDERS_KEY);
                if (!raw) {
                    localStorage.setItem(ORDERS_KEY, JSON.stringify(defaultOrders));
                    return [...defaultOrders];
                }
                const parsed = JSON.parse(raw);
                return Array.isArray(parsed) ? parsed : [...defaultOrders];
            } catch {
                return [...defaultOrders];
            }
        };

        const saveOrders = (items) => localStorage.setItem(ORDERS_KEY, JSON.stringify(items));

        const formatOrderDate = (value) => {
            if (!value) return '—';
            if (/^\d{4}-\d{2}-\d{2}$/.test(value)) {
                const [y, m, d] = value.split('-');
                return `${d}/${m}/${y}`;
            }
            const d = new Date(value);
            return Number.isNaN(d.getTime()) ? value : d.toLocaleDateString('fr-FR');
        };

        const formatMoney = (n) => `${Number(n || 0).toLocaleString('fr-MA')} DH`;

        const renderOrders = () => {
            if (!ordersTbody) return;
            const items = loadOrders();
            const eye = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>`;

            ordersTbody.innerHTML = items
                .map(
                    (item) => `<tr data-order-id="${item.id}">
                        <td>${formatOrderDate(item.date)}</td>
                        <td>${item.affilie_nom || '—'}</td>
                        <td>${item.ville || '—'}</td>
                        <td>${item.n_cmd || '—'}</td>
                        <td>${item.designation || '—'}</td>
                        <td>${item.qte ?? 0}</td>
                        <td>${formatMoney(item.prix_u)}</td>
                        <td>${formatMoney(item.montant)}</td>
                        <td><button type="button" class="admin-action-btn" title="Voir" aria-label="Voir">${eye}</button></td>
                        <td>
                            <select class="status-select status-select--${item.statue || 'confirme'}" data-status data-order-field="statue">
                                <option value="confirme" ${item.statue === 'confirme' ? 'selected' : ''}>Confirmée</option>
                                <option value="annulee" ${item.statue === 'annulee' ? 'selected' : ''}>Annulée</option>
                                <option value="reporte" ${item.statue === 'reporte' ? 'selected' : ''}>Reportée</option>
                                <option value="retour" ${item.statue === 'retour' ? 'selected' : ''}>Retour</option>
                            </select>
                        </td>
                        <td>
                            <select class="stock-select stock-select--${item.stock || 'dispo'}" data-stock data-order-field="stock">
                                <option value="dispo" ${item.stock === 'dispo' ? 'selected' : ''}>Dispo</option>
                                <option value="faible" ${item.stock === 'faible' ? 'selected' : ''}>Faible</option>
                                <option value="rupture" ${item.stock === 'rupture' ? 'selected' : ''}>Repture</option>
                            </select>
                        </td>
                    </tr>`
                )
                .join('');

            ordersTbody.querySelectorAll('[data-status]').forEach((select) => {
                syncSelectClass(select, statusClassMap);
                select.addEventListener('change', () => {
                    syncSelectClass(select, statusClassMap);
                    const id = select.closest('tr')?.dataset.orderId;
                    saveOrders(
                        loadOrders().map((row) => (row.id === id ? { ...row, statue: select.value } : row))
                    );
                });
            });

            ordersTbody.querySelectorAll('[data-stock]').forEach((select) => {
                syncSelectClass(select, stockClassMap);
                select.addEventListener('change', () => {
                    syncSelectClass(select, stockClassMap);
                    const id = select.closest('tr')?.dataset.orderId;
                    saveOrders(
                        loadOrders().map((row) => (row.id === id ? { ...row, stock: select.value } : row))
                    );
                });
            });
        };

        renderOrders();

        /* ——— Navigation vues ——— */
        const showAdminView = (viewId) => {
            document.querySelectorAll('.admin-view').forEach((view) => {
                const active = view.dataset.view === viewId;
                view.classList.toggle('is-active', active);
                view.hidden = !active;
            });

            if (viewId === 'fiche-produit') {
                document.querySelector('.admin-topbar__title').textContent = 'Fiche Produit';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Stock';
            } else if (viewId === 'fiche-affilie') {
                document.querySelector('.admin-topbar__title').textContent = 'Fiche Affilié';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Affiliés';
                renderAffilies();
            } else if (viewId === 'fiche-fournisseur') {
                document.querySelector('.admin-topbar__title').textContent = 'Fiche Fournisseur';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Fournisseurs';
                renderFournisseurs();
            } else {
                document.querySelector('.admin-topbar__title').textContent = 'Tableau de Bord';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Espace privé';
                document.querySelectorAll('.admin-sublink').forEach((item) => item.classList.remove('is-active'));
            }
        };

        document.querySelectorAll('[data-admin-view]').forEach((el) => {
            el.addEventListener('click', (event) => {
                event.preventDefault();
                const viewId = el.getAttribute('data-admin-view');
                if (el.classList.contains('admin-sublink')) {
                    document.querySelectorAll('.admin-sublink').forEach((item) => item.classList.remove('is-active'));
                    el.classList.add('is-active');
                }
                if (viewId === 'commandes') {
                    document.querySelectorAll('.admin-sublink').forEach((item) => item.classList.remove('is-active'));
                    document.querySelectorAll('.admin-menu').forEach((item) => {
                        item.classList.remove('is-open');
                        const btn = item.querySelector('[data-menu-toggle]');
                        btn?.classList.remove('is-active');
                        btn?.setAttribute('aria-expanded', 'false');
                    });
                }
                showAdminView(viewId);
            });
        });

        /* ——— Fiche Produit CRUD (localStorage) ——— */
        const PRODUCTS_KEY = 'mouchap_products';
        const productsTbody = document.getElementById('products-tbody');
        const productSheet = document.getElementById('product-sheet');
        const productForm = document.getElementById('product-form');
        const productPhotoInput = document.getElementById('product-photo');
        const productPhotoPreview = document.getElementById('product-photo-preview');
        const productPhotoImg = document.getElementById('product-photo-img');
        let productPhotoData = '';

        const defaultProducts = [
            {
                id: 'p1',
                ref: 'PRD-001',
                designation: 'Robe rose gold',
                categorie: 'Robes',
                famille: 'Femme',
                size: 'M',
                qte: 24,
                prix: 450,
                photo: @json(asset('images/mouchap-logo.png')),
                statue: 'dispo',
                etat: 'actif',
            },
            {
                id: 'p2',
                ref: 'PRD-002',
                designation: 'Sac MOUCHAP',
                categorie: 'Accessoires',
                famille: 'Mixte',
                size: 'Unique',
                qte: 5,
                prix: 320,
                photo: @json(asset('images/mouchap-mark.png')),
                statue: 'faible',
                etat: 'actif',
            },
            {
                id: 'p3',
                ref: 'PRD-003',
                designation: 'Blazer rose',
                categorie: 'Vestes',
                famille: 'Femme',
                size: 'L',
                qte: 0,
                prix: 580,
                photo: '',
                statue: 'rupture',
                etat: 'inactif',
            },
        ];

        const loadProducts = () => {
            try {
                const raw = localStorage.getItem(PRODUCTS_KEY);
                if (!raw) {
                    localStorage.setItem(PRODUCTS_KEY, JSON.stringify(defaultProducts));
                    return [...defaultProducts];
                }
                const parsed = JSON.parse(raw);
                return Array.isArray(parsed) ? parsed : [...defaultProducts];
            } catch {
                return [...defaultProducts];
            }
        };

        const saveProducts = (items) => {
            localStorage.setItem(PRODUCTS_KEY, JSON.stringify(items));
        };

        const escapeHtml = (value) =>
            String(value ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;');

        const formatPrix = (prix) => `${Number(prix || 0).toLocaleString('fr-MA')} DH`;

        const actionIcons = {
            view: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>',
            edit: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>',
            del: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6"/></svg>',
        };

        const bindRowSelects = (root = productsTbody) => {
            root?.querySelectorAll('[data-product-statue]').forEach((select) => {
                syncSelectClass(select, stockClassMap);
                select.addEventListener('change', () => {
                    syncSelectClass(select, stockClassMap);
                    const id = select.closest('tr')?.dataset.id;
                    const items = loadProducts().map((item) =>
                        item.id === id ? { ...item, statue: select.value } : item
                    );
                    saveProducts(items);
                });
            });

            root?.querySelectorAll('[data-product-etat]').forEach((select) => {
                syncSelectClass(select, etatClassMap);
                select.addEventListener('change', () => {
                    syncSelectClass(select, etatClassMap);
                    const id = select.closest('tr')?.dataset.id;
                    const items = loadProducts().map((item) =>
                        item.id === id ? { ...item, etat: select.value } : item
                    );
                    saveProducts(items);
                });
            });
        };

        const renderProducts = () => {
            if (!productsTbody) return;
            const items = loadProducts();

            if (!items.length) {
                productsTbody.innerHTML = `<tr><td colspan="11" class="admin-table__empty">Aucun produit. Cliquez sur Ajouter.</td></tr>`;
                return;
            }

            productsTbody.innerHTML = items
                .map((item) => {
                    const photo = item.photo
                        ? `<img src="${escapeHtml(item.photo)}" alt="" class="product-thumb">`
                        : `<span class="product-thumb product-thumb--empty">—</span>`;

                    return `<tr data-id="${escapeHtml(item.id)}">
                        <td>${escapeHtml(item.ref)}</td>
                        <td>${escapeHtml(item.designation)}</td>
                        <td>${escapeHtml(item.categorie)}</td>
                        <td>${escapeHtml(item.famille)}</td>
                        <td>${escapeHtml(item.size)}</td>
                        <td>${escapeHtml(item.qte ?? 0)}</td>
                        <td>${formatPrix(item.prix)}</td>
                        <td>${photo}</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action-btn" data-product-action="view" title="Voir" aria-label="Voir">${actionIcons.view}</button>
                                <button type="button" class="admin-action-btn" data-product-action="edit" title="Modifier" aria-label="Modifier">${actionIcons.edit}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--danger" data-product-action="delete" title="Supprimer" aria-label="Supprimer">${actionIcons.del}</button>
                            </div>
                        </td>
                        <td>
                            <select class="stock-select stock-select--${escapeHtml(item.statue)}" data-product-statue>
                                <option value="dispo" ${item.statue === 'dispo' ? 'selected' : ''}>Dispo</option>
                                <option value="faible" ${item.statue === 'faible' ? 'selected' : ''}>Faible</option>
                                <option value="rupture" ${item.statue === 'rupture' ? 'selected' : ''}>Rupture</option>
                            </select>
                        </td>
                        <td>
                            <select class="etat-select etat-select--${escapeHtml(item.etat)}" data-product-etat>
                                <option value="actif" ${item.etat === 'actif' ? 'selected' : ''}>Actif</option>
                                <option value="inactif" ${item.etat === 'inactif' ? 'selected' : ''}>Inactif</option>
                            </select>
                        </td>
                    </tr>`;
                })
                .join('');

            bindRowSelects();
        };

        const openProductSheet = (mode = 'create', product = null) => {
            if (!productSheet || !productForm) return;

            productForm.reset();
            productPhotoData = product?.photo || '';
            document.getElementById('product-id').value = product?.id || '';
            document.getElementById('product-sheet-title').textContent =
                mode === 'edit' ? 'Modifier le produit' : mode === 'view' ? 'Détail produit' : 'Nouveau produit';

            if (product) {
                document.getElementById('product-ref').value = product.ref || '';
                document.getElementById('product-designation').value = product.designation || '';
                document.getElementById('product-categorie').value = product.categorie || '';
                document.getElementById('product-famille').value = product.famille || '';
                document.getElementById('product-size').value = product.size || '';
                document.getElementById('product-qte').value = product.qte ?? 0;
                document.getElementById('product-prix').value = product.prix ?? '';
                document.getElementById('product-statue').value = product.statue || 'dispo';
                document.getElementById('product-etat').value = product.etat || 'actif';
            }

            if (productPhotoData) {
                productPhotoImg.src = productPhotoData;
                productPhotoPreview.hidden = false;
            } else {
                productPhotoImg.src = '';
                productPhotoPreview.hidden = true;
            }

            const readOnly = mode === 'view';
            productForm.querySelectorAll('input, select').forEach((field) => {
                if (field.type === 'hidden') return;
                field.disabled = readOnly;
            });
            document.getElementById('product-save-btn').hidden = readOnly;

            productSheet.hidden = false;
            productSheet.setAttribute('aria-hidden', 'false');
            document.body.classList.add('product-sheet-open');
            if (!readOnly) {
                document.getElementById('product-ref').focus({ preventScroll: true });
            }
        };

        const closeProductSheet = () => {
            if (!productSheet) return;
            productSheet.hidden = true;
            productSheet.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('product-sheet-open');
            productForm?.reset();
            productPhotoData = '';
            productPhotoPreview.hidden = true;
            productForm?.querySelectorAll('input, select').forEach((field) => {
                field.disabled = false;
            });
            document.getElementById('product-save-btn').hidden = false;
        };

        document.getElementById('product-add-btn')?.addEventListener('click', () => openProductSheet('create'));

        document.querySelectorAll('[data-product-sheet-close]').forEach((el) => {
            el.addEventListener('click', closeProductSheet);
        });

        productPhotoInput?.addEventListener('change', () => {
            const file = productPhotoInput.files?.[0];
            if (!file) {
                productPhotoData = '';
                productPhotoPreview.hidden = true;
                return;
            }
            const reader = new FileReader();
            reader.onload = () => {
                productPhotoData = String(reader.result || '');
                productPhotoImg.src = productPhotoData;
                productPhotoPreview.hidden = false;
            };
            reader.readAsDataURL(file);
        });

        productForm?.addEventListener('submit', (event) => {
            event.preventDefault();
            const id = document.getElementById('product-id').value || `p${Date.now()}`;
            const payload = {
                id,
                ref: document.getElementById('product-ref').value.trim(),
                designation: document.getElementById('product-designation').value.trim(),
                categorie: document.getElementById('product-categorie').value.trim(),
                famille: document.getElementById('product-famille').value.trim(),
                size: document.getElementById('product-size').value.trim(),
                qte: Number(document.getElementById('product-qte').value || 0),
                prix: Number(document.getElementById('product-prix').value || 0),
                photo: productPhotoData,
                statue: document.getElementById('product-statue').value,
                etat: document.getElementById('product-etat').value,
            };

            if (!payload.ref || !payload.designation) return;

            const items = loadProducts();
            const index = items.findIndex((item) => item.id === id);
            if (index >= 0) {
                items[index] = { ...items[index], ...payload, photo: productPhotoData || items[index].photo };
            } else {
                items.unshift(payload);
            }
            saveProducts(items);
            renderProducts();
            closeProductSheet();
        });

        productsTbody?.addEventListener('click', (event) => {
            const btn = event.target.closest('[data-product-action]');
            if (!btn) return;
            const row = btn.closest('tr');
            const id = row?.dataset.id;
            const items = loadProducts();
            const product = items.find((item) => item.id === id);
            if (!product) return;

            const action = btn.getAttribute('data-product-action');
            if (action === 'view') openProductSheet('view', product);
            if (action === 'edit') openProductSheet('edit', product);
            if (action === 'delete') {
                if (confirm(`Supprimer le produit ${product.ref} ?`)) {
                    saveProducts(items.filter((item) => item.id !== id));
                    renderProducts();
                }
            }
        });

        renderProducts();

        /* ——— Fiche Affilié ——— */
        const AFFILIATION_REQ_KEY = 'mouchap_affiliation_requests';
        const AFFILIES_KEY = 'mouchap_affilies';
        const affiliesTbody = document.getElementById('affilies-tbody');
        const affilieSheet = document.getElementById('affilie-sheet');
        const affilieFicheForm = document.getElementById('affilie-fiche-form');
        const affilieViewSheet = document.getElementById('affilie-view-sheet');
        const affilieViewBody = document.getElementById('affilie-view-body');
        let affilieViewCurrentId = null;

        const affActionIcons = {
            view: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>',
            edit: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>',
            del: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6"/></svg>',
            pdf: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path stroke-linecap="round" d="M14 2v6h6M9 13h6M9 17h6M9 9h1"/></svg>',
        };

        const paiementClassMap = {
            Esp: 'paiement-select--esp',
            Vir: 'paiement-select--vir',
            Vers: 'paiement-select--vers',
            Chq: 'paiement-select--chq',
            Eff: 'paiement-select--eff',
        };

        const affStatueClassMap = {
            actif: 'aff-statue-select--actif',
            susp: 'aff-statue-select--susp',
        };

        const slugLogin = (nom) => {
            const base = String(nom || 'affilie')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '.')
                .replace(/^\.+|\.+$/g, '')
                .slice(0, 24) || 'affilie';
            return `${base}@mouchap.com`;
        };

        const randomPassword = () => `Mh${Math.random().toString(36).slice(2, 8)}`;

        const formatAffDate = (value) => {
            if (!value) return '—';
            const d = new Date(value);
            if (Number.isNaN(d.getTime())) {
                if (/^\d{4}-\d{2}-\d{2}$/.test(value)) {
                    const [y, m, day] = value.split('-');
                    return `${day}/${m}/${y}`;
                }
                return value;
            }
            return d.toLocaleDateString('fr-FR');
        };

        const toDateInput = (value) => {
            if (!value) return new Date().toISOString().slice(0, 10);
            if (/^\d{4}-\d{2}-\d{2}$/.test(value)) return value;
            const d = new Date(value);
            if (Number.isNaN(d.getTime())) return new Date().toISOString().slice(0, 10);
            return d.toISOString().slice(0, 10);
        };

        const loadAffilies = () => {
            try {
                const raw = localStorage.getItem(AFFILIES_KEY);
                const parsed = raw ? JSON.parse(raw) : [];
                return Array.isArray(parsed) ? parsed : [];
            } catch {
                return [];
            }
        };

        const saveAffilies = (items) => {
            localStorage.setItem(AFFILIES_KEY, JSON.stringify(items));
        };

        const syncAffiliesFromValidated = () => {
            let requests = [];
            try {
                requests = JSON.parse(localStorage.getItem(AFFILIATION_REQ_KEY) || '[]');
                if (!Array.isArray(requests)) requests = [];
            } catch {
                requests = [];
            }

            const validated = requests.filter((item) => item.status === 'validated');
            const items = loadAffilies();
            let changed = false;

            validated.forEach((req) => {
                const existing = items.find((item) => item.id === req.id);
                if (!existing) {
                    items.unshift({
                        id: req.id,
                        date: req.updated_at || req.created_at || new Date().toISOString(),
                        nom_complet: req.nom_complet || '',
                        titre: req.titre || '',
                        contact: req.contact || '',
                        ville: req.ville || '',
                        banque: req.banque || '',
                        rib: req.rib || '',
                        type_paiement: 'Vir',
                        statue: 'actif',
                        login: slugLogin(req.nom_complet),
                        password: randomPassword(),
                    });
                    changed = true;
                }
            });

            if (changed) {
                saveAffilies(items);
            }

            return loadAffilies();
        };

        const bindAffilieRowSelects = () => {
            affiliesTbody?.querySelectorAll('[data-aff-paiement]').forEach((select) => {
                syncSelectClass(select, paiementClassMap);
                select.onchange = () => {
                    syncSelectClass(select, paiementClassMap);
                    const id = select.closest('tr')?.dataset.id;
                    saveAffilies(
                        loadAffilies().map((item) =>
                            item.id === id ? { ...item, type_paiement: select.value } : item
                        )
                    );
                };
            });

            affiliesTbody?.querySelectorAll('[data-aff-statue]').forEach((select) => {
                syncSelectClass(select, affStatueClassMap);
                select.onchange = () => {
                    syncSelectClass(select, affStatueClassMap);
                    const id = select.closest('tr')?.dataset.id;
                    saveAffilies(
                        loadAffilies().map((item) =>
                            item.id === id ? { ...item, statue: select.value } : item
                        )
                    );
                };
            });
        };

        const renderAffilies = () => {
            if (!affiliesTbody) return;
            const items = syncAffiliesFromValidated();

            if (!items.length) {
                affiliesTbody.innerHTML = `<tr><td colspan="12" class="admin-table__empty">Aucun affilié validé. Validez une demande ou cliquez sur Ajouter.</td></tr>`;
                return;
            }

            affiliesTbody.innerHTML = items
                .map((item) => {
                    const paiement = item.type_paiement || 'Vir';
                    const statue = item.statue || 'actif';
                    return `<tr data-id="${escapeHtml(item.id)}">
                        <td>${escapeHtml(formatAffDate(item.date))}</td>
                        <td>${escapeHtml(item.nom_complet)}</td>
                        <td>${escapeHtml(item.titre || '—')}</td>
                        <td>${escapeHtml(item.contact)}</td>
                        <td>${escapeHtml(item.ville)}</td>
                        <td>${escapeHtml(item.banque)}</td>
                        <td>${escapeHtml(item.rib)}</td>
                        <td>
                            <select class="paiement-select paiement-select--${escapeHtml(paiement)}" data-aff-paiement>
                                <option value="Esp" ${paiement === 'Esp' ? 'selected' : ''}>Esp</option>
                                <option value="Vir" ${paiement === 'Vir' ? 'selected' : ''}>Vir</option>
                                <option value="Vers" ${paiement === 'Vers' ? 'selected' : ''}>Vers</option>
                                <option value="Chq" ${paiement === 'Chq' ? 'selected' : ''}>Chq</option>
                                <option value="Eff" ${paiement === 'Eff' ? 'selected' : ''}>Eff</option>
                            </select>
                        </td>
                        <td>
                            <select class="aff-statue-select aff-statue-select--${escapeHtml(statue)}" data-aff-statue>
                                <option value="actif" ${statue === 'actif' ? 'selected' : ''}>Actif</option>
                                <option value="susp" ${statue === 'susp' ? 'selected' : ''}>Susp</option>
                            </select>
                        </td>
                        <td>${escapeHtml(item.login || '')}</td>
                        <td>${escapeHtml(item.password || '')}</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action-btn" data-affilie-action="view" title="Voir" aria-label="Voir">${affActionIcons.view}</button>
                                <button type="button" class="admin-action-btn" data-affilie-action="edit" title="Modifier" aria-label="Modifier">${affActionIcons.edit}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--danger" data-affilie-action="delete" title="Supprimer" aria-label="Supprimer">${affActionIcons.del}</button>
                                <button type="button" class="admin-action-btn" data-affilie-action="pdf" title="PDF" aria-label="PDF">${affActionIcons.pdf}</button>
                            </div>
                        </td>
                    </tr>`;
                })
                .join('');

            bindAffilieRowSelects();
        };

        const statueLabel = (value) => (value === 'susp' ? 'Susp' : 'Actif');

        const buildAffilieViewHtml = (item) => `
            <dl class="affilie-view__grid">
                <div class="affilie-view__item">
                    <dt>ID</dt>
                    <dd>${escapeHtml(item.id || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Date</dt>
                    <dd>${escapeHtml(formatAffDate(item.date))}</dd>
                </div>
                <div class="affilie-view__item affilie-view__item--full">
                    <dt>Nom Complet</dt>
                    <dd>${escapeHtml(item.nom_complet || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Titre</dt>
                    <dd>${escapeHtml(item.titre || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Contact</dt>
                    <dd>${escapeHtml(item.contact || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Ville</dt>
                    <dd>${escapeHtml(item.ville || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Banque</dt>
                    <dd>${escapeHtml(item.banque || '—')}</dd>
                </div>
                <div class="affilie-view__item affilie-view__item--full">
                    <dt>Rib</dt>
                    <dd>${escapeHtml(item.rib || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Type Paiement</dt>
                    <dd>${escapeHtml(item.type_paiement || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Statue</dt>
                    <dd><span class="aff-statue-badge aff-statue-badge--${escapeHtml(item.statue || 'actif')}">${statueLabel(item.statue)}</span></dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Login</dt>
                    <dd>${escapeHtml(item.login || '—')}</dd>
                </div>
                <div class="affilie-view__item">
                    <dt>Mot de Passe</dt>
                    <dd>${escapeHtml(item.password || '—')}</dd>
                </div>
            </dl>
        `;

        const openAffilieView = (affilie) => {
            if (!affilieViewSheet || !affilieViewBody || !affilie) return;
            affilieViewCurrentId = affilie.id;
            document.getElementById('affilie-view-title').textContent = affilie.nom_complet || 'Fiche affilié';
            affilieViewBody.innerHTML = buildAffilieViewHtml(affilie);
            affilieViewSheet.hidden = false;
            affilieViewSheet.setAttribute('aria-hidden', 'false');
            document.body.classList.add('product-sheet-open');
        };

        const closeAffilieView = () => {
            if (!affilieViewSheet) return;
            affilieViewSheet.hidden = true;
            affilieViewSheet.setAttribute('aria-hidden', 'true');
            if (affilieSheet?.hidden !== false) {
                document.body.classList.remove('product-sheet-open');
            }
            affilieViewCurrentId = null;
        };

        const printAffiliePdf = (affilie) => {
            const win = window.open('', '_blank', 'width=800,height=900');
            if (!win) {
                alert('Autorisez les pop-ups pour générer le PDF.');
                return;
            }
            win.document.write(`<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Affilié ${escapeHtml(affilie.nom_complet || '')}</title>
                <style>
                    body{font-family:Georgia,serif;padding:2rem;color:#2a1520;background:#fff}
                    h1{font-size:1.6rem;margin:0 0 .25rem}
                    .sub{color:#8a4a5c;margin:0 0 1.5rem;font-size:.85rem;letter-spacing:.08em;text-transform:uppercase}
                    dl{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
                    .full{grid-column:1/-1}
                    dt{font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;color:#8a4a5c;margin:0 0 .2rem}
                    dd{margin:0;font-size:1rem;font-weight:600;border-bottom:1px solid #eee;padding-bottom:.35rem}
                    @media print{body{padding:0}}
                </style></head><body>
                <p class="sub">MOUCHAP · Fiche Affilié</p>
                <h1>${escapeHtml(affilie.nom_complet || 'Affilié')}</h1>
                <dl>
                    <div><dt>ID</dt><dd>${escapeHtml(affilie.id || '—')}</dd></div>
                    <div><dt>Date</dt><dd>${escapeHtml(formatAffDate(affilie.date))}</dd></div>
                    <div class="full"><dt>Nom Complet</dt><dd>${escapeHtml(affilie.nom_complet || '—')}</dd></div>
                    <div><dt>Titre</dt><dd>${escapeHtml(affilie.titre || '—')}</dd></div>
                    <div><dt>Contact</dt><dd>${escapeHtml(affilie.contact || '—')}</dd></div>
                    <div><dt>Ville</dt><dd>${escapeHtml(affilie.ville || '—')}</dd></div>
                    <div><dt>Banque</dt><dd>${escapeHtml(affilie.banque || '—')}</dd></div>
                    <div class="full"><dt>Rib</dt><dd>${escapeHtml(affilie.rib || '—')}</dd></div>
                    <div><dt>Type Paiement</dt><dd>${escapeHtml(affilie.type_paiement || '—')}</dd></div>
                    <div><dt>Statue</dt><dd>${statueLabel(affilie.statue)}</dd></div>
                    <div><dt>Login</dt><dd>${escapeHtml(affilie.login || '—')}</dd></div>
                    <div><dt>Mot de Passe</dt><dd>${escapeHtml(affilie.password || '—')}</dd></div>
                </dl>
                <script>window.onload=function(){window.print();}<\/script>
                </body></html>`);
            win.document.close();
        };

        const openAffilieSheet = (affilie = null) => {
            if (!affilieSheet || !affilieFicheForm) return;
            closeAffilieView();
            affilieFicheForm.reset();
            document.getElementById('affilie-sheet-title').textContent = affilie
                ? 'Modifier l’affilié'
                : 'Nouvel affilié';
            document.getElementById('affilie-fiche-id').value = affilie?.id || '';
            document.getElementById('affilie-fiche-date').value = toDateInput(affilie?.date);
            document.getElementById('affilie-fiche-nom').value = affilie?.nom_complet || '';
            document.getElementById('affilie-fiche-titre').value = affilie?.titre || '';
            document.getElementById('affilie-fiche-contact').value = affilie?.contact || '';
            document.getElementById('affilie-fiche-ville').value = affilie?.ville || '';
            document.getElementById('affilie-fiche-banque').value = affilie?.banque || '';
            document.getElementById('affilie-fiche-rib').value = affilie?.rib || '';
            document.getElementById('affilie-fiche-paiement').value = affilie?.type_paiement || 'Vir';
            document.getElementById('affilie-fiche-statue').value = affilie?.statue || 'actif';
            document.getElementById('affilie-fiche-login').value = affilie?.login || '';
            document.getElementById('affilie-fiche-password').value = affilie?.password || randomPassword();

            affilieSheet.hidden = false;
            affilieSheet.setAttribute('aria-hidden', 'false');
            document.body.classList.add('product-sheet-open');
            document.getElementById('affilie-fiche-nom').focus({ preventScroll: true });
        };

        const closeAffilieSheet = () => {
            if (!affilieSheet) return;
            affilieSheet.hidden = true;
            affilieSheet.setAttribute('aria-hidden', 'true');
            if (affilieViewSheet?.hidden !== false) {
                document.body.classList.remove('product-sheet-open');
            }
            affilieFicheForm?.reset();
        };

        document.getElementById('affilie-add-btn')?.addEventListener('click', () => openAffilieSheet());
        document.querySelectorAll('[data-affilie-sheet-close]').forEach((el) => {
            el.addEventListener('click', closeAffilieSheet);
        });
        document.querySelectorAll('[data-affilie-view-close]').forEach((el) => {
            el.addEventListener('click', closeAffilieView);
        });
        document.getElementById('affilie-view-edit')?.addEventListener('click', () => {
            const item = loadAffilies().find((a) => a.id === affilieViewCurrentId);
            if (item) openAffilieSheet(item);
        });

        affiliesTbody?.addEventListener('click', (event) => {
            const btn = event.target.closest('[data-affilie-action]');
            if (!btn) return;
            const id = btn.closest('tr')?.dataset.id;
            const items = loadAffilies();
            const affilie = items.find((item) => item.id === id);
            if (!affilie) return;

            const action = btn.getAttribute('data-affilie-action');
            if (action === 'view') openAffilieView(affilie);
            if (action === 'edit') openAffilieSheet(affilie);
            if (action === 'pdf') printAffiliePdf(affilie);
            if (action === 'delete') {
                if (confirm(`Supprimer l’affilié ${affilie.nom_complet || affilie.id} ?`)) {
                    saveAffilies(items.filter((item) => item.id !== id));
                    renderAffilies();
                    if (affilieViewCurrentId === id) closeAffilieView();
                }
            }
        });

        affilieFicheForm?.addEventListener('submit', (event) => {
            event.preventDefault();
            if (!affilieFicheForm.checkValidity()) {
                affilieFicheForm.reportValidity();
                return;
            }

            const id = document.getElementById('affilie-fiche-id').value || `AFF-${Date.now()}`;
            const payload = {
                id,
                date: document.getElementById('affilie-fiche-date').value,
                nom_complet: document.getElementById('affilie-fiche-nom').value.trim(),
                titre: document.getElementById('affilie-fiche-titre').value.trim(),
                contact: document.getElementById('affilie-fiche-contact').value.trim(),
                ville: document.getElementById('affilie-fiche-ville').value.trim(),
                banque: document.getElementById('affilie-fiche-banque').value.trim(),
                rib: document.getElementById('affilie-fiche-rib').value.trim(),
                type_paiement: document.getElementById('affilie-fiche-paiement').value,
                statue: document.getElementById('affilie-fiche-statue').value,
                login: document.getElementById('affilie-fiche-login').value.trim(),
                password: document.getElementById('affilie-fiche-password').value.trim(),
            };

            const items = loadAffilies();
            const index = items.findIndex((item) => item.id === id);
            if (index >= 0) {
                items[index] = { ...items[index], ...payload };
            } else {
                items.unshift(payload);
            }
            saveAffilies(items);
            renderAffilies();
            closeAffilieSheet();
        });

        window.addEventListener('storage', (event) => {
            if (event.key === AFFILIATION_REQ_KEY || event.key === AFFILIES_KEY) {
                if (document.getElementById('admin-view-fiche-affilie')?.classList.contains('is-active')) {
                    renderAffilies();
                }
            }
        });

        window.addEventListener('mouchap:affilies-updated', () => {
            if (document.getElementById('admin-view-fiche-affilie')?.classList.contains('is-active')) {
                renderAffilies();
            }
        });

        /* ——— Fiche Fournisseur ——— */
        const FOURNISSEURS_KEY = 'mouchap_fournisseurs';
        const fournisseursTbody = document.getElementById('fournisseurs-tbody');
        const fournisseurSheet = document.getElementById('fournisseur-sheet');
        const fournisseurForm = document.getElementById('fournisseur-form');
        const fournisseurViewSheet = document.getElementById('fournisseur-view-sheet');
        const fournisseurViewBody = document.getElementById('fournisseur-view-body');
        let fournisseurViewCurrentUid = null;

        const loadFournisseurs = () => {
            try {
                const parsed = JSON.parse(localStorage.getItem(FOURNISSEURS_KEY) || '[]');
                return Array.isArray(parsed) ? parsed : [];
            } catch {
                return [];
            }
        };

        const saveFournisseurs = (items) => {
            localStorage.setItem(FOURNISSEURS_KEY, JSON.stringify(items));
        };

        const nextFournisseurId = () => {
            const year = 2026;
            let maxSeq = 0;
            loadFournisseurs().forEach((item) => {
                const match = String(item?.id || '').match(/^FRN-(\d{4})\/(\d+)$/);
                if (match && Number(match[1]) === year) {
                    maxSeq = Math.max(maxSeq, Number(match[2]));
                }
            });
            return `FRN-${year}/${String(maxSeq + 1).padStart(5, '0')}`;
        };

        const renderFournisseurs = () => {
            if (!fournisseursTbody) return;
            const items = loadFournisseurs();

            if (!items.length) {
                fournisseursTbody.innerHTML = `<tr><td colspan="9" class="admin-table__empty">Aucun fournisseur. Cliquez sur Ajouter.</td></tr>`;
                return;
            }

            fournisseursTbody.innerHTML = items
                .map(
                    (item) => `<tr data-uid="${escapeHtml(item.uid)}">
                        <td>${escapeHtml(formatAffDate(item.date))}</td>
                        <td>${escapeHtml(item.id)}</td>
                        <td>${escapeHtml(item.nom)}</td>
                        <td>${escapeHtml(item.ville)}</td>
                        <td>${escapeHtml(item.contact)}</td>
                        <td>${escapeHtml(item.type_regl)}</td>
                        <td>${escapeHtml(item.banque)}</td>
                        <td>${escapeHtml(item.ice)}</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action-btn" data-fournisseur-action="view" title="Voir" aria-label="Voir">${affActionIcons.view}</button>
                                <button type="button" class="admin-action-btn" data-fournisseur-action="edit" title="Modifier" aria-label="Modifier">${affActionIcons.edit}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--danger" data-fournisseur-action="delete" title="Supprimer" aria-label="Supprimer">${affActionIcons.del}</button>
                            </div>
                        </td>
                    </tr>`
                )
                .join('');
        };

        const buildFournisseurViewHtml = (item) => `
            <dl class="affilie-view__grid">
                <div class="affilie-view__item"><dt>Date</dt><dd>${escapeHtml(formatAffDate(item.date))}</dd></div>
                <div class="affilie-view__item"><dt>ID</dt><dd>${escapeHtml(item.id || '—')}</dd></div>
                <div class="affilie-view__item affilie-view__item--full"><dt>Nom Fournisseur</dt><dd>${escapeHtml(item.nom || '—')}</dd></div>
                <div class="affilie-view__item"><dt>Ville</dt><dd>${escapeHtml(item.ville || '—')}</dd></div>
                <div class="affilie-view__item"><dt>Contact</dt><dd>${escapeHtml(item.contact || '—')}</dd></div>
                <div class="affilie-view__item"><dt>Type Régl</dt><dd>${escapeHtml(item.type_regl || '—')}</dd></div>
                <div class="affilie-view__item"><dt>Banque</dt><dd>${escapeHtml(item.banque || '—')}</dd></div>
                <div class="affilie-view__item affilie-view__item--full"><dt>ICE</dt><dd>${escapeHtml(item.ice || '—')}</dd></div>
            </dl>
        `;

        const openFournisseurView = (item) => {
            if (!fournisseurViewSheet || !fournisseurViewBody || !item) return;
            fournisseurViewCurrentUid = item.uid;
            document.getElementById('fournisseur-view-title').textContent = item.nom || 'Fiche fournisseur';
            fournisseurViewBody.innerHTML = buildFournisseurViewHtml(item);
            fournisseurViewSheet.hidden = false;
            fournisseurViewSheet.setAttribute('aria-hidden', 'false');
            document.body.classList.add('product-sheet-open');
        };

        const closeFournisseurView = () => {
            if (!fournisseurViewSheet) return;
            fournisseurViewSheet.hidden = true;
            fournisseurViewSheet.setAttribute('aria-hidden', 'true');
            if (fournisseurSheet?.hidden !== false) {
                document.body.classList.remove('product-sheet-open');
            }
            fournisseurViewCurrentUid = null;
        };

        const openFournisseurSheet = (item = null) => {
            if (!fournisseurSheet || !fournisseurForm) return;
            closeFournisseurView();
            fournisseurForm.reset();
            document.getElementById('fournisseur-sheet-title').textContent = item
                ? 'Modifier le fournisseur'
                : 'Nouveau fournisseur';
            document.getElementById('fournisseur-uid').value = item?.uid || '';
            document.getElementById('fournisseur-date').value = toDateInput(item?.date);
            document.getElementById('fournisseur-id').value = item?.id || nextFournisseurId();
            document.getElementById('fournisseur-nom').value = item?.nom || '';
            document.getElementById('fournisseur-ville').value = item?.ville || '';
            document.getElementById('fournisseur-contact').value = item?.contact || '';
            document.getElementById('fournisseur-type-regl').value = item?.type_regl || 'Vir';
            document.getElementById('fournisseur-banque').value = item?.banque || '';
            document.getElementById('fournisseur-ice').value = item?.ice || '';

            const readOnly = false;
            fournisseurForm.querySelectorAll('input, select').forEach((field) => {
                if (field.id === 'fournisseur-id' || field.type === 'hidden') return;
                field.disabled = readOnly;
            });
            document.getElementById('fournisseur-save-btn').hidden = false;

            fournisseurSheet.hidden = false;
            fournisseurSheet.setAttribute('aria-hidden', 'false');
            document.body.classList.add('product-sheet-open');
            document.getElementById('fournisseur-nom').focus({ preventScroll: true });
        };

        const closeFournisseurSheet = () => {
            if (!fournisseurSheet) return;
            fournisseurSheet.hidden = true;
            fournisseurSheet.setAttribute('aria-hidden', 'true');
            if (fournisseurViewSheet?.hidden !== false) {
                document.body.classList.remove('product-sheet-open');
            }
            fournisseurForm?.reset();
        };

        document.getElementById('fournisseur-add-btn')?.addEventListener('click', () => openFournisseurSheet());
        document.querySelectorAll('[data-fournisseur-sheet-close]').forEach((el) => {
            el.addEventListener('click', closeFournisseurSheet);
        });
        document.querySelectorAll('[data-fournisseur-view-close]').forEach((el) => {
            el.addEventListener('click', closeFournisseurView);
        });
        document.getElementById('fournisseur-view-edit')?.addEventListener('click', () => {
            const item = loadFournisseurs().find((f) => f.uid === fournisseurViewCurrentUid);
            if (item) openFournisseurSheet(item);
        });

        fournisseursTbody?.addEventListener('click', (event) => {
            const btn = event.target.closest('[data-fournisseur-action]');
            if (!btn) return;
            const uid = btn.closest('tr')?.dataset.uid;
            const items = loadFournisseurs();
            const item = items.find((f) => f.uid === uid);
            if (!item) return;

            const action = btn.getAttribute('data-fournisseur-action');
            if (action === 'view') openFournisseurView(item);
            if (action === 'edit') openFournisseurSheet(item);
            if (action === 'delete') {
                if (confirm(`Supprimer le fournisseur ${item.nom || item.id} ?`)) {
                    saveFournisseurs(items.filter((f) => f.uid !== uid));
                    renderFournisseurs();
                    if (fournisseurViewCurrentUid === uid) closeFournisseurView();
                }
            }
        });

        fournisseurForm?.addEventListener('submit', (event) => {
            event.preventDefault();
            if (!fournisseurForm.checkValidity()) {
                fournisseurForm.reportValidity();
                return;
            }

            const uid = document.getElementById('fournisseur-uid').value || `frn-${Date.now()}`;
            const payload = {
                uid,
                date: document.getElementById('fournisseur-date').value,
                id: document.getElementById('fournisseur-id').value.trim(),
                nom: document.getElementById('fournisseur-nom').value.trim(),
                ville: document.getElementById('fournisseur-ville').value.trim(),
                contact: document.getElementById('fournisseur-contact').value.trim(),
                type_regl: document.getElementById('fournisseur-type-regl').value,
                banque: document.getElementById('fournisseur-banque').value.trim(),
                ice: document.getElementById('fournisseur-ice').value.trim(),
            };

            const items = loadFournisseurs();
            const index = items.findIndex((f) => f.uid === uid);
            if (index >= 0) {
                items[index] = { ...items[index], ...payload };
            } else {
                items.unshift(payload);
            }
            saveFournisseurs(items);
            renderFournisseurs();
            closeFournisseurSheet();
        });

        if (window.location.hash === '#fiche-produit') {
            showAdminView('fiche-produit');
            document.querySelector('[data-admin-view="fiche-produit"]')?.classList.add('is-active');
        } else if (window.location.hash === '#fiche-affilie') {
            showAdminView('fiche-affilie');
            document.querySelector('[data-admin-view="fiche-affilie"]')?.classList.add('is-active');
        } else if (window.location.hash === '#fiche-fournisseur') {
            showAdminView('fiche-fournisseur');
            document.querySelector('[data-admin-view="fiche-fournisseur"]')?.classList.add('is-active');
        }
    </script>
</body>
</html>
