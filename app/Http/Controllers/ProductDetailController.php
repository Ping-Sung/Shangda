<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductDetailService;

class ProductDetailController extends Controller
{
    public $ProductDetailService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->ProductDetailService = new ProductDetailService();
    }

    // api  
    public function store(Request $request, $product_id)
    {
        $product_details = $this->ProductDetailService->add($request, $product_id);
        return response()->json($product_details, 200);
    }

    public function update(Request $request, $id)
    {
        $product_detail = $this->ProductDetailService->update($request, $id);
        return response()->json($product_detail, 200);
    }

    public function destroy($id)
    {
        $product_detail = $this->ProductDetailService->delete($id);
        return response()->json($product_detail, 200);
    }
}
