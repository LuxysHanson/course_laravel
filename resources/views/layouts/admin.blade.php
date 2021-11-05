<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title') Админ панель | @show</title>
</head>
<body>
@include('admin/menu')
<div class="container">
    @yield('content')
</div>
</body>
</html>
