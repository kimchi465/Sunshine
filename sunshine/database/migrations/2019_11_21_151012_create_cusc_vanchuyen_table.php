<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_vanchuyen', function (Blueprint $table) {
            $table->unsignedTinyInteger('vc_ma')->autoIncrement();
            $table->string('vc_ten', 150);
            $table->integer('vc_chiPhi')->default('0');
            $table->text('vc_dienGiai');
            $table->timestamp('vc_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('vc_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('vc_trangThai')->default('2');
            $table->unique(['vc_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_vanchuyen');
    }
}
