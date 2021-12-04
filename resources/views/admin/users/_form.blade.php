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
        {{ Form::label('user_name', 'Имя пользователя') }}
        {{ Form::text('name', $model->name ?? null, [
            'id' => 'user_name',
            'class' => 'form-control'
        ]) }}

        @error('name')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group">
        {{ Form::label('user_email', 'Адрес электронной почты') }}
        {{ Form::text('email', $model->email ?? null, [
            'id' => 'user_email',
            'class' => 'form-control'
        ]) }}

        @error('email')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group">
        {{ Form::label('user_role', 'Роль пользователя') }}
        {{ Form::select('role', \App\Components\Enums\UsersRoleEnum::labels(), $model->role ?? null, [
            'id' => 'user_role',
            'class' => 'form-control'
        ]) }}

        @error('role')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

    </div>

    {{ Form::input('hidden', 'password', $model->role == \App\Components\Enums\UsersRoleEnum::ROLE_SUPER
                ? '123' : \Illuminate\Support\Facades\Hash::make($model->email))  }}

    <div class="d-flex justify-content-end">
        {{ Form::submit(__('Сохранить'), [ 'class' => "btn btn-outline-primary" ]) }}
    </div>

{{ Form::close() }}
