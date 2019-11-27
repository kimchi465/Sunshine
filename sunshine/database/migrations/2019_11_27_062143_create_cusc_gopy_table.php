<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_gopy', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('gy_ma')->autoIncrement();
            $table->dateTime('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('gy_noiDung');
            $table->unsignedBigInteger('km_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('kh_trangThai')->default('3');

            $table->foreign('km_ma')
                ->references('km_ma')->on('cusc_khuyenmai')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('sp_ma')
                ->references('sp_ma')->on('cusc_sanpham')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_gopy` comment 'Góp ý # Góp ý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_gopy');
    }
}
