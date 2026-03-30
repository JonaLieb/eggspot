<nav class="site-nav">
    <div class="container-wide site-nav-inner">
        <div class="site-brand">
            <a href="{{ auth()->check() ? route('dashboard') : url('/') }}">Eggspot</a>
        </div>

        <button type="button" class="nav-toggle" data-nav-toggle aria-label="Toggle navigation">
            ☰
        </button>

        <div class="site-nav-links" data-nav-menu>
            <div class="site-nav-left">
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                @endauth
            </div>

            <div class="site-nav-right">
                @guest
                    <button type="button" class="button button-secondary" data-theme-toggle>
                        Toggle theme
                    </button>

                    <a href="{{ route('login') }}" class="nav-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">Register</a>
                    @endif
                @endguest

                @auth
                    @include('layouts.mini-cart')
                    <div class="dropdown" data-dropdown>
                        <button
                            type="button"
                            class="dropdown-toggle"
                            data-dropdown-toggle
                            aria-expanded="false"
                        >
                            {{ auth()->user()->name }}
                            <span class="dropdown-caret">▾</span>
                        </button>

                        <div class="dropdown-menu" data-dropdown-menu>
                            <button type="button" class="dropdown-item" data-theme-toggle>
                                Toggle theme
                            </button>

                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item dropdown-item-danger">
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
