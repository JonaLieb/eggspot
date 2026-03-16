@extends('layouts.guest')

@section('content')
    <div class="auth-shell">
        <div class="card auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Verify your email</h1>
                <p class="auth-subtitle">
                    Thanks for signing up. Before getting started, please verify your email address by clicking the link we emailed you.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif

            <div class="auth-actions-stack">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="button">
                        Resend verification email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="button button-secondary">
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
