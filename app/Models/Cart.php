<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable=[
      'user_id',
        'books_id',
        'books_quantity',
    ];
    protected $table ='carts';

    public function books(){
        return $this->belongsTo(Books::class,'books_id','books_id');
    }

}
