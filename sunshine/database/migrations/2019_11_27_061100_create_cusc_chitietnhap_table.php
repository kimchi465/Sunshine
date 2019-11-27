<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChitietnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chitietnhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('pn_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('m_ma');
            $table->unsignedSmallInteger('ctn_soLuong')->default('1');
            $table->unsignedInteger('ctn_donGia')->default('1');

            $table->foreign('pn_ma')
                ->references('pn_ma')->on('cusc_phieunhap')
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
        DB::statement("ALTER TABLE `cusc_chitietnhap` comment 'Chi tiết nhập # Chi tiết nhập'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chitietnhap');
    }
}
