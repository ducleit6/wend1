@extends('layout/admin')

@section('title','Thêm Mới Danh mục')
@section('main')



<div class="col-6">
<div class="card">
<div class="card-body">
   
        <form method="POST" class="form-horizontal" action="{{route('category.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body mb-2">
                <div class="form-group row">
                    <label for="catname" class="col-sm-3 col-form-label">Tên Danh mục</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="catname" name="name" placeholder="Nhập ..."
                            value="{{old('name')}}">
                        @error('name') <small style="color:red;"><i>{{$message}}</i> </small>@enderror
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline w-100">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="status" id="" value="1" checked>
                                Hiển Thị
                            </label>
                        </div>
                        <div class="form-check form-check-inline w-100">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="status" id="" value="0">
                                Tạm Ẩn
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i></button>
                <a href="{{route('category.index')}}" class="btn btn-danger "><i
                        class="fas fa-arrow-left"></i></a>
            </div>

            <!-- /.card-footer -->
        </form>
    </div>


    <!-- /.card-footer-->
</div>

@stop()