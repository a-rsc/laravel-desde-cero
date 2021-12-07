<nav class="navbar navbar-light navbar-expand-lg shadow-sm bg-white">
    <div class="container" style="background-color: orange;">
        <a class="navbar-brand" href="{{ route('welcome') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- {{ dump(request()) }} Illuminate\Http\Request --}}
            {{-- {{ dump(request()->routeIs('welcome')) }} --}}
            <ul class="nav nav-pills">
                {{-- <li class="{{ request()->routeIs('welcome') ? 'active' : null }}"><a href="{{ route('welcome') }}">Home</a></li>
                <li class="{{ request()->routeIs('about') ? 'active' : null }}"><a href="{{ route('about') }}">About</a></li>
                <li class="{{ request()->routeIs('projects.*') ? 'active' : null }}"><a href="{{ route('projects.index') }}">Projects</a></li>
                <li class="{{ request()->routeIs('contact') ? 'active' : null }}"><a href="{{ route('contact') }}">Contact</a></li> --}}
                <li class="nav-item"><a class="nav-link {{ setActive('welcome') }}" href="{{ route('welcome') }}">@lang('Home')</a></li>
                <li class="nav-item"><a class="nav-link {{ setActive('about') }}" href="{{ route('about') }}">@lang('About')</a></li>
                <li class="nav-item"><a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}">@lang('Projects')</a></li>
                <li class="nav-item"><a class="nav-link {{ setActive('contact.*') }}" href="{{ route('contact.index') }}">@lang('Contact')</a></li>
                @auth
                <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="@lang('Logout')">@lang('Logout')</a></li>
                @else
                <li class="nav-item"><a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}" title="@lang('Login')">@lang('Login')</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
