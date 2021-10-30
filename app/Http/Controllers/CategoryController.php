<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $datas = Category::searchFilter()->paginate(10);
        return view('admin.category.index',compact('datas'));
    }
}
