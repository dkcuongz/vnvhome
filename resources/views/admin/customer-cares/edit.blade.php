@extends('adminlte::page')

@section('title', 'Chỉnh sửa phản hồi')

@section('content_header')
    <h1 class="m-0 text-dark">Chỉnh sửa phản hồi</h1>
@stop

@section('content')
    <form action="{{route('admin.customer-cares.update', $customerCare)}}" method="post" enctype="multipart/form-data"
          id="upload-image">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Tiêu đề" name="name"
                                   value="{{old('name') ?? $customerCare->name}}">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Nick name</label>
                            <input type="text" class="form-control @error('nick_name') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Nick name" name="nick_name"
                                   value="{{old('nick_name') ?? $customerCare->nick_name}}">
                            @error('nick_name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Nội dung</label>
                            <textarea class="summernote form-control @error('description') is-invalid @enderror"
                                      id="text" cols="30" rows="10" placeholder="Mô tả"
                                      name="description">{{old('description') ?? $customerCare->description}}</textarea>
                            @error('description') <span class="text-danger">{{$message}}</span> @enderror
                            @include('ckfinder::setup')
                        </div>
                        <label for="exampleInputEmail">Ảnh</label>
                        <div class="form-group">
                            <input type="file" name="image" placeholder="Chọn ảnh" id="image">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload"
                                 src="{{asset($customerCare->image->path ?? 'images-UI/notfound.jpg')}}"
                                 alt="preview image" style="max-height: 250px;">
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status"
                                       {{ $customerCare->status == '1' ? 'checked' : '' }} id="status" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hoạt động
                                </label>
                            </div>
                            @error('status') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{route('admin.customer-cares.index')}}" class="btn btn-default">
                            Danh sách phản hồi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('js')
        <script type="text/javascript">
            $(document).ready(function (e) {
                $('#image').change(function () {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endpush
@stop
