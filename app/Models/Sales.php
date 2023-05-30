<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'tanggal',
        'customer_id',
        'subtotal',
        'diskon',
        'ongkir',
        'total_bayar'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function sales_det()
    {
        return $this->hashMany(Sales_det::class, 'sales_id', 'id');
    }
}
