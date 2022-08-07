<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // Order Type
    const PURCHASE = 'PURCHASE',
          SALE = 'SALE';

    // Order Status
    const  PENDING = 'PENDING',
           APPROVED = 'APPROVED';

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'date',
        'type',
        'status',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(DetailOrder::class);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function createPurchaseOrder(array $data): mixed
    {
        $data['type'] = self::PURCHASE;
        $data['status'] = self::APPROVED;
        return self::create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function createSaleOrder(array $data): mixed
    {
        $data['type'] = self::SALE;

        // Order status depends on who made it
        // If order is created by Admin, the status is directly set to approved
        // When the order is created by the User, the order status is pending
        $data['status'] = auth()->user()->role === User::ADMIN ? self::APPROVED : self::PENDING;

        return self::create($data);
    }

    /**
     * @param $status
     * @return bool
     */
    public function updateStatus($status): bool
    {
        return $this->update(['status' => $status]);
    }


}
