<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTienichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienich', function (Blueprint $table) {
            $table->unsignedTinyInteger('ti_ma')->autoIncrement()->comment('Mã Tiện Ích Nhà Trọ');
            $table->string('ti_ten', 30)->comment('Tên Tiện Ích Nhà Trọ');
            $table->string('ti_diengiai', 250)->comment('Diễn giải # Diễn giải về Tiện Ích Nhà Trọ');
            $table->timestamp('ti_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo Tiện Ích Nhà Trọ');
            $table->timestamp('ti_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật Tiện Ích Nhà Trọ gần nhất');
            
            
            $table->unique(['ti_ten']);
        });
        DB::statement("ALTER TABLE `tienich` comment 'Tiện Ích Nhà Trọ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tienich');
    }
}
