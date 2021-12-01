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

            <?php
            use App\Components\Helpers\FormHelper;
            use Illuminate\Support\ViewErrorBag;

            /** @var ViewErrorBag $errors */
            $sourceClasses = FormHelper::getClassByErrors($errors, 'source', 'form-control')
            ?>
            <div class="form-group">

                {{ Form::label('news_source', 'Источники для парсинга') }}
                {{ Form::select('source', \App\Components\Enums\NewsParserEnum::labels(), \App\Components\Enums\NewsParserEnum::PARSER_LENTA, [
                    'id' => 'news_source',
                    'class' => $sourceClasses
                ]) }}

                @error('source')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <?php $limitClasses = FormHelper::getClassByErrors($errors, 'limit', 'form-control') ?>
            <div class="form-group">

                {{ Form::label('news_limit', 'Количество записей') }}
                {{ Form::input('number', 'limit', 0, [
                    'id' => 'news_limit',
                    'class' => $limitClasses
                ]) }}

                @error('limit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="d-flex justify-content-end">
                {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
            </div>

        {{ Form::close() }}


    </div>

@endsection
