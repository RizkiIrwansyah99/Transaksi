<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama', 'harga'];

    public function sales_det()
    {
        return $this->hasMany(Sales_det::class, 'barang_id', 'id');
    }
}
