<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name', 'category_image', 'category_description'];

    public function books()
    {
        return $this->hasMany(Books::class,'category_id','category_id');
    }
}
