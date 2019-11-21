<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_mau', function (Blueprint $table) {
            $table->unsignedTinyInteger('m_ma')->autoIncrement();
            $table->string('m_ten', 50);
            $table->timestamp('m_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('m_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('m_trangThai')->default('2');
            $table->unique(['m_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_mau');
    }
}
