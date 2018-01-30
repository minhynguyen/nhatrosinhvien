<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truong', function (Blueprint $table) {
            $table->unsignedTinyInteger('t_ma')->autoIncrement()->comment('Mã Trường');
            $table->string('t_ten', 30)->comment('Tên Trường # Tên Trường');
            $table->double('t_kinhdo',20,10)->comment('Kinh Độ Của Trường trên GG Map');
            $table->double('t_vido',20,10)->comment('Vĩ Độ Của Trường trên GG Map');
            $table->timestamp('t_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo Trường');
            $table->timestamp('t_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật Trường gần nhất');
            $table->tinyInteger('t_trangthai')->default('2')->comment('Trạng thái # Trạng thái Trường: 1-khóa, 2-khả dụng');
            
            $table->unique(['t_ten']);
        });
        DB::statement("ALTER TABLE `truong` comment 'Trường'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truong');
    }
}
