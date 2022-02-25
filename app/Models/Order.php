<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'total_price',
        'payment_method',
        'payment_id',
        'status',
        'message',
        'tracking-no',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
