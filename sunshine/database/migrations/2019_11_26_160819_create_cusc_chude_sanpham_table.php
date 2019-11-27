<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChudeSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chude_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('cd_ma');
            $table->primary(['sp_ma', 'cd_ma']);

            $table->foreign('sp_ma') //cột khóa ngoại là cột `sp_ma` trong table `chude_sanpham`
                ->references('sp_ma')->on('cusc_sanpham') //cột sẽ tham chiếu đến là cột `sp_ma` trong table `sanpham`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('cd_ma') //cột khóa ngoại là cột `cd_ma` trong table `chude_sanpham`
                ->references('cd_ma')->on('cusc_chude') //cột sẽ tham chiếu đến là cột `sp_ma` trong table `chude`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

        });
        DB::statement("ALTER TABLE `cusc_chude_sanpham` comment 'Chủ đề sản phẩm # Chủ đề sản phẩm: ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chude_sanpham');
    }
}
