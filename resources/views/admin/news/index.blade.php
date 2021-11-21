@extends('layouts/admin')

@section('title')
    @parent Все новости
@endsection

@section('content')

    <div class="card-header">{{ __('Все новости') }}</div>

    <div class="card-body">
        <div class="d-flex justify-content-end">
            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    Экспортировать
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.news.export', [ 'type' => \App\Components\Enums\NewsExportType::TYPE_JSON ]) }}">
                        в JSON формате
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.news.export', [ 'type' => \App\Components\Enums\NewsExportType::TYPE_EXCEL ]) }}">
                        в EXCEL формате
                    </a>
                </div>
            </div>
        </div>
        по позже сделаю этот раздел
    </div>

@endsection
