<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscMauSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_mau_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma');
            $table->tinyInteger('m_ma');
            $table->unsignedSmallInteger('msp_soLuong')->default('0');
            $table->primary(['sp_ma', 'm_ma']);

            $table->foreign('sp_ma') //cột khóa ngoại là cột `sp_ma` trong table `mau_sanpham`
                ->references('sp_ma')->on('cusc_sanpham') //cột sẽ tham chiếu đến là cột `sp_ma` trong table `sanpham`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_mau_sanpham` comment 'Mẫu sản phẩm # Mẫu sản phẩm: ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_mau_sanpham');
    }
}
