@extends('layout/admin')

@section('title','Khách sạn tạm xóa')
@section('main')
<div class="card">
    <div class="card-body">


        <form action="" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="key" placeholder="Search By"
                    value="{{request()->key? request()->key:''}}">
            </div>

            <select name="order" id="input" class="form-control">
                <option value="">Sắp xếp</option>
                @foreach(config('options.order_options') as $key => $value)
                <option value="{{$key}}" {{request()->order==$key ?'selected':''}}>{{$value}}</option>
                @endforeach
            </select>

            <select name="status" id="inputstatus" class="form-control">
                <option value="" selected>Trạng thái</option>
                <option value="1" {{request()->status==1 ?'selected':''}}>Hiển thị</option>
                <option value="2" {{request()->status==2 ?'selected':''}}>Tạm ẩn</option>
            </select>

            <button type="submit" class="btn btn-primary ml-1"><i class="fas fa-search mr-1"></i>Tìm kiếm</button>
            <div class="form-group ml-auto">
                <a href="{{route('hotel.forcedeleteAll')}}" class="btn btn-danger btn-delete-all  mr-1"><i
                        class="fas fa-trash mr-1"></i>Xóa
                    Lựa
                    chọn</a>
                <a href="{{route('hotel.restoreAll')}}" class="btn btn-success btn-restore-all  mr-1"><i
                        class="fas fa-window-restore mr-1"></i>Khôi phục
                    Lựa
                    chọn</a>
                <a href="{{route('hotel.index')}}" class="btn btn-primary ml-auto"><i
                        class="fas fa-arrow-circle-left mr-1"></i>Danh sách</a>
            </div>
        </form>
        <hr>
        <form action="" method="POST" id="form-delete-all">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="checkAll">
                                <label for="checkAll"></label>
                            </div>
                        </th>
                        <th>ID</th>
                        <th>Tên Khách sạn</th>
                        <th>Điểm đến</th>
                        <th>Cấp độ sao</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th class="text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if($datas->count() == 0)
                    <tr>
                        <td colspan="7" class="text-center">Hiện tại chưa có danh mục nào</td>
                    </tr>
                    @else
                    @foreach($datas as $data)
                    <tr>
                        <td>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="{{$data->id}}" name="id[]" value="{{$data->id}}"
                                    class="check_item">
                                <label for="{{$data->id}}"></label>
                            </div>
                        </td>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->dests->name}}</td>
                        <td>{{$data->star}}</td>
                        <td>
                            @if($data->status == 0)
                            <span class="badge badge-danger">Private</span>
                            @else
                            <span class="badge badge-success">Publish</span>
                            @endif
                        </td>
                        <td>{{$data->created_at->format('M-d-Y')}}</td>
                        <td class="text-right">
                            <a href="{{route('hotel.restore',$data->id)}}" class="btn btn-success mr-1">
                            <i class="fas fa-window-restore"></i>
                            </a>
                            <a href="{{route('hotel.forceDelete',$data->id)}}"
                                class="btn btn-danger btn-single-delete mr-1">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </form>

        <hr>


    </div>
    <div class="card-footer text-center">
        {{$datas->appends(request()->all())->links()}}
    </div>
</div>
<form action="" method="GET" id="singleDelete">


    @stop()
    @section('js')
    <script>
    $('form#singleDelete').hide();
    $('a.btn-delete-all').hide();
    $('a.btn-restore-all').hide();
    $('input#checkAll').click(function() {
        var isCheck = $(this).is(':checked');
        if (isCheck) {
            $('input.check_item').prop('checked', true);
            $('a.btn-delete-all').show();
            $('a.btn-restore-all').show();
        } else {
            $('input.check_item').prop('checked', false);
            $('a.btn-delete-all').hide();
            $('a.btn-restore-all').hide();
        }
    })
    $('input.check_item').click(function() {
        var isCheckLength = $('input.check_item:checked').length;
        if (isCheckLength > 0) {
            $('a.btn-delete-all').show();
            $('a.btn-restore-all').show();
        } else {
            $('a.btn-delete-all').hide();
            $('a.btn-restore-all').hide();
        }
    })
    $('a.btn-single-delete').click(function(ev) {
        ev.preventDefault();
        var href = $(this).attr('href');
        $('form#singleDelete').attr('action', href);
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            $('form#singleDelete').submit();
        }
    })
    $('a.btn-delete-all').click(function(ev) {
        ev.preventDefault();
        var href = $(this).attr('href');
        $('form#form-delete-all').attr('action', href);
        $('form#form-delete-all').submit();
    })
    $('a.btn-restore-all').click(function(ev) {
        ev.preventDefault();
        var href = $(this).attr('href');
        $('form#form-delete-all').attr('action', href);
        $('form#form-delete-all').submit();
    })
    </script>
    @stop()