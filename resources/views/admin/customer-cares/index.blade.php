@extends('adminlte::page')

@section('title', 'Phản hồi khách hàng')

@section('content_header')
    <h1 class="m-0 text-dark">Phản hồi khách hàng</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('admin.customer-cares.create')}}" class="btn btn-primary mb-2">
                        Tạo mới
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Số TT</th>
                            <th>Namae</th>
                            <th>Nick name</th>
                            <th>Mô tả</th>
                            <th style="width: 20%">Ảnh</th>
                            <th>Trạng thái</th>
                            <th style="width: 15%" class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customerCares as $key => $customerCare)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$customerCare->title}}</td>
                                <td><div class="summary-content">{!! $customerCare->name !!}</div></td>
                                <td><div class="summary-content">{!! $customerCare->nick_name !!}</div></td>
                                <td><div class="d-flex justify-content-center"><img class="img-banner" src="{{asset($customerCare->image->path ?? '')}}" alt=""></div></td>
                                <th><p class="font-weight-normal">{{$customerCare->status ? 'Hiển thị' :'Ẩn' }}</p></th>
                                <td class="text-center">
                                    <a href="{{route('admin.customer-cares.show', $customerCare)}}" class="btn btn-primary btn-xs">
                                        Chi tiết
                                    </a>
                                    <a href="{{route('admin.customer-cares.edit', $customerCare)}}" class="btn btn-primary btn-xs">
                                        Sửa
                                    </a>
                                    <a href="{{route('admin.customer-cares.destroy', $customerCare)}}"
                                       onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Bạn có muốn xóa banner này không ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush
