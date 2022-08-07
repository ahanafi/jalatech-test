<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $products = Product::paginate(10);
        return $this->handleResponse(ProductResource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create($request->all());
            return $this->handleResponse(new ProductResource($product), 'The product was successfully created.');
        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return $this->handleResponse(new ProductResource($product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        try {
            $product->update($request->all());
            return $this->handleResponse(new ProductResource($product), 'The product was successfully updated.');
        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return $this->handleResponse([], 'The product was successfully deleted.');
        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }
}
