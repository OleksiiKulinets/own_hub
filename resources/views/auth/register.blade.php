@extends('layouts.shop')

@section('title', 'Sign up — OwnHub')

@section('content')
    <div class="site-section site-section--subtle min-h-[calc(100vh-12rem)]">
        <div class="site-container flex justify-center py-12">
            <div class="w-full max-w-md">
                <div class="mb-6 text-center">
                    <h1 class="text-2xl font-semibold text-gh-fg dark:text-gh-dark-fg">Create your OwnHub account</h1>
                    <p class="gh-hint mt-2">Join free and enjoy a clean, GitHub-inspired experience.</p>
                </div>

                <div class="gh-auth-box">
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="name" class="gh-label">Full name</label>
                            <input id="name" name="name" type="text" required value="{{ old('name') }}" class="gh-input mt-1 @error('name') border-gh-danger @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-gh-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="gh-label">Email address</label>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}" class="gh-input mt-1 @error('email') border-gh-danger @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-gh-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="gh-label">Password</label>
                            <input id="password" name="password" type="password" required class="gh-input mt-1 @error('password') border-gh-danger @enderror">
                            @error('password')
                                <p class="mt-1 text-sm text-gh-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="gh-label">Confirm password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required class="gh-input mt-1">
                        </div>

                        <button type="submit" class="gh-btn gh-btn--primary w-full">Create account</button>
                    </form>

                    <p class="mt-6 text-center text-sm text-gh-muted dark:text-gh-dark-muted">
                        Already have an account?
                        <a href="{{ route('login') }}" class="gh-link">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
