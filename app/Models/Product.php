<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'operator',
        'nominal',
        'harga_modal',
        'harga_jual',
    ];
}