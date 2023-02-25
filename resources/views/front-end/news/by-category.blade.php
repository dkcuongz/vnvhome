@extends('layouts.frontend')

@section('title', $category->name)
{{--TODO--}}
@section('content_header')
    <h1 class="m-0 text-dark">{{$category->name}}</h1>
@stop

@section('content')
    <section class="box box-product-featured box-project-categories">
        @include('front-end.components.new-banner')
    </section>
    <div class="container">
        <div id="content">
            <h1 class="heading-title hidden">{{$category->name}}</h1>
            <h2 class="box-heading mb-35 wow fadeInUp animated red"><span>{{$category->name}}</span></h2>
            <div class="box-space">
                <div class="row">
                    @foreach($news as $new)
                        <div class="col-xs-12 col-sm-6">
                            <div class="news-item wow fadeInUp animated">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="img">
                                            <a href="{{route("front.tin-tuc.detail",[$category->slug, $post->id])}}"
                                               title="{{$new->title}}">
                                                <img
                                                    src="{{asset($new->images->first()->path??'')}}"
                                                    alt="{{$new->title}}" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="info">
                                            <h4>
                                                <a class="title"
                                                   href="{{route("front.tin-tuc.detail",[$category->slug, $post->id])}}"
                                                   title="{{$new->title}}">{{$new->title}}</a>
                                            </h4>
                                            <p>&nbsp;..</p>
                                            <a class="btn btn-primary mt-0 mb-0"
                                               href="{{route("front.tin-tuc.detail",[$category->slug, $post->id])}}"
                                               title="{{$new->title}}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="paginate text-center">
                <ul class="pagination">
                    {{$news->links()}}
                </ul>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function () {
                $(".box-project-categories .owl-carousel").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                    dots: false,
                    dotsEach: true,
                    autoplay: true,
                    margin: 0,
                    autoplayTimeout: 5000,
                    responsive: {
                        0: {
                            items: 2
                        },
                        480: {
                            items: 3
                        },
                        768: {
                            items: 4
                        }
                    }
                });
            });
        </script>
    @endpush
@stop
