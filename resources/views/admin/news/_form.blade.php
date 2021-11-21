{{
    Form::open([
        'url' => route('admin.news.add', [ 'place' => $place ]),
        'enctype' => 'multipart/form-data'
    ])
}}

    <div class="form-group">
        {{ Form::label('news_title', 'Заголовок новости') }}
        {{ Form::text('title', old('title'), [
            'id' => 'news_title',
            'class' => 'form-control'
        ]) }}
    </div>

    <div class="form-group">
        {{ Form::label('news_category', 'Категория новости') }}
        {{ Form::select('category_id', $categories, old('category_id'), [
            'id' => 'news_category',
            'class' => 'form-control'
        ]) }}
    </div>

    <div class="form-group">
        {{ Form::label('news_description', 'Текст новости') }}
        {{ Form::textarea('description', old('description'), [
            'id' => 'news_description',
            'class' => 'form-control',
            'placeholder' => 'Введите текст',
            'rows' => 5
        ]) }}
    </div>

    <div class="form-group">
        {{ Form::label('news_image', 'Фото к новости') }}
        {{ Form::input('file', 'image', old('image'), [
            'id' => 'news_image',
            'class' => 'd-block'
        ]) }}
    </div>

    {{ Form::input('hidden', 'is_moderate', $place == 'frontend') }}

    <div class="d-flex justify-content-end">
        {{ Form::submit('Добавить', [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
