@extends('layouts.frontend')

@section('title', 'Sản phẩm')

@section('content_header')
    <h1 class="m-0 text-dark">Sản phẩm</h1>
@stop

@section('content')
    <section class="box box-product-featured box-project-categories">
        <div class="banner">
            <img src="{{asset('upload/image/data/Store/Windy/XHOME-Da-nang/23-Bedroom-02-a5d.png')}}" alt="Sản phẩm XHOME" class="center-block img-responsive">
            <div class="banner-info hidden-xs">
                <div class="container">
                    <h2>Sản phẩm XHOME</h2>
                    <p>Chúng tôi cung cấp đầy đủ các sản phẩm, dịch vụ liên quan đến Thiết kế, Thi công và bán lẻ nội thất. Quy trình làm việc rõ ràng, chuyên nghiệp cùng với chính sách bảo hành & bảo trì sản phẩm độc nhất kéo dài đến 06 năm đi kèm với chế độ kiểm tra định kỳ từ 3 tháng đến 6 tháng/lần để đánh giá chất lượng sản phẩm trong quá trình sử dụng của khách hàng.</p>
                </div>
            </div>
        </div>
        <div class="categories">
            <div class="container">
                <div class="owl-carousel owl-theme">
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="bat-dong-san-cp28.html" title="BẤT ĐỘNG SẢN"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/Store/Windy/XHOME-Da-nang/x1-34f-crop-300-300.jpg')}}" alt="BẤT ĐỘNG SẢN" class="center-block img-responsive">
                            <div class="info">
                                <a href="bat-dong-san-cp28.html"  title="BẤT ĐỘNG SẢN">BẤT ĐỘNG SẢN</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="noi-that-nha-pho-cp12.html" title="NỘI THẤT NHÀ PHỐ" target="_blank" class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/1-nha-pho/Mr-DUng-trang-an/x14-a49-de2-crop-300-300.jpg')}}" alt="NỘI THẤT NHÀ PHỐ" class="center-block img-responsive">
                            <div class="info">
                                <a href="noi-that-nha-pho-cp12.html" target="_blank" title="NỘI THẤT NHÀ PHỐ">NỘI THẤT NHÀ PHỐ</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="noi-that-chung-cu-cp6.html" title="NỘI THẤT CHUNG CƯ"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/2.-Noi-that-chung-cu/Dolphin/x2-f1d-crop-300-300.jpg')}}" alt="NỘI THẤT CHUNG CƯ" class="center-block img-responsive">
                            <div class="info">
                                <a href="noi-that-chung-cu-cp6.html"  title="NỘI THẤT CHUNG CƯ">NỘI THẤT CHUNG CƯ</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="https://xluxury.com.vn/du-an-2-3-15025.html" title="NỘI THẤT BIỆT THỰ - PENTHOUSE - DUPLEX" target="_blank" class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/BIET-THU/GRAND-2/x3-cee-crop-300-300.jpg')}}" alt="NỘI THẤT BIỆT THỰ - PENTHOUSE - DUPLEX" class="center-block img-responsive">
                            <div class="info">
                                <a href="https://xluxury.com.vn/du-an-2-3-15025.html" target="_blank" title="NỘI THẤT BIỆT THỰ - PENTHOUSE - DUPLEX">NỘI THẤT BIỆT THỰ - PENTHOUSE - DUPLEX</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="noi-that-vp-spa-shop-cp10.html" title="NỘI THẤT VP, SPA, SHOP"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/Cong-trinh-NB/LEO-OF/x8-2c6-crop-300-300.jpg')}}" alt="NỘI THẤT VP, SPA, SHOP" class="center-block img-responsive">
                            <div class="info">
                                <a href="noi-that-vp-spa-shop-cp10.html"  title="NỘI THẤT VP, SPA, SHOP">NỘI THẤT VP, SPA, SHOP</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="noi-that-combo-cp2.html" title="NỘI THẤT COMBO"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/Store/Forest/X12-c63-crop-300-300.jpg')}}" alt="NỘI THẤT COMBO" class="center-block img-responsive">
                            <div class="info">
                                <a href="noi-that-combo-cp2.html"  title="NỘI THẤT COMBO">NỘI THẤT COMBO</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="http://xhomeeco.com/" title="NỘI THẤT SẠCH" target="_blank" class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/Cong-trinh-NB/Sky-VIlla/x15-65b-crop-300-300.jpg')}}" alt="NỘI THẤT SẠCH" class="center-block img-responsive">
                            <div class="info">
                                <a href="http://xhomeeco.com/" target="_blank" title="NỘI THẤT SẠCH">NỘI THẤT SẠCH</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="kien-truc-va-xay-dung-cp22.html" title="KIẾN TRÚC VÀ XÂY DỰNG"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/KIEN-TRUC/PHUC-GIA/z2837067276937036227f7d00c604d403d2e79da81845a-45d-crop-300-300.jpg')}}" alt="KIẾN TRÚC VÀ XÂY DỰNG" class="center-block img-responsive">
                            <div class="info">
                                <a href="kien-truc-va-xay-dung-cp22.html"  title="KIẾN TRÚC VÀ XÂY DỰNG">KIẾN TRÚC VÀ XÂY DỰNG</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="leopard-cp24.html" title="LEOPARD"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/website/toc-tron-2TranhdatvangLEOPARD-284422-crop-400-400-21d-crop-300-300.jpg')}}" alt="LEOPARD" class="center-block img-responsive">
                            <div class="info">
                                <a href="leopard-cp24.html"  title="LEOPARD">LEOPARD</a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="h-o-a-fiore-cp26.html" title="H.O.A FIORE"  class="overlay"></a>
                            <img src="{{asset('upload/image/cache/data/KIEN-TRUC/PHUC-GIA/24521181329818670787959182541350505227970413n-ca4-crop-300-300.jpg')}}" alt="H.O.A FIORE" class="center-block img-responsive">
                            <div class="info">
                                <a href="h-o-a-fiore-cp26.html"  title="H.O.A FIORE">H.O.A FIORE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
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
                </script>
            </div>
        </div>
    </section>
    <h1 style="display: none">Sản phẩm</h1>
    <section class="box box-service-featured">
        <div class="container">
            <h2 class="box-title text-center wow fadeInUp animated mb-35"><span>Các gói dịch vụ</span></h2>
            <div class="description-detail wow fadeInUp animated mb-35 text-center">Từ các sản phẩm nội thất bán lẻ cho đến khảo sát, thiết kế, thi công,....chúng tôi đều cung cấp các sản phẩm, dịch vụ phù hợp với nhu cầu của từng khách hàng. Tạo nên được cung cách phục vụ đặc biệt chỉ có thể là XHOME</div>
            <div class="box-info">
                <div class="item left visible-xs">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div class="img">
                                <a href="thiet-ke-thi-cong-tron-goi-can-ho-v12.html" title="Thiết kế Thi công trọn gói căn hộ"><img src="{{asset('upload/image/cache/data/Nhung/x1-b7b-crop-500-282.jpg')}}" alt="Thiết kế Thi công trọn gói căn hộ" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="info-wrap">
                                <div class="info">
                                    <h4 class="box-title fwb"><a href="thiet-ke-thi-cong-tron-goi-can-ho-v12.html" title="Thiết kế Thi công trọn gói căn hộ">Thiết kế Thi công trọn gói căn hộ</a></h4>
                                    <p class="description">..</p>
                                    <div class="read-more"><a class="btn btn-primary" href="thiet-ke-thi-cong-tron-goi-can-ho-v12.html" title="Thiết kế Thi công trọn gói căn hộ">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item left wow fadeInUp animated mb-35 hidden-xs">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div class="img">
                                <a href="thiet-ke-thi-cong-tron-goi-can-ho-v12.html" title="Thiết kế Thi công trọn gói căn hộ"><img src="{{asset('upload/image/cache/data/Nhung/x1-b7b-crop-500-282.jpg')}}" alt="Thiết kế Thi công trọn gói căn hộ" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="info-wrap">
                                <div class="info">
                                    <h4 class="box-title fwb"><a href="thiet-ke-thi-cong-tron-goi-can-ho-v12.html" title="Thiết kế Thi công trọn gói căn hộ">Thiết kế Thi công trọn gói căn hộ</a></h4>
                                    <p class="description">..</p>
                                    <div class="read-more"><a class="btn btn-primary" href="thiet-ke-thi-cong-tron-goi-can-ho-v12.html" title="Thiết kế Thi công trọn gói căn hộ">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item left visible-xs">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div class="img">
                                <a href="tu-van-trien-khai-thi-cong-nhanh-khong-can-thiet-ke-v10.html" title="Tư vấn triển khai thi công nhanh (không cần thiết kế)"><img src="{{asset('upload/image/cache/data/Store/x1-e45-crop-500-282.jpg')}}" alt="Tư vấn triển khai thi công nhanh (không cần thiết kế)" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="info-wrap">
                                <div class="info">
                                    <h4 class="box-title fwb"><a href="tu-van-trien-khai-thi-cong-nhanh-khong-can-thiet-ke-v10.html" title="Tư vấn triển khai thi công nhanh (không cần thiết kế)">Tư vấn triển khai thi công nhanh (không cần thiết kế)</a></h4>
                                    <p class="description">XHOME STORE CÓ THỂ GIÚP BẠN TỰ LÀM ĐẸP CHO CĂN HỘ CỦA MÌNH MỘT CÁCH NHANH CHÓNG MÀ KHÔNG CẦN THIẾT K..</p>
                                    <div class="read-more"><a class="btn btn-primary" href="tu-van-trien-khai-thi-cong-nhanh-khong-can-thiet-ke-v10.html" title="Tư vấn triển khai thi công nhanh (không cần thiết kế)">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item right wow fadeInUp animated mb-35 hidden-xs">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5">
                            <div class="info-wrap">
                                <div class="info">
                                    <h4 class="box-title fwb"><a href="tu-van-trien-khai-thi-cong-nhanh-khong-can-thiet-ke-v10.html" title="Tư vấn triển khai thi công nhanh (không cần thiết kế)">Tư vấn triển khai thi công nhanh (không cần thiết kế)</a></h4>
                                    <p class="description">XHOME STORE CÓ THỂ GIÚP BẠN TỰ LÀM ĐẸP CHO CĂN HỘ CỦA MÌNH MỘT CÁCH NHANH CHÓNG MÀ KHÔNG CẦN THIẾT K..</p>
                                    <div class="read-more"><a class="btn btn-primary" href="tu-van-trien-khai-thi-cong-nhanh-khong-can-thiet-ke-v10.html" title="Tư vấn triển khai thi công nhanh (không cần thiết kế)">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7">
                            <div class="img">
                                <a href="tu-van-trien-khai-thi-cong-nhanh-khong-can-thiet-ke-v10.html" title="Tư vấn triển khai thi công nhanh (không cần thiết kế)"><img src="{{asset('upload/image/cache/data/Store/x1-e45-crop-500-282.jpg')}}" alt="Tư vấn triển khai thi công nhanh (không cần thiết kế)" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item left visible-xs">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div class="img">
                                <a href="dich-vu-dang-ky-bao-gia-thi-cong-danh-cho-nhung-khach-hang-da-co-san-ban-thiet-ke-v8.html" title="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)"><img src="{{asset('upload/image/cache/data/Cong-trinh-NB/miss-Sam/x13-fa4-crop-500-282.jpg')}}" alt="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="info-wrap">
                                <div class="info">
                                    <h4 class="box-title fwb"><a href="dich-vu-dang-ky-bao-gia-thi-cong-danh-cho-nhung-khach-hang-da-co-san-ban-thiet-ke-v8.html" title="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)">Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)</a></h4>
                                    <p class="description">DÀNH NHỮNG KHÁCH HÀNG ĐÃ CÓ SẴN HỒ SƠ THIẾT KẾ

                                        XHOME sẽ báo giá và triển khai thi công nhanh theo..</p>
                                    <div class="read-more"><a class="btn btn-primary" href="dich-vu-dang-ky-bao-gia-thi-cong-danh-cho-nhung-khach-hang-da-co-san-ban-thiet-ke-v8.html" title="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item left wow fadeInUp animated mb-35 hidden-xs">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div class="img">
                                <a href="dich-vu-dang-ky-bao-gia-thi-cong-danh-cho-nhung-khach-hang-da-co-san-ban-thiet-ke-v8.html" title="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)"><img src="{{asset('upload/image/cache/data/Cong-trinh-NB/miss-Sam/x13-fa4-crop-500-282.jpg')}}" alt="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="info-wrap">
                                <div class="info">
                                    <h4 class="box-title fwb"><a href="dich-vu-dang-ky-bao-gia-thi-cong-danh-cho-nhung-khach-hang-da-co-san-ban-thiet-ke-v8.html" title="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)">Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)</a></h4>
                                    <p class="description">DÀNH NHỮNG KHÁCH HÀNG ĐÃ CÓ SẴN HỒ SƠ THIẾT KẾ

                                        XHOME sẽ báo giá và triển khai thi công nhanh theo..</p>
                                    <div class="read-more"><a class="btn btn-primary" href="dich-vu-dang-ky-bao-gia-thi-cong-danh-cho-nhung-khach-hang-da-co-san-ban-thiet-ke-v8.html" title="Dịch vụ đăng ký báo giá thi công (dành cho những khách hàng đã có sẵn bản thiết kế)">Xem thêm</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function () {
                if ($(window).width() > 767) {
                    var imgHeight = $('.box-service-featured').find('.img').height();
                    $('.box-service-featured .info-wrap').height(imgHeight);
                }
            });
        </script>
    </section>
    <script>
        $('.box-product-featured .categories').css('display', 'block');
    </script>
@stop

