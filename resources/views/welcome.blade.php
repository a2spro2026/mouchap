<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOUCHAP</title>
    <link rel="icon" type="image/png" href="{{ asset('images/mouchap-logo.png') }}">
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 overflow-x-hidden photo-page">
    <nav class="mouchap-nav" aria-label="Navigation principale">
        <div class="mouchap-nav__inner">
            <a href="#home" class="mouchap-nav__brand" aria-label="MOUCHAP Accueil">
                <img
                    src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}"
                    alt=""
                    class="mouchap-nav__logo"
                >
                <span class="mouchap-nav__brand-text">MOUCHAP</span>
            </a>

            <button
                type="button"
                class="mouchap-nav__toggle"
                id="nav-toggle"
                aria-expanded="false"
                aria-controls="mouchap-nav-links"
                aria-label="Ouvrir le menu"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="mouchap-nav__links" id="mouchap-nav-links">
                <li>
                    <a href="#home" class="mouchap-nav__link is-active" data-nav>
                        <span class="mouchap-nav__link-label">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#new-saison" class="mouchap-nav__link" data-nav>
                        <span class="mouchap-nav__link-label">New Saison</span>
                    </a>
                </li>
                <li>
                    <a href="#categorie" class="mouchap-nav__link" data-nav>
                        <span class="mouchap-nav__link-label">Catégorie</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="mouchap-nav__link" data-nav data-affilie-login>
                        <span class="mouchap-nav__link-label">Affiliation</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="mouchap-nav__link mouchap-nav__link--admin" id="open-admin-login" data-nav data-admin-login>
                        <span class="mouchap-nav__link-label">Admin</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <section id="home" class="hero-panel">
            <img
                src="{{ asset('images/hero-mouchap.png') }}?v={{ filemtime(public_path('images/hero-mouchap.png')) }}"
                alt="MOUCHAP — Plateforme d'affiliation"
                class="photo-fill"
            >
        </section>

        <section id="new-saison" class="content-panel">
            <div class="content-panel__inner">
                <p class="content-panel__eyebrow">Collection</p>
                <h2 class="content-panel__title">New Saison</h2>
                <p class="content-panel__text">Découvrez les campagnes de la nouvelle saison et activez les tendances du moment.</p>
            </div>
        </section>

        <section id="categorie" class="content-panel content-panel--alt">
            <div class="content-panel__inner">
                <p class="content-panel__eyebrow">Explorer</p>
                <h2 class="content-panel__title">Catégorie</h2>
                <p class="content-panel__text">Mode, beauté, lifestyle — trouvez la niche qui correspond à votre audience.</p>
            </div>
        </section>

        <section id="affiliation" class="content-panel">
            <div class="content-panel__inner">
                <p class="content-panel__eyebrow">Programme</p>
                <h2 class="content-panel__title">Affiliation</h2>
                <p class="content-panel__text">Rejoignez le réseau MOUCHAP et monétisez votre influence avec des commissions transparentes.</p>
                <button type="button" class="admin-open-btn" data-affilie-login>Espace affilié</button>
            </div>
        </section>

        <section id="admin" class="content-panel content-panel--admin">
            <div class="content-panel__inner">
                <p class="content-panel__eyebrow">Espace privé</p>
                <h2 class="content-panel__title">Admin</h2>
                <p class="content-panel__text">Gestion des campagnes, affiliés et paiements — accès réservé.</p>
                <button type="button" class="admin-open-btn" data-admin-login>Ouvrir la connexion</button>
            </div>
        </section>
    </main>

    {{-- Panneau connexion Admin --}}
    <div class="admin-modal" id="admin-login-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="admin-login-title">
        <div class="admin-modal__backdrop" data-admin-close></div>
        <div class="admin-modal__panel">
            <div class="admin-modal__shine" aria-hidden="true"></div>
            <div class="admin-modal__orbs" aria-hidden="true">
                <span></span><span></span><span></span>
            </div>

            <button type="button" class="admin-modal__close" data-admin-close aria-label="Fermer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>

            <div class="admin-modal__header">
                <img
                    src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}"
                    alt=""
                    class="admin-modal__logo"
                >
                <p class="admin-modal__eyebrow">Accès sécurisé</p>
                <h2 id="admin-login-title" class="admin-modal__title">Administration</h2>
                <p class="admin-modal__subtitle">Connectez-vous à l'espace MOUCHAP</p>
            </div>

            <form class="admin-modal__form" id="admin-login-form" action="#" method="post">
                @csrf
                <label class="admin-field">
                    <span class="admin-field__label">Statue</span>
                    <input
                        type="text"
                        name="statue"
                        class="admin-field__input"
                        value="admin"
                        autocomplete="organization-title"
                        required
                    >
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Login</span>
                    <input
                        type="text"
                        name="login"
                        class="admin-field__input"
                        value="bilal"
                        autocomplete="username"
                        required
                    >
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Mot de Passe</span>
                    <input
                        type="password"
                        name="password"
                        class="admin-field__input"
                        value="password"
                        autocomplete="current-password"
                        required
                    >
                </label>

                <button type="submit" class="admin-modal__submit">
                    <span>Se connecter</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    {{-- Panneau connexion Affilié --}}
    <div class="admin-modal" id="affilie-login-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="affilie-login-title">
        <div class="admin-modal__backdrop" data-affilie-close></div>
        <div class="admin-modal__panel">
            <div class="admin-modal__shine" aria-hidden="true"></div>
            <div class="admin-modal__orbs" aria-hidden="true"><span></span><span></span><span></span></div>

            <button type="button" class="admin-modal__close" data-affilie-close aria-label="Fermer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>

            <div class="admin-modal__header">
                <img src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}" alt="" class="admin-modal__logo">
                <p class="admin-modal__eyebrow">Espace affilié</p>
                <h2 id="affilie-login-title" class="admin-modal__title">Affiliation</h2>
                <p class="admin-modal__subtitle">Connectez-vous ou créez votre demande</p>
            </div>

            <form class="admin-modal__form" id="affilie-login-form" action="#" method="post" novalidate>
                <label class="admin-field">
                    <span class="admin-field__label">Login</span>
                    <input
                        type="email"
                        name="login"
                        id="affilie-login"
                        class="admin-field__input"
                        placeholder="exemple@mouchap.com"
                        pattern=".+@mouchap\.com$"
                        title="Le login doit se terminer par @mouchap.com"
                        autocomplete="username"
                        required
                    >
                    <span class="admin-field__hint">Doit se terminer par <strong>@mouchap.com</strong></span>
                    <span class="admin-field__error" id="affilie-login-error" hidden>Le login doit se terminer par @mouchap.com</span>
                    <span class="admin-field__error" id="affilie-auth-error" hidden>Login ou mot de passe incorrect, ou compte non validé.</span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Mot de Passe</span>
                    <input type="password" name="password" id="affilie-password" class="admin-field__input" autocomplete="current-password" required>
                </label>

                <div class="affilie-actions">
                    <button type="submit" class="admin-modal__submit affilie-actions__login">Se connecter</button>
                    <button type="button" class="affilie-actions__register" id="open-affilie-register">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Panneau inscription Affilié --}}
    <div class="admin-modal" id="affilie-register-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="affilie-register-title">
        <div class="admin-modal__backdrop" data-affilie-register-close></div>
        <div class="admin-modal__panel admin-modal__panel--wide">
            <div class="admin-modal__shine" aria-hidden="true"></div>
            <div class="admin-modal__orbs" aria-hidden="true"><span></span><span></span><span></span></div>

            <button type="button" class="admin-modal__close" data-affilie-register-close aria-label="Fermer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>

            <div class="admin-modal__header">
                <img src="{{ asset('images/mouchap-logo.png') }}?v={{ filemtime(public_path('images/mouchap-logo.png')) }}" alt="" class="admin-modal__logo">
                <p class="admin-modal__eyebrow">Nouvelle demande</p>
                <h2 id="affilie-register-title" class="admin-modal__title">S'inscrire</h2>
                <p class="admin-modal__subtitle">Remplissez vos informations d'affiliation</p>
            </div>

            <form class="admin-modal__form" id="affilie-register-form" action="#" method="post" novalidate>
                <label class="admin-field">
                    <span class="admin-field__label">ID</span>
                    <input type="text" name="id" id="affilie-id" class="admin-field__input" readonly>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Nom Complet</span>
                    <input type="text" name="nom_complet" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Titre</span>
                    <input type="text" name="titre" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">CIN</span>
                    <input type="text" name="cin" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Contact</span>
                    <input
                        type="tel"
                        name="contact"
                        class="admin-field__input"
                        inputmode="numeric"
                        pattern="[0-9]{10}"
                        maxlength="10"
                        placeholder="0612345678"
                        title="Exactement 10 chiffres"
                        required
                    >
                    <span class="admin-field__hint">Exactement 10 chiffres</span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Ville</span>
                    <input type="text" name="ville" class="admin-field__input" required>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">RIB</span>
                    <input
                        type="text"
                        name="rib"
                        class="admin-field__input"
                        inputmode="numeric"
                        pattern="[0-9]{24}"
                        maxlength="24"
                        placeholder="24 chiffres"
                        title="Exactement 24 chiffres"
                        required
                    >
                    <span class="admin-field__hint">Exactement 24 chiffres</span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Banque</span>
                    <input type="text" name="banque" class="admin-field__input" required>
                </label>

                <button type="submit" class="admin-modal__submit">Envoyer</button>

                <div class="affilie-success" id="affilie-success" hidden role="status">
                    <p class="affilie-success__text">
                        Merci pour votre demande d'affiliation. Un(e) de nos commerciaux vous contactera dans les brefs délais.
                    </p>
                    <button type="button" class="affilie-success__close" id="affilie-success-close" data-affilie-register-close>
                        Fermer
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
