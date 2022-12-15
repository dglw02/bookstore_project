<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $primaryKey = 'author_id';
    protected $fillable = ['author_name', 'author_image', 'author_description'];

    public function books()
    {
        return $this->hasMany(Books::class,'author_id','books_author');
    }
}
