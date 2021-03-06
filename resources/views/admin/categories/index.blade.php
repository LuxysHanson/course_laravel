@extends('layouts/admin')

@section('title')
    @parent {{ __('Все категории') }}
@endsection

@section('content')

    <div class="card-header">
        <div class="row">
            <div class="col-auto">{{ __('Все категории') }}</div>
            <div class="col-auto ml-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        {{ __('Экспортировать') }}
                    </button>
                    <div class="dropdown-menu">
                        <?php $exportTypes = \App\Components\Enums\News\ExportTypeEnum::labels() ?>
                        @foreach($exportTypes as $key => $value)
                            <a class="dropdown-item" href="{{ route('admin.categories.export', [ 'type' => $key ]) }}">
                                {{ $value }}
                            </a>
                            @if(array_key_last($exportTypes) != $key)
                                <div class="dropdown-divider"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="categories-content">

            <div class="list-group mt-3">
                @forelse($categories as $item)
                    <div class="news-item mb-2">
                        <a class="list-group-item list-group-item-action flex-column align-items-start"
                           href="{{ route('admin.news.show', $item) }}">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $item->title }}</h5>
                            </div>
                            <p class="mb-1">{{ \App\Components\Helpers\StringHelper::getShortText($item->description ?? '') }}</p>

                            <form action="{{ route('admin.categories.destroy', $item) }}" method="post">
                                <span class="d-flex mt-3 justify-content-end">
                                    <object>
                                        <a href="{{ route('admin.categories.edit', $item) }}" class="btn btn-info">
                                            {{ __('Редактировать') }}
                                        </a>
                                        @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Удалить') }}</button>
                                    </object>
                                </span>
                            </form>

                        </a>
                    </div>
                @empty
                    <div class="alert alert-warning" role="alert">
                        Нет добавленных категории
                    </div>
                @endforelse
            </div>


        </div>
    </div>

@endsection
