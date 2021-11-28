{{
    Form::open([
        'url' => $formLink,
        'enctype' => 'multipart/form-data'
    ])
}}

<div class="form-group">
    <?php
    use App\Components\Helpers\FormHelper;
    use Illuminate\Support\ViewErrorBag;

    /** @var ViewErrorBag $errors */
    $titleClasses = FormHelper::getClassByErrors($errors, 'title', 'form-control')
    ?>

    {{ Form::label('news_title', 'Заголовок новости') }}
    {{ Form::text('title', $model->title ?? null, [
        'id' => 'news_title',
        'class' => $titleClasses
    ]) }}

    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $categoryClasses = FormHelper::getClassByErrors($errors, 'category_id', 'form-control') ?>

    {{ Form::label('news_category', 'Категория новости') }}
    {{ Form::select('category_id', $categories, $model->category_id ?? null, [
        'id' => 'news_category',
        'class' => $categoryClasses
    ]) }}

    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $descriptionClasses = FormHelper::getClassByErrors($errors, 'description', 'form-control') ?>

    {{ Form::label('news_description', 'Текст новости') }}
    {{ Form::textarea('description', $model->description ?? null, [
        'id' => 'news_description',
        'class' => $descriptionClasses,
        'placeholder' => 'Введите текст',
        'rows' => 5
    ]) }}

    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $imageClasses = FormHelper::getClassByErrors($errors, 'image', 'd-block') ?>

    {{ Form::label('news_image', 'Фото к новости') }}
    {{ Form::input('file', 'image', $model->image ?? null, [
        'id' => 'news_image',
        'class' => $imageClasses
    ]) }}

    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

{{ Form::input('hidden', 'is_moderate', $model->is_moderate ?? true) }}

<div class="d-flex justify-content-end">
    {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
</div>

{{ Form::close() }}
