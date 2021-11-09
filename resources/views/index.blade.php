@extends('layouts.app')

@section('title')
    @parent Главная страница
@endsection

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Свежие новости</h2>
                    </div>
                    <div class="post-entry-2 d-flex">
                        <div class="thumbnail order-md-2" style="background-image: url('images/img_h_4.jpg')"></div>
                        <div class="contents order-md-1 pl-0">
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">•</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="post-entry-2 d-flex">
                        <div class="thumbnail order-md-2" style="background-image: url('images/img_h_3.jpg')"></div>
                        <div class="contents order-md-1 pl-0">
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">•</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="post-entry-2 d-flex">
                        <div class="thumbnail order-md-2" style="background-image: url('images/img_h_3.jpg')"></div>
                        <div class="contents order-md-1 pl-0">
                            <span class="caption mb-4 d-block">Editor's Pick</span>
                            <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
                            <div class="post-meta">
                                <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                                <span class="date-read">Jun 14 <span class="mx-1">•</span> 3 min read <span class="icon-star2"></span></span>
                            </div>
                        </div>
                    </div>
                    <p>
                        <a href="#" class="more">Посмотреть все <i class="fas fa-angle-right"></i></a>
                    </p>
                </div>

            </div>

        </div>
    </div>

@endsection
