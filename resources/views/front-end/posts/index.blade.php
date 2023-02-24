@extends('layouts.frontend')

@section('title', 'Sản phẩm')

@section('content_header')
    <h1 class="m-0 text-dark">Sản phẩm</h1>
@stop
@section('content')
    <section class="box box-product-featured box-project-categories">
        <div class="banner">
            <img src="{{asset('images-UI/banner-product.png')}}" alt="Sản phẩm XHOME"
                 class="center-block img-responsive">
            <div class="banner-info hidden-xs">
                <div class="container">
                    <h2>Sản phẩm XHOME</h2>
                    <p>Chúng tôi cung cấp đầy đủ các sản phẩm, dịch vụ liên quan đến Thiết kế, Thi công và bán lẻ nội
                        thất. Quy trình làm việc rõ ràng, chuyên nghiệp cùng với chính sách bảo hành &amp; bảo trì sản
                        phẩm độc nhất kéo dài đến 06 năm đi kèm với chế độ kiểm tra định kỳ từ 3 tháng đến 6 tháng/lần
                        để đánh giá chất lượng sản phẩm trong quá trình sử dụng của khách hàng.</p>
                </div>
            </div>
        </div>
        <div class="categories" style="display: block;">
            <div class="container">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            @foreach($categories as $category)
                                <div class="owl-item    " style="width: 217.5px;">
                                    <div class="item wow fadeInUp  animated"
                                         style="visibility: visible; animation-name: fadeInUp;">
                                        <div class="img">
                                            <a href="{{route("front.san-pham.child",$category->slug)}}"
                                               title="{{$category->name}}"
                                               class="overlay"></a>
                                            <img src="{{asset($category->image->path??'')}}" alt="{{$category->name}}"
                                                 class="center-block img-responsive">
                                            <div class="info">
                                                <a href="{{route("front.san-pham.child",$category->slug)}}"
                                                   title="{{$category->name}}">
                                                    {{$category->name}}</a>
                                            </div>
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

    <h1 style="display: none">Sản phẩm</h1>
    <section class="box box-service-featured">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp  mb-35 animated"
                style="visibility: visible; animation-name: fadeInUp;"><span>Các gói dịch vụ</span></h2>
            <div class="description-detail wow fadeInUp  mb-35 text-center animated"
                 style="visibility: visible; animation-name: fadeInUp;">Từ các sản phẩm nội thất bán lẻ cho đến khảo
                sát, thiết kế, thi công,....chúng tôi đều cung cấp các sản phẩm, dịch vụ phù hợp với nhu cầu của từng
                khách hàng. Tạo nên được cung cách phục vụ đặc biệt chỉ có thể là XHOME
            </div>
            <div class="box-info">
                @foreach($posts as $key => $post)
                    <div class="item left visible-xs">
                        <div class="row">
                            <div class="col-xs-12 col-sm-7">
                                <div class="img">
                                    <a href="{{route("front.san-pham.detail",[$post->category->slug, $post->id])}}"
                                       title="{{$post->title}}"><img
                                            src="{{asset($post->images->first()->path??'')}}"
                                            alt="{{$post->title}}" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <div class="info-wrap" style="height: 0px;">
                                    <div class="info">
                                        <h4 class="box-title fwb"><a
                                                href="{{route("front.san-pham.detail",[$post->category->slug, $post->id])}}"
                                                title="{{$post->title}}">{{$post->title}}
                                                hộ</a></h4>
                                        <p class="description">..</p>
                                        <div class="read-more"><a class="btn btn-primary"
                                                                  href="{{route("front.san-pham.detail",[$post->category->slug, $post->id])}}"
                                                                  title="{{$post->title}}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="item @if($key%2 === 0) {{'left'}} @else {{'right'}} @endif wow fadeInUp  mb-35 hidden-xs animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-7">
                                <div class="img">
                                    <a href="https://xhome.com.vn/thiet-ke-thi-cong-tron-goi-can-ho-v12.html"
                                       title="Thiết kế Thi công trọn gói căn hộ"><img
                                            src="./Sản phẩm_files/x1-b7b-crop-500-282.jpg"
                                            alt="Thiết kế Thi công trọn gói căn hộ" class="img-responsive"></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <div class="info-wrap" style="height: 0px;">
                                    <div class="info">
                                        <h4 class="box-title fwb"><a
                                                href="https://xhome.com.vn/thiet-ke-thi-cong-tron-goi-can-ho-v12.html"
                                                title="Thiết kế Thi công trọn gói căn hộ">Thiết kế Thi công trọn gói căn
                                                hộ</a></h4>
                                        <p class="description">..</p>
                                        <div class="read-more"><a class="btn btn-primary"
                                                                  href="https://xhome.com.vn/thiet-ke-thi-cong-tron-goi-can-ho-v12.html"
                                                                  title="Thiết kế Thi công trọn gói căn hộ">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $(".box-project-categories .owl-carousel").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText:  ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
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
            jQuery(document).ready(function () {
                if ($(window).width() > 767) {
                    var imgHeight = $('.box-service-featured').find('.img').height();
                    $('.box-service-featured .info-wrap').height(imgHeight);
                }
            });
        </script>
    </section>
@stop
