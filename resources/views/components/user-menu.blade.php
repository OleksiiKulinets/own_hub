<div class="relative user-menu">
    <button
        type="button"
        onclick="document.querySelector('.user-dropdown').classList.toggle('hidden')"
        class="gh-btn gh-btn--default gh-btn--sm flex items-center gap-2"
    >
        <span class="flex h-5 w-5 items-center justify-center rounded-full border border-gh-border bg-gh-subtle text-[10px] font-bold dark:border-gh-dark-border dark:bg-gh-dark-elevated">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </span>
        <span class="hidden max-w-[8rem] truncate sm:inline">{{ auth()->user()->name }}</span>
        <svg class="h-4 w-4 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </button>

    <div class="user-dropdown gh-dropdown hidden">
        <a href="{{ route('profile.show') }}" class="gh-dropdown__item">Account settings</a>
        <div class="my-1 border-t border-gh-border dark:border-gh-dark-border"></div>
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="gh-dropdown__item text-gh-danger dark:text-[#ff7b72]">Sign out</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('click', function (event) {
        const menu = document.querySelector('.user-menu');
        const dropdown = document.querySelector('.user-dropdown');
        if (menu && dropdown && !menu.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
