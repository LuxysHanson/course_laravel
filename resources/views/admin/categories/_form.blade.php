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
    </div>

    <div class="form-group">
        {{ Form::label('news_category', 'Категория новости') }}
        {{ Form::select('category_id', $categories, $model->category_id ?? null, [
            'id' => 'news_category',
            'class' => 'form-control'
        ]) }}
    </div>

    <div class="form-group">
        {{ Form::label('news_description', 'Текст новости') }}
        {{ Form::textarea('description', $model->description ?? null, [
            'id' => 'news_description',
            'class' => 'form-control',
            'placeholder' => 'Введите текст',
            'rows' => 5
        ]) }}
    </div>

    <div class="form-group">
        {{ Form::label('news_image', 'Фото к новости') }}
        {{ Form::input('file', 'image', $model->image ?? null, [
            'id' => 'news_image',
            'class' => 'd-block'
        ]) }}
    </div>

    @php
        use App\Components\Enums\ApplicationEnum;

        /** @var integer $place */
        $isModerate = (int)($place === ApplicationEnum::TYPE_FRONTEND)
    @endphp

    {{ Form::input('hidden', 'is_moderate', $model->is_moderate ?? $isModerate) }}

    <div class="d-flex justify-content-end">
        {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
