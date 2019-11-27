<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscPhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_phieunhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('pn_ma')->autoIncrement();
            $table->string('pn_nguoiGiao', 100);
            $table->string('pn_SoHoaDon', 15);
            $table->dateTime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('pn_ghiChu')->nullnable()->default(NULL);
            $table->unsignedSmallInteger('nv_nguoiLapPhieu');
            $table->dateTime('pn_ngayLapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedSmallInteger('nv_keToan')->default('1');
            $table->dateTime('pn_ngayXacNhan')->nullalble()->default(NULL);
            $table->unsignedSmallInteger('nv_thuKho');
            $table->dateTime('pn_ngayNhapKho')->nullalble()->default(NULL);
            $table->dateTime('pn_tapMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('pn_trangThai')->default('2');
            $table->unsignedSmallInteger('ncc_ma');
            $table->unique(['pn_soHoaDon']);

            $table->foreign('nv_nguoiLapPhieu')
                ->references('nv_ma')->on('cusc_nhanvien')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('nv_keToan')
                    ->references('nv_ma')->on('cusc_nhanvien')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('nv_thuKho')
                        ->references('nv_ma')->on('cusc_nhanvien')
                        ->onDelete('CASCADE')
                        ->onUpdate('CASCADE');

            $table->foreign('ncc_ma')
                        ->references('ncc_ma') ->on('cusc_nhacungcap')
                        ->onDelete('CASCADE')
                        ->onUpdate('CASCADE');

        });
        DB::statement("ALTER TABLE `cusc_phieunhap` comment 'Phiếu nhập # Phiếu nhập'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_phieunhap');
    }
}
