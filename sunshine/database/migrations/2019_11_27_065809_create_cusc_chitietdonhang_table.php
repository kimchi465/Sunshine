<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chitietdonhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('dh_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('m_ma');
            $table->unsignedSmallInteger('ctdh_soLuong')->default('1');
            $table->unsignedInteger('ctdh_donGia')->default('1');

            $table->primary(['dh_ma', 'sp_ma', 'm_ma']);

            $table->foreign('dh_ma')
                ->references('dh_ma')->on('cusc_donhang')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            
            $table->foreign('sp_ma')
                ->references('sp_ma')->on('cusc_sanpham')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('m_ma')
                ->references('m_ma')->on('cusc_mau')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        //DB::statement("ALTER TABLE `cusc_chitietdonhang` comment Chi tiết đơn hàng # Chi tiết đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chitietdonhang');
    }
}
