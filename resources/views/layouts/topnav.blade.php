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
    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="javascript:void(0)" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <?php $name = explode(" ", Auth::user()->name); ?>
        {{ $name[0].' '.$name[1] }} <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <user-avatar :user="{{Auth::user()}}"></user-avatar>
        @if (Auth::user()->userRoles() != 'admin')
        <hr class="my-1">
        <a class="dropdown-item" href="{{ route(Auth::user()->userRoles().'.dashboard') }}">{{ __('Dashboard') }}</a>
        <a class="dropdown-item" href="{{ route(Auth::user()->userRoles().'.orders') }}">{{ __('Orders') }}</a>
        @if (Auth::user()->role == 4)
        <a class="dropdown-item" href="{{ route(Auth::user()->userRoles().'.inquiries') }}">{{ __('Inquiries') }}</a>
        @endif
        @if (Auth::user()->role == 5)
        <a class="dropdown-item" href="{{ route(Auth::user()->userRoles().'.leads') }}">{{ __('Leads') }}</a>
        @endif
        <a class="dropdown-item" href="{{ route(Auth::user()->userRoles().'.messages') }}">{{ __('Messages') }}</a>
        @endif
        <hr class="my-1">
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