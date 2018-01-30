<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->unsignedTinyInteger('q_ma')->autoIncrement()->comment('Mã quyền');
            $table->string('q_ten', 30)->comment('Tên quyền # Tên quyền');
            $table->string('q_diengiai', 250)->comment('Diễn giải # Diễn giải về quyền');
            $table->timestamp('q_taomoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo quyền');
            $table->timestamp('q_capnhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật quyền gần nhất');
            $table->tinyInteger('q_trangthai')->default('2')->comment('Trạng thái # Trạng thái quyền: 1-khóa, 2-khả dụng');
            
            $table->unique(['q_ten']);
        });
        DB::statement("ALTER TABLE `quyen` comment 'Quyền # Các quyền quản lý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
