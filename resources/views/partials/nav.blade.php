
<nav class="nav">
    <a href="{{ route('home') }}" class="brand">
        ♡ Sweet Journal
    </a>

    <a href="{{ route('home') }}"
       class="{{ request()->routeIs('home') ? 'active' : '' }}">
        Home
    </a>

    @auth
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('articles.index') }}"
           class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">
            Artikel
        </a>

        <div class="right">
            <span class="muted">
                Hi, {{ auth()->user()->name }} ♡
            </span>

            <form method="POST"
                  action="{{ route('logout') }}"
                  class="inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="right">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
    @endguest
</nav>
