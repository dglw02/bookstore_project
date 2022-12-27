<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderdetail(){
        return $this->hasMany(OrderDetails::class);
    }
}
