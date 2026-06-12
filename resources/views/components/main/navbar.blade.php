<header class="site-header">

    <div class="site-header__inner">
        <a href="/" class="site-logo">
            <span class="site-logo__mark">P</span>
            <span class="site-logo__text">OwnHub</span>
        </a>

        <nav class="site-nav" aria-label="Main">
            <!-- <a href="/" class="gh-nav-link {{ request()->is('/') ? 'is-active' : '' }}">Home</a> -->
        </nav>

        <div class="site-header__actions">
            @include('components.theme-toggle')

            @auth
                @include('components.user-menu')
            @else
                <a href="{{ route('login') }}" class="gh-btn gh-btn--default gh-btn--sm">Sign in</a>
                <a href="{{ route('register') }}" class="gh-btn gh-btn--primary gh-btn--sm">Sign up</a>
            @endauth
        </div>
    </div>
</header>
