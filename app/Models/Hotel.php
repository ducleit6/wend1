<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;
    protected $date = 'deleted_at';
    protected $fillable = ['name',	'status',	'description',	'star'];
    public function  dests(){
        return $this->hasOne(Destination::class, 'destination_id','id');
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
