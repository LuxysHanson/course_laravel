@extends('layouts/app')

@section('title')
    @parent Список категории новостей
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="section-title">
                <h2>Категории новостей</h2>
            </div>

            @forelse($categories as $item)
                <div class="post-entry-2 d-flex">
                    <div class="pl-0">
                        <h2>
                            <a href="{{ route('news.category', [ 'id' => $item->id ]) }}">
                                {{ $item->title }}
                            </a>
                        </h2>
                        <p class="mb-3">{!! $item->description !!}</p>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning" role="alert">
                    Список категории пустой
                </div>
            @endforelse

            {{ $categories->links('layouts/pagination') }}

        </div>
    </div>
@endsection
