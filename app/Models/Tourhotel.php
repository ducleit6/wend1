<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourhotel extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'hotel_id'];

    public function  tours(){
        return $this->hasOne(Tour::class,'id','tour_id');
    }
    public function  hotels(){
        return $this->hasOne(Hotel::class,'id','hotel_id');
    }
    public function scopeSearchFilter($query)
    {
        if(request()->key){
            $query = $query->where('name','like','%'.request()->key.'%');
        }
        if(request()->order)
        {
            $order      = explode('-',request()->order);
            $orderBy    = isset($order[0]) ? $order[0] : 'id';
            $orderValue = isset($order[1]) ? $order[1] : 'DESC';
            $query      = $query -> orderBy($orderBy,$orderValue);
        }
        if(request()->status != ''){
            $query      = $query->where('status',request()->status);
            if(request()->status == 2){
                $query  = $query->where('status',0);
            }
        }
        return $query;
    }
}
