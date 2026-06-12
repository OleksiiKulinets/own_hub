<div class="fixed top-4 right-4 z-[9999]">
    @if (session('success'))
        <div class="gh-alert gh-alert--success" role="alert">
            <div class="flex items-start gap-3">
                <div class="flex-1">
                    <p class="font-semibold">Success</p>
                    <p class="mt-0.5">{{ session('success') }}</p>
                </div>
                <button type="button" onclick="this.closest('.gh-alert').remove()" class="text-current opacity-70 hover:opacity-100" aria-label="Dismiss">×</button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="gh-alert gh-alert--error" role="alert">
            <div class="flex items-start gap-3">
                <div class="flex-1">
                    <p class="font-semibold">Error</p>
                    <p class="mt-0.5">{{ session('error') }}</p>
                </div>
                <button type="button" onclick="this.closest('.gh-alert').remove()" class="text-current opacity-70 hover:opacity-100" aria-label="Dismiss">×</button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="gh-alert gh-alert--error" role="alert">
            <div class="flex items-start gap-3">
                <div class="flex-1">
                    <p class="font-semibold">Validation error</p>
                    <ul class="mt-1 list-inside list-disc space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" onclick="this.closest('.gh-alert').remove()" class="text-current opacity-70 hover:opacity-100" aria-label="Dismiss">×</button>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.gh-alert').forEach((alert) => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.3s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        });
    });
</script>
