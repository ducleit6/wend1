@extends('layout/admin')
@section('title','Thêm Mới Địa điểm')
@section('main')
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" class="form-horizontal" action="{{route('destination.update',$data->id)}}"
                enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="card-body mb-2">
                    <div class="form-group row">
                        <label for="desname" class="col-sm-3 col-form-label">Tên Địa điểm</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="desname" name="name" placeholder="Nhập ..."
                                value="{{old('name')?old('name'):$data->name}}">
                            @error('name') <small style="color:red;"><i>{{$message}}</i> </small>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline w-100">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="" value="1"
                                     {{old('status') ? (old('status') == 1 ? 'checked' : '') : ($data->status == 1 ?'checked': '')}}>
                                    Hiển Thị
                                </label>
                            </div>
                            <div class="form-check form-check-inline w-100">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="" value="0"
                                    {{old('status') ? (old('status') == 0 ? 'checked' : '') : ($data->status == 0 ?'checked': '')}}>
                                    Tạm Ẩn
                                </label>
                            </div>
                            
                        </div>
                        <div class="form-group">
                                <label for="procontent" class="col-md-12"> Mô tả điểm đến</label>
                                <textarea name="description" id="procontent" rows="5"
                                    class="form-control content-editor">{{old('description')?old('description'):$data->description}}</textarea>
                            </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i></button>
                    <a href="{{route('destination.index')}}" class="btn btn-danger "><i
                            class="fas fa-arrow-left"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop()
@section('css')
<link rel="stylesheet" href="{{url('public/admin')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{url('public/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="{{url('public/admin')}}/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">
@stop()
@section('js')
<script src="{{url('public/admin')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{url('public/admin')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
     $('.content-editor').summernote({
        height: 300
    }); 
    $('.select2').select2();
</script>
@stop()