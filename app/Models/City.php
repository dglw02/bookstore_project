<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function areas(){
        return $this->belongsTo(Areas::class,'areas_id','areas_id');
    }
}
