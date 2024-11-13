<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory; 

    protected $fillable = [ 
        'order_id', 
        'product_id', 
        'quantity', 
        'price' 
    ]; 

    // Quan hệ nhiều-một với Order 
    public function orders() 
    { 
        return $this->belongsTo(Orders::class); 
    } 

    // Quan hệ nhiều-một với Product 
    public function product() 
    { 
        return $this->belongsTo(Product::class); 
    } 
}
