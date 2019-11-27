<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('nv_ma');
            $table->string('nv_taiKhoan', 50);
            $table->string('nv_matKhau', 256);
            $table->string('nv_hoTen', 100);
            $table->unsignedTinyInteger('nv_gioiTinh')->default('1');
            $table->string('nv_email', 100);
            $table->dateTime('nv_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_diaChi', 250);
            $table->string('nv_dienThoai', 11);
            $table->timestamp('nv_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('nv_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('nv_trangThai')->default('2');
            $table->unsignedTinyInteger('q_ma');
            
            $table->unique(['nv_taiKhoan', 'nv_email', 'nv_dienThoai']);
            $table->foreign('q_ma')
                ->references('q_ma')->on('cusc_quyen')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_nhanvien` comment 'Nhân viên # Nhân viên'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_nhanvien');
    }
}
