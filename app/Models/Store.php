<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'store_name',
        'subject',
        'introduction',
        'tel',
        'address',
        'image'

    ];
}