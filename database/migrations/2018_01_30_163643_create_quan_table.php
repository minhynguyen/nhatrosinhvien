<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan', function (Blueprint $table) {
            $table->unsignedTinyInteger('qu_ma')->autoIncrement()->comment('Mã quận');
            $table->string('qu_ten', 50)->comment('Tên quận');
            $table->timestamp('qu_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo quận');
            $table->timestamp('qu_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật quận gần nhất');            
            $table->unique(['qu_ten']);
        });
        DB::statement("ALTER TABLE `quan` comment 'Quận'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quan');
    }
}
