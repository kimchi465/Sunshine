<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hinhanh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma');
            $table->tinyInteger('ha_stt')->default('1');
            $table->string('ha_ten', 150);
            $table->primary(['sp_ma', 'ha_stt']);

            $table->foreign('sp_ma') //cột khóa ngoại là cột `sp_ma` trong table `hinhanh`
                ->references('sp_ma')->on('cusc_sanpham') //cột sẽ tham chiếu đến là cột `sp_ma` trong table `sanpham`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_hinhanh` comment 'Hình ảnh # Hình ảnh: ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hinhanh');
    }
}
