<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    public function city(){
        return $this->hasMany(City::class,'areas_id','areas_id');
    }
}
