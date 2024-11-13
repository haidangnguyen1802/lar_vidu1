<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class Payment extends Model 
{ 
    use HasFactory; 

    protected $fillable = ['order_id', 'amount', 'payment_date', 'payment_method']; 

    public function order() 
    { 
        return $this->belongsTo(Orders::class); // Sửa khoảng trắng không cần thiết
    } 
}