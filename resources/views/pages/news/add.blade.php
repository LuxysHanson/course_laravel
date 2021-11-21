@extends('layouts/app')

@section('title')
    @parent Создание новости
@endsection

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="card-header">
                <h4>{{ __('Создание новости') }}</h4>
            </div>

            <div class="card-body">

                @include('admin/news/_form', [
                    'formLink' => route('admin.news.store'),
                    'place' => \App\Components\Enums\ApplicationEnum::TYPE_FRONTEND
                ])

            </div>
        </div>
    </div>

@endsection
