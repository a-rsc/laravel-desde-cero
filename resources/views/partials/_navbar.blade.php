<nav class="navbar navbar-light navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}" title="{{ __(config('app.name')) }}">{{ config('app.name') }}</a>
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
            <ul class="nav nav-pills nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('welcome') }}" {{ setActiveAriaCurrent('welcome') }} href="{{ route('welcome') }}" title="{{ __('Home') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('about') }}" {{ setActiveAriaCurrent('about') }} href="{{ route('about') }}" title="{{ __('About') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('projects.*') }}" {{ setActiveAriaCurrent('projects.*') }} href="{{ route('projects.index') }}" title="{{ __('Projects') }}">{{ __('Projects') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('contact.*') }}" {{ setActiveAriaCurrent('contact.*') }} href="{{ route('contact.index') }}" title="{{ __('Contact') }}">{{ __('Contact') }}</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{{ __('Logout') }}">{{ __('Logout') }}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ setActive('login') }}" {{ setActiveAriaCurrent('login') }} href="{{ route('login') }}" title="{{ __('Login') }}">{{ __('Login') }}</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf {{-- Protege de ataques XSS --}}
</form>
