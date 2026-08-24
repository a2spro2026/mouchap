<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MOUCHAP</title>
    <link rel="icon" type="image/png" href="{{ asset('images/mouchap-logo.png') }}">
    @fonts
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=cairo:600,700,900&display=swap">
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
                    <a href="#pourquoi" class="mouchap-nav__link" data-nav>
                        <span class="mouchap-nav__link-label">Pourquoi MOUCHAP</span>
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

            <div class="hero-slogan" dir="rtl" lang="ar">
                <span class="hero-slogan__glow" aria-hidden="true"></span>

                <span class="hero-slogan__sparkles" aria-hidden="true">
                    <span class="star star--1"></span>
                    <span class="star star--2"></span>
                    <span class="star star--3"></span>
                    <span class="star star--4"></span>
                    <span class="star star--5"></span>
                    <span class="star star--6"></span>
                </span>

                <p class="hero-slogan__line">
                    مع موشاب, بدا التجارة ديالك ب<span class="hero-slogan__price"><span class="hero-slogan__price-text">0 درهم</span></span>.
                </p>
                <p class="hero-slogan__line hero-slogan__line--soft">
                    السلعة الممتازة و التوصيل السريع علينا.
                </p>

                <p class="hero-slogan__punch">موشاب, فرصة العمر</p>

                <span class="hero-slogan__rule" aria-hidden="true"></span>

                <button
                    type="button"
                    class="hero-cta"
                    dir="ltr"
                    data-affilie-register
                    aria-label="Clique ICI pour votre inscription affiliation"
                >
                    <span class="hero-cta__halo" aria-hidden="true"></span>
                    <span class="hero-cta__label">Clique ICI</span>
                    <svg class="hero-cta__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h13M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </section>

        <section id="new-saison" class="content-panel">
            <div class="content-panel__inner">
                <p class="content-panel__eyebrow">Collection</p>
                <h2 class="content-panel__title">New Saison</h2>
                <p class="content-panel__text">Découvrez les campagnes de la nouvelle saison et activez les tendances du moment.</p>
            </div>
        </section>

        <section id="pourquoi" class="why-panel" dir="rtl" lang="ar">
            <span class="why-panel__aura" aria-hidden="true"></span>

            <div class="why-panel__inner">
                <header class="why-panel__head">
                    <h2 class="why-panel__title">علاش MOUCHAP بالضبط وماشي شي حد آخر ؟؟؟؟</h2>
                    <p class="why-panel__subtitle">أجي تعرف علاش :</p>
                    <span class="why-panel__rule" aria-hidden="true"></span>
                </header>

                <div class="why-grid">
                    <article class="why-card">
                        <span class="why-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/>
                                <circle cx="12" cy="12" r="3.2"/>
                            </svg>
                        </span>
                        <h3 class="why-card__title">وضوح</h3>
                        <p class="why-card__text">كلشي واضح قدامك، تشوف أرباحك وطلباتك فين وصلو فأي وقت.</p>
                    </article>

                    <article class="why-card">
                        <span class="why-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5 9.5 14l3.5 3.5L20 10"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10h5v5"/>
                            </svg>
                        </span>
                        <h3 class="why-card__title">ربح عالي</h3>
                        <p class="why-card__text">كنوفرو ليك منتجات بثمن المصنع وانت دير الثمن اللي بغيتي.</p>
                    </article>

                    <article class="why-card">
                        <span class="why-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="8.5"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.5 12.2 2.4 2.4 4.6-5"/>
                            </svg>
                        </span>
                        <h3 class="why-card__title">مجاني</h3>
                        <p class="why-card__text">التسجيل والاستعمال مجاني، ماكتخلص والو باش تبدا الخدمة.</p>
                    </article>

                    <article class="why-card">
                        <span class="why-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.2 19 6v6c0 4.2-2.9 7.3-7 8.8C7.9 19.3 5 16.2 5 12V6l7-2.8Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.2 12.4 2 2 3.6-3.9"/>
                            </svg>
                        </span>
                        <h3 class="why-card__title">أمان</h3>
                        <p class="why-card__text">حسابك محمي وفلوسك توصلك بسرعة لحسابك البنكي بلا تعقيد.</p>
                    </article>

                    <article class="why-card">
                        <span class="why-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect x="4.5" y="10" width="15" height="10" rx="2.4"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10V7.6a4 4 0 0 1 8 0V10"/>
                                <circle cx="12" cy="15" r="1.4"/>
                            </svg>
                        </span>
                        <h3 class="why-card__title">سرية</h3>
                        <p class="why-card__text">معلومات الزبائن ديالك غير عندك، وكلشي كيبقى سرّي.</p>
                    </article>

                    <article class="why-card">
                        <span class="why-card__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3.5 14.6 9l6 .9-4.3 4.2 1 6-5.3-2.8L6.7 20l1-6L3.4 9.9 9.4 9 12 3.5Z"/>
                            </svg>
                        </span>
                        <h3 class="why-card__title">مسؤولية</h3>
                        <p class="why-card__text">فريق كيوقف معاك، خدمة محترفة وثقة كبيرة من البداية حتى للتوصيل.</p>
                    </article>
                </div>
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

            <form class="admin-modal__form" id="admin-login-form" action="#" method="post" novalidate autocomplete="off">
                @csrf
                <label class="admin-field">
                    <span class="admin-field__label">Statue</span>
                    <select name="statue" id="admin-login-statue" class="admin-field__input" autocomplete="off">
                        <option value="gerant" selected>Gérant</option>
                        <option value="commercial">Commercial</option>
                        <option value="caisse">Caisse</option>
                        <option value="depot">Depot</option>
                    </select>
                    <span class="admin-field__hint">Compte par défaut : <strong>yahya</strong> / <strong>0661755048</strong></span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Login</span>
                    <div class="login-suffix">
                        <input
                            type="text"
                            name="login_user"
                            id="admin-login"
                            class="admin-field__input login-suffix__input"
                            value="yahya"
                            placeholder="yahya"
                            autocomplete="off"
                            autocapitalize="off"
                            autocorrect="off"
                            spellcheck="false"
                            required
                        >
                        <span class="login-suffix__domain" aria-hidden="true">@mouchap.com</span>
                    </div>
                    <input type="hidden" name="login" id="admin-login-full" value="yahya@mouchap.com">
                    <span class="admin-field__hint">Le suffixe <strong>@mouchap.com</strong> est ajouté automatiquement</span>
                    <span class="admin-field__error" id="admin-login-error" hidden>Saisissez un identifiant valide avant @mouchap.com</span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Mot de Passe</span>
                    <input
                        type="password"
                        name="password"
                        id="admin-password"
                        class="admin-field__input"
                        value="0661755048"
                        autocomplete="new-password"
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

            <form class="admin-modal__form" id="affilie-login-form" action="#" method="post" novalidate autocomplete="off">
                <label class="admin-field">
                    <span class="admin-field__label">Login</span>
                    <div class="login-suffix">
                        <input
                            type="text"
                            name="login_user"
                            id="affilie-login"
                            class="admin-field__input login-suffix__input"
                            placeholder="exemple"
                            autocomplete="off"
                            autocapitalize="off"
                            autocorrect="off"
                            spellcheck="false"
                            required
                        >
                        <span class="login-suffix__domain" aria-hidden="true">@mouchap.com</span>
                    </div>
                    <input type="hidden" name="login" id="affilie-login-full" value="">
                    <span class="admin-field__hint">Le suffixe <strong>@mouchap.com</strong> est ajouté automatiquement</span>
                    <span class="admin-field__error" id="affilie-login-error" hidden>Saisissez un identifiant valide avant @mouchap.com</span>
                    <span class="admin-field__error" id="affilie-auth-error" hidden>Login ou mot de passe incorrect, ou compte non validé.</span>
                </label>

                <label class="admin-field">
                    <span class="admin-field__label">Mot de Passe</span>
                    <input type="password" name="password" id="affilie-password" class="admin-field__input" autocomplete="new-password" required>
                </label>

                <div class="affilie-actions">
                    <button type="submit" class="admin-modal__submit affilie-actions__login">Se connecter</button>
                    <button type="button" class="affilie-actions__register" id="open-affilie-register" data-affilie-register>S'inscrire</button>
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
