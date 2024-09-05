<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'rating',
        'store_id'
    ];


    public function store() {
        return $this->belongsTo(Store::class);
    }
}
