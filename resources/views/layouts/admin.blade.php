<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') Админ панель | @show</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="{{ url('/') }}">Перейти на сайт</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                             alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                        <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fa fa-user-o"></i>
                                <span>Пользователи</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.parser.index') }}">
                                <i class="fa fa-paper-plane-o"></i>
                                <span>Парсинг новостей</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Основные</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Новости</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.news.create') }}">Создать новость</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.news.index') }}">Все новости</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-list"></i>
                                <span>Категории</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ route('admin.categories.create') }}">Создать категорию</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.categories.index') }}">Все категории</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <i class="fa fa-book"></i>--}}
{{--                                <span>Documentation</span>--}}
{{--                                <span class="badge badge-pill badge-primary">Beta</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <i class="fa fa-folder"></i>--}}
{{--                                <span>Examples</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">

            @include('admin/include/nav')

            <div class="content mt-3">
                <div class="container">
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
        <!-- page-content" -->
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>

    toastr.options = {
        "closeButton" : true,
        "progressBar" : true
    }

    @if(Session::has('message'))
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

</script>

</body>
</html>
