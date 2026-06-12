@extends('layouts.shop')

@section('title', 'Sign in — OwnHub')

@section('content')
    <div class="site-section site-section--subtle min-h-[calc(100vh-12rem)]">
        <div class="site-container flex justify-center py-12">
            <div class="w-full max-w-md">
                <div class="mb-6 text-center">
                    <h1 class="text-2xl font-semibold text-gh-fg dark:text-gh-dark-fg">Sign in to OwnHub</h1>
                    <p class="gh-hint mt-2">Welcome back. Enter your credentials to continue.</p>
                </div>

                <div class="gh-auth-box">
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

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

                        <label class="flex items-center gap-2 text-sm text-gh-muted dark:text-gh-dark-muted">
                            <input name="remember" type="checkbox" class="rounded border-gh-border text-gh-success focus:ring-gh-success dark:border-gh-dark-border">
                            Remember me
                        </label>

                        <button type="submit" class="gh-btn gh-btn--primary w-full">Sign in</button>
                    </form>

                    <p class="mt-6 text-center text-sm text-gh-muted dark:text-gh-dark-muted">
                        New to OwnHub?
                        <a href="{{ route('register') }}" class="gh-link">Create an account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
