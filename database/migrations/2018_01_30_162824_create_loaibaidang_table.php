<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaibaidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaibaidang', function (Blueprint $table) {
            $table->unsignedTinyInteger('lbd_ma')->autoIncrement()->comment('Mã loại bài đăng');
            $table->string('lbd_ten', 50)->comment('Tên loại # Tên loại bài đăng');
            $table->timestamp('l_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại bài đăng');
            $table->timestamp('lbd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật loại bài đăng gần nhất');
            $table->tinyInteger('lbd_trangThai')->default('2')->comment('Trạng thái # Trạng thái loại bài đăng: 1-khóa, 2-khả dụng');
            
            $table->unique(['lbd_ten']);
        });
        DB::statement("ALTER TABLE `loaibaidang` comment 'Loại Bài Đăng # Loại Bài Đăng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaibaidang');
    }
}
