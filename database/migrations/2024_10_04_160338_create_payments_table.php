<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePaymentsTable extends Migration // Sửa tên class để không có khoảng trắng
{
    public function up() 
    { 
        Schema::create('payments', function (Blueprint $table) { 
            $table->id(); // Đặt ID cho bảng
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Liên kết đến bảng orders
            $table->decimal('amount', 10, 2); // Số tiền thanh toán
            $table->timestamp('payment_date')->default(DB::raw('CURRENT_TIMESTAMP')); // Ngày thanh toán
            $table->enum('payment_method', ['COD', 'online'])->default('online'); // Phương thức thanh toán
            $table->timestamps(); // Tạo trường created_at và updated_at
        }); 
    } 

    public function down() 
    { 
        Schema::dropIfExists('payments'); // Xóa bảng payments nếu tồn tại
    } 
}