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

// Easter egg: click the profile picture 3 times and it either fades out and back in, or does a flip.
const profilePic = document.getElementById('profile-pic');
if (profilePic) {
    let clicks = 0;
    let busy = false;
    let resetTimer;

    // Slower opacity fade, while keeping the quick hover scale.
    profilePic.style.transition = 'opacity 0.8s ease, transform 0.3s ease';

    profilePic.addEventListener('click', () => {
        if (busy) return;

        clicks += 1;
        clearTimeout(resetTimer);
        resetTimer = setTimeout(() => (clicks = 0), 1500); // clicks must be in quick succession

        if (clicks < 3) return;

        clicks = 0;
        busy = true;

        // Randomly pick one of two tricks.
        if (Math.random() < 0.5) {
            // Fade out for a few seconds, then fade back in.
            profilePic.style.opacity = '0';
            setTimeout(() => {
                profilePic.style.opacity = '1';
                setTimeout(() => (busy = false), 800);
            }, 3000);
        } else {
            // Full 360° flip.
            const flip = profilePic.animate(
                [
                    { transform: 'perspective(800px) rotateY(0deg)' },
                    { transform: 'perspective(800px) rotateY(360deg)' },
                ],
                { duration: 1000, easing: 'ease-in-out' },
            );
            flip.onfinish = () => (busy = false);
        }
    });
}

// Contact form: no page refresh, shows a success toast.
const form = document.getElementById('contact-form');
const toast = document.getElementById('toast');
let toastTimer;

const showToast = (message, isError = false) => {
    toast.textContent = message;
    toast.classList.toggle('bg-red-600!', isError);
    toast.classList.toggle('text-white!', isError);
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
