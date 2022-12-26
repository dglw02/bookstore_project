<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_detail_id';
    protected $table = 'order_details';
    protected $fillable=[
        'orders_id',
        'books_id',
        'quantity',
        'price',
    ];

    public function orders(){
        return $this->belongsTo(Order::class,'orders_id','orders_id');
    }
}
