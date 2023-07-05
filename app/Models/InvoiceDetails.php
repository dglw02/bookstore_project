<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    public $timestamps = true;
    
    public function invoices(){
        return $this->belongsTo(Invoice::class,'invoices_id','invoices_id');
    }

    public function books(){
        return $this->belongsTo(Books::class,'books_id','books_id');
    }
}
