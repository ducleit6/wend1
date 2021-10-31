@extends('layout/admin')

@section('title','Danh sách Khách sạn')
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
                <button type="button" class="btn btn-danger btn-delete-all  mr-1"><i class="fas fa-trash mr-1"></i>Xóa
                    Lựa
                    chọn</button>
                <a href="{{route('tour.create')}}" class="btn btn-primary ml-auto"><i
                        class="far fa-plus-square mr-1"></i>Thêm mới</a>
            </div>
        </form>
        <hr>
        <form action="{{route('tour.deleteAll')}}" method="POST" id="form-delete-all">
            @csrf @method('DELETE')
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
                        <th>Tên Chuyến đi</th>
                        <th>Điểm đến</th>
                        <th>Khách sạn</th>
                        <th>Thể loại</th>
                        <th>Thời Gian</th>
                        <th>Ngày đi</th>
                        <th>Tối thiểu</th>
                        <th>Tối đa</th>
                        <th>Giá</th>
                        <th>Khuyến mãi</th>
                        <th>Trạng thái</th>
                        <th class="text-right">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if($datas->count() == 0)
                    <tr>
                        <td colspan="14" class="text-center">Hiện tại chưa có Chuyến đi nào</td>
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
                        <td>{{$data->dess->name}}</td>
                        <td>
                            <ul>
                                @foreach($data->hotels()->get() as $hotel)
                                <li class="liststyle-none">{{$hotel->name}}</li>
                                @endforeach
                            </ul>

                        </td>
                        <td>{{$data->cats->name}}</td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->start_day->format('M d Y')}}</td>
                        <td>{{$data->min_member}}</td>
                        <td>{{$data->max_member}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->sale_price}}</td>

                        <td>
                            @if($data->status == 0)
                            <span class="badge badge-danger">Private</span>
                            @else
                            <span class="badge badge-success">Publish</span>
                            @endif
                        </td>

                        <td class="text-right">
                            <a href="{{route('tour.edit',$data->id)}}" class="btn btn-warning mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('tour.delete',$data->id)}}" class="btn btn-danger btn-single-delete mr-1">
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
<form action="" method="POST" id="singleDelete">
    @csrf @method('DELETE')
</form>


@stop()
@section('js')
<script>
$('form#singleDelete').hide();
$('button.btn-delete-all').hide();
$('input#checkAll').click(function() {
    var isCheck = $(this).is(':checked');
    if (isCheck) {
        $('input.check_item').prop('checked', true);
        $('button.btn-delete-all').show();
    } else {
        $('input.check_item').prop('checked', false);
        $('button.btn-delete-all').hide();
    }
})
$('input.check_item').click(function() {
    var isCheckLength = $('input.check_item:checked').length;
    if (isCheckLength > 0) {
        $('button.btn-delete-all').show();
    } else {
        $('button.btn-delete-all').hide();
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
$('button.btn-delete-all').click(function() {
    $('form#form-delete-all').submit();
})
</script>
@stop()