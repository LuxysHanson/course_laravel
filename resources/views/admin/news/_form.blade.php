{{ Form::open(['url' => route('admin.news.add', [ 'place' => $place ])]) }}

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
        {{ Form::label('news_text', 'Текст новости') }}
        {{ Form::textarea('text', old('text'), [
            'id' => 'news_text',
            'class' => 'form-control',
            'placeholder' => 'Введите текст',
            'rows' => 5
        ]) }}
    </div>

    @if($place == 'frontend')
        {{ Form::input('hidden', 'is_moderate', 1) }}
    @endif

    <div class="d-flex justify-content-end">
        {{ Form::submit('Добавить', [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
