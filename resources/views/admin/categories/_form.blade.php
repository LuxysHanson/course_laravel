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
    </div>

    <div class="form-group">
        {{ Form::label('category_description', 'Описание категории') }}
        {{ Form::textarea('description', $model->description ?? null, [
            'id' => 'category_description',
            'class' => 'form-control',
            'placeholder' => 'Введите текст',
            'rows' => 5
        ]) }}
    </div>

    <div class="d-flex justify-content-end">
        {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
