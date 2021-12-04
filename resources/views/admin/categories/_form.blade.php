{{
    Form::open([
        'url' => $formLink,
        'enctype' => 'multipart/form-data'
    ])
}}

    @php
        $model = isset($model) ? $model : null;
    @endphp

    @if($model)
        @method('PUT')
    @endif

    <div class="form-group">
        {{ Form::label('category_title', 'Заголовок категории') }}
        {{ Form::text('title', $model->title ?? null, [
            'id' => 'category_title',
            'class' => 'form-control'
        ]) }}

        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group">
        {{ Form::label('ck-editor', 'Описание категории') }}
        {{ Form::textarea('description', $model->description ?? null, [
            'id' => 'ck-editor',
            'class' => 'form-control',
            'placeholder' => 'Введите текст',
            'rows' => 5
        ]) }}

        @error('description')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    <div class="d-flex justify-content-end">
        {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
