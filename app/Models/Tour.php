<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','status','description', 'destination_id',	
                           'category_id', 'price',	'sale_price', 'start_day', 
                           'date', 'max_member', 'min_member', 'image'];
    protected $date     = ['deleted_at'];
    
    public function  dess(){
        return $this->hasOne(Destination::class,'id','destination_id');
    }
    public function  cats(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function hotels(){
        return $this->hasMany(Tourhotel::class,'tour_id','id');
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
