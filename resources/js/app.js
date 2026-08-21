const csrfToken = () =>
    document.querySelector('meta[name="csrf-token"]')?.content ||
    document.querySelector('input[name="_token"]')?.value ||
    '';

window.mouchapApi = async (url, options = {}) => {
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
    if (!response.ok) {
        throw new Error(data.message || 'Erreur serveur');
    }
    return data;
};

const bootMouchapUi = () => {

    const toggle = document.getElementById('nav-toggle');
    const links = document.getElementById('mouchap-nav-links');
    const navLinks = document.querySelectorAll('[data-nav]');

    const adminModal = document.getElementById('admin-login-modal');
    const adminForm = document.getElementById('admin-login-form');
    const adminLoginInput = document.getElementById('admin-login');
    const adminLoginFull = document.getElementById('admin-login-full');
    const adminLoginError = document.getElementById('admin-login-error');
    const adminPasswordInput = document.getElementById('admin-password');
    const adminStatueSelect = document.getElementById('admin-login-statue');

    const affilieLoginModal = document.getElementById('affilie-login-modal');
    const affilieRegisterModal = document.getElementById('affilie-register-modal');
    const affilieLoginForm = document.getElementById('affilie-login-form');
    const affilieRegisterForm = document.getElementById('affilie-register-form');
    const affilieLoginInput = document.getElementById('affilie-login');
    const affilieLoginFull = document.getElementById('affilie-login-full');
    const affilieLoginError = document.getElementById('affilie-login-error');
    const affilieAuthError = document.getElementById('affilie-auth-error');
    const affiliePasswordInput = document.getElementById('affilie-password');
    const affilieIdInput = document.getElementById('affilie-id');
    const affilieSuccess = document.getElementById('affilie-success');
    const LOGIN_DOMAIN = '@mouchap.com';

    const normalizeLoginUser = (value) =>
        String(value || '')
            .trim()
            .toLowerCase()
            .replace(/@mouchap\.com$/i, '')
            .replace(/@.*$/, '')
            .replace(/\s+/g, '');

    const buildMouchapLogin = (value) => {
        const user = normalizeLoginUser(value);
        return user ? `${user}${LOGIN_DOMAIN}` : '';
    };

    const isValidMouchapLogin = (value) => /^[^@\s]+@mouchap\.com$/i.test(String(value || '').trim());

    const syncLoginField = (input, hidden) => {
        if (!input || !hidden) return '';
        const login = buildMouchapLogin(input.value);
        hidden.value = login;
        return login;
    };

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

    const clearAdminLoginForm = () => {
        adminForm?.reset();
        adminForm?.classList.remove('is-success');
        if (adminStatueSelect) {
            adminStatueSelect.selectedIndex = 0;
        }
        if (adminLoginInput) {
            adminLoginInput.value = '';
        }
        if (adminLoginFull) {
            adminLoginFull.value = '';
        }
        if (adminPasswordInput) {
            adminPasswordInput.value = '';
        }
        if (adminLoginError) {
            adminLoginError.hidden = true;
        }
    };

    const clearAffilieLoginForm = () => {
        affilieLoginForm?.reset();
        affilieLoginForm?.classList.remove('is-success');
        if (affilieLoginInput) {
            affilieLoginInput.value = '';
        }
        if (affilieLoginFull) {
            affilieLoginFull.value = '';
        }
        if (affiliePasswordInput) {
            affiliePasswordInput.value = '';
        }
        if (affilieLoginError) {
            affilieLoginError.hidden = true;
        }
        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }
    };

    const closeModal = (modal) => {
        if (!modal) {
            return;
        }
        if (modal === adminModal) {
            clearAdminLoginForm();
        }
        if (modal === affilieLoginModal) {
            clearAffilieLoginForm();
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
        clearAdminLoginForm();
        openModal(adminModal);
    };

    const openAffilieLogin = (event) => {
        event?.preventDefault();
        event?.stopPropagation();
        closeMobileNav();
        closeModal(adminModal);
        closeModal(affilieRegisterModal);
        clearAffilieLoginForm();
        openModal(affilieLoginModal, '#affilie-login');
    };

    const openAffilieRegister = async (event) => {
        event?.preventDefault();
        event?.stopPropagation();
        closeModal(affilieLoginModal);
        if (affilieIdInput) {
            try {
                const data = await window.mouchapApi('/api/affiliation-requests/next-code');
                affilieIdInput.value = data.id;
            } catch {
                affilieIdInput.value = '';
            }
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

    document.querySelectorAll('[data-affilie-register]').forEach((el) => {
        el.addEventListener('click', openAffilieRegister);
    });

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

    const isValidMouchapLocal = (value) => /^[a-z0-9](?:[a-z0-9._-]*[a-z0-9])?$/i.test(normalizeLoginUser(value));

    adminForm?.addEventListener('submit', async (event) => {
        event.preventDefault();

        const login = syncLoginField(adminLoginInput, adminLoginFull);

        if (!isValidMouchapLocal(adminLoginInput?.value || '') || !isValidMouchapLogin(login)) {
            if (adminLoginError) {
                adminLoginError.hidden = false;
            }
            adminLoginInput?.focus({ preventScroll: true });
            return;
        }

        if (adminLoginError) {
            adminLoginError.hidden = true;
        }
        if (!adminForm.checkValidity()) {
            adminForm.reportValidity();
            return;
        }

        try {
            await window.mouchapApi('/api/auth/admin/login', {
                method: 'POST',
                body: {
                    login,
                    password: adminPasswordInput?.value || '',
                    statue: adminStatueSelect?.value || null,
                },
            });
            adminForm.classList.add('is-success');
            window.setTimeout(() => {
                window.location.href = '/admin';
            }, 350);
        } catch (error) {
            alert(error.message || 'Connexion admin impossible.');
        }
    });

    adminLoginInput?.addEventListener('input', () => {
        syncLoginField(adminLoginInput, adminLoginFull);
        if (adminLoginError) {
            adminLoginError.hidden = true;
        }
    });

    adminLoginInput?.addEventListener('blur', () => {
        if (!adminLoginInput) return;
        adminLoginInput.value = normalizeLoginUser(adminLoginInput.value);
        syncLoginField(adminLoginInput, adminLoginFull);
    });

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

    affilieLoginForm?.addEventListener('submit', async (event) => {
        event.preventDefault();
        const login = syncLoginField(affilieLoginInput, affilieLoginFull);
        const password = affiliePasswordInput?.value || '';

        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }

        if (!isValidMouchapLocal(affilieLoginInput?.value || '') || !isValidMouchapLogin(login)) {
            if (affilieLoginError) {
                affilieLoginError.hidden = false;
            }
            affilieLoginInput?.focus({ preventScroll: true });
            return;
        }
        if (affilieLoginError) {
            affilieLoginError.hidden = true;
        }

        try {
            await window.mouchapApi('/api/auth/affilie/login', {
                method: 'POST',
                body: { login, password },
            });
            affilieLoginForm.classList.add('is-success');
            window.setTimeout(() => {
                window.location.href = '/affilie';
            }, 350);
        } catch (error) {
            if (affilieAuthError) {
                affilieAuthError.hidden = false;
                affilieAuthError.textContent = error.message || 'Login ou mot de passe incorrect.';
            }
        }
    });

    affilieLoginInput?.addEventListener('input', () => {
        syncLoginField(affilieLoginInput, affilieLoginFull);
        if (affilieLoginError) {
            affilieLoginError.hidden = true;
        }
        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }
    });

    affilieLoginInput?.addEventListener('blur', () => {
        if (!affilieLoginInput) return;
        affilieLoginInput.value = normalizeLoginUser(affilieLoginInput.value);
        syncLoginField(affilieLoginInput, affilieLoginFull);
    });

    affiliePasswordInput?.addEventListener('input', () => {
        if (affilieAuthError) {
            affilieAuthError.hidden = true;
        }
    });

    affilieRegisterForm?.addEventListener('submit', async (event) => {
        event.preventDefault();

        const contact = affilieRegisterForm.querySelector('[name="contact"]');
        const rib = affilieRegisterForm.querySelector('[name="rib"]');
        const submitBtn = affilieRegisterForm.querySelector('[type="submit"]');

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

        if (submitBtn?.disabled) {
            return;
        }

        const formData = new FormData(affilieRegisterForm);
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Envoi…';
        }

        try {
            await window.mouchapApi('/api/affiliation-requests', {
                method: 'POST',
                body: {
                    nom_complet: formData.get('nom_complet') || '',
                    titre: formData.get('titre') || '',
                    cin: formData.get('cin') || '',
                    contact: formData.get('contact') || '',
                    ville: formData.get('ville') || '',
                    rib: formData.get('rib') || '',
                    banque: formData.get('banque') || '',
                },
            });

            affilieRegisterForm.classList.add('is-success');
            if (affilieSuccess) {
                affilieSuccess.hidden = false;
            }
        } catch (error) {
            alert(error.message || 'Envoi impossible.');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Envoyer';
            }
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

    // Les notifications admin sont gérées dans admin/dashboard.blade.php
    const notifBtn = document.body.classList.contains('admin-dashboard-body')
        ? null
        : document.getElementById('admin-notif-btn');
    const notifPanel = document.getElementById('admin-notif-panel');
    const notifBadge = document.getElementById('admin-notif-badge');
    const notifCount = document.getElementById('admin-notif-count');
    const notifList = document.getElementById('admin-notif-list');

    const statusLabel = {
        pending: 'En attente',
        validated: 'Validée',
        cancelled: 'Annulée',
        suspended: 'Suspendue',
    };

    const renderNotifications = async () => {
        if (!notifList) {
            return;
        }

        let items = [];
        try {
            const data = await window.mouchapApi('/api/admin/affiliation-requests');
            items = Array.isArray(data) ? data : [];
        } catch {
            notifList.innerHTML = '<p class="admin-notif__empty">Impossible de charger les demandes.</p>';
            return;
        }

        const visibleItems = items.filter(
            (item) => item.status !== 'cancelled' && item.status !== 'suspended'
        );
        const pending = visibleItems.filter((item) => item.status === 'pending');

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

        if (visibleItems.length === 0) {
            notifList.innerHTML = '<p class="admin-notif__empty">Aucune nouvelle demande.</p>';
            return;
        }

        notifList.innerHTML = visibleItems
            .map((item) => {
                const date = item.created_at
                    ? new Date(item.created_at).toLocaleString('fr-FR')
                    : '';
                const actions =
                    item.status === 'pending'
                        ? `<div class="admin-notif__actions">
                            <button type="button" class="notif-action notif-action--ok" data-req-uid="${item.uid}" data-req-action="validated">Valider</button>
                            <button type="button" class="notif-action notif-action--ko" data-req-uid="${item.uid}" data-req-action="cancelled">Annuler</button>
                            <button type="button" class="notif-action notif-action--warn" data-req-uid="${item.uid}" data-req-action="suspended">Suspendre</button>
                           </div>`
                        : `<p class="admin-notif__status admin-notif__status--${item.status}">${statusLabel[item.status] || item.status}</p>`;

                return `<article class="admin-notif__item" data-id="${item.uid}">
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

        notifList?.addEventListener('click', async (event) => {
            const btn = event.target.closest('[data-req-action]');
            if (!btn) {
                return;
            }
            const uid = btn.getAttribute('data-req-uid');
            const action = btn.getAttribute('data-req-action');
            try {
                const result = await window.mouchapApi(`/api/admin/affiliation-requests/${uid}/status`, {
                    method: 'PATCH',
                    body: { status: action },
                });
                if (result.message) {
                    showAdminToast(result.message);
                }
                await renderNotifications();
                window.dispatchEvent(new CustomEvent('mouchap:affilies-updated'));
            } catch (error) {
                alert(error.message || 'Action impossible.');
            }
        });

        renderNotifications();
    }

    clearAdminLoginForm();
    clearAffilieLoginForm();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootMouchapUi);
} else {
    bootMouchapUi();
}
