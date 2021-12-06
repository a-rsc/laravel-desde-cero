<nav>
    {{-- {{ dump(request()) }} Illuminate\Http\Request --}}
    {{-- {{ dump(request()->routeIs('welcome')) }} --}}
    <ul>
        {{-- <li class="{{ request()->routeIs('welcome') ? 'active' : null }}"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="{{ request()->routeIs('about') ? 'active' : null }}"><a href="{{ route('about') }}">About</a></li>
        <li class="{{ request()->routeIs('projects.*') ? 'active' : null }}"><a href="{{ route('projects.index') }}">Projects</a></li>
        <li class="{{ request()->routeIs('contact') ? 'active' : null }}"><a href="{{ route('contact') }}">Contact</a></li> --}}
        <li class="{{ setActive('welcome') }}"><a href="{{ route('welcome') }}">@lang('Home')</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">@lang('About')</a></li>
        <li class="{{ setActive('projects.*') }}"><a href="{{ route('projects.index') }}">@lang('Projects')</a></li>
        <li class="{{ setActive('contact.*') }}"><a href="{{ route('contact.index') }}">@lang('Contact')</a></li>
        @auth
        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="@lang('Logout')">@lang('Logout')</a></li>
        @else
        <li><a href="{{ route('login') }}">@lang('Login')</a></li>
        @endauth
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
