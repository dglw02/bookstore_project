<?php

namespace App\Models;
use App\Models\InvoiceDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'invoices_name',
        'invoices_description',
        'invoices_total',
        'created_at'
        ];
    public function invoicedetail(){
        return $this->hasMany(InvoiceDetails::class,'invoices_id','invoices_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
