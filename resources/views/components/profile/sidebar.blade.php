@php
    $activeTab = $activeTab ?? 'account';
    $username = \Illuminate\Support\Str::before(auth()->user()->email, '@');
@endphp

<aside class="w-full shrink-0 md:w-64">
    <div class="mb-4 flex items-center gap-3">
        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border border-gh-border bg-gh-canvas text-2xl font-semibold text-gh-fg dark:border-gh-dark-border dark:bg-gh-dark-elevated dark:text-gh-dark-fg">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <div class="min-w-0">
            <p class="truncate text-base font-semibold text-gh-fg dark:text-gh-dark-fg">{{ auth()->user()->name }}</p>
            <p class="truncate text-sm text-gh-muted dark:text-gh-dark-muted">{{ $username }}</p>
        </div>
    </div>

    <nav aria-label="Profile sections">
        <ul class="space-y-0.5 border-t border-gh-border pt-3 dark:border-gh-dark-border">
            <li>
                @if(request()->routeIs('profile.show'))
                    <button type="button" class="profile-nav-item tab-btn is-active" onclick="switchTab('account', this)">
                        <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Public profile
                    </button>
                @else
                    <a href="{{ route('profile.show') }}" class="profile-nav-item">
                        <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Public profile
                    </a>
                @endif
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="profile-nav-item {{ request()->routeIs('profile.edit') ? 'is-active' : '' }}">
                    <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Account
                </a>
            </li>
            <li>
                <button type="button" class="profile-nav-item tab-btn" onclick="switchTab('security', this)">
                    <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Password & authentication
                </button>
            </li>
            <li>
                <button type="button" class="profile-nav-item tab-btn" onclick="switchTab('activity', this)">
                    <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Activity
                </button>
            </li>
            <li>
                <button type="button" class="profile-nav-item tab-btn" onclick="switchTab('preferences', this)">
                    <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    Notifications
                </button>
            </li>
        </ul>
    </nav>

    <div class="mt-6 border-t border-gh-border pt-4 dark:border-gh-dark-border">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-gh-danger w-full">Sign out</button>
        </form>
    </div>
</aside>
