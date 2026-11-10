@extends('layout.app')

@section('title', request()->routeIs('register') ? 'Create account' : 'Welcome back')
@section('body-class', 'auth-page')

@section('content')
    @php($isRegister = request()->routeIs('register'))
    <main class="auth-main">
        <div
            class="auth-card{{ $isRegister ? ' is-register' : '' }}"
            data-auth-card
            data-register-mode="{{ $isRegister ? 'true' : 'false' }}"
            data-login-title="Welcome back"
            data-register-title="Create account"
        >
            <section class="auth-form-panel" aria-label="Account access">
                <form
                    class="auth-form auth-form--login"
                    data-auth-panel="login"
                    aria-hidden="{{ $isRegister ? 'true' : 'false' }}"
                    @if ($isRegister) inert @endif
                >
                    <h1>Welcome Back</h1>
                    <p class="auth-intro">Welcome back! Please log in to your account to begin.</p>

                    <div class="auth-fields">
                        <div class="auth-field">
                            <label for="login-email">E-mail</label>
                            <input
                                id="login-email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                placeholder="Please enter your e-mail"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="auth-field">
                            <label for="login-password">Password</label>
                            <input
                                id="login-password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                placeholder="Please enter your password"
                                required
                            >
                        </div>
                    </div>

                    <div class="auth-options">
                        <label class="auth-remember" for="login-remember">
                            <input id="login-remember" name="remember" type="checkbox">
                            <span>Remember me</span>
                        </label>
                        <span class="auth-forgot">Forgot password?</span>
                    </div>

                    <button class="auth-submit" type="button">Sign in</button>
                    <p class="auth-switch">
                        Don’t have an account?
                        <a href="{{ route('register') }}" data-auth-mode="register">Sign up for free!</a>
                    </p>
                </form>

                <form
                    class="auth-form auth-form--register"
                    data-auth-panel="register"
                    aria-hidden="{{ $isRegister ? 'false' : 'true' }}"
                    @unless ($isRegister) inert @endunless
                >
                    <h1>Hello!</h1>
                    <p class="auth-intro">Welcome! Please sign up for your account to begin.</p>

                    <div class="auth-fields">
                        <div class="auth-field">
                            <label for="register-email">E-mail</label>
                            <input
                                id="register-email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                placeholder="Please enter your e-mail"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="auth-field">
                            <label for="register-password">Password</label>
                            <input
                                id="register-password"
                                name="password"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Please enter your password"
                                required
                            >
                        </div>

                        <div class="auth-field">
                            <label for="register-password-confirmation">Confirm Password</label>
                            <input
                                id="register-password-confirmation"
                                name="password_confirmation"
                                type="password"
                                autocomplete="new-password"
                                placeholder="Please confirm your password"
                                required
                            >
                        </div>
                    </div>

                    <label class="auth-remember auth-register-remember" for="register-remember">
                        <input id="register-remember" name="remember" type="checkbox">
                        <span>Remember me</span>
                    </label>

                    <button class="auth-submit" type="button">Sign up</button>
                    <p class="auth-switch">
                        Already have an account?
                        <a href="{{ route('login') }}" data-auth-mode="login">Log in here!</a>
                    </p>
                </form>
            </section>

            <div class="auth-photo" role="img" aria-label="A warm, welcoming cafe interior">
                <img src="{{ asset('images/cafe1.webp') }}" alt="">
            </div>
        </div>
    </main>
@endsection
