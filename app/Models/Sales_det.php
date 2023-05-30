<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_det extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_id',
        'barang_id',
        'harga_bandrol',
        'qty',
        'diskon_pct',
        'diskon_nilai',
        'harga_diskon',
        'total'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }


    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id', 'id');
    }
}
