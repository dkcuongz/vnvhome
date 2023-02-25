@extends('layouts.frontend')

@section('title', $post->title)

@section('content_header')
    <h1 class="m-0 text-dark">{{$post->title}}</h1>
@stop

@section('content')
    @include('front-end.components.product-banner')
    <div id="content">
        <h1 class="heading-title hidden">{{$post->title}}</h1>
        <h2 class="box-heading text-center wow fadeInUp animated red mb-35">
            <span>{{$post->title}}</span></h2>
        <div class="project-box-main">
            <div class="container">
                <div class="project-box-main-body owl-dots-none">
                    <div class="box-preview">
                        <div id="slide-big" class="img-addition-big owl-carousel owl-theme wow fadeInUp animated">
                            @foreach($post->images as $image)
                                <div class="item img">
                                    <img src="{{asset($image->path)}}"
                                         alt="{{$post->title}}" class="img-responsive">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-thumbs">
                        <div id="slide-thumbs" class="img-addition owl-carousel owl-theme wow fadeInUp animated">
                            @foreach($post->images as $image)
                                <div class="item">
                                    <a href="{{asset($image->path)}}"
                                       data-fancybox="images"
                                       class="img">
                                        <img src="{{asset($image->path)}}" class="img-responsive">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="product-box-related">
            <div class="container">
                <h3 class="box-heading text-center wow fadeInUp animated black fwb mt-0">
                    <span>Sản phẩm liên quan</span></h3>
                <div class="box-product">
                    <div class="owl-carousel owl-theme">
                        @foreach($postReleateds as $postReleated)
                            <div class="product-item wow fadeInUp animated">
                                <div class="img">
                                    <a href="{{route("front.san-pham.detail",[$postReleated->category->slug, $postReleated->id])}}"
                                       title="Lien Ke  Vinh Heritage ">
                                        <img src="{{asset($postReleated->images->first()->path??'')}}"
                                             alt="{{$postReleated->title}}" class="img-responsive">
                                    </a>
                                </div>
                                <a class="title"
                                   href="{{route("front.san-pham.detail",[$postReleated->category->slug, $postReleated->id])}}"
                                   title="{{$postReleated->title}}"><span>{{$postReleated->title}}</span></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".product-box-related .owl-carousel").owlCarousel({
                            items: 5,
                            loop: true,
                            nav: true,
                            navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                            dots: false,
                            dotsEach: true,
                            autoplay: true,
                            margin: 10,
                            autoplayTimeout: 5000,
                            responsive: {
                                0: {
                                    items: 2,
                                },
                                480: {
                                    items: 3,
                                },
                                768: {
                                    items: 5,
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('[data-fancybox="images"]').fancybox({
                transitionEffect: "circular",
                buttons: [
                    "zoom",
                    "fullScreen",
                    "thumbs",
                    "close"
                ]
            });
            $(document).ready(function () {
                $("#slide-big.owl-carousel").owlCarousel({
                    items: 1,
                    loop: true,
                    nav: false,
                    dots: true,
                    dotsEach: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    animateOut: 'slideOutUp',
                    animateIn: 'fadeInUp',
                });
                $("#slide-thumbs.owl-carousel").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                    dots: true,
                    dotsEach: true,
                    autoplay: true,
                    margin: 15,
                    autoplayTimeout: 3000,
                    responsive: {
                        0: {
                            items: 2,
                        },
                        480: {
                            items: 3,
                        },
                        768: {
                            items: 4,
                        }
                    },
                });
                $('#slide-thumbs').on('changed.owl.carousel', function (event) {
                    $('#slide-thumbs').find('.owl-dot').each(function (index, value) {
                        if ($(value).hasClass('active')) {
                            $('#slide-big').find('.owl-dot').each(function (index2, value) {
                                if (index2 === index) {
                                    $(value).trigger('click');
                                }
                            });
                        }
                    })
                });
            });
        </script>
    @endpush
@stop
