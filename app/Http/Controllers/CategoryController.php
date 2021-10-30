<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $datas = Category::searchFilter()->paginate(10);
        return view('admin.category.index',compact('datas'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryCreateRequest $req){
        $category = new Category();
        if($category->create($req->all())){
            return redirect()->route('category.index')->with('yes','Thêm mới danh mục thành công');
        }else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra khi thêm mới');
        }
    }
    public function edit($id){
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
    }
    public function update(CategoryUpdateRequest $req,$id){
        $category = Category::find($id);
        if($category->update($req->all())){
            return redirect()->route('category.index')->with('yes','Chỉnh sửa danh mục thành công');
        }else{
            return redirect()->back()->with('no','Đã có lỗi xảy ra khi Chỉnh sửa');
        }
    }
    public function delete($id){
        $category = Category::find($id);
        if($category->tours()->count() == 0 ){
            if($category->delete()){
                return redirect()->route('category.index')->with('yes','Xóa danh mục thành công');
            }
            else{
                return redirect()->back()->with('no','Đã có lỗi xảy ra');
            }
        }
        else{
            return redirect()->back()->with('no','Danh mục của bạn đã có chuyến đi');
        }
    }
    public function deleteAll(Request $req){
        $category = new Category();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $category = $category->find($id);
            if($category->tours()->withTrashed()->count() == 0){
                if($category->delete()){
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
            return redirect()->back()->with('yes','Xóa nhiều danh mục thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Danh mục lỗi trong quá trình xóa');
    }
    public function trashed(){
        $datas = Category::onlyTrashed()->paginate(10);
        return view('admin.category.trashed',compact('datas'));
    }
    public function restore($id){
        $category = new Category();
        $category = $category->withTrashed()->find($id);
        if($category->restore()){
            return redirect()->route('category.index')->with('yes','Khôi phục danh mục thành công');
        }
        return redirect()->back()->with('no','Khôi phục danh mục thất bại');
    }
    public function forceDelete($id){
        $category = new Category();
        $category = $category->withTrashed()->find($id);
        if($category->forcedelete()){
            return redirect()->route('category.trash')->with('yes','Xóa vĩnh viễn danh mục thành công');
        }
        return redirect()->back()->with('no','Đã có lỗi xảy ra');
    }
    public function restoreAll(Request $req){
        $category = new Category();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $category = $category->withTrashed()->find($id);
            if($category->restore()){
                $success +=1;

            }else{
                $error +=1;

            }
        }
        if($error == 0){
            return redirect()->route('category.index')->with('yes','Khôi phục nhiều danh mục thành công');
        }
        return redirect()->back()->with('no','Có '.$error.' Danh mục lỗi trong quá trình khôi phục');

    }
    
    public function forcedeleteAll(Request $req){
        $category = new Category();
        $ids = $req->id;
        $success = 0;
        $error = 0;
        foreach($ids as $id){
            $category = $category->withTrashed()->find($id);
            if($category->forceDelete()){
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
