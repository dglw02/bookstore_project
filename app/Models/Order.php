<?php

namespace App\Models;
use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'orders_id';
    protected $table = 'orders';
    protected $fillable=[
        'user_id',
        'orders_name',
        'orders_email',
        'orders_payment',
        'orders_address',
        'orders_phone',
        'orders_province',
        'orders_status',
        'orders_message',
        'order_tracking',
    ];

    public function orderdetail(){
        return $this->hasMany(OrderDetails::class,'orders_id','orders_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function province(){
        return $this->belongsTo(Province::class,'orders_province','province_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'orders_district','district_id');
    }

    public function wards(){
        return $this->belongsTo(Wards::class,'orders_wards','wards_id');
    }

    public function delete()
    {
        DB::transaction(function()
        {
            $this->orderdetail()->delete();
            parent::delete();
        });
    }
}
