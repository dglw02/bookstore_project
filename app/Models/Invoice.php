<?php

namespace App\Models;
use App\Models\InvoiceDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'invoices_id';

    public function invoicedetail(){
        return $this->hasMany(InvoiceDetails::class,'invoices_id','invoices_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
