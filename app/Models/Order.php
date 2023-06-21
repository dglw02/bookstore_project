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
        'orders_city',
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

    public function city(){
        return $this->belongsTo(City::class,'orders_city','city_id');
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
