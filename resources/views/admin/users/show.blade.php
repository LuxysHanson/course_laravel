@extends('layouts/admin')

@section('title')
    @parent {{ __('Все пользователи') }}
@endsection

@section('content')
    <div class="p-2 news-item">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $user->name }}</h5>
            <small>{{ \App\Components\Enums\UsersRoleEnum::labels()[$user->role] }}</small>
        </div>
        <p class="mt-3">{{ $user->email }}</p>
    </div>
@endsection
