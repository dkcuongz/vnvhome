@extends('layouts.frontend')

@section('title', $category->name)
{{--TODO--}}
@section('content_header')
    <h1 class="m-0 text-dark">{{$category->name}}</h1>
@stop
@section('content')
   @include('front-end.components.product-banner')
    <div id="content">
        <h1 class="heading-title hidden">{{$category->name}}</h1>
        <h2 class="box-heading mb-35 text-center wow fadeInUp animated red">
            <span>{{$category->title}}</span></h2>
        <div class="box-project box-project-category-page">
            <div class="owl-carousel owl-theme">
                @foreach($posts as $key => $post)
                    @if(($key-1) % 9 == 1)
                        <div class="item wow fadeInUp animated">
                            <div class="row">
                                @endif
                                <div class="col-xs-6 col-sm-4">
                                    <div class="project-item">
                                        <div class="img">
                                            <a href="{{route("front.san-pham.detail",[$category->slug, $post->id])}}"
                                               title="{{$post->title}}"><img
                                                    src="{{asset($post->images->first()->path??'')}}"
                                                    alt="{{$post->title}}" class="img-responsive"></a>
                                        </div>
                                        <div class="info text-center">
                                            <a href="{{route("front.san-pham.detail",[$category->slug, $post->id])}}"
                                               title="{{$post->title}}">{{$post->title}}</a>
                                        </div>
                                    </div>
                                    @if(($key-1) % 9 == 1)
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
            </div>

        </div>
        <div class="paginate text-center">
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function () {
                $(".box-project-category-page .owl-carousel").owlCarousel({
                    items: 1,
                    loop: true,
                    nav: false,
                    navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                    dots: true,
                    dotsEach: true,
                    autoplay: true,
                    margin: 0,
                    autoplayTimeout: 5000,
                });
            });
        </script>
    @endpush

@stop
