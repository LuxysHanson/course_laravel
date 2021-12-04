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
        {{ Form::label('news_title', 'Заголовок новости') }}
        {{ Form::text('title', $model->title ?? null, [
            'id' => 'news_title',
            'class' => 'form-control'
        ]) }}

        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group">
        {{ Form::label('news_category', 'Категория новости') }}
        {{ Form::select('category_id', $categories, $model->category_id ?? null, [
            'id' => 'news_category',
            'class' => 'form-control'
        ]) }}

        @error('category_id')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group">
        {{ Form::label('ck-editor', 'Текст новости') }}
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

    <div class="form-group">
        {{ Form::label('news_image', 'Фото к новости') }}
        {{ Form::input('file', 'image', $model->image ?? null, [
            'id' => 'news_image',
            'class' => 'd-block'
        ]) }}

        @error('image')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    {{ Form::input('hidden', 'is_moderate', $model->is_moderate ?? false) }}

    <div class="d-flex justify-content-end">
        {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
