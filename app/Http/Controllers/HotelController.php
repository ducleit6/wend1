<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelCreateRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Models\Destination;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(){
        $datas = Hotel::searchFilter()->paginate(10);
        return view('admin.hotel.index',compact('datas'));
    }
    public function create(){
        $destinations = Destination::all();
        if($destinations->count()==0){
            return redirect()->route('destination.create')->with('no','Chưa có điểm đến nào. Vui lòng thêm điểm đến');
        }
        else{
            return view('admin.hotel.create',compact('destinations'));
        }
    }
    public function store(HotelCreateRequest $req){
        $hotel = new Hotel();
        if($hotel->create($req->all())){
            return redirect()->route('hotel.index')->with('yes','Thêm mới Khách sạn thành công');
        }else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function edit($id){
        $data = Hotel::find($id);
        $destinations = Destination::all();
        return view('admin.hotel.edit',compact('data','destinations'));
    }
    public function update(HotelUpdateRequest $req, $id){
        $hotel = Hotel::find($id);
        if($hotel->update($req->all())){
            return redirect()->route('hotel.index')->with('yes','Chỉnh sửa Khách sạn thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function delete($id){
        $hotel = Hotel::find($id);
        if($hotel->tours()->count()==0){
            if($hotel->delete()){
                return redirect()->route('hotel.index')->with('yes','Xóa Khách sạn thành công');
            }
            else{
                return redirect()->back()->with('no','Đã có lỗi xảy ra');
            }
        }
        else{
            return redirect()->back()->with('no', 'Khách sạn đã được chọn trong chuyến du lịch ');
        }
        
    }
    public function trashed(){
        $datas = Hotel::onlyTrashed()->paginate(10);
        return view('admin.hotel.trashed',compact('datas'));
    }
    public function restore($id){
        $hotel = Hotel::withTrashed()->find($id);
        if($hotel->restore()){
            return redirect()->route('hotel.index')->with('yes','Khôi phục thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function forceDelete($id){
        $hotel = Hotel::withTrashed()->find($id);
        if($hotel->forcedelete()){
            return redirect()->route('hotel.trashed')->with('yes','Xóa vĩnh viễn thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function deleteAll(Request $req){
        $hotel = new Hotel();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $hotel = $hotel->find($id);
            if($hotel->tours()->count() == 0){
                if($hotel->delete()){
                    $success +=1;
                }else{
                    $error +=1;
                }
            }
            else{
                $error +=1;
            }
            
        }
        if($error == 0){
            return redirect()->back()->with('yes','Xóa nhiều Khách sạn thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Khách sạn lỗi trong quá trình xóa');
    }
    public function restoreAll(Request $req){
        $hotel = new Hotel();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $hotel = $hotel->withTrashed()->find($id);
            if($hotel->restore()){
                $success +=1;

            }else{
                $error +=1;

            }
        }
        if($error == 0){
            return redirect()->route('hotel.index')->with('yes','Khôi phục nhiều danh mục thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Danh mục lỗi trong quá trình khôi phục');

    }
    
    public function forcedeleteAll(Request $req){
        $hotel = new Hotel();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $hotel = $hotel->withTrashed()->find($id);
            if($hotel->forceDelete()){
                $success +=1;

            }else{
                $error +=1;
            }                    
        }
        if($error == 0){
            return redirect()->back()->with('yes','Xóa vĩnh viễn nhiều danh mục thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Danh mục lỗi trong quá trình xóa vĩnh viễn');
    }
}
