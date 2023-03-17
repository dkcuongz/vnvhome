@extends('layouts.frontend')

@section('title', 'Tin tức')

@section('content_header')
    <h1 class="m-0 text-dark">Tin tức</h1>
@stop

@section('content')
    <section class="box box-product-featured box-project-categories">
        @include('front-end.components.new-banner')
    </section>
    <section class="box box-news-by-category box-news-by-category-1">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-25"><span>Hoạt động của VNVHOME</span></h2>
            <div class="box-info">
                <div class="owl-carousel owl-theme">
                    @foreach($newActivities as $newActivity)
                        <div class="item wow fadeInUp animated">
                            <div class="img">
                                <a href="{{route('front.tin-tuc-blog.detail',[$newActivity->category->slug, $newActivity->id])}}"
                                   title="{{$newActivity->title}}">
                                    <img
                                        src="{{asset($newActivity->image->path)}}"
                                        alt="{{$newActivity->title}}" class="center-block img-responsive"/>
                                </a>
                            </div>
                            <div class="info">
                                <a class="title"
                                   href="{{route('front.tin-tuc-blog.detail',[$newActivity->category->slug, $newActivity->id])}}"
                                   title="{{$newActivity->title}}">{{$newActivity->title}}</a>
                                <p>&nbsp;..</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="box box-news-by-category box-news-by-category-2">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-25"><span>Ưu đãi, chính sách</span></h2>
            <div class="description-detail mb-25 wow fadeInUp animated text-center">Nhằm tri ân khách hàng cũng như thúc
                đẩy kinh doanh, VNVHOME mang tới những chính sách khuyến mại, ưu đãi hàng tháng với các mẫu sản phẩm đa
                dạng dành cho khách hàng.
            </div>
            <div class="box-info">
                <div class="owl-carousel owl-theme">
                    @foreach($newPromotions as $newPromotion)
                        <div class="item wow fadeInUp animated">
                            <div class="img">
                                <a href="{{route('front.tin-tuc-blog.detail',[$newPromotions->category->slug, $newPromotion->id])}}"
                                   title="{{$newPromotion->title}}">
                                    <img src="{{asset($newPromotion->image->path)}}"
                                         alt="{{$newPromotion->title}}"
                                         class="center-block img-responsive"/>
                                </a>
                            </div>
                            <div class="info text-center color-white">
                                <div>
                                    <a class="title color-white"
                                       href="{{route('front.tin-tuc-blog.detail',[$newPromotions->category->slug, $newPromotion->id])}}"
                                       title="{{$newPromotion->title}}">{{$newPromotion->title}}</a>
                                    <p class="color-white">{{$newPromotion->description}}</p>
                                    <a class="btn btn-primary"
                                       href="{{route('front.tin-tuc-blog.detail',[$newPromotions->category->slug, $newPromotion->id])}}"
                                       title="{{$newPromotion->title}}">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="box box-news-by-category box-news-by-category-3">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-25"><span>Kinh nghiệm nội thất</span></h2>
            <div class="box-info">
                <div class="row">
                    @foreach($newExps as $newExp)
                        <div class="col-xs-12 col-sm-4">
                            <div class="item wow fadeInUp animated">
                                <div class="img">
                                    <a href="{{route('front.tin-tuc-blog.detail',[$newExp->category->slug, $newExp->id])}}"
                                       title="{{$newExp->title}}">
                                        <img
                                            src="{{asset($newExp->image->path)}}"
                                            alt="{{$newExp->title}}"
                                            class="center-block img-responsive"/>
                                    </a>
                                </div>
                                <div class="info">
                                    <a class="title"
                                       href="{{route('front.tin-tuc-blog.detail',[$newExp->category->slug, $newExp->id])}}"
                                       title="{{$newExp->title}}">{{$newExp->title}}</a>
                                    <p>{{$newExp->description}}</p>
                                    <a class="btn btn-primary"
                                       href="{{route('front.tin-tuc-blog.detail',[$newExp->category->slug, $newExp->id])}}"
                                       title="{{$newExp->title}}">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="box box-news-latest">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-25"><span>Tin tức cập nhật</span></h2>
            <div class="row">
                @foreach($newOthers as $newOther)
                    <div class="col-xs-12 col-sm-3">
                        <div class="item wow fadeInUp animated">
                            <a class="overlay"
                               href="{{route('front.tin-tuc-blog.detail',[$newOther->category->slug, $newOther->id])}}"
                               title="{{$newOther->title}}"></a>
                            <div class="img">
                                <a href="{{route('front.tin-tuc-blog.detail',[$newOther->category->slug, $newOther->id])}}"
                                   title="{{$newOther->title}}"><img
                                        src="{{asset($newOther->image->path)}}"
                                        alt="{{$newOther->title}}" class="img-responsive"></a>
                            </div>
                            <div class="info">
                                <a href="{{route('front.tin-tuc-blog.detail',[$newOther->category->slug, $newOther->id])}}"
                                   title="{{$newOther->title}}">{{$newOther->title}}</a>
                            </div>
                        </div>
                        <div class="item wow fadeInUp animated">
                            <a class="overlay"
                               href="{{route('front.tin-tuc-blog.detail',[$newOther->category->slug, $newOther->id])}}"
                               title="{{$newOther->title}}"></a>
                            <div class="img">
                                <a href="{{route('front.tin-tuc-blog.detail',[$newOther->category->slug, $newOther->id])}}"
                                   title="{{$newOther->title}}"><img
                                        src="{{asset($newOther->image->path)}}"
                                        alt="{{$newOther->title}}" class="img-responsive"></a>
                            </div>
                            <div class="info">
                                <a href="{{route('front.tin-tuc-blog.detail',[$newOther->category->slug, $newOther->id])}}"
                                   title="{{$newOther->title}}">{{$newOther->title}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <h1 class="heading-title hidden">Tin tức</h1>
    @push('js')
        <script>
            $(document).ready(function () {
                $(".box-news-by-category-1 .owl-carousel").owlCarousel({
                    items: 3,
                    loop: true,
                    nav: false,
                    navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                    dots: true,
                    dotsEach: true,
                    autoplay: true,
                    margin: 15,
                    autoplayTimeout: 4000,
                    responsive: {
                        0: {
                            items: 2
                        },
                        480: {
                            items: 3
                        },
                        768: {
                            items: 3
                        }
                    }
                });
            });
            $(document).ready(function () {
                $(".box-news-by-category-2 .owl-carousel").owlCarousel({
                    items: 3,
                    loop: true,
                    nav: true,
                    navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                    dots: false,
                    dotsEach: true,
                    autoplay: true,
                    margin: 5,
                    autoplayTimeout: 4000,
                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 1
                        },
                        768: {
                            items: 2
                        }
                    }
                });
            });
        </script>
    @endpush
@stop
