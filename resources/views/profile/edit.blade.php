@extends('layouts.app')

@section('content')
    <div class="auth-shell">
        <div class="card auth-card">
            <div class="auth-header">
                <h1 class="auth-title text-center">Edit profile</h1>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="auth-form">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name" class="form-label">Full name</label>
                    <input
                        id="name"
                        class="form-input"
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
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
                        value="{{ old('email', auth()->user()->email) }}"
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
                        value="{{ old('cellphone', auth()->user()->cellphone) }}"
                        autocomplete="tel"
                    >
                    @error('cellphone')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="current_password" class="form-label">Current password</label>
                    <input
                        id="current_password"
                        class="form-input"
                        type="password"
                        name="current_password"
                        autocomplete="current-password"
                    >
                    @error('current_password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">New password</label>
                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                    >
                    @error('password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm new password</label>
                    <input
                        id="password_confirmation"
                        class="form-input"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                    >
                </div>

                <div class="auth-actions grid grid-3">
                    <button type="submit" class="button col-start-2">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
