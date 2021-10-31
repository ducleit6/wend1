<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(){
        $datas = Tour::searchFilter()->paginate(10);
        return view('admin.tour.index',compact('datas'));
    }
    public function create(){
        $destinations = Destination::all();
        $categories = Category::all();
        $hotels = Hotel::all();
        if($categories->count()==0){
            return redirect()->route('category.create')->with('no','Hiện chưa có thể loại nào, Thêm mới thể loại ngay');
        }
        else if($destinations->count() == 0){
            return redirect()->route('destination.create')->with('no','Hiện chưa có điểm đến nào, Thêm mới điểm đến ngay');
        }
        else if($hotels->count() == 0){

            return redirect()->route('hotel.create')->with('no','Hiện chưa có Khách sạn nào, Thêm mới khách sạn ngay');
        }
        else{
            return view('admin.tour.create',compact('destinations','categories','hotels'));
        }       
    }
    public function getHotel(){
        $id = request()->id;
        $hotels = Hotel::where('destination_id',$id)->get()->toArray();
        return $hotels;
    }
    public function store(Request $req){
        dd($req->all());
    }
}
