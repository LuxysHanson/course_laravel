@extends('layouts/admin')

@section('title')
    @parent {{ __('Редактирование новости') }}
@endsection

@section('content')

    <div class="card-header">{{ __('Редактирование новости') }}</div>

    <div class="card-body">

        @include('admin/news/_form', [
            'model' => $news,
            'formLink' => route('admin.news.update', $news),
            'place' => \App\Components\Enums\ApplicationEnum::TYPE_BACKEND
        ])

    </div>

@endsection
