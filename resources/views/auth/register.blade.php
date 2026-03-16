@extends('layouts.guest')

@section('content')
    <div class="auth-shell">
        <div class="card auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Create account</h1>
                <p class="auth-subtitle">Register to place your Eggspot orders.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Full name</label>
                    <input
                        id="name"
                        class="form-input"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                    >
                    @error('name')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                    >
                    @error('email')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cellphone" class="form-label">Cellphone</label>
                    <input
                        id="cellphone"
                        class="form-input"
                        type="text"
                        name="cellphone"
                        value="{{ old('cellphone') }}"
                        autocomplete="tel"
                    >
                    @error('cellphone')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >
                    @error('password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input
                        id="password_confirmation"
                        class="form-input"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <div class="auth-actions">
                    <a href="{{ route('login') }}" class="auth-link">
                        Already registered?
                    </a>

                    <button type="submit" class="button">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
