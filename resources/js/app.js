const authCard = document.querySelector('[data-auth-card]');

if (authCard) {
    const setAuthMode = (mode, updateHistory = false) => {
        const isRegister = mode === 'register';

        authCard.classList.toggle('is-register', isRegister);
        authCard.dataset.registerMode = String(isRegister);

        authCard.querySelectorAll('[data-auth-panel]').forEach((panel) => {
            const isActive = panel.dataset.authPanel === mode;

            panel.setAttribute('aria-hidden', String(!isActive));
            panel.inert = !isActive;
        });

        document.title = isRegister ? authCard.dataset.registerTitle : authCard.dataset.loginTitle;

        if (updateHistory) {
            const activeLink = authCard.querySelector(`[data-auth-mode="${mode}"]`);

            if (activeLink) {
                window.history.pushState(null, '', activeLink.href);
            }
        }
    };

    authCard.querySelectorAll('[data-auth-mode]').forEach((link) => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            setAuthMode(link.dataset.authMode, true);
        });
    });

    window.addEventListener('popstate', () => {
        setAuthMode(window.location.pathname.endsWith('/register') ? 'register' : 'login');
    });

    setAuthMode(authCard.dataset.registerMode === 'true' ? 'register' : 'login');
}
