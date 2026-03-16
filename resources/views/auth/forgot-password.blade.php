@extends('layouts.guest')

@section('content')
    <div class="auth-shell">
        <div class="card auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Confirm password</h1>
                <p class="auth-subtitle">
                    This is a secure area of the application. Please confirm your password before continuing.
                </p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
                    @error('password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-actions auth-actions-right">
                    <button type="submit" class="button">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
