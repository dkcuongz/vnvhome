@extends('layouts.frontend')

@section('title', 'Phản hồi khách hàng')

@section('content_header')
    <h1 class="m-0 text-dark">Phản hồi khách hàng</h1>
@stop

@section('content')
    <section class="box box-product-featured box-project-categories">
        <div class="banner">
            <img src="{{asset('images-UI/banner-customer-care.png')}}" alt="Phản hồi của khách hàng"
                 class="center-block img-responsive">
            <div class="banner-info hidden-xs">
                <div class="container">
                    <h2>Phản hồi của khách hàng</h2>
                    <p>Chúng tôi tự hào và vui mừng với những phản hồi tích cực và sự hài lòng của khách hàng về chất
                        lượng sản phẩm và dịch vụ của XHOME. Ngoài ra, bộ sưu tập hàng trăm công trình đã hoàn thành là
                        minh chứng cho sự phát triển và đẳng cấp của công ty thiết kế, thi công nội thất hàng đầu Việt
                        Nam cũng được XHOME giới thiệu bên dưới</p>
                </div>
            </div>
        </div>
    </section>
    <section class="box box-testimonial">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-35 red">
                <span>Phản hồi từ khách hàng của chúng tôi</span></h2>
            <div class="box-info">
                <div class="owl-carousel owl-theme">
                    @foreach($customerCares as $customerCare)
                        <div class="item wow fadeInUp animated">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="img">
                                        <img
                                            src="{{asset($customerCare->image->path)}}"
                                            class="center-block img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="info">
                                        <h4 class="title"> {{$customerCare->name}}</h4>
                                        <span>{{$customerCare->nick_name}}</span>
                                        <p>{{$customerCare->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="box box-product-all">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-35 red"><span>MỘT SỐ CÔNG TRÌNH CHÚNG TÔI ĐÃ HOÀN THIỆN BÀN GIAO</span>
            </h2>
            <div class="box-info">
                <div class="owl-carousel owl-theme">
                        <div class="item wow fadeInUp animated">
                            <div class="row">
                                @foreach($posts as $post)
                                <div class="col-xs-6 col-sm-4">
                                    <div class="product-item">
                                        <div class="img">
                                            <a href="{{route("front.san-pham.detail",[$post->category->slug, $post->id])}}"
                                               title="{{$post->title}}"><img
                                                    src="{{asset($post->images->first()->path)}}"
                                                    alt="{{$post->title}}"
                                                    class="img-responsive"></a>
                                        </div>
                                        <div class="info text-center">
                                            <a href="{{route("front.san-pham.detail",[$post->category->slug, $post->id])}}"
                                               title="{{$post->title}}">{{$post->title}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <h1 class="box-heading text-center red wow fadeInUp animated fwb hidden"><span>Phản hồi của khách hàng</span></h1>
    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $(".box-testimonial .owl-carousel").owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    navText: ['<img src="https://xhome.com.vn/public/home/img/ar_left.png">', '<img src="public/home/img/ar_right.png">'],
                    dots: false,
                    dotsEach: true,
                    autoplay: true,
                    margin: 0,
                    autoplayTimeout: 5000,
                });
            });
            $(document).ready(function () {
                $(".box-project-categories .owl-carousel").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<img src="https://xhome.com.vn/public/home/img/ar_left.png">', '<img src="public/home/img/ar_right.png">'],
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
            $(document).ready(function () {
                $(".box-product-all .owl-carousel").owlCarousel({
                    items: 1,
                    loop: true,
                    nav: false,
                    navText: ['<img src="https://xhome.com.vn/public/home/img/ar_left.png">', '<img src="public/home/img/ar_right.png">'],
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
