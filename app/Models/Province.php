<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table ='province';
    protected $primaryKey = 'province_id';

    public function area(){
        return $this->belongsTo(Area::class,'area_id','area_id');
    }
}
