document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('nav-toggle');
    const links = document.getElementById('mouchap-nav-links');
    const navLinks = document.querySelectorAll('[data-nav]');

    const adminModal = document.getElementById('admin-login-modal');
    const adminForm = document.getElementById('admin-login-form');

    const affilieLoginModal = document.getElementById('affilie-login-modal');
    const affilieRegisterModal = document.getElementById('affilie-register-modal');
    const affilieLoginForm = document.getElementById('affilie-login-form');
    const affilieRegisterForm = document.getElementById('affilie-register-form');
    const affilieLoginInput = document.getElementById('affilie-login');
    const affilieLoginError = document.getElementById('affilie-login-error');
    const affilieAuthError = document.getElementById('affilie-auth-error');
    const affiliePasswordInput = document.getElementById('affilie-password');
    const affilieIdInput = document.getElementById('affilie-id');
    const affilieSuccess = document.getElementById('affilie-success');
    const AFFILIATION_KEY = 'mouchap_affiliation_requests';
    const AFFILIES_KEY = 'mouchap_affilies';
    const INBOX_KEY = 'mouchap_affilie_inbox';
    const AFF_SESSION_KEY = 'mouchap_affilie_session';

    let lockedScrollY = 0;

    const closeMobileNav = () => {
        if (toggle && links && window.matchMedia('(max-width: 899px)').matches) {
            toggle.setAttribute('aria-expanded', 'false');
            links.classList.remove('is-open');
        }
    };

    const lockPageScroll = () => {
        lockedScrollY = window.scrollY || window.pageYOffset || 0;
        const scrollbar = Math.max(0, window.innerWidth - document.documentElement.clientWidth);
        document.body.style.paddingRight = scrollbar ? `${scrollbar}px` : '';
        document.body.style.top = `-${lockedScrollY}px`;
        document.body.classList.add('admin-modal-open');

        const nav = document.querySelector('.mouchap-nav');
        if (nav && scrollbar) {
            nav.style.paddingRight = `${scrollbar}px`;
        }
    };

    const unlockPageScroll = () => {
        document.body.classList.remove('admin-modal-open');
        document.body.style.paddingRight = '';
        document.body.style.top = '';
        const nav = document.querySelector('.mouchap-nav');
        if (nav) {
            nav.style.paddingRight = '';
        }
        window.scrollTo(0, lockedScrollY);
    };

    const openModal = (modal, focusSelector = '.admin-field__input') => {
        if (!modal) {
            return;
        }
        if (!document.body.classList.contains('admin-modal-open')) {
            lockPageScroll();
        }
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        window.setTimeout(() => {
            modal.querySelector(focusSelector)?.focus({ preventScroll: true });
        }, 180);
    };

    const closeModal = (modal) => {
        if (!modal) {
            return;
        }
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        if (!document.querySelector('.admin-modal.is-open')) {
            unlockPageScroll();
        }
    };

    const openAdminModal = (event) => {
        event?.preventDefault();
        event?.stopPropagation();
        closeMobileNav();
        closeModal(affilieLoginModal);
        closeModal(affilieRegisterModal);
        openModal(adminModal);
    };

    const openAffilieLogin = (event) => {
        event?.preventDefault();
        event?.stopPropagation();
        closeMobileNav();
        closeModal(adminModal);
        closeModal(affilieRegisterModal);
        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }
        openModal(affilieLoginModal, '#affilie-login');
    };

    const nextAffilieId = () => {
        const year = 2026;
        let maxSeq = 0;

        try {
            const existing = JSON.parse(localStorage.getItem(AFFILIATION_KEY) || '[]');
            if (Array.isArray(existing)) {
                existing.forEach((item) => {
                    const match = String(item?.id || '').match(/^(\d{4})\/(\d+)$/);
                    if (match && Number(match[1]) === year) {
                        maxSeq = Math.max(maxSeq, Number(match[2]));
                    }
                });
            }
        } catch {
            // ignore
        }

        return `${year}/${String(maxSeq + 1).padStart(5, '0')}`;
    };

    const openAffilieRegister = (event) => {
        event?.preventDefault();
        event?.stopPropagation();
        closeModal(affilieLoginModal);
        if (affilieIdInput) {
            affilieIdInput.value = nextAffilieId();
        }
        if (affilieSuccess) {
            affilieSuccess.hidden = true;
        }
        affilieRegisterForm?.classList.remove('is-success');
        openModal(affilieRegisterModal, 'input[name="nom_complet"]');
    };

    if (toggle && links) {
        toggle.addEventListener('click', () => {
            const open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!open));
            links.classList.toggle('is-open', !open);
        });
    }

    // Un seul handler par déclencheur (évite double ouverture / saut de page)
    document.querySelectorAll('[data-admin-login]').forEach((el) => {
        el.addEventListener('click', openAdminModal);
    });
    document.querySelectorAll('[data-admin-close]').forEach((el) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();
            closeModal(adminModal);
        });
    });

    document.querySelectorAll('[data-affilie-login]').forEach((el) => {
        el.addEventListener('click', openAffilieLogin);
    });
    document.querySelectorAll('[data-affilie-close]').forEach((el) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();
            closeModal(affilieLoginModal);
        });
    });
    document.querySelectorAll('[data-affilie-register-close]').forEach((el) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();
            closeModal(affilieRegisterModal);
        });
    });

    document.getElementById('open-affilie-register')?.addEventListener('click', openAffilieRegister);

    navLinks.forEach((link) => {
        if (link.hasAttribute('data-admin-login') || link.hasAttribute('data-affilie-login')) {
            return;
        }
        link.addEventListener('click', () => closeMobileNav());
    });

    document.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') {
            return;
        }
        if (affilieRegisterModal?.classList.contains('is-open')) {
            closeModal(affilieRegisterModal);
            return;
        }
        if (affilieLoginModal?.classList.contains('is-open')) {
            closeModal(affilieLoginModal);
            return;
        }
        if (adminModal?.classList.contains('is-open')) {
            closeModal(adminModal);
        }
    });

    adminForm?.addEventListener('submit', (event) => {
        event.preventDefault();
        adminForm.classList.add('is-success');
        window.setTimeout(() => {
            window.location.href = '/admin';
        }, 450);
    });

    const isValidMouchapLogin = (value) => /.+@mouchap\.com$/i.test(value.trim());

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

    const pushAffilieMessage = (affilie, body, title = "Confirmation d'affiliation") => {
        try {
            const inbox = JSON.parse(localStorage.getItem(INBOX_KEY) || '[]');
            const list = Array.isArray(inbox) ? inbox : [];
            list.unshift({
                id: `msg-${Date.now()}`,
                type: 'validation',
                affilie_id: affilie.id,
                login: affilie.login,
                title,
                body,
                created_at: new Date().toISOString(),
                read: false,
            });
            localStorage.setItem(INBOX_KEY, JSON.stringify(list));
        } catch (error) {
            console.error(error);
        }
    };

    const createAffilieFromRequest = (req) => {
        const base =
            String(req.nom_complet || 'affilie')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '.')
                .replace(/^\.+|\.+$/g, '')
                .slice(0, 24) || 'affilie';

        const affilie = {
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
            login: `${base}@mouchap.com`,
            password: `Mh${Math.random().toString(36).slice(2, 8)}`,
        };

        try {
            const list = JSON.parse(localStorage.getItem(AFFILIES_KEY) || '[]');
            const items = Array.isArray(list) ? list : [];
            const existingIndex = items.findIndex((item) => item.id === req.id);
            if (existingIndex >= 0) {
                return items[existingIndex];
            }
            items.unshift(affilie);
            localStorage.setItem(AFFILIES_KEY, JSON.stringify(items));
        } catch (error) {
            console.error(error);
        }

        return affilie;
    };

    affilieLoginForm?.addEventListener('submit', (event) => {
        event.preventDefault();
        const login = (affilieLoginInput?.value || '').trim();
        const password = affiliePasswordInput?.value || '';

        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }

        if (!isValidMouchapLogin(login)) {
            if (affilieLoginError) {
                affilieLoginError.hidden = false;
            }
            affilieLoginInput?.focus({ preventScroll: true });
            return;
        }
        if (affilieLoginError) {
            affilieLoginError.hidden = true;
        }

        let affilies = [];
        try {
            affilies = JSON.parse(localStorage.getItem(AFFILIES_KEY) || '[]');
            if (!Array.isArray(affilies)) affilies = [];
        } catch {
            affilies = [];
        }

        const account = affilies.find(
            (item) =>
                String(item.login || '').toLowerCase() === login.toLowerCase() &&
                String(item.password || '') === password &&
                item.statue !== 'susp'
        );

        if (!account) {
            if (affilieAuthError) {
                affilieAuthError.hidden = false;
            }
            return;
        }

        sessionStorage.setItem(AFF_SESSION_KEY, JSON.stringify(account));
        affilieLoginForm.classList.add('is-success');
        window.setTimeout(() => {
            window.location.href = '/affilie';
        }, 400);
    });

    affilieLoginInput?.addEventListener('input', () => {
        if (affilieLoginError) {
            affilieLoginError.hidden = true;
        }
        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }
    });

    affiliePasswordInput?.addEventListener('input', () => {
        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }
    });

    affilieRegisterForm?.addEventListener('submit', (event) => {
        event.preventDefault();

        const contact = affilieRegisterForm.querySelector('[name="contact"]');
        const rib = affilieRegisterForm.querySelector('[name="rib"]');

        if (contact && !/^[0-9]{10}$/.test(contact.value)) {
            contact.focus({ preventScroll: true });
            contact.reportValidity();
            return;
        }

        if (rib && !/^[0-9]{24}$/.test(rib.value)) {
            rib.focus({ preventScroll: true });
            rib.reportValidity();
            return;
        }

        if (!affilieRegisterForm.checkValidity()) {
            affilieRegisterForm.reportValidity();
            return;
        }

        const formData = new FormData(affilieRegisterForm);
        const request = {
            id: formData.get('id') || nextAffilieId(),
            nom_complet: formData.get('nom_complet') || '',
            titre: formData.get('titre') || '',
            cin: formData.get('cin') || '',
            contact: formData.get('contact') || '',
            ville: formData.get('ville') || '',
            rib: formData.get('rib') || '',
            banque: formData.get('banque') || '',
            status: 'pending',
            created_at: new Date().toISOString(),
        };

        try {
            const existing = JSON.parse(localStorage.getItem(AFFILIATION_KEY) || '[]');
            existing.unshift(request);
            localStorage.setItem(AFFILIATION_KEY, JSON.stringify(existing));
        } catch (error) {
            console.error(error);
        }

        affilieRegisterForm.classList.add('is-success');
        if (affilieSuccess) {
            affilieSuccess.hidden = false;
        }
    });

    affilieRegisterForm?.querySelector('[name="contact"]')?.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '').slice(0, 10);
    });
    affilieRegisterForm?.querySelector('[name="rib"]')?.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '').slice(0, 24);
    });

    const sections = document.querySelectorAll('main section[id]');
    const syncActive = () => {
        let current = 'home';
        sections.forEach((section) => {
            if (section.getBoundingClientRect().top <= 140) {
                current = section.id;
            }
        });
        navLinks.forEach((link) => {
            if (link.hasAttribute('data-admin-login') || link.hasAttribute('data-affilie-login')) {
                return;
            }
            const id = link.getAttribute('href')?.replace('#', '');
            link.classList.toggle('is-active', id === current);
        });
    };

    window.addEventListener('scroll', syncActive, { passive: true });
    syncActive();

    // ——— Notifications admin (demandes d'affiliation) ———
    const STORAGE_KEY = 'mouchap_affiliation_requests';
    const notifBtn = document.getElementById('admin-notif-btn');
    const notifPanel = document.getElementById('admin-notif-panel');
    const notifBadge = document.getElementById('admin-notif-badge');
    const notifCount = document.getElementById('admin-notif-count');
    const notifList = document.getElementById('admin-notif-list');

    const readRequests = () => {
        try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
        } catch {
            return [];
        }
    };

    const writeRequests = (items) => {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
    };

    const statusLabel = {
        pending: 'En attente',
        validated: 'Validée',
        cancelled: 'Annulée',
        suspended: 'Suspendue',
    };

    const renderNotifications = () => {
        if (!notifList) {
            return;
        }

        const items = readRequests();
        const pending = items.filter((item) => item.status === 'pending');

        if (notifBadge) {
            if (pending.length > 0) {
                notifBadge.hidden = false;
                notifBadge.textContent = String(pending.length);
            } else {
                notifBadge.hidden = true;
            }
        }

        if (notifCount) {
            notifCount.textContent = `${pending.length} en attente`;
        }

        if (items.length === 0) {
            notifList.innerHTML = '<p class="admin-notif__empty">Aucune nouvelle demande.</p>';
            return;
        }

        notifList.innerHTML = items
            .map((item) => {
                const date = item.created_at
                    ? new Date(item.created_at).toLocaleString('fr-FR')
                    : '';
                const actions =
                    item.status === 'pending'
                        ? `<div class="admin-notif__actions">
                            <button type="button" class="notif-action notif-action--ok" data-req-id="${item.id}" data-req-action="validated">Valider</button>
                            <button type="button" class="notif-action notif-action--ko" data-req-id="${item.id}" data-req-action="cancelled">Annuler</button>
                            <button type="button" class="notif-action notif-action--warn" data-req-id="${item.id}" data-req-action="suspended">Suspendre</button>
                           </div>`
                        : `<p class="admin-notif__status admin-notif__status--${item.status}">${statusLabel[item.status] || item.status}</p>`;

                return `<article class="admin-notif__item" data-id="${item.id}">
                    <div class="admin-notif__item-top">
                        <strong>${item.nom_complet || 'Sans nom'}</strong>
                        <span>${item.id || ''}</span>
                    </div>
                    <p class="admin-notif__meta">${item.titre || '—'} · ${item.ville || '—'} · ${item.contact || '—'} · ${item.cin || '—'}</p>
                    <p class="admin-notif__meta">${item.banque || '—'} · RIB ${item.rib || '—'}</p>
                    <p class="admin-notif__date">${date}</p>
                    ${actions}
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
            if (!root || root.contains(event.target)) {
                return;
            }
            notifPanel.hidden = true;
            notifBtn.setAttribute('aria-expanded', 'false');
        });

        notifList?.addEventListener('click', (event) => {
            const btn = event.target.closest('[data-req-action]');
            if (!btn) {
                return;
            }
            const id = btn.getAttribute('data-req-id');
            const action = btn.getAttribute('data-req-action');
            const items = readRequests().map((item) =>
                item.id === id ? { ...item, status: action, updated_at: new Date().toISOString() } : item
            );
            writeRequests(items);

            if (action === 'validated') {
                const req = items.find((item) => item.id === id);
                if (req) {
                    const affilie = createAffilieFromRequest(req);
                    const body =
                        `Bonjour ${affilie.nom_complet || ''},\n\n` +
                        `Votre demande d'affiliation (${affilie.id}) a été validée.\n` +
                        `Vous pouvez vous connecter à l'espace affilié avec :\n` +
                        `Login : ${affilie.login}\n` +
                        `Mot de passe : ${affilie.password}\n\n` +
                        `Bienvenue dans le réseau MOUCHAP.`;
                    pushAffilieMessage(affilie, body);
                    showAdminToast(
                        `Message de confirmation envoyé à ${affilie.nom_complet || affilie.login}`
                    );
                }
            }

            renderNotifications();
            window.dispatchEvent(new CustomEvent('mouchap:affilies-updated'));
        });

        renderNotifications();
        window.addEventListener('storage', (event) => {
            if (event.key === STORAGE_KEY) {
                renderNotifications();
            }
        });
    }
});
