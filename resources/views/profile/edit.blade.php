@extends('layouts.shop')

@section('title', 'Edit profile — OwnHub')

@section('content')
    <div class="profile-canvas">
        <div class="site-container py-8">
            <header class="mb-6 border-b border-gh-border pb-4 dark:border-gh-dark-border">
                <nav class="mb-2 text-sm">
                    <a href="{{ route('profile.show') }}" class="gh-link">← Settings</a>
                </nav>
                <h1 class="text-2xl font-semibold text-gh-fg dark:text-gh-dark-fg">Edit profile</h1>
                <p class="profile-hint mt-1">Update your public profile information.</p>
            </header>

            <div class="flex flex-col gap-8 md:flex-row">
                @include('components.profile.sidebar', ['activeTab' => 'account'])

                <main class="min-w-0 flex-1">
                    <form method="POST" action="{{ route('profile.update') }}" class="profile-panel">
                        @csrf
                        @method('PUT')

                        <div class="border-b border-gh-border px-4 py-3 dark:border-gh-dark-border sm:px-6">
                            <h2 class="text-base font-semibold text-gh-fg dark:text-gh-dark-fg">Profile details</h2>
                            <p class="profile-hint">Changes will be reflected on your public profile.</p>
                        </div>

                        <div class="profile-setting-row">
                            <div class="sm:max-w-lg">
                                <label for="name" class="profile-label">Name</label>
                                <p class="profile-hint -mt-0.5">Your display name on OwnHub.</p>
                                <input id="name" name="name" type="text" required value="{{ auth()->user()->name }}" class="profile-input @error('name') !border-gh-danger @enderror">
                                @error('name')<p class="mt-1 text-sm text-gh-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="profile-setting-row">
                            <div class="sm:max-w-lg">
                                <label for="email" class="profile-label">Email address</label>
                                <p class="profile-hint -mt-0.5">Used for sign-in and notifications.</p>
                                <input id="email" name="email" type="email" required value="{{ auth()->user()->email }}" class="profile-input @error('email') !border-gh-danger @enderror">
                                @error('email')<p class="mt-1 text-sm text-gh-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-end gap-2 border-t border-gh-border bg-gh-subtle px-4 py-3 dark:border-gh-dark-border dark:bg-gh-dark-elevated/50 sm:px-6">
                            <a href="{{ route('profile.show') }}" class="btn-gh-default">Cancel</a>
                            <button type="submit" class="btn-gh-primary">Save changes</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
