@extends('layouts/admin')

@section('title')
    @parent {{ __('Парсинг новостей') }}
@endsection

@section('content')

    <div class="card-header">{{ __('Парсинг новостей') }}</div>

    <div class="card-body">

        {{
            Form::open([
                'url' => route('admin.parser.news'),
                'enctype' => 'multipart/form-data'
            ])
        }}

            <div class="form-group">
                {{ Form::label('news_source', 'Источники для парсинга') }}
                {{ Form::select('source', \App\Components\Enums\NewsParserEnum::labels(), \App\Components\Enums\NewsParserEnum::PARSER_LENTA, [
                    'id' => 'news_source',
                    'class' => 'form-control'
                ]) }}
            </div>

            <div class="form-group">
                {{ Form::label('news_limit', 'Количество записей') }}
                {{ Form::input('number', 'limit', 0, [
                    'id' => 'news_limit',
                    'class' => 'form-control'
                ]) }}
            </div>


            <div class="d-flex justify-content-end">
                {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
            </div>

        {{ Form::close() }}


    </div>

@endsection
