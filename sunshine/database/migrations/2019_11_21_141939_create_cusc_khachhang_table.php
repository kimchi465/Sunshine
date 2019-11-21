<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khachhang', function (Blueprint $table) {
            $table->unsignedbigInteger('kh_ma')->autoIncrement();
            $table->string('kh_taiKhoan', 50);
            $table->string('kh_matKhau', 32);
            $table->string('kh_hoTen', 100);
            $table->tinyInteger('kh_gioiTinh')->default('1');
            $table->string('kh_email', 100);
            $table->dateTime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('kh_diaChi', 150)->nullable()->default(DB::raw('NULL'));
            $table->string('kh_dienThoai', 11)->nullable()->default(DB::raw('NULL'));
            $table->timestamp('kh_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kh_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('kh_trangThai')->default('3');
            $table->unique(['kh_taiKhoan']);
            $table->unique(['kh_email']);
            $table->unique(['kh_dienthoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khachhang');
    }
}
