<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHoadonleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hoadonle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('hdl_ma');
            $table->string('hdl_nguoiMuaHang', 100);
            $table->string('hdl_dienThoai', 11);
            $table->string('hdl_diaChi', 250);
            $table->unsignedSmallInteger('nv_lapHoaDon');
            $table->dateTime('hdl_ngayXuatHoaDon');
            $table->unsignedBigInteger('dh_ma')->default('1');
            
            $table->foreign('nv_lapHoaDon')
                ->references('nv_ma')->on('cusc_nhanvien')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('dh_ma')
                ->references('dh_ma')->on('cusc_donhang')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            
        });
        DB::statement("ALTER TABLE `cusc_hoadonle` comment 'Hóa đơn bán lẻ # Hóa đơn bán lẻ:...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hoadonle');
    }
}
