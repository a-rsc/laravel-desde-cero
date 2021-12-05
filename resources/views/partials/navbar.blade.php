<nav>
    {{-- {{ dump(request()) }} Illuminate\Http\Request --}}
    {{-- {{ dump(request()->routeIs('home')) }} --}}
    <ul>
        {{-- <li class="{{ request()->routeIs('home') ? 'active' : null }}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{ request()->routeIs('about') ? 'active' : null }}"><a href="{{ route('about') }}">About</a></li>
        <li class="{{ request()->routeIs('portfolio.*') ? 'active' : null }}"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
        <li class="{{ request()->routeIs('contact') ? 'active' : null }}"><a href="{{ route('contact') }}">Contact</a></li> --}}
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">@lang('Home')</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">@lang('About')</a></li>
        <li class="{{ setActive('portfolio.*') }}"><a href="{{ route('portfolio.index') }}">@lang('Portfolio')</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">@lang('Contact')</a></li>
    </ul>
</nav>
