{{--<a href="{{ route('home') }}">Главная</a>--}}
{{--<a href="{{ route('news.categories') }}">Категории новостей</a>--}}
{{--<a href="{{ route('news.index') }}">Новости</a>--}}
{{--<a href="{{ route('about') }}">О нас</a>--}}
{{--<a href="{{ route('admin.index') }}">Админка</a><br>--}}


<div class="site-wrap">

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

                    <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>

                </div>
{{--                <div class="col-12 col-lg-6 ml-auto d-flex">--}}
{{--                    <div class="ml-md-auto top-social d-none d-lg-inline-block">--}}
{{--                        <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>--}}
{{--                        <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>--}}
{{--                        <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>--}}
{{--                    </div>--}}
{{--                    <form action="#" class="search-form d-inline-block">--}}

{{--                        <div class="d-flex">--}}
{{--                            <input type="email" class="form-control" placeholder="Search...">--}}
{{--                            <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>--}}
{{--                        </div>--}}
{{--                    </form>--}}


{{--                </div>--}}
                <div class="col-6 d-block d-lg-none text-right">

                </div>
            </div>
        </div>


        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

            <div class="container">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                <li>
                                    <a href="{{ route('news.categories') }}" class="nav-link text-left">
                                        Категории новостей
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('news.index') }}" class="nav-link text-left">Новости</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" class="nav-link text-left">О нас</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index') }}" class="nav-link text-left">Админка</a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
