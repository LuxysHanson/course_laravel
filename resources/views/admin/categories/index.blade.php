@extends('layouts/admin')

@section('title')
    @parent {{ __('Все новости') }}
@endsection

@section('content')

    <div class="card-header">
        <div class="row">
            <div class="col-auto">{{ __('Все новости') }}</div>
            <div class="col-auto ml-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        {{ __('Экспортировать') }}
                    </button>
                    <div class="dropdown-menu">
                        <?php $exportTypes = \App\Components\Enums\News\ExportTypeEnum::labels() ?>
                        @foreach($exportTypes as $key => $value)
                            <a class="dropdown-item" href="{{ route('admin.news.export', [ 'type' => $key ]) }}">
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
        <div class="news-content">
            <ul class="nav nav-pills">
                @foreach(\App\Components\Enums\News\NewsStatusEnum::labels() as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link {{ $key == request('status') ? 'active' : '' }}"
                           href="{{ route('admin.news.index', ['status' => $key]) }}">
                            {{ $value }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="list-group mt-3">
                @forelse($news as $item)
                    <div class="news-item mb-2">
                        <a class="list-group-item list-group-item-action flex-column align-items-start"
                           href="{{ route('admin.news.show', $item) }}">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $item->title }}</h5>
                                <small>{{ $item->created_at }}</small>
                            </div>
                            <p class="mb-1">{{ \App\Components\Helpers\StringHelper::getShortText($item->description ?? '') }}</p>

                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                <span class="d-flex mt-3 justify-content-end">
                                    <object>
                                        <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-info">
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
                        Нет добавленных новостей
                    </div>
                @endforelse
            </div>


        </div>
    </div>

@endsection
