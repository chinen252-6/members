<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            ['name' => '久茂地'],
            ['name' => '栄町'],
            ['name' => '松尾'],
            ['name' => '壺屋'],
            ['name' => '牧志'],
            ['name' => '泉崎'],
            ['name' => 'その他（那覇）'],
            ['name' => '糸満市'],
            ['name' => '豊見城市'],
            ['name' => '南風原町'],
            ['name' => '与那原町'],
            ['name' => '八重瀬町'],
            ['name' => '南城市'],
            ['name' => 'その他（南部）'],
            ['name' => '沖縄市'],
            ['name' => '北谷町'],
            ['name' => '宜野湾市'],
            ['name' => '浦添市'],
            ['name' => '嘉手納町'],
            ['name' => 'うるま市'],
            ['name' => 'その他（中部）'],
            ['name' => '名護市'],
            ['name' => '金武町'],
            ['name' => '宜野座村'],
            ['name' => '本部町'],
            ['name' => '今帰仁村'],
            ['name' => '国頭村'],
            ['name' => 'その他（北部）']

            // 他の地域データを追加
        ]);
    }
}
