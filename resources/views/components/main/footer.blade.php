<footer class="site-footer">
    <div class="site-container">
        <div class="mt-10 grid gap-8 md:grid-cols-4">
            <div>
                <div class="mb-3 flex items-center gap-2">
                    <span class="site-logo__mark">P</span>
                    <span class="text-sm font-semibold text-gh-fg dark:text-gh-dark-fg">OwnHub</span>
                </div>
                <p class="text-xs leading-relaxed text-gh-muted dark:text-gh-dark-muted">Minimalist personal website. Built for clarity, performance, and developer experience.</p>
            </div>
            <div>
                <h4 class="site-footer__title">Navigation</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="site-footer__link">Home</a></li>
                    <li><a href="/login" class="site-footer__link">Sign in</a></li>
                    <li><a href="/register" class="site-footer__link">Sign up</a></li>
                </ul>
            </div>
            <div>
                <h4 class="site-footer__title">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="site-footer__link">Contact</a></li>
                    <li><a href="#" class="site-footer__link">Status</a></li>
                </ul>
            </div>
            <div>
                <h4 class="site-footer__title">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="site-footer__link">Privacy</a></li>
                    <li><a href="#" class="site-footer__link">Terms</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-10 flex flex-col items-center justify-between gap-2 border-t border-gh-border pt-6 text-xs text-gh-muted dark:border-gh-dark-border dark:text-gh-dark-muted sm:flex-row">
            <p>&copy; {{ date('Y') }} OwnHub</p>
            <p class="font-mono">v2.0 · ownhub-ui</p>
        </div>
    </div>
</footer>

<div id="toastHost" class="toast-host" aria-live="polite" aria-atomic="true"></div>
