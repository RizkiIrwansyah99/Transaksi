<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama', 'no_telp'];

    public function sales()
    {
        return $this->hasMany(Sales::class, 'customer_id', 'id');
    }
}
