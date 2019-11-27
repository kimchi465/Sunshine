<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nhacungcap', function (Blueprint $table) {
            $table->unsignedSmallInteger('ncc_ma')->autoIncrement();
            $table->string('ncc_ten', 150);
            $table->string('ncc_daiDien', 100);
            $table->string('ncc_diaChi', 191);
            $table->string('ncc_dienthoai', 11);
            $table->string('ncc_email', 100);
            $table->timestamp('ncc_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ncc_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('ncc_trangThai')->default('2');
            $table->unsignedSmallInteger('xx_ma');

            $table->unique(['ncc_ten']);
            $table->foreign('xx_ma') //cột khóa ngoại là cột `xx_ma` trong table `nhacungcap`
                ->references('xx_ma')->on('cusc_xuatxu') //cột sẽ tham chiếu đến là cột `xx_ma` trong table `xuatxu`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_nhacungcap` comment 'Nhà cung cấp # Nhà cung cấp: ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_nhacungcap');
    }
}
