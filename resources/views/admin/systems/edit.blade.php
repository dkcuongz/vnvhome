@extends('adminlte::page')

@section('title', 'Chỉnh sửa bài viết')

@section('content_header')
    <h1 class="m-0 text-dark">Chỉnh sửa bài viết</h1>
@stop

@section('content')
    <form action="{{route('admin.systems.update',$system)}}" method="post" enctype="multipart/form-data"
          id="upload-image">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Tiêu đề</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Tiêu đề" name="title"
                                   value="{{old('title')??$system->title}}">
                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <label for="exampleInputName">Ảnh</label>
                        <div class="input-group hdtuto control-group lst increment">
                            <div class="list-input-hidden-upload">
                                <input hidden type="file" name="images[]" id="file_upload"
                                       class="myfrm form-control hidden">
                            </div>
                            <div class="input-group-btn">
                                <button class="btn btn-success btn-add-image" type="button"><i
                                        class="fldemo glyphicon glyphicon-plus"></i>+Add image
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2 @if (count($system->images) > 0) {{'d-none'}} @endif"
                             id="none-image">
                            <img id="preview-image-before-upload"
                                 src="{{asset('images-UI/notfound.jpg')}}"
                                 alt="preview image" style="max-height: 250px;">
                        </div>
                        <div class="list-images">
                            @if (isset($system->images) && !empty($system->images))
                                @foreach (json_decode($system->images) as $key => $img)
                                    <div class="box-image">
                                        <input type="hidden" name="images_uploaded[]" value="{{ $img->path }}"
                                               id="img-{{ $key }}">
                                        <img src="{{ asset($img->path) }}" class="picture-box">
                                        <div class="wrap-btn-delete"><span data-id="img-{{ $key }}"
                                                                           class="btn-delete-image">x</span></div>
                                    </div>
                                @endforeach
                                <input type="hidden" name="images_uploaded_origin" value="{{ $system->images }}">
                                <input type="hidden" name="id" value="{{ $img->id }}">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Nội dung</label>
                            <textarea class="summernote form-control @error('description') is-invalid @enderror"
                                      id="text" cols="30" rows="10" placeholder="Mô tả"
                                      name="description">{{old('description')??$system->description}}</textarea>
                            @error('description') <span class="text-danger">{{$message}}</span> @enderror
                            @include('ckfinder::setup')
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       {{ $system->status == '1' ? 'checked' : '' }} name="status" id="status"
                                       value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hoạt động
                                </label>
                            </div>
                            @error('status') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                        <a href="{{route('admin.systems.index')}}" class="btn btn-default">
                            Danh sách bài viết hệ thống
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace('text', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserUploadUrl: '{{ route('ckfinder_connector') }}',
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700'
        });
    </script>
    @include('ckfinder::setup')
    @push('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $(".btn-add-image").click(function () {
                    let countImage = $("input[name='images[]']").map(function () {
                        if ($(this).val() !== '')
                            return $(this).val();
                    })
                    if (countImage.length > 9) {
                        alert('Không được up quá 10 ảnh!')
                    } else $('#file_upload').trigger('click');

                });

                $('.list-input-hidden-upload').on('change', '#file_upload', function (event) {
                    let today = new Date();
                    let time = today.getTime();
                    let image = event.target.files[0];
                    let file_name = event.target.files[0].name;
                    let box_image = $('<div class="box-image"></div>');
                    box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
                    box_image.append('<div class="wrap-btn-delete"><span data-id=' + time + ' class="btn-delete-image">x</span></div>');
                    $(".list-images").append(box_image);

                    $(this).removeAttr('id');
                    $(this).attr('id', time);
                    let input_type_file = '<input type="file" hidden name="images[]" id="file_upload" class="myfrm form-control hidden">';
                    $('.list-input-hidden-upload').append(input_type_file);
                    let countImage = $("input[name='images[]']").map(function () {
                        if ($(this).val() !== '')
                            return $(this).val();
                    })
                    if (countImage.length > 0) {
                        $("#none-image").addClass("d-none");
                    }

                });

                $(".list-images").on('click', '.btn-delete-image', function () {
                    let id = $(this).data('id');
                    $('#' + id).remove();
                    $(this).parents('.box-image').remove();
                    let countImage = $("input[name='images[]']").map(function () {
                        if ($(this).val() !== '')
                            return $(this).val();
                    })
                    if (countImage.length == 0) {
                        $("#none-image").removeClass("d-none");
                    }
                });
            });
        </script>
    @endpush
@stop
