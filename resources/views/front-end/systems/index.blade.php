@extends('layouts.frontend')

@section('title', 'Hệ thống VNVHOME')

@section('content_header')
    <h1 class="m-0 text-dark">Hệ thống VNVHOME</h1>
@stop

@section('content')
    <section class="box box-product-featured box-project-categories">
        <div class="banner">
            <img src="{{asset('images-UI/banner-vnvhome.jpg')}}" alt="Hệ thống của VNVHOME"
                 class="center-block img-responsive">
            <div class="banner-info hidden-xs">
                <div class="container">
                    <h2>Hệ thống của VNVHOME</h2>
                    <p></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <h1 class="box-heading text-center red wow fadeInUp animated fwb"><span>Hệ thống chi nhánh</span></h1>
        <div class="description-detail mb-35 wow fadeInUp animated"><p style="text-align: center;">Sự phát triển vượt
                trội của VNVHOME được minh chứng rõ ràng bằng việc mở rộng quy mô Chi nhánh &amp; Showroom tại 12 tỉnh
                thành phố,&nbsp;trải dài trên khắp 3 miền Bắc, Trung, Nam và 1 Văn phòng đại diện tại Singapore&nbsp;chỉ
                trong 8 năm.&nbsp;&nbsp;</p>

            <p style="text-align: center;">Không dừng lại ở đó, VNVHOME đặt mục tiêu có mặt tại trên 50 Tinh thành phố
                và mở rộng phạm vi khai thác thị trường ra khu vực Đông Nam Á đến hết năm 2024</p>
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
                                        <a href="{{route('front.he-thong-vn-vhome.detail',$system->id)}}" title="{{$system->title}}"
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
@stop
