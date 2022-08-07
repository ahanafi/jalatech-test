<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApprovePendingSaleOrderRequest;
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

    /**
     * @param ApprovePendingSaleOrderRequest $request
     * @param Order $order
     * @return JsonResponse
     */
    public function approve(ApprovePendingSaleOrderRequest $request, Order $order)
    {
        // Validate that the order type is SALE
        if ($order->type !== Order::SALE) {
            return $this->handleError('Unable to process this request because the order type is not order sale');
        }

        // Validate that the order is unapproved
        if ($order->status === Order::APPROVED) {
            return $this->handleError('Unable to process this request because the order has already been approved.');
        }

        try {
            $order->updateStatus(Order::APPROVED);
            $order->load(['details']);
            return $this->handleResponse(new SaleOrderResource($order), 'The pending sale order has been approved by the Admin.');
        } catch (Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }
}
