{{
    Form::open([
        'url' => route('profile.update', $model),
        'enctype' => 'multipart/form-data'
    ])
}}

@method('PUT')

<div class="form-group">
    <?php
    use App\Components\Helpers\FormHelper;
    use Illuminate\Support\ViewErrorBag;

    /** @var ViewErrorBag $errors */
    $nameClasses = FormHelper::getClassByErrors($errors, 'name', 'form-control')
    ?>

    {{ Form::label('user_name', 'Имя пользователя') }}
    {{ Form::text('name', $model->name ?? null, [
        'id' => 'user_name',
        'class' => $nameClasses
    ]) }}

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $emailClasses = FormHelper::getClassByErrors($errors, 'email', 'form-control') ?>

    {{ Form::label('user_email', 'Адрес электронной почты') }}
    {{ Form::text('email', $model->email ?? null, [
        'id' => 'user_email',
        'class' => $emailClasses
    ]) }}

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $passwordClasses = FormHelper::getClassByErrors($errors, 'password', 'form-control') ?>

    {{ Form::label('user_password', 'Текущий пароль') }}
    {{ Form::input('password', 'password', null, [
        'id' => 'user_password',
        'class' => $passwordClasses
    ]) }}

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $newPasswordClasses = FormHelper::getClassByErrors($errors, 'new_password', 'form-control') ?>

    {{ Form::label('user_new_password', 'Новый пароль') }}
    {{ Form::input('password', 'new_password', null, [
        'id' => 'user_new_password',
        'class' => $newPasswordClasses
    ]) }}

    @error('new_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group">

    <?php $confimationPasswordClasses = FormHelper::getClassByErrors($errors, 'new_password_confirmation', 'form-control') ?>

    {{ Form::label('user_confirm_password', 'Подтвердите пароль') }}
    {{ Form::input('password', 'new_password_confirmation', null, [
        'id' => 'user_confirm_password',
        'class' => $confimationPasswordClasses
    ]) }}

    @error('new_password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

{{ Form::input('hidden', 'role', \App\Components\Enums\UsersRoleEnum::ROLE_USER)  }}

<div class="d-flex justify-content-end">
    {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
</div>

{{ Form::close() }}
