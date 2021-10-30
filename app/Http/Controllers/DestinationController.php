<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationCreateRequest;
use App\Http\Requests\DestinationUpdateRequest;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(){
        $datas = Destination::searchFilter()->paginate(10);
        return view('admin.destination.index',compact('datas')); 
    }
    public function create(){
        return view('admin.destination.create');
    }
    public function store(DestinationCreateRequest $req){
        $destination = new Destination();
        if($destination->create($req->all())){
            return redirect()->route('destination.index')->with('yes','Thêm mới Điểm đến thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function edit($id){
        $data = Destination::find($id);
        return view('admin.destination.edit',compact('data'));
    }
    public function update(DestinationUpdateRequest $req,$id){
        $destination = Destination::find($id);
        if($destination->update($req->all())){
            return redirect()->route('destination.index')->with('yes','Chỉnh sửa Điểm đến thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function delete($id){
        $destination = Destination::find($id);
        if($destination->tours()->count() == 0){
            if($destination->delete()){
                return redirect()->route('destination.index')->with('yes','Xóa Điểm đến thành công');
            }
            else{
                return redirect()->back()->with('no','Đã có lỗi xảy ra');
            }
        }
        else{
            return redirect()->back()->with('no','Điểm đến đã có chuyến du lịch');
        }
    }
    public function trashed(){
        $datas = Destination::onlyTrashed()->paginate(10);
        return view('admin.destination.trashed',compact('datas'));
    }
    public function deleteAll(Request $req){
        $destination = new Destination();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        
        foreach($ids as $id){
            $destination = $destination->find($id);
            if($destination->delete()){
                $success +=1;
            }else{
                $error +=1;
            }
        }
        if($error == 0){
            return redirect()->back()->with('yes','Xóa nhiều Điểm đến thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Điểm đến lỗi trong quá trình xóa');
    }
    public function restore($id){
        $destination = Destination::onlyTrashed()->find($id);
        if($destination->restore()){
            return redirect()->route('destination.index')->with('yes','Khôi phục điểm đến thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        }
    }
    public function forceDelete($id){
        $destination = Destination::onlyTrashed()->find($id);
        if($destination->forcedelete()){
            return redirect()->route('destination.index')->with('yes','Xóa vĩnh viễn điểm đến thành công');
        }
        else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra');
        } 
    }
    public function restoreAll(Request $req){
        $destination = new Destination();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $destination = $destination->withTrashed()->find($id);
            if($destination->restore()){
                $success +=1;

            }else{
                $error +=1;

            }
        }
        if($error == 0){
            return redirect()->route('destination.index')->with('yes','Khôi phục nhiều Điểm đến thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Điểm đến lỗi trong quá trình khôi phục');
    }
    public function forcedeleteAll(Request $req){
        $destination = new Destination();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $destination = $destination->withTrashed()->find($id);         
             
            if($destination->forceDelete()){
                $success +=1;
            }else{
                $error +=1;
            }                    
        }
        if($error == 0){
            return redirect()->back()->with('yes','Xóa vĩnh viễn nhiều Điểm đến thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Điểm đến lỗi trong quá trình xóa vĩnh viễn');
    }
}
