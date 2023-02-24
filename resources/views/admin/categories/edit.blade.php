@extends('adminlte::page')

@section('title', 'Sửa danh mục sản phẩm')

@section('content_header')
    <h1 class="m-0 text-dark">Sửa danh mục sản phẩm</h1>
@stop

@section('content')
    <form action="{{route('admin.categories.update', $category->slug)}}"  enctype="multipart/form-data" id="upload-image" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <select name="parent_id" id="" class="form-control">
                            @foreach ($categories as $subcategory)
                                <!-- Include categories.blade.php file and pass the current category to it -->
                                    @include('admin.categories.categories', ['parent_id'=>$category->parent_id,'category' => $subcategory, $level=''])
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Tên danh mục</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="exampleInputName" placeholder="Tên danh mục" name="name"
                                   value="{{old('name') ?? $category->name}}">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
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
                                 src="{{asset($category->image->path ?? 'images-UI/notfound.jpg')}}"
                                 alt="preview image" style="max-height: 250px;">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-default">
                            Danh sách danh mục sản phẩm
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
