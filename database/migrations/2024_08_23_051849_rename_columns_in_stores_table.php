<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            // 複数のカラム名を一括で変更
            $table->renameColumn('store-name', 'store_name');
            $table->renameColumn('region-id', 'region_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            // ロールバック時に元のカラム名に戻す
            $table->renameColumn('store_name', 'store-name');
            $table->renameColumn('region_id', 'region-id');
            
        });
    }
}
