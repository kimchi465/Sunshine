<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_donhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('dh_ma')->autoIncrement();
            $table->unsignedBigInteger('kh_ma');
            $table->dateTime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dh_thoiGianNhanHang');
            $table->string('dh_nguoiNhan', 100);
            $table->string('dh_diaChi', 191);
            $table->string('dh_dienThoai', 11);
            $table->string('dh_nguoiGui', 100);
            $table->text('dh_loiChuc')->nullable();
            $table->unsignedTinyInteger('dh_daThanhToan')->default('0');
            $table->unsignedSmallInteger('nv_xuLy')->default('1');
            $table->dateTime('dh_ngayXuLy')->nullable()->default(NULL);
            $table->unsignedSmallInteger('nv_giaoHang')->default('1');
            $table->dateTime('dh_ngayLapPhieuGiao')->nullable()->default(NULL);
            $table->dateTime('dh_ngayGiaoHang')->nullable()->default(NULL);
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('dh_trangThai')->default('1');
            $table->unsignedTinyInteger('vc_ma');
            $table->unsignedTinyInteger('tt_ma');

            $table->foreign('kh_ma')
                ->references('kh_ma')->on('cusc_khachhang')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            
            $table->foreign('nv_xuLy')
                ->references('nv_ma')->on('cusc_nhanvien')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('nv_giaoHang')
                ->references('nv_ma')->on('cusc_nhanvien')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('vc_ma')
                ->references('vc_ma')->on('cusc_vanchuyen')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('tt_ma')
                ->references('tt_ma')->on('cusc_thanhtoan')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        //DB::statement("ALTER TABLE `cusc_donhang` comment 'Đơn hàng # Đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_donhang');
    }
}
