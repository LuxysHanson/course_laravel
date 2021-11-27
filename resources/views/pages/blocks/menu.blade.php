
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<div class="header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex">
                <a href="{{ route('home')  }}" class="site-logo">
                    News portal
                </a>
                <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black">
                    <span class="icon-menu h3"></span>
                </a>
            </div>
            <div class="col-12 col-lg-6 ml-auto d-flex">
                {{--                    <form action="#" class="search-form d-inline-block">--}}

                {{--                        <div class="d-flex">--}}
                {{--                            <input type="email" class="form-control" placeholder="Search...">--}}
                {{--                            <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}


            <!-- Right Side Of Navbar -->
                <ul class="nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="drop-btn more">{{ Auth::user()->name }}</a>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Профиль') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выход') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </ul>


            </div>
            <div class="col-6 d-block d-lg-none text-right"></div>
        </div>
    </div>


    <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">

                <div class="mr-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                            <li class="{{ request()->routeIs('news.categories') ? 'active' : '' }}">
                                <a href="{{ route('news.categories') }}" class="nav-link text-left">
                                    Категории новостей
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('news.index') ? 'active' : '' }}">
                                <a href="{{ route('news.index') }}" class="nav-link text-left">Новости</a>
                            </li>
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}" class="nav-link text-left">О нас</a>
                            </li>

                            @if(!Auth::guest() && Auth::user()->role == \App\Components\Enums\UsersRoleEnum::ROLE_ADMIN)
                                <li class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.index') }}" class="nav-link text-left">Админка</a>
                                </li>
                            @endif

                        </ul>
                    </nav>

                </div>

            </div>
        </div>

    </div>

</div>
