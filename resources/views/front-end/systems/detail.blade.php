@extends('layouts.frontend')

@section('title', $system->title)

@section('content_header')
    <h1 class="m-0 text-dark">{{$system->title}}</h1>
@stop

@section('content')
    @include('front-end.components.product-banner')
    <div id="content">
        <h1 class="heading-title hidden">{{$system->title}}</h1>
        <h2 class="box-heading text-center wow fadeInUp animated red mb-35">
            <span>{{$system->title}}</span></h2>
        <div class="project-box-main">
            <div class="container">
                <div class="project-box-main-body owl-dots-none">
                    <div class="box-preview">
                        <div id="slide-big" class="img-addition-big owl-carousel owl-theme wow fadeInUp animated">
                            @foreach($system->images as $image)
                                <div class="item img">
                                    <img src="{{asset($image->path)}}"
                                         alt="{{$system->title}}" class="img-responsive">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-thumbs">
                        <div id="slide-thumbs" class="img-addition owl-carousel owl-theme wow fadeInUp animated">
                            @foreach($system->images as $image)
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
        <section class="space-ecosytem">
            <div class="category mb-25">
                <h3 class="heading-title wow fadeInUp animated black text-center"><span
                        class="gray">Hệ thống VNVHOME</span>
                </h3>
                <div class="box-info box-space-option">
                    <div class="row">
                        @foreach($systems as $system)
                            <div class="item wow fadeInUp animated">
                                <div class="img">
                                    <a href="{{route('front.he-thong-vn-vhome.detail',$system->id)}}"
                                       title="{{$system->title}}"
                                       class="overlay"></a>
                                    <img
                                        src="{{asset($system->images->first()->path)}}"
                                        alt="{{$system->title}}" class="center-block img-responsive">
                                    <div class="info">
                                        <a href="{{route('front.he-thong-vn-vhome.detail',$system->id)}}"
                                           title="{{$system->title}}">{{$system->title}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
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
