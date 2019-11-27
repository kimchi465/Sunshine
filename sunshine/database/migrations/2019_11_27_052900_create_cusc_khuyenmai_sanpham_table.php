<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhuyenmaiSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khuyenmai_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('km_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('m_ma');
            $table->string('kmsp_giaTri', 50)->default('100;0');
            $table->unsignedTinyInteger('kmsp_trangThai')->default('2');
            $table->primary(['km_ma', 'sp_ma', 'm_ma']);

            $table->foreign('km_ma')
                ->references('km_ma')->on('cusc_khuyenmai')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('m_ma')
                ->references('m_ma')->on('cusc_mau')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')
                ->on('cusc_sanpham')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_khuyenmai_sanpham` comment 'Khuyến mãi sản phẩm # Chương trình khuyến mãi'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khuyenmai_sanpham');
    }
}
