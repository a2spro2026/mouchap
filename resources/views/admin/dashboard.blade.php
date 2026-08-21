<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <a href="#mouvement-stock" class="admin-sublink" data-admin-view="mouvement-stock">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4 4 4M17 8v12m0 0 4-4m-4 4-4-4"/></svg></span>
                            <span>Mouvement Stock</span>
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

                {{-- Commandes (commandes affiliés) --}}
                <div class="admin-menu">
                    <button type="button" class="admin-side-link admin-menu__toggle" data-menu-toggle aria-expanded="false">
                        <span class="admin-side-link__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path stroke-linecap="round" d="M9 12h6M9 16h4"/></svg>
                        </span>
                        <span class="admin-side-link__label">Commandes</span>
                        <span class="admin-menu__chevron" aria-hidden="true"></span>
                    </button>
                    <div class="admin-submenu">
                        <a href="#admin-bon-commande" class="admin-sublink" data-admin-view="admin-bon-commande">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path stroke-linecap="round" d="M14 2v6h6M9 13h6M9 17h4"/></svg></span>
                            <span>Bon de Commande</span>
                        </a>
                        <a href="#admin-balance-commande" class="admin-sublink" data-admin-view="admin-balance-commande">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M7 14l4-4 3 3 5-6"/></svg></span>
                            <span>Balance</span>
                        </a>
                        <a href="#admin-paiement-commande" class="admin-sublink" data-admin-view="admin-paiement-commande">
                            <span class="admin-sublink__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="2"/><path stroke-linecap="round" d="M2 10h20"/><circle cx="16" cy="15" r="1.4"/></svg></span>
                            <span>Paiement</span>
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
                        <a href="#utilisateur" class="admin-sublink" data-admin-view="utilisateur">
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

            <button type="button" class="admin-sidebar__back" id="admin-logout">Déconnexion</button>
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
                        <span class="admin-topbar__avatar" aria-hidden="true">H</span>
                        <div class="admin-topbar__user-info">
                            <p class="admin-topbar__user-name">Hamza</p>
                            <p class="admin-topbar__user-role">
                                <span class="admin-topbar__status" aria-hidden="true"></span>
                                Administrateur
                            </p>
                        </div>
                    </div>
                </div>
            </header>

            {{-- KPI cards verrouillées (ne défilent pas) --}}
            <section class="admin-kpi" id="admin-kpi" aria-label="Indicateurs clés">
                <article class="kpi-card kpi-card--affiliates" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Nombre Affiliés</p>
                    <p class="kpi-card__value" id="kpi-affilies">0</p>
                    <p class="kpi-card__meta">Réseau actif</p>
                </article>

                <article class="kpi-card kpi-card--sales" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Total Ventes</p>
                    <p class="kpi-card__value" id="kpi-ventes">0</p>
                    <p class="kpi-card__meta">Commandes validées</p>
                </article>

                <article class="kpi-card kpi-card--charges" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Total Charges</p>
                    <p class="kpi-card__value" id="kpi-charges">0</p>
                    <p class="kpi-card__meta">DH ce mois</p>
                </article>

                <article class="kpi-card kpi-card--city" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Ville Active</p>
                    <p class="kpi-card__value" id="kpi-ville">—</p>
                    <p class="kpi-card__meta">Top performance</p>
                </article>

                <article class="kpi-card kpi-card--revenue" aria-disabled="true">
                    <div class="kpi-card__glow" aria-hidden="true"></div>
                    <p class="kpi-card__label">Total Revenue Affiliés</p>
                    <p class="kpi-card__value" id="kpi-revenue">0 DH</p>
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

            {{-- Admin Bon de Commande (commandes affiliés) --}}
            <section class="admin-view" id="admin-view-admin-bon-commande" data-view="admin-bon-commande" hidden aria-label="Bon de Commande">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Commandes</p>
                            <h2 class="admin-panel__title">Bon de Commande</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--ghost" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>
                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--admin-bn">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>N° Bn</th>
                                        <th>Affilié</th>
                                        <th>Réf</th>
                                        <th>Désignation</th>
                                        <th>Catégorie</th>
                                        <th>Famille</th>
                                        <th>Size</th>
                                        <th>Qte</th>
                                        <th>Prix/U</th>
                                        <th>Sous-Total</th>
                                        <th>Statue</th>
                                    </tr>
                                </thead>
                                <tbody id="admin-bn-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Admin Balance Commande --}}
            <section class="admin-view" id="admin-view-admin-balance-commande" data-view="admin-balance-commande" hidden aria-label="Balance Commande">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Commandes</p>
                            <h2 class="admin-panel__title">Balance</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="admin-bal-print">Imprimer</button>
                            <button type="button" class="admin-btn admin-btn--ghost" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>
                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--admin-bal" id="admin-bal-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>N° Bn</th>
                                        <th>Affilié</th>
                                        <th>Nom Client</th>
                                        <th>Montant</th>
                                        <th>Marge</th>
                                        <th>Statue</th>
                                    </tr>
                                </thead>
                                <tbody id="admin-bal-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Admin Paiement Commande --}}
            <section class="admin-view" id="admin-view-admin-paiement-commande" data-view="admin-paiement-commande" hidden aria-label="Paiement Commande">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Commandes</p>
                            <h2 class="admin-panel__title">Paiement</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--ghost" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>
                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--admin-paie">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>N° Bn</th>
                                        <th>Affilié</th>
                                        <th>Nom Client</th>
                                        <th>Date Paie</th>
                                        <th>Reçu</th>
                                    </tr>
                                </thead>
                                <tbody id="admin-paie-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Vue Fiche Produit --}}
            <section class="admin-view" id="admin-view-fiche-produit" data-view="fiche-produit" hidden aria-label="Fiche Produit">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar admin-panel__toolbar--actions-only">
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="product-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost" id="product-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="product-filters" id="product-filters" aria-label="Filtres produits">
                        <div class="product-filters__rail">
                            <div class="product-filters__brand">
                                <span class="product-filters__eyebrow">Recherche</span>
                                <strong class="product-filters__title">Filtres produit</strong>
                            </div>

                            <label class="product-filter">
                                <span class="product-filter__label">Réf</span>
                                <input type="search" class="product-filter__input" id="product-filter-ref" data-product-filter="ref" placeholder="Réf…" autocomplete="off">
                            </label>
                            <label class="product-filter product-filter--wide">
                                <span class="product-filter__label">Désignation</span>
                                <input type="search" class="product-filter__input" id="product-filter-designation" data-product-filter="designation" placeholder="Désignation…" autocomplete="off">
                            </label>
                            <label class="product-filter">
                                <span class="product-filter__label">Catégorie</span>
                                <input type="search" class="product-filter__input" id="product-filter-categorie" data-product-filter="categorie" placeholder="Catégorie…" autocomplete="off">
                            </label>
                            <label class="product-filter">
                                <span class="product-filter__label">Famille</span>
                                <input type="search" class="product-filter__input" id="product-filter-famille" data-product-filter="famille" placeholder="Famille…" autocomplete="off">
                            </label>
                            <label class="product-filter">
                                <span class="product-filter__label">Saison</span>
                                <select class="product-filter__input" id="product-filter-saison" data-product-filter="saison">
                                    <option value="">Toutes</option>
                                    <option value="ete">Été</option>
                                    <option value="printemps">Printemps</option>
                                    <option value="automne">Automne</option>
                                    <option value="hiver">Hiver</option>
                                </select>
                            </label>
                            <label class="product-filter">
                                <span class="product-filter__label">Statue</span>
                                <select class="product-filter__input" id="product-filter-statue" data-product-filter="statue">
                                    <option value="">Toutes</option>
                                    <option value="dispo">Dispo</option>
                                    <option value="faible">Faible</option>
                                    <option value="rupture">Rupture</option>
                                </select>
                            </label>
                            <label class="product-filter">
                                <span class="product-filter__label">État</span>
                                <select class="product-filter__input" id="product-filter-etat" data-product-filter="etat">
                                    <option value="">Tous</option>
                                    <option value="actif">Actif</option>
                                    <option value="inactif">Inactif</option>
                                </select>
                            </label>

                            <button type="button" class="product-filters__reset" id="product-filters-reset" title="Réinitialiser les filtres">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/>
                                </svg>
                                Reset
                            </button>
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
                                        <th>Saison</th>
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

            {{-- Vue Mouvement Stock --}}
            <section class="admin-view" id="admin-view-mouvement-stock" data-view="mouvement-stock" hidden aria-label="Mouvement Stock">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Stock</p>
                            <h2 class="admin-panel__title">Mouvement Stock</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="stock-print-btn">Imprimer</button>
                            <button type="button" class="admin-btn admin-btn--ghost" id="stock-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--stock-move" id="stock-move-table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Réf</th>
                                        <th rowspan="2">Désignation</th>
                                        <th rowspan="2">Stock Initial</th>
                                        <th colspan="13" class="stock-move__sales-head">Ventes / mois / année <span id="stock-move-year"></span></th>
                                        <th rowspan="2">Stock Actuel</th>
                                    </tr>
                                    <tr class="stock-move__months">
                                        <th>Jan</th>
                                        <th>Fév</th>
                                        <th>Mar</th>
                                        <th>Avr</th>
                                        <th>Mai</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Aoû</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Déc</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="stock-move-tbody">
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
                    <div class="affilies-hero">
                        <img
                            src="{{ asset('images/mouchap-affilies-banner.jpg') }}?v={{ @filemtime(public_path('images/mouchap-affilies-banner.jpg')) ?: time() }}"
                            alt=""
                            class="affilies-hero__media"
                        >
                        <div class="affilies-hero__veil" aria-hidden="true"></div>
                        <div class="affilies-hero__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="affilie-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost admin-btn--on-dark" id="affilie-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="affilies-summary" id="affilies-summary" aria-live="polite">
                        <div class="affilies-summary__main">
                            <span class="affilies-summary__icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </span>
                            <div>
                                <p class="affilies-summary__eyebrow">Réseau MOUCHAP</p>
                                <p class="affilies-summary__label">
                                    <span class="affilies-summary__count" id="affilies-count-total">0</span>
                                    affiliés
                                </p>
                            </div>
                        </div>
                        <div class="affilies-summary__stats">
                            <div class="affilies-summary__stat affilies-summary__stat--actif">
                                <span class="affilies-summary__stat-value" id="affilies-count-actif">0</span>
                                <span class="affilies-summary__stat-label">Actifs</span>
                            </div>
                            <div class="affilies-summary__stat affilies-summary__stat--susp">
                                <span class="affilies-summary__stat-value" id="affilies-count-susp">0</span>
                                <span class="affilies-summary__stat-label">Suspendus</span>
                            </div>
                            <div class="affilies-summary__stat affilies-summary__stat--villes">
                                <span class="affilies-summary__stat-value" id="affilies-count-villes">0</span>
                                <span class="affilies-summary__stat-label">Villes</span>
                            </div>
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

            {{-- Vue Utilisateur --}}
            <section class="admin-view" id="admin-view-utilisateur" data-view="utilisateur" hidden aria-label="Utilisateur">
                <div class="admin-panel">
                    <div class="admin-panel__toolbar">
                        <div>
                            <p class="admin-panel__eyebrow">Configurations</p>
                            <h2 class="admin-panel__title">Utilisateur</h2>
                        </div>
                        <div class="admin-panel__actions">
                            <button type="button" class="admin-btn admin-btn--primary" id="user-add-btn">Ajouter</button>
                            <button type="button" class="admin-btn admin-btn--ghost" id="user-close-btn" data-admin-view="commandes">Fermer</button>
                        </div>
                    </div>

                    <div class="admin-table-wrap admin-table-wrap--panel">
                        <div class="admin-table-scroll">
                            <table class="admin-table admin-table--users">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom Complet</th>
                                        <th>Contact</th>
                                        <th>Statue</th>
                                        <th>Login</th>
                                        <th>Mot de Passe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-tbody">
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
                    <h3 class="product-sheet__title" id="product-sheet-title">Nouveau produit</h3>
                </div>
                <button type="button" class="product-sheet__x" data-product-sheet-close aria-label="Fermer">×</button>
            </div>

            <form class="product-sheet__form" id="product-form" novalidate>
                @csrf
                <input type="hidden" name="id" id="product-id">

                <label class="admin-field">
                    <span class="admin-field__label">Réf</span>
                    <input type="text" name="ref" id="product-ref" class="admin-field__input" required readonly>
                    <span class="admin-field__hint">Référence attribuée automatiquement.</span>
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

                <label class="admin-field">
                    <span class="admin-field__label">Saison</span>
                    <select name="saison" id="product-saison" class="admin-field__input" required>
                        <option value="">Choisir une saison</option>
                        <option value="ete">Été</option>
                        <option value="printemps">Printemps</option>
                        <option value="automne">Automne</option>
                        <option value="hiver">Hiver</option>
                    </select>
                </label>

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
                    <span class="admin-field__label">Photo ou vidéo</span>
                    <input
                        type="file"
                        name="media"
                        id="product-photo"
                        class="admin-field__input admin-field__input--file"
                        accept=".jpg,.jpeg,.png,.webp,.gif,.mp4,.webm,.ogg"
                    >
                    <span class="admin-field__hint">JPG, PNG, WebP, GIF, MP4, WebM ou OGG — 10 Mo maximum</span>
                    <span class="admin-field__error" id="product-media-error" hidden></span>
                    <div class="product-sheet__preview" id="product-photo-preview" hidden>
                        <img src="" alt="Aperçu du produit" id="product-photo-img" hidden>
                        <video id="product-photo-video" controls muted playsinline preload="metadata" hidden></video>
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
                    <div class="login-suffix login-suffix--compact">
                        <input
                            type="text"
                            name="login_user"
                            id="affilie-fiche-login"
                            class="admin-field__input login-suffix__input"
                            required
                            placeholder="ex. fadma.amjoud"
                            pattern="[a-zA-Z0-9._-]{2,40}"
                            title="Identifiant sans @mouchap.com"
                            autocomplete="off"
                            autocapitalize="off"
                            spellcheck="false"
                        >
                        <span class="login-suffix__domain" aria-hidden="true">@mouchap.com</span>
                    </div>
                    <span class="admin-field__hint">Sans le suffixe — il est ajouté automatiquement</span>
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

    {{-- Feuille de saisie utilisateur --}}
    <div class="product-sheet" id="user-sheet" hidden aria-hidden="true">
        <div class="product-sheet__backdrop" data-user-sheet-close></div>
        <div class="product-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="user-sheet-title">
            <div class="product-sheet__header">
                <div>
                    <p class="product-sheet__eyebrow">Configurations · Utilisateur</p>
                    <h3 class="product-sheet__title" id="user-sheet-title">Nouvel utilisateur</h3>
                </div>
                <button type="button" class="product-sheet__x" data-user-sheet-close aria-label="Fermer">×</button>
            </div>

            <form class="product-sheet__form" id="user-form" novalidate>
                <input type="hidden" name="uid" id="user-uid">

                <label class="admin-field">
                    <span class="admin-field__label">ID</span>
                    <input type="text" name="id" id="user-id" class="admin-field__input" readonly>
                    <span class="admin-field__hint">Identifiant attribué automatiquement.</span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Nom Complet</span>
                    <input type="text" name="nom_complet" id="user-nom" class="admin-field__input" required>
                </label>

                <div class="product-sheet__row">
                    <label class="admin-field">
                        <span class="admin-field__label">Contact</span>
                        <input type="tel" name="contact" id="user-contact" class="admin-field__input" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" required>
                    </label>
                    <label class="admin-field">
                        <span class="admin-field__label">Statue</span>
                        <select name="statue" id="user-statue" class="admin-field__input" required>
                            <option value="gerant">Gérant</option>
                            <option value="commercial">Commercial</option>
                            <option value="caisse">Caisse</option>
                            <option value="depot">Depot</option>
                        </select>
                    </label>
                </div>

                <label class="admin-field">
                    <span class="admin-field__label">Login</span>
                    <input
                        type="email"
                        name="login"
                        id="user-login"
                        class="admin-field__input"
                        required
                        placeholder="ex. nom@mouchap.com"
                        pattern=".+@mouchap\.com$"
                        title="Le login doit se terminer par @mouchap.com"
                    >
                    <span class="admin-field__hint">Doit se terminer par <strong>@mouchap.com</strong></span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Mot de Passe</span>
                    <input type="text" name="password" id="user-password" class="admin-field__input" required>
                </label>

                <div class="product-sheet__footer">
                    <button type="button" class="admin-btn admin-btn--ghost" data-user-sheet-close>Fermer</button>
                    <button type="submit" class="admin-btn admin-btn--primary" id="user-save-btn">Valider</button>
                </div>
            </form>
        </div>
    </div>

    <script>
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
        let ordersCache = [];
        let affiliesCache = [];
        let fournisseursCache = [];
        let usersCache = [];
        document.getElementById('admin-logout')?.addEventListener('click', async () => {
            try { await api('/api/auth/admin/logout', { method: 'POST' }); } catch {}
            window.location.href = '/';
        });
        api('/api/auth/admin/me').then((user) => {
            const name = user.nom_complet || 'Admin';
            const nameEl = document.querySelector('.admin-topbar__user-name');
            const avatarEl = document.querySelector('.admin-topbar__avatar');
            if (nameEl) nameEl.textContent = name;
            if (avatarEl) avatarEl.textContent = (name.trim()[0] || 'A').toUpperCase();
        }).catch(() => { window.location.href = '/'; });

        /* ——— Notifications demandes d'affiliation (API) ——— */
        const notifBtn = document.getElementById('admin-notif-btn');
        const notifPanel = document.getElementById('admin-notif-panel');
        const notifBadge = document.getElementById('admin-notif-badge');
        const notifCount = document.getElementById('admin-notif-count');
        const notifList = document.getElementById('admin-notif-list');
        const affiliationStatusLabel = {
            pending: 'En attente',
            validated: 'Validée',
            cancelled: 'Annulée',
            suspended: 'Suspendue',
        };

        const showAdminToast = (message) => {
            let toast = document.getElementById('mouchap-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'mouchap-toast';
                toast.className = 'mouchap-toast';
                document.body.appendChild(toast);
            }
            toast.textContent = message;
            toast.classList.add('is-visible');
            window.clearTimeout(toast._timer);
            toast._timer = window.setTimeout(() => toast.classList.remove('is-visible'), 4200);
        };

        const updateNotifBadge = (pendingCount) => {
            if (notifBadge) {
                if (pendingCount > 0) {
                    notifBadge.hidden = false;
                    notifBadge.textContent = String(pendingCount);
                } else {
                    notifBadge.hidden = true;
                    notifBadge.textContent = '0';
                }
            }
            if (notifCount) {
                notifCount.textContent = `${pendingCount} en attente`;
            }
        };

        const removeNotifItem = (uid) => {
            const row = notifList?.querySelector(`.admin-notif__item[data-id="${uid}"]`);
            row?.remove();
            const remaining = notifList?.querySelectorAll('.admin-notif__item').length || 0;
            updateNotifBadge(remaining);
            if (!remaining && notifList) {
                notifList.innerHTML = '<p class="admin-notif__empty">Aucune nouvelle demande.</p>';
            }
        };

        const renderAffiliationNotifications = async () => {
            if (!notifList) return;
            let items = [];
            try {
                const data = await api('/api/admin/affiliation-requests');
                items = Array.isArray(data) ? data : [];
            } catch (error) {
                notifList.innerHTML = `<p class="admin-notif__empty">${error.message || 'Impossible de charger les demandes.'}</p>`;
                return;
            }

            // L’icône ne garde que les demandes en attente
            const pending = items.filter((item) => item.status === 'pending');
            updateNotifBadge(pending.length);

            if (!pending.length) {
                notifList.innerHTML = '<p class="admin-notif__empty">Aucune nouvelle demande.</p>';
                return;
            }

            notifList.innerHTML = pending
                .map((item) => {
                    const date = item.created_at
                        ? new Date(item.created_at).toLocaleString('fr-FR')
                        : '';

                    return `<article class="admin-notif__item" data-id="${item.uid}">
                        <div class="admin-notif__item-top">
                            <strong>${item.nom_complet || 'Sans nom'}</strong>
                            <span>${item.id || ''}</span>
                        </div>
                        <p class="admin-notif__meta">${item.titre || '—'} · ${item.ville || '—'} · ${item.contact || '—'} · ${item.cin || '—'}</p>
                        <p class="admin-notif__meta">${item.banque || '—'} · RIB ${item.rib || '—'}</p>
                        <p class="admin-notif__date">${date}</p>
                        <div class="admin-notif__actions">
                            <button type="button" class="notif-action notif-action--ok" data-req-uid="${item.uid}" data-req-action="validated">Valider</button>
                            <button type="button" class="notif-action notif-action--ko" data-req-uid="${item.uid}" data-req-action="cancelled">Annuler</button>
                            <button type="button" class="notif-action notif-action--warn" data-req-uid="${item.uid}" data-req-action="suspended">Suspendre</button>
                        </div>
                    </article>`;
                })
                .join('');
        };

        if (notifBtn && notifPanel) {
            notifBtn.addEventListener('click', (event) => {
                event.stopPropagation();
                const open = notifPanel.hidden;
                notifPanel.hidden = !open;
                notifBtn.setAttribute('aria-expanded', String(open));
            });

            document.addEventListener('click', (event) => {
                const root = document.getElementById('admin-notif');
                if (!root || root.contains(event.target)) return;
                notifPanel.hidden = true;
                notifBtn.setAttribute('aria-expanded', 'false');
            });

            notifList?.addEventListener('click', async (event) => {
                const btn = event.target.closest('[data-req-action]');
                if (!btn || btn.disabled) return;
                const uid = btn.getAttribute('data-req-uid');
                const action = btn.getAttribute('data-req-action');
                const row = btn.closest('.admin-notif__item');
                row?.querySelectorAll('[data-req-action]').forEach((el) => {
                    el.disabled = true;
                });
                // Retrait immédiat de l’icône / liste
                removeNotifItem(uid);
                try {
                    const result = await api(`/api/admin/affiliation-requests/${uid}/status`, {
                        method: 'PATCH',
                        body: { status: action },
                    });
                    if (result.message) showAdminToast(result.message);
                    window.dispatchEvent(new CustomEvent('mouchap:affilies-updated'));
                    await renderAffiliationNotifications();
                } catch (error) {
                    alert(error.message || 'Action impossible.');
                    await renderAffiliationNotifications();
                }
            });

            renderAffiliationNotifications();
            window.addEventListener('mouchap:affilies-updated', () => {
                renderAffiliationNotifications();
            });
            window.setInterval(renderAffiliationNotifications, 15000);
        }

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
            livree: 'status-select--confirme',
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
        const ordersTbody = document.getElementById('orders-tbody');

        const loadOrders = () => ordersCache;
        const saveOrders = (items) => { ordersCache = items; };
        const refreshOrdersFromServer = async () => {
            ordersCache = await api('/api/admin/orders');
            return ordersCache;
        };

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

        const escapeHtml = (value) =>
            String(value ?? '')
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;');

        const readStoredList = (key) => {
            try {
                const parsed = JSON.parse(localStorage.getItem(key) || '[]');
                return Array.isArray(parsed) ? parsed : [];
            } catch {
                return [];
            }
        };

        const renderKpis = async () => {
            try {
                const stats = await api('/api/admin/stats');
                const setKpi = (id, value) => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = value;
                };
                setKpi('kpi-affilies', Number(stats.affilies || 0).toLocaleString('fr-MA'));
                setKpi('kpi-ventes', Number(stats.ventes || 0).toLocaleString('fr-MA'));
                setKpi('kpi-charges', Number(stats.charges || 0).toLocaleString('fr-MA'));
                setKpi('kpi-ville', stats.top_ville || '—');
                setKpi('kpi-revenue', formatMoney(stats.revenue || 0));
            } catch {}
        };

        const renderOrders = async () => {
            await renderKpis();
            if (!ordersTbody) return;
            try { await refreshOrdersFromServer(); } catch { ordersCache = []; }
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
                            <select class="status-select status-select--${item.statue || 'reporte'}" data-status data-order-field="statue">
                                <option value="livree" ${item.statue === 'livree' || item.statue === 'confirme' ? 'selected' : ''}>Livrée</option>
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
                select.addEventListener('change', async () => {
                    syncSelectClass(select, statusClassMap);
                    const id = select.closest('tr')?.dataset.orderId;
                    try {
                        await api(`/api/admin/orders/${id}`, { method: 'PATCH', body: { statue: select.value } });
                        await renderKpis();
                    } catch (e) { alert(e.message || 'Erreur'); }
                });
            });

            ordersTbody.querySelectorAll('[data-stock]').forEach((select) => {
                syncSelectClass(select, stockClassMap);
                select.addEventListener('change', async () => {
                    syncSelectClass(select, stockClassMap);
                    const id = select.closest('tr')?.dataset.orderId;
                    try {
                        await api(`/api/admin/orders/${id}`, { method: 'PATCH', body: { stock: select.value } });
                    } catch (e) { alert(e.message || 'Erreur'); }
                });
            });
        };

        renderOrders();

        const normalizeOrderStatue = (value) => (value === 'confirme' ? 'livree' : (value || 'reporte'));
        const orderStatueLabel = {
            livree: 'Livrée',
            confirme: 'Livrée',
            annulee: 'Annulée',
            reporte: 'Reportée',
            retour: 'Retour',
        };

        const patchAdminOrder = async (id, body) => {
            const updated = await api(`/api/admin/orders/${id}`, { method: 'PATCH', body });
            ordersCache = ordersCache.map((o) => (String(o.id) === String(id) ? updated : o));
            return updated;
        };

        const renderAdminBonCommande = async () => {
            const tbody = document.getElementById('admin-bn-tbody');
            if (!tbody) return;
            try { await refreshOrdersFromServer(); } catch { ordersCache = []; }
            const items = loadOrders();
            if (!items.length) {
                tbody.innerHTML = `<tr><td colspan="12" class="admin-table__empty">Aucune commande affilié pour le moment.</td></tr>`;
                return;
            }
            tbody.innerHTML = items.map((item) => {
                const st = normalizeOrderStatue(item.statue);
                const size = item.size || (Array.isArray(item.sizes) && item.sizes[0]) || '—';
                return `<tr data-order-id="${escapeHtml(item.id)}">
                    <td>${escapeHtml(formatOrderDate(item.date))}</td>
                    <td>${escapeHtml(item.n_cmd || '—')}</td>
                    <td>${escapeHtml(item.affilie_nom || '—')}</td>
                    <td>${escapeHtml(item.ref_prod || '—')}</td>
                    <td>${escapeHtml(item.designation || '—')}</td>
                    <td>${escapeHtml(item.categorie || '—')}</td>
                    <td>${escapeHtml(item.famille || '—')}</td>
                    <td>${escapeHtml(size)}</td>
                    <td>${escapeHtml(item.qte ?? 0)}</td>
                    <td>${escapeHtml(formatMoney(item.prix_u))}</td>
                    <td>${escapeHtml(formatMoney(item.montant))}</td>
                    <td>
                        <select class="status-select ${statusClassMap[st] || ''}" data-admin-bn-statue>
                            <option value="livree" ${st === 'livree' ? 'selected' : ''}>Livrée</option>
                            <option value="annulee" ${st === 'annulee' ? 'selected' : ''}>Annulée</option>
                            <option value="reporte" ${st === 'reporte' ? 'selected' : ''}>Reportée</option>
                            <option value="retour" ${st === 'retour' ? 'selected' : ''}>Retour</option>
                        </select>
                    </td>
                </tr>`;
            }).join('');

            tbody.querySelectorAll('[data-admin-bn-statue]').forEach((select) => {
                syncSelectClass(select, statusClassMap);
                select.onchange = async () => {
                    syncSelectClass(select, statusClassMap);
                    const id = select.closest('tr')?.dataset.orderId;
                    try {
                        await patchAdminOrder(id, { statue: select.value });
                        renderOrders();
                    } catch (e) { alert(e.message || 'Erreur'); }
                };
            });
        };

        const renderAdminBalanceCommande = async () => {
            const tbody = document.getElementById('admin-bal-tbody');
            if (!tbody) return;
            try { await refreshOrdersFromServer(); } catch { ordersCache = []; }
            const items = loadOrders();
            if (!items.length) {
                tbody.innerHTML = `<tr><td colspan="7" class="admin-table__empty">Aucune commande.</td></tr>`;
                return;
            }
            tbody.innerHTML = items.map((item) => {
                const st = normalizeOrderStatue(item.statue);
                return `<tr data-order-id="${escapeHtml(item.id)}">
                    <td>${escapeHtml(formatOrderDate(item.date))}</td>
                    <td>${escapeHtml(item.n_cmd || '—')}</td>
                    <td>${escapeHtml(item.affilie_nom || '—')}</td>
                    <td>${escapeHtml(item.nom_client || '—')}</td>
                    <td>${escapeHtml(formatMoney(item.montant))}</td>
                    <td>${escapeHtml(formatMoney(item.marge))}</td>
                    <td>
                        <select class="status-select ${statusClassMap[st] || ''}" data-admin-bal-statue>
                            <option value="livree" ${st === 'livree' ? 'selected' : ''}>Livrée</option>
                            <option value="annulee" ${st === 'annulee' ? 'selected' : ''}>Annulée</option>
                            <option value="reporte" ${st === 'reporte' ? 'selected' : ''}>Reportée</option>
                        </select>
                    </td>
                </tr>`;
            }).join('');

            tbody.querySelectorAll('[data-admin-bal-statue]').forEach((select) => {
                syncSelectClass(select, statusClassMap);
                select.onchange = async () => {
                    syncSelectClass(select, statusClassMap);
                    const id = select.closest('tr')?.dataset.orderId;
                    try {
                        await patchAdminOrder(id, { statue: select.value });
                        renderOrders();
                    } catch (e) { alert(e.message || 'Erreur'); }
                };
            });
        };

        const renderAdminPaiementCommande = async () => {
            const tbody = document.getElementById('admin-paie-tbody');
            if (!tbody) return;
            try { await refreshOrdersFromServer(); } catch { ordersCache = []; }
            const items = loadOrders();
            if (!items.length) {
                tbody.innerHTML = `<tr><td colspan="6" class="admin-table__empty">Aucun paiement.</td></tr>`;
                return;
            }
            tbody.innerHTML = items.map((item) => `<tr data-order-id="${escapeHtml(item.id)}">
                <td>${escapeHtml(formatOrderDate(item.date))}</td>
                <td>${escapeHtml(item.n_cmd || '—')}</td>
                <td>${escapeHtml(item.affilie_nom || '—')}</td>
                <td>${escapeHtml(item.nom_client || '—')}</td>
                <td><input type="date" class="aff-inline-date" data-admin-date-paie value="${escapeHtml(item.date_paie || '')}"></td>
                <td>
                    <select class="aff-bal-recu" data-admin-recu>
                        <option value="oui" ${item.recu === 'oui' ? 'selected' : ''}>Oui</option>
                        <option value="non" ${item.recu !== 'oui' ? 'selected' : ''}>Non</option>
                    </select>
                </td>
            </tr>`).join('');

            tbody.querySelectorAll('[data-admin-date-paie]').forEach((input) => {
                input.onchange = async () => {
                    try {
                        await patchAdminOrder(input.closest('tr')?.dataset.orderId, {
                            date_paie: input.value || null,
                        });
                    } catch (e) { alert(e.message || 'Erreur'); }
                };
            });
            tbody.querySelectorAll('[data-admin-recu]').forEach((select) => {
                select.onchange = async () => {
                    try {
                        await patchAdminOrder(select.closest('tr')?.dataset.orderId, { recu: select.value });
                    } catch (e) { alert(e.message || 'Erreur'); }
                };
            });
        };

        document.getElementById('admin-bal-print')?.addEventListener('click', () => {
            const items = loadOrders();
            const win = window.open('', '_blank', 'noopener,noreferrer,width=980,height=720');
            if (!win) { alert('Autorisez les pop-ups.'); return; }
            const rows = items.map((item) => {
                const st = normalizeOrderStatue(item.statue);
                return `<tr>
                    <td>${escapeHtml(formatOrderDate(item.date))}</td>
                    <td>${escapeHtml(item.n_cmd || '')}</td>
                    <td>${escapeHtml(item.affilie_nom || '')}</td>
                    <td>${escapeHtml(item.nom_client || '')}</td>
                    <td>${escapeHtml(formatMoney(item.montant))}</td>
                    <td>${escapeHtml(formatMoney(item.marge))}</td>
                    <td>${escapeHtml(orderStatueLabel[st] || st)}</td>
                </tr>`;
            }).join('') || `<tr><td colspan="7">Aucune commande</td></tr>`;
            win.document.write(`<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8"><title>Balance Commandes</title>
                <style>body{font-family:Georgia,serif;padding:20px}table{width:100%;border-collapse:collapse;font-size:12px}th,td{border:1px solid #d7b7c0;padding:8px;text-align:center}th{background:#6b1e3a;color:#fff}</style></head>
                <body><h1>Balance Commandes</h1><p>MOUCHAP Admin</p>
                <table><thead><tr><th>Date</th><th>N° Bn</th><th>Affilié</th><th>Client</th><th>Montant</th><th>Marge</th><th>Statue</th></tr></thead>
                <tbody>${rows}</tbody></table>
                <script>window.onload=function(){window.print();}<\/script></body></html>`);
            win.document.close();
        });

        /* ——— Navigation vues ——— */
        const showAdminView = (viewId) => {
            document.querySelectorAll('.admin-view').forEach((view) => {
                const active = view.dataset.view === viewId;
                view.classList.toggle('is-active', active);
                view.hidden = !active;
            });
            const kpi = document.getElementById('admin-kpi');
            if (kpi) {
                kpi.hidden = viewId !== 'commandes';
            }

            if (viewId === 'fiche-produit') {
                document.querySelector('.admin-topbar__title').textContent = 'Fiche Produit';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Stock';
            } else if (viewId === 'mouvement-stock') {
                document.querySelector('.admin-topbar__title').textContent = 'Mouvement Stock';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Stock';
                renderStockMove();
            } else if (viewId === 'admin-bon-commande') {
                document.querySelector('.admin-topbar__title').textContent = 'Bon de Commande';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Commandes';
                renderAdminBonCommande();
            } else if (viewId === 'admin-balance-commande') {
                document.querySelector('.admin-topbar__title').textContent = 'Balance';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Commandes';
                renderAdminBalanceCommande();
            } else if (viewId === 'admin-paiement-commande') {
                document.querySelector('.admin-topbar__title').textContent = 'Paiement';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Commandes';
                renderAdminPaiementCommande();
            } else if (viewId === 'fiche-affilie') {
                document.querySelector('.admin-topbar__title').textContent = 'Fiche Affilié';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Affiliés';
                renderAffilies();
            } else if (viewId === 'fiche-fournisseur') {
                document.querySelector('.admin-topbar__title').textContent = 'Fiche Fournisseur';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Fournisseurs';
                renderFournisseurs();
            } else if (viewId === 'utilisateur') {
                document.querySelector('.admin-topbar__title').textContent = 'Utilisateur';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Configurations';
                renderUsers();
            } else {
                document.querySelector('.admin-topbar__title').textContent = 'Tableau de Bord';
                document.querySelector('.admin-topbar__eyebrow').textContent = 'Espace privé';
                if (viewId === 'commandes') {
                    renderOrders();
                }
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
        const productPhotoVideo = document.getElementById('product-photo-video');
        const productMediaError = document.getElementById('product-media-error');
        const productSaveButton = document.getElementById('product-save-btn');
        const MAX_PRODUCT_MEDIA_SIZE = 10 * 1024 * 1024;
        let productPhotoData = '';
        let productMediaType = 'image';
        let productIsSaving = false;
        let productPreviewUrl = '';

        const trackPreviewUrl = (url = '') => {
            if (productPreviewUrl) URL.revokeObjectURL(productPreviewUrl);
            productPreviewUrl = url;
            return url;
        };

        const setProductSaving = (saving, progress = null) => {
            productIsSaving = saving;
            if (!productSaveButton) return;
            productSaveButton.disabled = saving;
            productSaveButton.textContent = saving
                ? progress === null
                    ? 'Enregistrement…'
                    : `Envoi ${progress}%`
                : 'Enregistrer';
            productSaveButton.classList.toggle('is-loading', saving);
            productForm?.setAttribute('aria-busy', String(saving));
        };

        const detectProductMediaType = (data, explicitType = '') =>
            explicitType === 'video' || String(data || '').startsWith('data:video/')
                ? 'video'
                : 'image';

        const setProductMediaError = (message = '') => {
            if (!productMediaError) return;
            productMediaError.textContent = message;
            productMediaError.hidden = !message;
        };

        const renderProductPreview = (data, type = 'image') => {
            if (!productPhotoPreview || !productPhotoImg || !productPhotoVideo) return;

            productPhotoImg.hidden = true;
            productPhotoImg.src = '';
            productPhotoVideo.hidden = true;
            productPhotoVideo.pause();
            productPhotoVideo.removeAttribute('src');
            productPhotoVideo.load();

            if (!data) {
                productPhotoPreview.hidden = true;
                return;
            }

            if (type === 'video') {
                productPhotoVideo.src = data;
                productPhotoVideo.hidden = false;
            } else {
                productPhotoImg.src = data;
                productPhotoImg.hidden = false;
            }
            productPhotoPreview.hidden = false;
        };

        const renderProductMedia = (item) => {
            if (!item.photo) {
                return `<span class="product-thumb product-thumb--empty">—</span>`;
            }
            const src = escapeHtml(item.photo);
            const type = detectProductMediaType(item.photo, item.media_type);
            return type === 'video'
                ? `<video src="${src}" class="product-thumb" muted playsinline preload="metadata" aria-label="Vidéo produit"></video>`
                : `<img src="${src}" alt="" class="product-thumb">`;
        };

        const loadProducts = () => {
            try {
                const raw = localStorage.getItem(PRODUCTS_KEY);
                if (!raw) {
                    localStorage.setItem(PRODUCTS_KEY, JSON.stringify([]));
                    return [];
                }
                const parsed = JSON.parse(raw);
                return Array.isArray(parsed) ? parsed : [];
            } catch {
                return [];
            }
        };

        const saveProducts = (items) => {
            localStorage.setItem(PRODUCTS_KEY, JSON.stringify(items));
        };

        const nextProductReference = () => {
            const highestNumber = loadProducts().reduce((highest, product) => {
                const match = String(product.ref || '').match(/^PRD-?(\d+)$/i);
                return match ? Math.max(highest, Number(match[1])) : highest;
            }, 0);

            return `PRD${String(highestNumber + 1).padStart(4, '0')}`;
        };

        const productPayload = (product) => {
            const data = new FormData();
            data.append('_token', productForm.querySelector('input[name="_token"]')?.value || '');
            ['ref', 'designation', 'categorie', 'famille', 'saison', 'size', 'qte', 'prix', 'statue', 'etat']
                .forEach((key) => data.append(key, product[key] ?? ''));
            return data;
        };

        const MAX_IMAGE_EDGE = 1600;

        /* Les photos brutes (3-5 Mo) saturent le débit montant : on les réencode avant envoi. */
        const compressImage = async (file) => {
            if (!file.type.startsWith('image/') || file.type === 'image/gif') return file;

            try {
                const bitmap = await createImageBitmap(file);
                const scale = Math.min(1, MAX_IMAGE_EDGE / Math.max(bitmap.width, bitmap.height));
                const canvas = document.createElement('canvas');
                canvas.width = Math.round(bitmap.width * scale);
                canvas.height = Math.round(bitmap.height * scale);
                canvas.getContext('2d').drawImage(bitmap, 0, 0, canvas.width, canvas.height);
                bitmap.close();

                const blob = await new Promise((resolve) =>
                    canvas.toBlob(resolve, 'image/jpeg', 0.82)
                );
                if (!blob || blob.size >= file.size) return file;

                return new File([blob], file.name.replace(/\.\w+$/, '') + '.jpg', {
                    type: 'image/jpeg',
                });
            } catch {
                return file;
            }
        };

        const uploadProduct = (url, data) =>
            new Promise((resolve, reject) => {
                const request = new XMLHttpRequest();
                request.open('POST', url);
                request.setRequestHeader('Accept', 'application/json');

                request.upload.addEventListener('progress', (event) => {
                    if (!event.lengthComputable) return;
                    setProductSaving(true, Math.round((event.loaded / event.total) * 100));
                });

                request.addEventListener('load', () => {
                    let payload = {};
                    try {
                        payload = JSON.parse(request.responseText || '{}');
                    } catch {
                        payload = {};
                    }
                    if (request.status >= 200 && request.status < 300) {
                        resolve(payload);
                        return;
                    }
                    if (request.status === 413) {
                        reject(new Error('Fichier trop lourd pour le serveur.'));
                        return;
                    }
                    const firstError = Object.values(payload.errors || {})[0]?.[0];
                    reject(new Error(firstError || payload.message || 'Enregistrement impossible.'));
                });

                request.addEventListener('error', () =>
                    reject(new Error('Connexion interrompue pendant l’envoi.'))
                );
                request.addEventListener('timeout', () =>
                    reject(new Error('Le serveur met trop de temps à répondre.'))
                );

                request.send(data);
            });

        const updateProductOnServer = async (product) => {
            const response = await fetch(`/api/admin/products/${product.id}`, {
                method: 'POST',
                body: productPayload(product),
                headers: { Accept: 'application/json' },
            });
            if (!response.ok) {
                throw new Error('Mise à jour impossible.');
            }
            return response.json();
        };

        const refreshProductsFromServer = async () => {
            try {
                const response = await fetch('/api/admin/products', {
                    headers: { Accept: 'application/json' },
                });
                if (!response.ok) throw new Error();
                const items = await response.json();
                saveProducts(Array.isArray(items) ? items : []);
                renderProducts();
            } catch {
                renderProducts();
            }
        };

        const formatPrix = (prix) => `${Number(prix || 0).toLocaleString('fr-MA')} DH`;
        const saisonLabels = {
            ete: 'Été',
            printemps: 'Printemps',
            automne: 'Automne',
            hiver: 'Hiver',
        };

        const actionIcons = {
            view: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 12s3.5-6.5 9.5-6.5S21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="2.5"/></svg>',
            edit: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.5 4.5l7 7"/><path d="M4 20l.8-4.2L15.5 5.1a1.8 1.8 0 0 1 2.5 0l.9.9a1.8 1.8 0 0 1 0 2.5L7.2 20.2 3 21z"/></svg>',
            del: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16"/><path d="M9 7V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/><path d="M6.5 7l.8 12.2A1.5 1.5 0 0 0 8.8 20.5h6.4a1.5 1.5 0 0 0 1.5-1.3L17.5 7"/><path d="M10 11v6M14 11v6"/></svg>',
        };

        const bindRowSelects = (root = productsTbody) => {
            root?.querySelectorAll('[data-product-statue]').forEach((select) => {
                syncSelectClass(select, stockClassMap);
                select.addEventListener('change', async () => {
                    syncSelectClass(select, stockClassMap);
                    const id = select.closest('tr')?.dataset.id;
                    const items = loadProducts().map((item) =>
                        item.id === id ? { ...item, statue: select.value } : item
                    );
                    const product = items.find((item) => item.id === id);
                    saveProducts(items);
                    if (product) {
                        try {
                            const saved = await updateProductOnServer(product);
                            saveProducts(items.map((item) => item.id === id ? saved : item));
                        } catch {
                            await refreshProductsFromServer();
                        }
                    }
                });
            });

            root?.querySelectorAll('[data-product-etat]').forEach((select) => {
                syncSelectClass(select, etatClassMap);
                select.addEventListener('change', async () => {
                    syncSelectClass(select, etatClassMap);
                    const id = select.closest('tr')?.dataset.id;
                    const items = loadProducts().map((item) =>
                        item.id === id ? { ...item, etat: select.value } : item
                    );
                    const product = items.find((item) => item.id === id);
                    saveProducts(items);
                    if (product) {
                        try {
                            const saved = await updateProductOnServer(product);
                            saveProducts(items.map((item) => item.id === id ? saved : item));
                        } catch {
                            await refreshProductsFromServer();
                        }
                    }
                });
            });
        };

        const renderProducts = () => {
            if (!productsTbody) return;
            const allItems = loadProducts();
            const filters = getProductFilters();
            const items = allItems.filter((item) => matchProductFilters(item, filters));

            if (!allItems.length) {
                productsTbody.innerHTML = `<tr><td colspan="12" class="admin-table__empty">Aucun produit. Cliquez sur Ajouter.</td></tr>`;
                return;
            }

            if (!items.length) {
                productsTbody.innerHTML = `<tr><td colspan="12" class="admin-table__empty">Aucun produit ne correspond aux filtres.</td></tr>`;
                return;
            }

            productsTbody.innerHTML = items
                .map((item) => {
                    const media = renderProductMedia(item);

                    return `<tr data-id="${escapeHtml(item.id)}">
                        <td>${escapeHtml(item.ref)}</td>
                        <td>${escapeHtml(item.designation)}</td>
                        <td>${escapeHtml(item.categorie)}</td>
                        <td>${escapeHtml(item.famille)}</td>
                        <td>${escapeHtml(saisonLabels[item.saison] || item.saison || '—')}</td>
                        <td>${escapeHtml(item.size)}</td>
                        <td>${escapeHtml(item.qte ?? 0)}</td>
                        <td>${formatPrix(item.prix)}</td>
                        <td>${media}</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action-btn admin-action-btn--view" data-product-action="view" title="Voir" aria-label="Voir">${actionIcons.view}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--edit" data-product-action="edit" title="Modifier" aria-label="Modifier">${actionIcons.edit}</button>
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

        const getProductFilters = () => ({
            ref: document.getElementById('product-filter-ref')?.value.trim().toLowerCase() || '',
            designation: document.getElementById('product-filter-designation')?.value.trim().toLowerCase() || '',
            categorie: document.getElementById('product-filter-categorie')?.value.trim().toLowerCase() || '',
            famille: document.getElementById('product-filter-famille')?.value.trim().toLowerCase() || '',
            saison: document.getElementById('product-filter-saison')?.value || '',
            statue: document.getElementById('product-filter-statue')?.value || '',
            etat: document.getElementById('product-filter-etat')?.value || '',
        });

        const matchProductFilters = (item, filters) => {
            const includes = (value, needle) => !needle || String(value || '').toLowerCase().includes(needle);
            return (
                includes(item.ref, filters.ref) &&
                includes(item.designation, filters.designation) &&
                includes(item.categorie, filters.categorie) &&
                includes(item.famille, filters.famille) &&
                (!filters.saison || item.saison === filters.saison) &&
                (!filters.statue || item.statue === filters.statue) &&
                (!filters.etat || item.etat === filters.etat)
            );
        };

        document.getElementById('product-filters')?.addEventListener('input', (event) => {
            if (!event.target.matches('[data-product-filter]')) return;
            renderProducts();
        });
        document.getElementById('product-filters')?.addEventListener('change', (event) => {
            if (!event.target.matches('[data-product-filter]')) return;
            renderProducts();
        });
        document.getElementById('product-filters-reset')?.addEventListener('click', () => {
            document.querySelectorAll('[data-product-filter]').forEach((field) => {
                field.value = '';
            });
            renderProducts();
        });

        const openProductSheet = (mode = 'create', product = null) => {
            if (!productSheet || !productForm) return;

            productForm.reset();
            setProductSaving(false);
            trackPreviewUrl('');
            productPhotoData = product?.photo || '';
            productMediaType = detectProductMediaType(productPhotoData, product?.media_type);
            setProductMediaError();
            document.getElementById('product-id').value = product?.id || '';
            document.getElementById('product-sheet-title').textContent =
                mode === 'edit' ? 'Modifier le produit' : mode === 'view' ? 'Détail produit' : 'Nouveau produit';

            if (product) {
                document.getElementById('product-ref').value = product.ref || '';
                document.getElementById('product-designation').value = product.designation || '';
                document.getElementById('product-categorie').value = product.categorie || '';
                document.getElementById('product-famille').value = product.famille || '';
                document.getElementById('product-saison').value = product.saison || '';
                document.getElementById('product-size').value = product.size || '';
                document.getElementById('product-qte').value = product.qte ?? 0;
                document.getElementById('product-prix').value = product.prix ?? '';
                document.getElementById('product-statue').value = product.statue || 'dispo';
                document.getElementById('product-etat').value = product.etat || 'actif';
            } else {
                document.getElementById('product-ref').value = nextProductReference();
            }

            renderProductPreview(productPhotoData, productMediaType);

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
                document.getElementById('product-designation').focus({ preventScroll: true });
            }
        };

        const closeProductSheet = () => {
            if (!productSheet) return;
            productSheet.hidden = true;
            productSheet.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('product-sheet-open');
            productForm?.reset();
            setProductSaving(false);
            trackPreviewUrl('');
            productPhotoData = '';
            productMediaType = 'image';
            setProductMediaError();
            renderProductPreview('', 'image');
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
            setProductMediaError();

            if (!file) {
                productPhotoData = '';
                productMediaType = 'image';
                renderProductPreview('', 'image');
                return;
            }

            const isImage = [
                'image/jpeg',
                'image/png',
                'image/webp',
                'image/gif',
            ].includes(file.type);
            const isVideo = ['video/mp4', 'video/webm', 'video/ogg'].includes(file.type);
            if (!isImage && !isVideo) {
                productPhotoInput.value = '';
                setProductMediaError(
                    'Format non accepté. Utilisez JPG, PNG, WebP, GIF, MP4, WebM ou OGG.'
                );
                return;
            }

            if (file.size > MAX_PRODUCT_MEDIA_SIZE) {
                productPhotoInput.value = '';
                setProductMediaError('Ce fichier dépasse 10 Mo. Choisissez un média plus léger.');
                return;
            }

            productPhotoData = trackPreviewUrl(URL.createObjectURL(file));
            productMediaType = isVideo ? 'video' : 'image';
            renderProductPreview(productPhotoData, productMediaType);
        });

        productForm?.addEventListener('submit', async (event) => {
            event.preventDefault();
            if (productIsSaving) return;

            setProductMediaError();
            if (!productForm.checkValidity()) {
                productForm.reportValidity();
                return;
            }
            setProductSaving(true);

            const id = document.getElementById('product-id').value;
            const data = new FormData(productForm);
            data.delete('id');
            const file = productPhotoInput.files?.[0];
            if (!file) {
                data.delete('media');
            } else {
                data.set('media', await compressImage(file));
            }

            try {
                const result = await uploadProduct(
                    id ? `/api/admin/products/${id}` : '/api/admin/products',
                    data
                );

                const items = loadProducts();
                const index = items.findIndex((item) => item.id === String(result.id));
                if (index >= 0) {
                    items[index] = result;
                } else {
                    items.unshift(result);
                }
                saveProducts(items);
            } catch (error) {
                setProductMediaError(error.message || 'Enregistrement impossible.');
                setProductSaving(false);
                return;
            }
            renderProducts();
            closeProductSheet();
        });

        productsTbody?.addEventListener('click', async (event) => {
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
                    try {
                        const token = productForm.querySelector('input[name="_token"]')?.value || '';
                        const response = await fetch(`/api/admin/products/${id}`, {
                            method: 'DELETE',
                            headers: {
                                Accept: 'application/json',
                                'X-CSRF-TOKEN': token,
                            },
                        });
                        if (!response.ok) throw new Error();
                        saveProducts(items.filter((item) => item.id !== id));
                        renderProducts();
                    } catch {
                        alert('Suppression impossible. Réessayez.');
                    }
                }
            }
        });

        refreshProductsFromServer();

        /* ——— Mouvement Stock ——— */
        const stockMoveTbody = document.getElementById('stock-move-tbody');
        const STOCK_MONTH_LABELS = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

        const emptyMonthSales = () => Array.from({ length: 12 }, () => 0);

        const buildProductSalesMap = (orders, year) => {
            const map = new Map();

            (orders || []).forEach((order) => {
                if (order.statue === 'annulee') return;
                const qte = Number(order.qte) || 0;
                if (!qte) return;

                const date = order.date ? new Date(order.date) : null;
                if (!date || Number.isNaN(date.getTime()) || date.getFullYear() !== year) return;

                const monthIndex = date.getMonth();
                const bump = (key) => {
                    if (!key) return;
                    const entry = map.get(key) || { months: emptyMonthSales(), year: 0 };
                    entry.months[monthIndex] += qte;
                    entry.year += qte;
                    map.set(key, entry);
                };

                bump(String(order.product_id || '').trim());
                bump(String(order.ref_prod || '').trim());
            });

            return map;
        };

        const getStockMoveRows = () => {
            const year = new Date().getFullYear();
            const products = loadProducts();
            const salesMap = buildProductSalesMap(ordersCache, year);
            const yearEl = document.getElementById('stock-move-year');
            if (yearEl) yearEl.textContent = String(year);

            return products.map((product) => {
                const sales =
                    salesMap.get(String(product.id)) ||
                    salesMap.get(String(product.ref)) ||
                    { months: emptyMonthSales(), year: 0 };
                const months = Array.isArray(sales.months) ? sales.months : emptyMonthSales();
                const venteAnnee = Number(sales.year) || months.reduce((sum, n) => sum + n, 0);
                const stockActuel = Number(product.qte) || 0;
                const stockInitial = stockActuel + venteAnnee;

                return {
                    ref: product.ref || '—',
                    designation: product.designation || '—',
                    stockInitial,
                    months,
                    venteAnnee,
                    stockActuel,
                    year,
                };
            });
        };

        const renderStockMove = async () => {
            if (!stockMoveTbody) return;
            await refreshProductsFromServer();
            try {
                await refreshOrdersFromServer();
            } catch {
                /* keep existing ordersCache */
            }

            const rows = getStockMoveRows();
            if (!rows.length) {
                stockMoveTbody.innerHTML = `<tr><td colspan="16" class="admin-table__empty">Aucun produit en stock.</td></tr>`;
                return;
            }

            stockMoveTbody.innerHTML = rows
                .map((row) => {
                    const monthCells = row.months
                        .map((qty, index) => {
                            const value = Number(qty) || 0;
                            const isCurrent = index === new Date().getMonth();
                            return `<td class="stock-month${value ? ' is-filled' : ''}${isCurrent ? ' is-current' : ''}">${value || '—'}</td>`;
                        })
                        .join('');

                    return `<tr>
                        <td>${escapeHtml(row.ref)}</td>
                        <td>${escapeHtml(row.designation)}</td>
                        <td>${escapeHtml(String(row.stockInitial))}</td>
                        ${monthCells}
                        <td><span class="stock-sales">${escapeHtml(String(row.venteAnnee))}</span></td>
                        <td><strong class="stock-actuel">${escapeHtml(String(row.stockActuel))}</strong></td>
                    </tr>`;
                })
                .join('');
        };

        const printStockMove = () => {
            const rows = getStockMoveRows();
            const year = rows[0]?.year || new Date().getFullYear();
            const win = window.open('', '_blank', 'noopener,noreferrer,width=1100,height=720');
            if (!win) {
                alert('Autorisez les pop-ups pour imprimer.');
                return;
            }

            const monthHeads = STOCK_MONTH_LABELS.map((label) => `<th>${label}</th>`).join('');
            const bodyRows = rows.length
                ? rows
                      .map((row) => {
                          const months = row.months.map((qty) => `<td>${Number(qty) || 0}</td>`).join('');
                          return `<tr>
                            <td>${escapeHtml(row.ref)}</td>
                            <td>${escapeHtml(row.designation)}</td>
                            <td>${row.stockInitial}</td>
                            ${months}
                            <td>${row.venteAnnee}</td>
                            <td>${row.stockActuel}</td>
                        </tr>`;
                      })
                      .join('')
                : `<tr><td colspan="16">Aucun produit</td></tr>`;

            const printedAt = new Date().toLocaleString('fr-FR');
            win.document.write(`<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8">
                <title>MOUCHAP — Mouvement Stock ${year}</title>
                <style>
                    body{font-family:Georgia,serif;color:#2a1520;padding:20px}
                    h1{font-size:20px;margin:0 0 4px}
                    p{margin:0 0 14px;color:#6b1e3a;font-size:12px}
                    table{width:100%;border-collapse:collapse;font-size:11px}
                    th,td{border:1px solid #d7b7c0;padding:6px 5px;text-align:center}
                    th{background:#6b1e3a;color:#fff8f6;text-transform:uppercase;letter-spacing:.04em;font-size:10px}
                    tr:nth-child(even) td{background:#fdf5f7}
                    td:nth-child(2){text-align:left}
                </style></head><body>
                <h1>Mouvement Stock — ${year}</h1>
                <p>MOUCHAP · Ventes par mois · Imprimé le ${escapeHtml(printedAt)}</p>
                <table>
                    <thead><tr>
                        <th>Réf</th><th>Désignation</th><th>Stock Initial</th>
                        ${monthHeads}<th>Total</th><th>Stock Actuel</th>
                    </tr></thead>
                    <tbody>${bodyRows}</tbody>
                </table>
                <script>window.onload=function(){window.print();}<\/script>
                </body></html>`);
            win.document.close();
        };

        document.getElementById('stock-print-btn')?.addEventListener('click', printStockMove);

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
            view: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 12s3.5-6.5 9.5-6.5S21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="2.5"/></svg>',
            edit: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.5 4.5l7 7"/><path d="M4 20l.8-4.2L15.5 5.1a1.8 1.8 0 0 1 2.5 0l.9.9a1.8 1.8 0 0 1 0 2.5L7.2 20.2 3 21z"/></svg>',
            del: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16"/><path d="M9 7V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/><path d="M6.5 7l.8 12.2A1.5 1.5 0 0 0 8.8 20.5h6.4a1.5 1.5 0 0 0 1.5-1.3L17.5 7"/><path d="M10 11v6M14 11v6"/></svg>',
            pdf: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3.5h7.5L19 8v12.5a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4.5a1 1 0 0 1 1-1z"/><path d="M14.5 3.5V8H19"/><path d="M9 13h6M9 16.5h4"/></svg>',
        };

        const loginLocal = (value) => String(value || '')
            .replace(/@mouchap\.com$/i, '')
            .replace(/@.*$/, '')
            .trim();

        const loginFull = (value) => {
            const local = loginLocal(value);
            return local ? `${local}@mouchap.com` : '';
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

        const loadAffilies = () => affiliesCache;
        const saveAffilies = (items) => { affiliesCache = items; };
        const syncAffiliesFromValidated = async () => {
            try { affiliesCache = await api('/api/admin/affilies'); } catch { affiliesCache = []; }
            return affiliesCache;
        };

        const bindAffilieRowSelects = () => {
            affiliesTbody?.querySelectorAll('[data-aff-paiement]').forEach((select) => {
                syncSelectClass(select, paiementClassMap);
                select.onchange = async () => {
                    syncSelectClass(select, paiementClassMap);
                    const uid = select.closest('tr')?.dataset.uid;
                    try {
                        await api(`/api/admin/affilies/${uid}`, { method: 'PATCH', body: { type_paiement: select.value } });
                    } catch (e) { alert(e.message || 'Erreur'); }
                };
            });

            affiliesTbody?.querySelectorAll('[data-aff-statue]').forEach((select) => {
                syncSelectClass(select, affStatueClassMap);
                select.onchange = async () => {
                    syncSelectClass(select, affStatueClassMap);
                    const uid = select.closest('tr')?.dataset.uid;
                    try {
                        await api(`/api/admin/affilies/${uid}`, { method: 'PATCH', body: { statue: select.value } });
                        affiliesCache = loadAffilies().map((item) =>
                            item.uid === uid ? { ...item, statue: select.value } : item
                        );
                        updateAffiliesSummary(affiliesCache);
                    } catch (e) { alert(e.message || 'Erreur'); }
                };
            });
        };

        const updateAffiliesSummary = (items = []) => {
            const total = items.length;
            const actifs = items.filter((item) => (item.statue || 'actif') === 'actif').length;
            const susp = items.filter((item) => item.statue === 'susp').length;
            const villes = new Set(
                items
                    .map((item) => String(item.ville || '').trim().toLowerCase())
                    .filter(Boolean)
            ).size;

            const set = (id, value) => {
                const el = document.getElementById(id);
                if (el) el.textContent = String(value);
            };

            set('affilies-count-total', total);
            set('affilies-count-actif', actifs);
            set('affilies-count-susp', susp);
            set('affilies-count-villes', villes);
        };

        const renderAffilies = async () => {
            await renderKpis();
            if (!affiliesTbody) return;
            const items = await syncAffiliesFromValidated();
            updateAffiliesSummary(items);

            if (!items.length) {
                affiliesTbody.innerHTML = `<tr><td colspan="12" class="admin-table__empty">Aucun affilié validé. Validez une demande ou cliquez sur Ajouter.</td></tr>`;
                return;
            }

            affiliesTbody.innerHTML = items
                .map((item) => {
                    const paiement = item.type_paiement || 'Vir';
                    const statue = item.statue || 'actif';
                    return `<tr data-id="${escapeHtml(item.id)}" data-uid="${escapeHtml(item.uid)}">
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
                        <td class="admin-table__login">${escapeHtml(loginLocal(item.login))}</td>
                        <td>${escapeHtml(item.password || '')}</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action-btn admin-action-btn--view" data-affilie-action="view" title="Voir" aria-label="Voir">${affActionIcons.view}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--edit" data-affilie-action="edit" title="Modifier" aria-label="Modifier">${affActionIcons.edit}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--danger" data-affilie-action="delete" title="Supprimer" aria-label="Supprimer">${affActionIcons.del}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--pdf" data-affilie-action="pdf" title="PDF" aria-label="PDF">${affActionIcons.pdf}</button>
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
                    <dd>${escapeHtml(loginLocal(item.login) || '—')}</dd>
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
                    <div><dt>Login</dt><dd>${escapeHtml(loginLocal(affilie.login) || '—')}</dd></div>
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
            document.getElementById('affilie-fiche-login').value = loginLocal(affilie?.login || '');
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

        affiliesTbody?.addEventListener('click', async (event) => {
            const btn = event.target.closest('[data-affilie-action]');
            if (!btn) return;
            const uid = btn.closest('tr')?.dataset.uid;
            const id = btn.closest('tr')?.dataset.id;
            const items = loadAffilies();
            const affilie = items.find((item) => item.uid === uid || item.id === id);
            if (!affilie) return;

            const action = btn.getAttribute('data-affilie-action');
            if (action === 'view') openAffilieView(affilie);
            if (action === 'edit') openAffilieSheet(affilie);
            if (action === 'pdf') printAffiliePdf(affilie);
            if (action === 'delete') {
                if (confirm(`Supprimer l’affilié ${affilie.nom_complet || affilie.id} ?`)) {
                    try {
                        await api(`/api/admin/affilies/${affilie.uid}`, { method: 'DELETE' });
                        await renderAffilies();
                        if (affilieViewCurrentId === id) closeAffilieView();
                    } catch (e) { alert(e.message || 'Suppression impossible'); }
                }
            }
        });

        affilieFicheForm?.addEventListener('submit', async (event) => {
            event.preventDefault();
            if (!affilieFicheForm.checkValidity()) {
                affilieFicheForm.reportValidity();
                return;
            }

            const code = document.getElementById('affilie-fiche-id').value.trim();
            const existing = loadAffilies().find((item) => item.id === code);
            const payload = {
                code: code || undefined,
                date: document.getElementById('affilie-fiche-date').value,
                nom_complet: document.getElementById('affilie-fiche-nom').value.trim(),
                titre: document.getElementById('affilie-fiche-titre').value.trim(),
                contact: document.getElementById('affilie-fiche-contact').value.trim(),
                ville: document.getElementById('affilie-fiche-ville').value.trim(),
                banque: document.getElementById('affilie-fiche-banque').value.trim(),
                rib: document.getElementById('affilie-fiche-rib').value.trim(),
                type_paiement: document.getElementById('affilie-fiche-paiement').value,
                statue: document.getElementById('affilie-fiche-statue').value,
                login: loginFull(document.getElementById('affilie-fiche-login').value),
                password: document.getElementById('affilie-fiche-password').value.trim(),
            };

            try {
                if (existing?.uid) {
                    await api(`/api/admin/affilies/${existing.uid}`, { method: 'POST', body: payload });
                } else {
                    await api('/api/admin/affilies', { method: 'POST', body: payload });
                }
                await renderAffilies();
                closeAffilieSheet();
            } catch (e) { alert(e.message || 'Enregistrement impossible'); }
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

        const loadFournisseurs = () => fournisseursCache;
        const saveFournisseurs = (items) => { fournisseursCache = items; };
        const nextFournisseurId = () => 'FRN-AUTO';
        const renderFournisseurs = async () => {
            if (!fournisseursTbody) return;
            try { fournisseursCache = await api('/api/admin/fournisseurs'); } catch { fournisseursCache = []; }
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
                                <button type="button" class="admin-action-btn admin-action-btn--view" data-fournisseur-action="view" title="Voir" aria-label="Voir">${affActionIcons.view}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--edit" data-fournisseur-action="edit" title="Modifier" aria-label="Modifier">${affActionIcons.edit}</button>
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

        fournisseursTbody?.addEventListener('click', async (event) => {
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
                    try {
                        await api(`/api/admin/fournisseurs/${uid}`, { method: 'DELETE' });
                        await renderFournisseurs();
                        if (fournisseurViewCurrentUid === uid) closeFournisseurView();
                    } catch (e) { alert(e.message || 'Suppression impossible'); }
                }
            }
        });

        fournisseurForm?.addEventListener('submit', async (event) => {
            event.preventDefault();
            if (!fournisseurForm.checkValidity()) {
                fournisseurForm.reportValidity();
                return;
            }

            const uid = document.getElementById('fournisseur-uid').value;
            const payload = {
                code: document.getElementById('fournisseur-id').value.trim() || undefined,
                date: document.getElementById('fournisseur-date').value,
                nom: document.getElementById('fournisseur-nom').value.trim(),
                ville: document.getElementById('fournisseur-ville').value.trim(),
                contact: document.getElementById('fournisseur-contact').value.trim(),
                type_regl: document.getElementById('fournisseur-type-regl').value,
                banque: document.getElementById('fournisseur-banque').value.trim(),
                ice: document.getElementById('fournisseur-ice').value.trim(),
            };

            try {
                if (uid) {
                    await api(`/api/admin/fournisseurs/${uid}`, { method: 'POST', body: payload });
                } else {
                    await api('/api/admin/fournisseurs', { method: 'POST', body: payload });
                }
                await renderFournisseurs();
                closeFournisseurSheet();
            } catch (e) { alert(e.message || 'Enregistrement impossible'); }
        });

        /* ——— Utilisateur (Configurations) ——— */
        const USERS_KEY = 'mouchap_admin_users';
        const usersTbody = document.getElementById('users-tbody');
        const userSheet = document.getElementById('user-sheet');
        const userForm = document.getElementById('user-form');
        const userSaveBtn = document.getElementById('user-save-btn');

        const userStatueLabels = {
            gerant: 'Gérant',
            commercial: 'Commercial',
            caisse: 'Caisse',
            depot: 'Depot',
        };

        const userStatueLabel = (value) =>
            userStatueLabels[value] || userStatueLabels.gerant;

        const loadUsers = () => usersCache;
        const saveUsers = (items) => { usersCache = items; };
        const nextUserId = () => 'USR-AUTO';
        const refreshUsers = async () => {
            try { usersCache = await api('/api/admin/users'); } catch { usersCache = []; }
            return usersCache;
        };

        const normalizeUserLogin = (value, fallbackName = '') => {
            const raw = String(value || '').trim().toLowerCase();
            const local = (raw.split('@')[0] || '')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9._-]+/g, '.')
                .replace(/^[.]+|[.]+$/g, '');
            if (local) return `${local}@mouchap.com`;
            return slugLogin(fallbackName);
        };

        const renderUsers = async () => {
            if (!usersTbody) return;
            await refreshUsers();
            const items = loadUsers();

            if (!items.length) {
                usersTbody.innerHTML = `<tr><td colspan="7" class="admin-table__empty">Aucun utilisateur. Cliquez sur Ajouter.</td></tr>`;
                return;
            }

            usersTbody.innerHTML = items
                .map((item) => {
                    const statue = userStatueLabels[item.statue] ? item.statue : 'gerant';
                    return `<tr data-uid="${escapeHtml(item.uid)}">
                        <td>${escapeHtml(item.id)}</td>
                        <td>${escapeHtml(item.nom_complet)}</td>
                        <td>${escapeHtml(item.contact)}</td>
                        <td><span class="user-statue-badge user-statue-badge--${statue}">${userStatueLabel(statue)}</span></td>
                        <td class="admin-table__login">${escapeHtml(loginLocal(item.login))}</td>
                        <td>${escapeHtml(item.password)}</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" class="admin-action-btn admin-action-btn--view" data-user-action="view" title="Voir" aria-label="Voir">${affActionIcons.view}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--edit" data-user-action="edit" title="Modifier" aria-label="Modifier">${affActionIcons.edit}</button>
                                <button type="button" class="admin-action-btn admin-action-btn--danger" data-user-action="delete" title="Supprimer" aria-label="Supprimer">${affActionIcons.del}</button>
                            </div>
                        </td>
                    </tr>`;
                })
                .join('');
        };

        const openUserSheet = (mode = 'create', item = null) => {
            if (!userSheet || !userForm) return;
            userForm.reset();
            document.getElementById('user-sheet-title').textContent =
                mode === 'edit' ? 'Modifier l’utilisateur' : mode === 'view' ? 'Détail utilisateur' : 'Nouvel utilisateur';
            document.getElementById('user-uid').value = item?.uid || '';
            document.getElementById('user-id').value = item?.id || nextUserId();
            document.getElementById('user-nom').value = item?.nom_complet || '';
            document.getElementById('user-contact').value = item?.contact || '';
            document.getElementById('user-statue').value = userStatueLabels[item?.statue]
                ? item.statue
                : 'gerant';
            document.getElementById('user-login').value = item?.login || '';
            document.getElementById('user-password').value = item?.password || randomPassword();

            const readOnly = mode === 'view';
            userForm.querySelectorAll('input, select').forEach((field) => {
                if (field.type === 'hidden') return;
                field.disabled = readOnly;
            });
            if (userSaveBtn) userSaveBtn.hidden = readOnly;

            userSheet.hidden = false;
            userSheet.setAttribute('aria-hidden', 'false');
            document.body.classList.add('product-sheet-open');
            if (!readOnly) {
                document.getElementById('user-nom').focus({ preventScroll: true });
            }
        };

        const closeUserSheet = () => {
            if (!userSheet) return;
            userSheet.hidden = true;
            userSheet.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('product-sheet-open');
            userForm?.reset();
            userForm?.querySelectorAll('input, select').forEach((field) => {
                field.disabled = false;
            });
            if (userSaveBtn) userSaveBtn.hidden = false;
        };

        document.getElementById('user-add-btn')?.addEventListener('click', () => openUserSheet('create'));
        document.querySelectorAll('[data-user-sheet-close]').forEach((el) => {
            el.addEventListener('click', closeUserSheet);
        });

        document.getElementById('user-login')?.addEventListener('blur', (event) => {
            if (!event.target.value.trim()) return;
            event.target.value = normalizeUserLogin(
                event.target.value,
                document.getElementById('user-nom')?.value
            );
        });

        usersTbody?.addEventListener('click', async (event) => {
            const btn = event.target.closest('[data-user-action]');
            if (!btn) return;
            const uid = btn.closest('tr')?.dataset.uid;
            const items = loadUsers();
            const item = items.find((row) => row.uid === uid);
            if (!item) return;

            const action = btn.getAttribute('data-user-action');
            if (action === 'view') openUserSheet('view', item);
            if (action === 'edit') openUserSheet('edit', item);
            if (action === 'delete') {
                if (confirm(`Supprimer l’utilisateur ${item.nom_complet || item.id} ?`)) {
                    try {
                        await api(`/api/admin/users/${uid}`, { method: 'DELETE' });
                        await renderUsers();
                    } catch (e) { alert(e.message || 'Suppression impossible'); }
                }
            }
        });

        userForm?.addEventListener('submit', async (event) => {
            event.preventDefault();

            const loginInput = document.getElementById('user-login');
            loginInput.value = normalizeUserLogin(
                loginInput.value,
                document.getElementById('user-nom').value
            );

            if (!userForm.checkValidity()) {
                userForm.reportValidity();
                return;
            }

            const uid = document.getElementById('user-uid').value;
            const payload = {
                code: document.getElementById('user-id').value.trim() || undefined,
                nom_complet: document.getElementById('user-nom').value.trim(),
                contact: document.getElementById('user-contact').value.trim(),
                statue: userStatueLabels[document.getElementById('user-statue').value]
                    ? document.getElementById('user-statue').value
                    : 'gerant',
                login: loginInput.value,
                password: document.getElementById('user-password').value.trim(),
            };

            try {
                if (uid) {
                    await api(`/api/admin/users/${uid}`, { method: 'POST', body: payload });
                } else {
                    await api('/api/admin/users', { method: 'POST', body: payload });
                }
                await renderUsers();
                closeUserSheet();
            } catch (e) { alert(e.message || 'Enregistrement impossible'); }
        });

        if (window.location.hash === '#fiche-produit') {
            showAdminView('fiche-produit');
            document.querySelector('[data-admin-view="fiche-produit"]')?.classList.add('is-active');
        } else if (window.location.hash === '#mouvement-stock' || window.location.hash === '#mouvement-produit') {
            showAdminView('mouvement-stock');
            document.querySelector('[data-admin-view="mouvement-stock"]')?.classList.add('is-active');
        } else if (window.location.hash === '#fiche-affilie') {
            showAdminView('fiche-affilie');
            document.querySelector('[data-admin-view="fiche-affilie"]')?.classList.add('is-active');
        } else if (window.location.hash === '#fiche-fournisseur') {
            showAdminView('fiche-fournisseur');
            document.querySelector('[data-admin-view="fiche-fournisseur"]')?.classList.add('is-active');
        } else if (window.location.hash === '#utilisateur') {
            showAdminView('utilisateur');
            document.querySelector('[data-admin-view="utilisateur"]')?.classList.add('is-active');
        }
    </script>
</body>
</html>
