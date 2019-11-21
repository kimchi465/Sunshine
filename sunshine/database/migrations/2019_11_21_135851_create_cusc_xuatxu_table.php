<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscXuatxuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_xuatxu', function (Blueprint $table) {
            $table->unsignedSmallInteger('xx_ma')->autoIncrement();
            $table->string('xx_ten', 100);
            $table->timestamp('xx_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('xx_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('xx_trangThai')->default('2');
            $table->unique(['xx_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_xuatxu');
    }
}
