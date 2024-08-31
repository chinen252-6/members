<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    use HasFactory;
    // プライマリーキー
    protected $primaryKey = 'store_id'; // 'store-id' をプライマリキーとして設定
    public $incrementing = true; // インクリメントが有効
    protected $keyType = 'int'; // プライマリキーのデータ型が整数


    protected $fillable = [
        'region_id',
        'store_name',
        'subject',
        'introduction',
        'tel',
        'address',
        'image'

    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }

}