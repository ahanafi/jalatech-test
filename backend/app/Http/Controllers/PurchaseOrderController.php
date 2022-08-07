<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Resources\PurchaseOrderResource;
use App\Models\DetailOrder;
use App\Models\Order;
use Exception;
use Illuminate\Http\JsonResponse;

class PurchaseOrderController extends Controller
{
    /**
     * @param StorePurchaseOrderRequest $request
     * @return JsonResponse
     */
    public function store(StorePurchaseOrderRequest $request)
    {
        try {
            $order = Order::createPurchaseOrder($request->all());
            foreach ($request->get('products') as $product) {
                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],
                    'qty' => $product['qty'],
                    'unit_price' => $product['unit_price']
                ]);
            }

            $order->load(['details']);
            return $this->handleResponse(new PurchaseOrderResource($order), 'The purchase order was successfully created.');
        } catch (Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }
}
