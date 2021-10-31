@extends('layout/admin')

@section('title','Thêm Mới Chuyến du lịch')
@section('main')



<hr>
<form method="POST" class="form-horizontal" action="{{route('tour.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="card card-info">
                <div class="card-body">
                    <div class="form-group">
                        <label for="proname"> Tên Chuyến du lịch</label>
                        <input type="text" class="form-control" id="proname" name="name" placeholder="Nhập ... "
                            value="{{old('name')}}">
                        @error('name') <small style="color:red;"><i>{{$message}}</i> </small>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="author_id"> Giá</label>
                                <input type="text" class="form-control" id="proprice" name="price"
                                    placeholder="Nhập ..." value="{{old('price')?old('price'):''}}">
                                <!-- @error('price') <small style="color:red;"><i>{{$message}}</i></small>@enderror -->
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="arrtist_id"> Khuyến mại</label>
                                <input type="text" class="form-control" id="arrtist_id" name="sale_price"
                                    placeholder="Nhập ..." value="{{old('sale_price')?old('sale_price'):''}}">
                                <!-- @error('sale_price') <small style="color:red;"><i>{{$message}}</i></small>@enderror -->

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="arrtist_id"> Số lượng tối đa</label>
                                <input type="text" class="form-control" id="arrtist_id" name="max_member"
                                    placeholder="Nhập ..." value="{{old('sale_price')?old('sale_price'):''}}">
                                <!-- @error('sale_price') <small style="color:red;"><i>{{$message}}</i></small>@enderror -->

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="arrtist_id">Số lượng tối thiểu</label>
                                <input type="text" class="form-control" id="arrtist_id" name="min_member"
                                    placeholder="Nhập ..." value="{{old('sale_price')?old('sale_price'):''}}">
                                <!-- @error('sale_price') <small style="color:red;"><i>{{$message}}</i></small>@enderror -->

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="procontent"> Mô tả chuyến du lịch</label>
                        <textarea name="description" id="procontent" rows="5"
                            class="form-control content-editor"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-info">
                <div class="card-body">


                    <div class="form-group">
                        <label for="arrtist_id"> Số ngày</label>
                        <input type="text" class="form-control" id="arrtist_id" name="date" placeholder="Nhập ..."
                            value="{{old('sale_price')?old('sale_price'):''}}">
                        <!-- @error('sale_price') <small style="color:red;"><i>{{$message}}</i></small>@enderror -->

                    </div>
                    <div class="form-group">
                        <label for="arrtist_id"> Ngày đi</label>
                        <input type="date" class="form-control" id="arrtist_id" name="start_day" placeholder="Nhập ..."
                            value="{{old('sale_price')?old('sale_price'):''}}">
                        <!-- @error('sale_price') <small style="color:red;"><i>{{$message}}</i></small>@enderror -->

                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="select2 " name="category_id" data-placeholder="Chọn điểm đến"
                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach($categories as $cat)
                            <option data-select2-id="{{$cat->id}}" value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Điểm đến</label>
                        <select class="select2 " id="desti" name="destination_id" data-placeholder="Chọn điểm đến"
                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="">Chọn điểm đến</option>
                            @foreach($destinations as $des)
                            <option data-select2-id="{{$des->id}}" value="{{$des->id}}">{{$des->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    
                    <div class="form-group hotels">
                        <label>Khách sạn</label>
                        <select class="form-control w-100 " name="hotel[]" id="hotels">
                           

                        </select>
                    </div>



                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" id="" class="form-control">
                            <option value="0">Tạm Ẩn</option>
                            <option value="1" selected>Hiển Thị</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="select_file">Ảnh đại diện</label>
                        <span class="btn btn-success col fileinput-button">
                            <i class="fas fa-plus"></i>
                            <span>Add files</span>
                        </span>
                        <img src="{{asset('public/admin')}}/assets/dist/img/noimage.png" class="mt-2" id="show_img"
                            width="100%">
                        <input type="file" class="form-control" id="select_file" name="myfile" style="display:none">
                        @error('myfile') <small style="color:red;"><i>{{$message}}</i></small>@enderror

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i></button>
        <button type="reset" class="btn btn-danger"><i class="fas fa-undo"></i></button>
    </div>
</form>




@stop()
@section('css')
<link rel="stylesheet" href="{{asset('public/admin')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet"
    href="{{asset('public/admin')}}/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">
<style>
.select2-selection {
    height: 36px !important;
}
</style>



@stop
@section('js')
<script src="{{asset('public/admin')}}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('public/admin')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
$(function() {
    $('.hotels').hide()
    $('.content-editor').summernote({
        height: 300
    });
    $('.select2').select2();
    $('.fileinput-button').click(function() {
        $('#select_file').click();
    })
    $('#select_file').change(function() {
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.onload = function(ev) {
            $('img#show_img').attr('src', ev.target.result)
        }
        reader.readAsDataURL(file);
    });
    $('#desti').change(function(e){

        e.preventDefault();
        $('.hotels').show()
        $.ajax({
            url:"{{route('tour.getHotel')}}",
            type: "GET",
            data:{
               id:$('#desti').val()
            }
        }).done(function(hotels) {
            let html ='<option value="">Chọn Khách sạn </option>'
            
            for(let i = 0; i<hotels.length;i++){
                console.log(hotels[i].name)
                html += '<option data-select2-id="" value="'+hotels[i].id+'">'+hotels[i].name+'</option>';
                
                $('select#hotels').html(html)
            }            
            
        });
        
    })
})
</script>


@stop()