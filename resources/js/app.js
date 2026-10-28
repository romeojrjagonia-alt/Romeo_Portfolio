import './bootstrap';

const body = document.body;

// Dark mode toggle: persists choice, falls back to the OS preference.
const applyTheme = (dark) => {
    body.classList.toggle('dark', dark);
    document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
        btn.setAttribute('aria-pressed', String(dark));
    });
};

let stored = null;
try {
    stored = localStorage.getItem('theme');
} catch (e) {}
applyTheme(stored ? stored === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches);

document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const dark = !body.classList.contains('dark');
        applyTheme(dark);
        try {
            localStorage.setItem('theme', dark ? 'dark' : 'light');
        } catch (e) {}
    });
});

// Mobile navigation.
const menuBtn = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');
if (menuBtn && menu) {
    menuBtn.addEventListener('click', () => {
        const open = menu.classList.toggle('hidden') === false;
        menuBtn.setAttribute('aria-expanded', String(open));
    });
    menu.querySelectorAll('a').forEach((a) =>
        a.addEventListener('click', () => {
            menu.classList.add('hidden');
            menuBtn.setAttribute('aria-expanded', 'false');
        }),
    );
}

// Contact form: no page refresh, shows a success toast.
const form = document.getElementById('contact-form');
const toast = document.getElementById('toast');
let toastTimer;

const showToast = (message, isError = false) => {
    toast.textContent = message;
    toast.classList.toggle('bg-emerald-600', !isError);
    toast.classList.toggle('bg-red-600', isError);
    toast.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
    }, 4000);
};

if (form && toast) {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const name = form.elements.name.value.trim();
        showToast(`Thanks, ${name}! Your message was sent successfully.`);
        form.reset();
    });
}
