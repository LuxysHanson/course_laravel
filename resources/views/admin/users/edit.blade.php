@extends('layouts/admin')

@section('title')
    @parent {{ __('Редактирование пользователя') }}
@endsection

@section('content')

    <div class="card-header">{{ __('Редактирование пользователя') }}</div>

    <div class="card-body">

        @include('admin/users/_form', [
            'model' => $user,
            'formLink' => route('admin.users.update', $user)
        ])

    </div>

@endsection
