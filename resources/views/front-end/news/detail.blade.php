@extends('layouts.frontend')

@section('title',$category->name)

@section('content_header')
    <h1 class="m-0 text-dark">{{$category->name}}</h1>
@stop
@section('content')
    <section class="box box-product-featured box-project-categories">
        @include('front-end.components.new-banner')
    </section>
    <div class="container">
        <div id="content" class="pd-50">

            <h1 class="heading-title hidden">{{$new->title}}</h1>
            <div class="news-box-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <h2 class="box-heading wow fadeInUp animated black mb-20 fwb mt-0"><span>{{$new->title}}</span>
                        </h2>
                        <div class="description-detail wow fadeInUp animated">
                            {!! $new->title !!}
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
