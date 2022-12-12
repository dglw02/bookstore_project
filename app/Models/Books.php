<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    protected $primaryKey = 'books_id';
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

