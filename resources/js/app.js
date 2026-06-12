/* —— Theme —— */
function getPreferredTheme() {
    const saved = localStorage.getItem('theme');
    if (saved === 'dark' || saved === 'light') {
        return saved;
    }
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

function applyTheme(theme) {
    const isDark = theme === 'dark';
    document.documentElement.classList.toggle('dark', isDark);
    document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
}

function toggleTheme() {
    const next = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
    localStorage.setItem('theme', next);
    applyTheme(next);
}

function pullThemeCord() {
    const toggle = document.getElementById('themeToggle');
    if (!toggle || toggle.classList.contains('is-pulling')) {
        return;
    }
    toggle.classList.remove('is-releasing', 'is-settled');
    toggle.classList.add('is-pulling');
    window.setTimeout(() => {
        toggleTheme();
        toggle.classList.remove('is-pulling');
        toggle.classList.add('is-releasing');
        window.setTimeout(() => {
            toggle.classList.remove('is-releasing');
            toggle.classList.add('is-settled');
            window.setTimeout(() => toggle.classList.remove('is-settled'), 550);
        }, 480);
    }, 220);
}

/* —— Toast —— */
function showToast(message) {
    const host = document.getElementById('toastHost');
    if (!host) {
        return;
    }
    const el = document.createElement('div');
    el.className = 'toast';
    el.textContent = message;
    host.appendChild(el);
    requestAnimationFrame(() => el.classList.add('is-visible'));
    window.setTimeout(() => {
        el.classList.remove('is-visible');
        window.setTimeout(() => el.remove(), 300);
    }, 3200);
}
window.showToast = showToast;

/* —— Announcement —— */
function initAnnouncement() {
    const bar = document.getElementById('announcementBar');
    const btn = document.getElementById('announcementDismiss');
    if (!bar || !btn) {
        return;
    }
    if (localStorage.getItem('announcement-dismissed') === '1') {
        bar.hidden = true;
        return;
    }
    btn.addEventListener('click', () => {
        bar.hidden = true;
        localStorage.setItem('announcement-dismissed', '1');
    });
}

/* —— Command palette —— */
const CMDK_ITEMS = [
    { label: 'Home', href: '/', group: 'Pages', keywords: 'index start' },
    { label: 'Sign in', href: '/login', group: 'Account', keywords: 'auth login' },
    { label: 'Create account', href: '/register', group: 'Account', keywords: 'signup register' },
    { label: 'Toggle theme', action: 'theme', group: 'Actions', keywords: 'dark light mode' },
];

function initCommandPalette() {
    const root = document.getElementById('commandPalette');
    const input = document.getElementById('cmdkInput');
    const list = document.getElementById('cmdkList');
    if (!root || !input || !list) {
        return;
    }

    let activeIndex = 0;
    let filtered = [...CMDK_ITEMS];

    function render() {
        list.innerHTML = '';
        if (!filtered.length) {
            list.innerHTML = '<li class="cmdk__empty">No results</li>';
            return;
        }
        let lastGroup = '';
        filtered.forEach((item, index) => {
            if (item.group !== lastGroup) {
                lastGroup = item.group;
                const g = document.createElement('li');
                g.className = 'cmdk__group';
                g.textContent = item.group;
                list.appendChild(g);
            }
            const li = document.createElement('li');
            li.className = `cmdk__item${index === activeIndex ? ' is-active' : ''}`;
            li.setAttribute('role', 'option');
            li.dataset.index = String(index);
            li.innerHTML = `<span>${item.label}</span>${item.action ? '<span class="cmdk__meta">action</span>' : ''}`;
            li.addEventListener('click', () => runItem(item));
            list.appendChild(li);
        });
    }

    function runItem(item) {
        close();
        if (item.action === 'theme') {
            pullThemeCord();
            return;
        }
        if (item.href) {
            window.location.href = item.href;
        }
    }

    function open() {
        root.hidden = false;
        root.setAttribute('aria-hidden', 'false');
        input.value = '';
        filter('');
        activeIndex = 0;
        render();
        input.focus();
        document.body.classList.add('overflow-hidden');
    }

    function close() {
        root.hidden = true;
        root.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
    }

    function filter(q) {
        const query = q.trim().toLowerCase();
        filtered = CMDK_ITEMS.filter((item) => {
            const hay = `${item.label} ${item.keywords || ''} ${item.group}`.toLowerCase();
            return !query || hay.includes(query);
        });
        activeIndex = 0;
        render();
    }

    root.querySelectorAll('[data-cmdk-close]').forEach((el) => el.addEventListener('click', close));

    input.addEventListener('input', () => filter(input.value));

    input.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowDown') {
            e.preventDefault();
            activeIndex = Math.min(activeIndex + 1, filtered.length - 1);
            render();
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            activeIndex = Math.max(activeIndex - 1, 0);
            render();
        } else if (e.key === 'Enter' && filtered[activeIndex]) {
            e.preventDefault();
            runItem(filtered[activeIndex]);
        } else if (e.key === 'Escape') {
            close();
        }
    });

    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            root.hidden ? open() : close();
        }
    });

    document.querySelectorAll('[data-open-cmdk]').forEach((btn) => {
        btn.addEventListener('click', open);
    });
}

/* —— Boot —— */
document.addEventListener('DOMContentLoaded', () => {
    applyTheme(getPreferredTheme());
    document.getElementById('themeBtn')?.addEventListener('click', (e) => {
        e.preventDefault();
        pullThemeCord();
    });
    initAnnouncement();
    initCommandPalette();
});
