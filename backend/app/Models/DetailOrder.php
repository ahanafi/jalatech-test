<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'unit_price'
    ];

    public static function boot()
    {
        parent::boot();
        DetailOrder::saved(function ($detail) {

            // Update qty of product when order type is purchase
            if ($detail->order->type === Order::PURCHASE) {
                $detail->product()->update([
                    'stock' => $detail->product->stock + $detail->qty
                ]);
            }

        });
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
