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
        $data['status'] = self::PENDING;
        return self::create($data);
    }


}
