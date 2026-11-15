import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

// Fix Vite marker icon issue (standard Leaflet bug in bundlers)
import markerIcon from 'leaflet/dist/images/marker-icon.png';
import markerIcon2x from 'leaflet/dist/images/marker-icon-2x.png';
import markerShadow from 'leaflet/dist/images/marker-shadow.png';

delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
    iconRetinaUrl: markerIcon2x,
    iconUrl: markerIcon,
    shadowUrl: markerShadow,
});

// Single Cafe Map
const el = document.getElementById('cafe-map');
if (el) {
    const { lat, lng, name } = el.dataset;
    const map = L.map(el).setView([lat, lng], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors',
    }).addTo(map);

    L.marker([lat, lng]).addTo(map).bindPopup(`<b>${name}</b>`).openPopup();
}

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
