@extends('layouts.shop')

@section('title', 'Settings — OwnHub')

@section('content')
    <div class="profile-canvas">
        <div class="site-container py-8">
            <header class="mb-6 border-b border-gh-border pb-4 dark:border-gh-dark-border">
                <h1 class="text-2xl font-semibold text-gh-fg dark:text-gh-dark-fg">Settings</h1>
                <p class="profile-hint mt-1">Manage your account settings and preferences.</p>
            </header>

            <div class="flex flex-col gap-8 md:flex-row">
                @include('components.profile.sidebar', ['activeTab' => 'account'])

                <main class="min-w-0 flex-1">
                    <div id="account" class="tab-content profile-panel">
                        <div class="border-b border-gh-border px-4 py-3 dark:border-gh-dark-border sm:px-6">
                            <h2 class="text-base font-semibold text-gh-fg dark:text-gh-dark-fg">Public profile</h2>
                            <p class="profile-hint">This information may be displayed publicly.</p>
                        </div>

                        @foreach ([
                            ['Name', 'Your name as shown across the site.', auth()->user()->name],
                            ['Email', 'Used for login and security updates.', auth()->user()->email],
                            ['Member since', 'When you joined.', auth()->user()->created_at->format('M d, Y')],
                        ] as [$label, $hint, $value])
                            <div class="profile-setting-row">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="sm:max-w-md">
                                        <p class="profile-label">{{ $label }}</p>
                                        <p class="profile-hint">{{ $hint }}</p>
                                    </div>
                                    <div class="text-sm text-gh-fg sm:text-right dark:text-gh-dark-fg">{{ $value }}</div>
                                </div>
                            </div>
                        @endforeach

                        <div class="profile-setting-row">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <div class="sm:max-w-md">
                                    <p class="profile-label">Account status</p>
                                    <p class="profile-hint">Your account is in good standing.</p>
                                </div>
                                <span class="gh-badge gh-badge--success">Active</span>
                            </div>
                        </div>

                        <div class="flex justify-end gap-2 border-t border-gh-border bg-gh-subtle px-4 py-3 dark:border-gh-dark-border dark:bg-gh-dark-elevated/50 sm:px-6">
                            <a href="{{ route('profile.edit') }}" class="btn-gh-primary">Edit profile</a>
                        </div>
                    </div>

                    <div id="security" class="tab-content profile-panel hidden">
                        <div class="border-b border-gh-border px-4 py-3 dark:border-gh-dark-border sm:px-6">
                            <h2 class="text-base font-semibold text-gh-fg dark:text-gh-dark-fg">Password & authentication</h2>
                            <p class="profile-hint">Keep your account secure with a strong password and 2FA.</p>
                        </div>

                        @foreach ([
                            ['Password', 'Last changed 90 days ago.', 'Change password'],
                            ['Two-factor authentication', 'Add an extra layer of security.', 'Enable 2FA'],
                        ] as [$label, $hint, $action])
                            <div class="profile-setting-row">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="sm:max-w-md">
                                        <p class="profile-label">{{ $label }}</p>
                                        <p class="profile-hint">{{ $hint }}</p>
                                    </div>
                                    <button type="button" class="btn-gh-default w-fit">{{ $action }}</button>
                                </div>
                            </div>
                        @endforeach

                        <div class="px-4 py-4 sm:px-6">
                            <div class="rounded-md border border-gh-border bg-gh-subtle px-4 py-3 text-sm text-gh-muted dark:border-gh-dark-border dark:bg-gh-dark-elevated dark:text-gh-dark-muted">
                                Enable two-factor authentication for better account security.
                            </div>
                        </div>
                    </div>

                    <div id="activity" class="tab-content profile-panel hidden">
                        <div class="border-b border-gh-border px-4 py-3 dark:border-gh-dark-border sm:px-6">
                            <h2 class="text-base font-semibold text-gh-fg dark:text-gh-dark-fg">Recent activity</h2>
                            <p class="profile-hint">A log of recent actions on your account.</p>
                        </div>

                        <ul class="divide-y divide-gh-border dark:divide-gh-dark-border">
                            <li class="flex gap-4 px-4 py-4 sm:px-6">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-green-200 bg-green-50 text-gh-success dark:border-green-800 dark:bg-green-950/40 dark:text-gh-dark-success">✓</div>
                                <div>
                                    <p class="text-sm font-medium text-gh-fg dark:text-gh-dark-fg">Account created</p>
                                    <p class="text-sm text-gh-muted dark:text-gh-dark-muted">{{ auth()->user()->created_at->diffForHumans() }}</p>
                                </div>
                            </li>
                            <li class="flex gap-4 px-4 py-4 sm:px-6">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-gh-border bg-gh-subtle text-gh-muted dark:border-gh-dark-border dark:bg-gh-dark-elevated">◎</div>
                                <div>
                                    <p class="text-sm font-medium text-gh-fg dark:text-gh-dark-fg">Profile viewed</p>
                                    <p class="text-sm text-gh-muted dark:text-gh-dark-muted">Just now</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div id="preferences" class="tab-content profile-panel hidden">
                        <div class="border-b border-gh-border px-4 py-3 dark:border-gh-dark-border sm:px-6">
                            <h2 class="text-base font-semibold text-gh-fg dark:text-gh-dark-fg">Notifications</h2>
                            <p class="profile-hint">Choose what you want to be notified about.</p>
                        </div>

                        @foreach ([
                            ['Email notifications', 'Receive updates about your account activity.', true],
                            ['Marketing emails', 'Get exclusive updates and news.', false],
                        ] as [$label, $hint, $checked])
                            <div class="profile-setting-row">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="sm:max-w-md">
                                        <p class="profile-label">{{ $label }}</p>
                                        <p class="profile-hint">{{ $hint }}</p>
                                    </div>
                                    <label class="relative inline-flex cursor-pointer items-center">
                                        <input type="checkbox" @checked($checked) class="peer sr-only">
                                        <span class="relative h-5 w-9 rounded-full bg-gh-border transition peer-checked:bg-gh-success peer-focus:ring-2 peer-focus:ring-gh-success/40 after:absolute after:left-0.5 after:top-0.5 after:h-4 after:w-4 after:rounded-full after:bg-white after:shadow after:transition-all peer-checked:after:translate-x-4 dark:bg-gh-dark-border"></span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function switchTab(tabName, button) {
        document.querySelectorAll('.tab-content').forEach((tab) => tab.classList.add('hidden'));
        document.getElementById(tabName)?.classList.remove('hidden');
        document.querySelectorAll('.tab-btn').forEach((btn) => btn.classList.remove('is-active'));
        button?.classList.add('is-active');
    }
</script>
@endpush
