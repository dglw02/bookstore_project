<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table ='area';
    protected $primaryKey = 'area_id';
    public function province(){
        return $this->hasMany(Province::class,'area_id','area_id');
    }
}
