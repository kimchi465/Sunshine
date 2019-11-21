<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chude', function (Blueprint $table) {
            $table->unsignedTinyInteger('cd_ma')->autoIncrement();
            $table->string('cd_ten', 50);
            $table->timestamp('cd_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cd_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('cd_trangThai')->default('2');
            $table->unique(['cd_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chude');
    }
}
