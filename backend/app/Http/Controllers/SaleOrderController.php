<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleOrderRequest;
use App\Http\Resources\SaleOrderResource;
use App\Models\DetailOrder;
use App\Models\Order;
use Exception;
use Illuminate\Http\JsonResponse;

class SaleOrderController extends Controller
{
    /**
     * @param StoreSaleOrderRequest $request
     * @return JsonResponse
     */
    public function store(StoreSaleOrderRequest $request)
    {
        try {
            $order = Order::createSaleOrder($request->all());
            foreach ($request->get('products') as $product) {
                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],
                    'qty' => $product['qty'],
                    'unit_price' => $product['unit_price']
                ]);
            }

            $order->load(['details']);
            return $this->handleResponse(new SaleOrderResource($order), 'The sale order was successfully created.');
        } catch (Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }
}
