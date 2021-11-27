@extends('layouts/app')

@section('title')
    @parent Профиль пользователя
@endsection

@section('content')
    <div class="site-section">
        <div class="container">

            @include('pages/profile/_form', [
                'model' => $user
            ])

        </div>
    </div>
@endsection
