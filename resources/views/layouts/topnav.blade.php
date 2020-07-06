<nav class="top-nav navbar navbar-dark bg-dark py-0">
    <div class="container">
        <ul class="nav ml-auto justify-content-end">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="javascript:void(0)"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"
                        href="{{ route(Auth::user()->userRoles().'.dashboard') }}">{{ __('Dashboard') }}</a>
                    <a class="dropdown-item"
                        href="{{ route(Auth::user()->userRoles().'.orders') }}">{{ __('Orders') }}</a>
                    <a class="dropdown-item"
                        href="{{ route(Auth::user()->userRoles().'.inquiries') }}">{{ __('Inquiries') }}</a>
                    <a class="dropdown-item"
                        href="{{ route(Auth::user()->userRoles().'.messages') }}">{{ __('Messages') }}</a>
                    <hr style="margin-bottom: .5rem;">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>