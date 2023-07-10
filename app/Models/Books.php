<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    use HasFactory;
    protected $primaryKey = 'books_id';
    protected $fillable = [
        'books_name',
        'category_id',
        'publisher_id',
        'books_description',
        'books_author',
        'books_quantity',
        'books_image',
        'books_price',
        'books_ISBN'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','category_id');
}

    public function author(){
        return $this->belongsTo(Author::class,'books_author','author_id');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class,'publisher_id','publisher_id');
    }

}

