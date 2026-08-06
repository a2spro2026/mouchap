<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOUCHAP — Espace Affilié</title>
    <link rel="icon" type="image/png" href="{{ asset('images/mouchap-logo.png') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="aff-space-body">
    <div class="aff-shell">
        <aside class="aff-sidebar" aria-label="Menu affilié">
            <div class="aff-sidebar__brand">
                <img
                    src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}"
                    alt=""
                    class="aff-sidebar__logo"
                >
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
                <a href="#commandes" class="aff-side-link" data-aff-nav="commandes">
                    <span class="aff-side-link__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path stroke-linecap="round" d="M9 12h6M9 16h4"/></svg>
                    </span>
                    <span>Mes commandes</span>
                </a>
                <a href="#catalogue" class="aff-side-link" data-aff-nav="catalogue">
                    <span class="aff-side-link__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M20.6 8.5 12 3 3.4 8.5 12 14l8.6-5.5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3.4 15.5 12 21l8.6-5.5M3.4 12 12 17.5 20.6 12"/></svg>
                    </span>
                    <span>Catalogue</span>
                </a>
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

                <div class="aff-cards">
                    <article class="aff-card">
                        <p class="aff-card__label">Statut</p>
                        <p class="aff-card__value" id="aff-card-statue">Actif</p>
                    </article>
                    <article class="aff-card">
                        <p class="aff-card__label">Ville</p>
                        <p class="aff-card__value" id="aff-card-ville">—</p>
                    </article>
                    <article class="aff-card">
                        <p class="aff-card__label">Type paiement</p>
                        <p class="aff-card__value" id="aff-card-paiement">—</p>
                    </article>
                </div>

                <div class="aff-panel">
                    <h2 class="aff-panel__title">Tableau de bord</h2>
                    <p class="aff-panel__text">
                        Gérez vos commandes, consultez le catalogue et suivez vos messages depuis le menu latéral.
                    </p>
                </div>
            </section>

            <section class="aff-view" id="aff-view-commandes" data-aff-view="commandes" hidden>
                <div class="admin-panel__toolbar aff-cmd-toolbar">
                    <div>
                        <p class="admin-panel__eyebrow">Espace Affilié</p>
                        <h2 class="aff-panel__title" style="margin:0.2rem 0 0">Mes commandes</h2>
                    </div>
                    <div class="admin-panel__actions">
                        <button type="button" class="admin-btn admin-btn--primary" id="aff-cmd-print">Imprimer</button>
                        <button type="button" class="admin-btn admin-btn--ghost" id="aff-cmd-close">Fermer</button>
                    </div>
                </div>

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
                    <div class="admin-panel__actions">
                        <button type="button" class="admin-btn admin-btn--ghost" id="aff-cat-close">Fermer</button>
                    </div>
                </div>

                <div class="aff-season-cards" aria-label="Saisons">
                    <button type="button" class="aff-season-card" data-saison="hiver">
                        <span class="aff-season-card__label">Hiver</span>
                    </button>
                    <button type="button" class="aff-season-card" data-saison="automne">
                        <span class="aff-season-card__label">Automne</span>
                    </button>
                    <button type="button" class="aff-season-card" data-saison="printemps">
                        <span class="aff-season-card__label">Printemps</span>
                    </button>
                    <button type="button" class="aff-season-card" data-saison="ete">
                        <span class="aff-season-card__label">Été</span>
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
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Photo</th>
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

            {{-- Menu téléchargement --}}
            <div class="aff-dl-menu" id="aff-dl-menu" hidden>
                <button type="button" data-dl-format="png">Télécharger PNG</button>
                <button type="button" data-dl-format="pdf">Télécharger PDF</button>
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
                            <span class="admin-field__label">Qte</span>
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
            const SESSION_KEY = 'mouchap_affilie_session';
            const INBOX_KEY = 'mouchap_affilie_inbox';
            const AFFILIES_KEY = 'mouchap_affilies';

            const rawSession = sessionStorage.getItem(SESSION_KEY);
            if (!rawSession) {
                window.location.href = '{{ url('/') }}';
                return;
            }

            let session;
            try {
                session = JSON.parse(rawSession);
            } catch {
                sessionStorage.removeItem(SESSION_KEY);
                window.location.href = '{{ url('/') }}';
                return;
            }

            const loadInbox = () => {
                try {
                    const list = JSON.parse(localStorage.getItem(INBOX_KEY) || '[]');
                    return Array.isArray(list) ? list : [];
                } catch {
                    return [];
                }
            };

            const saveInbox = (items) => localStorage.setItem(INBOX_KEY, JSON.stringify(items));

            const myMessages = () =>
                loadInbox().filter(
                    (msg) => msg.affilie_id === session.id || msg.login === session.login
                );

            const escapeHtml = (value) =>
                String(value ?? '')
                    .replaceAll('&', '&amp;')
                    .replaceAll('<', '&lt;')
                    .replaceAll('>', '&gt;')
                    .replaceAll('"', '&quot;');

            const refreshProfile = () => {
                try {
                    const list = JSON.parse(localStorage.getItem(AFFILIES_KEY) || '[]');
                    const fresh = Array.isArray(list)
                        ? list.find((item) => item.id === session.id || item.login === session.login)
                        : null;
                    if (fresh) {
                        session = { ...session, ...fresh };
                        sessionStorage.setItem(SESSION_KEY, JSON.stringify(session));
                    }
                } catch {
                    // ignore
                }

                const name = session.nom_complet || 'Affilié';
                document.getElementById('aff-welcome-title').textContent = `Bonjour, ${name.split(' ')[0]}`;
                document.getElementById('aff-user-name').textContent = name;
                document.getElementById('aff-user-login').textContent = session.login || '—';
                document.getElementById('aff-avatar').textContent = (name.trim()[0] || 'A').toUpperCase();
                document.getElementById('aff-card-statue').textContent =
                    session.statue === 'susp' ? 'Susp' : 'Actif';
                document.getElementById('aff-card-ville').textContent = session.ville || '—';
                document.getElementById('aff-card-paiement').textContent = session.type_paiement || '—';

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

            const renderMessages = () => {
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

                const confirm = messages.find((m) => m.type === 'validation' && !m.read) || messages.find((m) => m.type === 'validation');
                const banner = document.getElementById('aff-confirm-banner');
                const confirmText = document.getElementById('aff-confirm-text');
                if (banner && confirmText) {
                    if (confirm) {
                        banner.hidden = false;
                        confirmText.textContent = confirm.body || '';
                    } else {
                        banner.hidden = true;
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

            const defaultCatalogue = [
                { id: 'c1', ref: 'PRD-H01', designation: 'Manteau camel', categorie: 'Manteaux', famille: 'Femme', type: 'Hiver', size: 'S/M/L', sizes: ['S', 'M', 'L', 'XL'], couleurs: ['Camel', 'Noir', 'Beige'], saison: 'hiver', photo: heroImg },
                { id: 'c2', ref: 'PRD-H02', designation: 'Pull laine', categorie: 'Tops', famille: 'Mixte', type: 'Hiver', size: 'M/L', sizes: ['M', 'L', 'XL'], couleurs: ['Gris', 'Bordeaux', 'Noir'], saison: 'hiver', photo: logoImg },
                { id: 'c3', ref: 'PRD-A01', designation: 'Blazer rose', categorie: 'Vestes', famille: 'Femme', type: 'Automne', size: 'S/M/L', sizes: ['S', 'M', 'L'], couleurs: ['Rose', 'Beige', 'Noir'], saison: 'automne', photo: markImg },
                { id: 'c4', ref: 'PRD-A02', designation: 'Robe midi', categorie: 'Robes', famille: 'Femme', type: 'Automne', size: 'S/M/L', sizes: ['S', 'M', 'L', 'XL'], couleurs: ['Bordeaux', 'Vert', 'Noir'], saison: 'automne', photo: heroImg },
                { id: 'c5', ref: 'PRD-P01', designation: 'Chemise fleurie', categorie: 'Tops', famille: 'Femme', type: 'Printemps', size: 'S/M', sizes: ['S', 'M', 'L'], couleurs: ['Blanc', 'Rose', 'Bleu'], saison: 'printemps', photo: logoImg },
                { id: 'c6', ref: 'PRD-P02', designation: 'Trench léger', categorie: 'Vestes', famille: 'Mixte', type: 'Printemps', size: 'M/L', sizes: ['M', 'L', 'XL'], couleurs: ['Beige', 'Kaki'], saison: 'printemps', photo: markImg },
                { id: 'c7', ref: 'PRD-E01', designation: 'Robe lin', categorie: 'Robes', famille: 'Femme', type: 'Été', size: 'S/M/L', sizes: ['S', 'M', 'L'], couleurs: ['Blanc', 'Sable', 'Corail'], saison: 'ete', photo: heroImg },
                { id: 'c8', ref: 'PRD-E02', designation: 'Short coton', categorie: 'Bas', famille: 'Mixte', type: 'Été', size: 'S/M/L/XL', sizes: ['S', 'M', 'L', 'XL'], couleurs: ['Blanc', 'Bleu', 'Noir'], saison: 'ete', photo: logoImg },
            ];

            const loadCatalogue = () => {
                try {
                    const raw = localStorage.getItem(CATALOGUE_KEY);
                    if (!raw) {
                        localStorage.setItem(CATALOGUE_KEY, JSON.stringify(defaultCatalogue));
                        return [...defaultCatalogue];
                    }
                    const parsed = JSON.parse(raw);
                    return Array.isArray(parsed) && parsed.length ? parsed : [...defaultCatalogue];
                } catch {
                    return [...defaultCatalogue];
                }
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
                    tbody.innerHTML = `<tr><td colspan="7" class="admin-table__empty">Aucun produit.</td></tr>`;
                    return;
                }
                tbody.innerHTML = items
                    .map((p) => {
                        const photo = p.photo
                            ? `<img src="${escapeHtml(p.photo)}" alt="" class="product-thumb">`
                            : `<span class="product-thumb product-thumb--empty">—</span>`;
                        return `<tr>
                            <td>${escapeHtml(p.ref)}</td>
                            <td>${escapeHtml(p.designation)}</td>
                            <td>${escapeHtml(p.categorie)}</td>
                            <td>${escapeHtml(p.famille)}</td>
                            <td>${escapeHtml(p.type)}</td>
                            <td>${escapeHtml(p.size)}</td>
                            <td>${photo}</td>
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
                        const img = p.photo || logoImg;
                        return `<article class="aff-cat-item" data-product-id="${escapeHtml(p.id)}">
                            <div class="aff-cat-item__media">
                                <img src="${escapeHtml(img)}" alt="${escapeHtml(p.designation)}">
                            </div>
                            <h4 class="aff-cat-item__title">${escapeHtml(p.designation)}</h4>
                            <div class="aff-cat-item__actions">
                                <button type="button" class="admin-action-btn" data-cat-action="download" title="Télécharger" aria-label="Télécharger">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14"/></svg>
                                </button>
                                <button type="button" class="admin-action-btn" data-cat-action="cart" title="Panier" aria-label="Panier">
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

            const downloadAsPng = async (product) => {
                const src = product.photo || logoImg;
                try {
                    const res = await fetch(src);
                    const blob = await res.blob();
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = `${(product.ref || 'produit').replace(/[^\w-]+/g, '_')}.png`;
                    a.click();
                    URL.revokeObjectURL(url);
                } catch {
                    const a = document.createElement('a');
                    a.href = src;
                    a.download = `${product.ref || 'produit'}.png`;
                    a.target = '_blank';
                    a.click();
                }
            };

            const downloadAsPdf = (product) => {
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
                document.getElementById('aff-order-qte').value = 1;

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

            document.getElementById('aff-cat-close')?.addEventListener('click', () => {
                hideDlMenu();
                closeSeasonGallery();
                showView('accueil');
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
                    openOrderSheet(product);
                    return;
                }

                if (btn.dataset.catAction === 'download') {
                    dlProduct = product;
                    const menu = document.getElementById('aff-dl-menu');
                    if (!menu) return;
                    const rect = btn.getBoundingClientRect();
                    menu.style.top = `${rect.bottom + 6}px`;
                    menu.style.left = `${Math.min(rect.left, window.innerWidth - 180)}px`;
                    menu.hidden = false;
                }
            });

            document.getElementById('aff-dl-menu')?.addEventListener('click', (event) => {
                const btn = event.target.closest('[data-dl-format]');
                if (!btn || !dlProduct) return;
                if (btn.dataset.dlFormat === 'png') downloadAsPng(dlProduct);
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

            document.getElementById('aff-order-form')?.addEventListener('submit', (event) => {
                event.preventDefault();
                const productId = document.getElementById('aff-order-product-id').value;
                const product = loadCatalogue().find((p) => p.id === productId);
                const sizes = [...document.querySelectorAll('#aff-order-sizes input:checked')].map((i) => i.value);
                const couleurs = [...document.querySelectorAll('#aff-order-couleurs input:checked')].map((i) => i.value);
                const qte = Number(document.getElementById('aff-order-qte').value || 1);

                if (!sizes.length) {
                    alert('Choisissez au moins une taille.');
                    return;
                }
                if (!couleurs.length) {
                    alert('Choisissez au moins une couleur.');
                    return;
                }

                const order = {
                    id: `o-${Date.now()}`,
                    date: new Date().toISOString().slice(0, 10),
                    affilie_id: session.id,
                    affilie_nom: session.nom_complet || '',
                    ville: session.ville || '—',
                    n_cmd: `CMD-${Date.now().toString().slice(-5)}`,
                    ref_prod: product?.ref || document.getElementById('aff-order-ref').value,
                    designation: product?.designation || document.getElementById('aff-order-designation').value,
                    nom_client: session.nom_complet || 'Client',
                    contact: session.contact || '—',
                    qte,
                    sizes,
                    couleurs,
                    prix_u: 0,
                    montant: 0,
                    statue: 'reporte',
                    stock: 'dispo',
                    source: 'catalogue',
                };

                try {
                    const list = JSON.parse(localStorage.getItem(ORDERS_KEY) || '[]');
                    const orders = Array.isArray(list) ? list : [];
                    orders.unshift(order);
                    localStorage.setItem(ORDERS_KEY, JSON.stringify(orders));
                } catch (error) {
                    console.error(error);
                }

                closeOrderSheet();
                alert('Commande envoyée. Statut : Reportée (en attente de validation admin).');
            });

            const statueLabel = {
                confirme: 'Confirmée',
                annulee: 'Annulée',
                reporte: 'Reportée',
                retour: 'Retour',
            };

            const statueClass = {
                confirme: 'aff-statue-pill--ok',
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

            const loadOrders = () => {
                try {
                    const parsed = JSON.parse(localStorage.getItem(ORDERS_KEY) || '[]');
                    return Array.isArray(parsed) ? parsed : [];
                } catch {
                    return [];
                }
            };

            const saveOrders = (items) => localStorage.setItem(ORDERS_KEY, JSON.stringify(items));

            const ensureOrdersForAffiliate = () => {
                const name = (session.nom_complet || '').trim();
                if (!name) return;
                const all = loadOrders();
                const mine = all.filter(
                    (o) =>
                        String(o.affilie_nom || '').toLowerCase() === name.toLowerCase() ||
                        o.affilie_id === session.id
                );
                if (mine.length) return;

                const demo = [
                    {
                        id: `o-${session.id}-1`,
                        date: '2026-08-05',
                        affilie_id: session.id,
                        affilie_nom: name,
                        ville: session.ville || 'Casablanca',
                        n_cmd: 'CMD-25001',
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
                        id: `o-${session.id}-2`,
                        date: '2026-08-04',
                        affilie_id: session.id,
                        affilie_nom: name,
                        ville: session.ville || 'Rabat',
                        n_cmd: 'CMD-25002',
                        ref_prod: 'PRD-002',
                        designation: 'Sac MOUCHAP',
                        nom_client: 'Omar Saidi',
                        contact: '0622334455',
                        qte: 1,
                        prix_u: 320,
                        montant: 320,
                        statue: 'annulee',
                        stock: 'dispo',
                    },
                    {
                        id: `o-${session.id}-3`,
                        date: '2026-08-03',
                        affilie_id: session.id,
                        affilie_nom: name,
                        ville: session.ville || 'Marrakech',
                        n_cmd: 'CMD-25003',
                        ref_prod: 'PRD-003',
                        designation: 'Blazer rose',
                        nom_client: 'Sara Bennani',
                        contact: '0633445566',
                        qte: 1,
                        prix_u: 580,
                        montant: 580,
                        statue: 'retour',
                        stock: 'faible',
                    },
                    {
                        id: `o-${session.id}-4`,
                        date: '2026-08-02',
                        affilie_id: session.id,
                        affilie_nom: name,
                        ville: session.ville || 'Fès',
                        n_cmd: 'CMD-25004',
                        ref_prod: 'PRD-004',
                        designation: 'Pantalon crème',
                        nom_client: 'Hicham Alaoui',
                        contact: '0644556677',
                        qte: 3,
                        prix_u: 390,
                        montant: 1170,
                        statue: 'confirme',
                        stock: 'dispo',
                    },
                    {
                        id: `o-${session.id}-5`,
                        date: '2026-08-01',
                        affilie_id: session.id,
                        affilie_nom: name,
                        ville: session.ville || 'Tanger',
                        n_cmd: 'CMD-25005',
                        ref_prod: 'PRD-005',
                        designation: 'Chapeau beige',
                        nom_client: 'Meryem Zahra',
                        contact: '0655667788',
                        qte: 1,
                        prix_u: 210,
                        montant: 210,
                        statue: 'reporte',
                        stock: 'dispo',
                    },
                ];
                saveOrders([...demo, ...all]);
            };

            const myOrders = () => {
                ensureOrdersForAffiliate();
                const name = (session.nom_complet || '').trim().toLowerCase();
                return loadOrders().filter(
                    (o) =>
                        o.affilie_id === session.id ||
                        String(o.affilie_nom || '').toLowerCase() === name
                );
            };

            const renderCommandes = () => {
                const orders = myOrders();
                const confirmees = orders.filter((o) => o.statue === 'confirme');
                const annulees = orders.filter((o) => o.statue === 'annulee');
                const retours = orders.filter((o) => o.statue === 'retour');
                const totalConfirmees = confirmees.reduce((sum, o) => sum + Number(o.montant || 0), 0);
                const revenue = totalConfirmees;

                document.getElementById('aff-cmd-confirmees').textContent = String(confirmees.length);
                document.getElementById('aff-cmd-annulees').textContent = String(annulees.length);
                document.getElementById('aff-cmd-retour').textContent = String(retours.length);
                document.getElementById('aff-cmd-total-confirmees').textContent = formatMoney(totalConfirmees);
                document.getElementById('aff-cmd-revenue').textContent = formatMoney(revenue);

                const tbody = document.getElementById('aff-cmd-tbody');
                if (!tbody) return;

                if (!orders.length) {
                    tbody.innerHTML = `<tr><td colspan="10" class="admin-table__empty">Aucune commande pour le moment.</td></tr>`;
                    return;
                }

                tbody.innerHTML = orders
                    .map((o) => {
                        const st = o.statue || 'confirme';
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

                if (viewId === 'messages') {
                    const inbox = loadInbox().map((msg) =>
                        msg.affilie_id === session.id || msg.login === session.login
                            ? { ...msg, read: true }
                            : msg
                    );
                    saveInbox(inbox);
                    renderMessages();
                }

                if (viewId === 'commandes') {
                    renderCommandes();
                }

                if (viewId === 'catalogue') {
                    hideDlMenu();
                    closeSeasonGallery();
                    renderCatalogueTable();
                }
            };

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

            document.getElementById('aff-logout')?.addEventListener('click', () => {
                sessionStorage.removeItem(SESSION_KEY);
                window.location.href = '{{ url('/') }}';
            });

            document.getElementById('aff-cmd-close')?.addEventListener('click', () => {
                showView('accueil');
            });

            document.getElementById('aff-cmd-print')?.addEventListener('click', () => {
                window.print();
            });

            window.addEventListener('storage', (event) => {
                if (event.key === ORDERS_KEY) {
                    const active = document.getElementById('aff-view-commandes')?.classList.contains('is-active');
                    if (active) renderCommandes();
                }
            });

            refreshProfile();
            renderMessages();
        })();
    </script>
</body>
</html>
