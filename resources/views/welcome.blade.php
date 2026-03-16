@extends('layouts.guest')

@section('content')
    <div class="card home-card">
        <h1>Welcome to Eggspot</h1>
        <p>
            A simple egg ordering site for fresh, easy farm orders.
        </p>

        <div class="home-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="button">Go to dashboard</a>
            @else
                <a href="{{ route('login') }}" class="button">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="button button-secondary">Register</a>
                @endif
            @endauth
        </div>
    </div>
@endsection
