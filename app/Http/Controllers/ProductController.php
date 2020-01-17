<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use App\Services\BasicMaterialService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $ProductService;
    public $BasicMaterialService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->ProductService = new ProductService();
        $this->BasicMaterialService = new BasicMaterialService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->ProductService->getList();
        $lastUpdate = $this->ProductService->getlastupdate();
        return view('products.index', compact('products', 'lastUpdate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $BasicMaterials = $this->BasicMaterialService->getList();
        return view('products.create', compact('BasicMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->ProductService->add($request);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->ProductService->getOne($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->ProductService->getOne($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->ProductService->update($request, $id);
        return redirect()->route('products.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ProductService->delete($id);
        return redirect()->route('products.index');
    }

    /** API Function **/
    public function getProductListByCategory($category_id)
    {
        $products = $this->ProductService->getProductByCategory($category_id);
        if($products == "此類別查無資料"){
            return response()->json($products, 400);
        }else{
            return response()->json($products, 200);
        }
        ;
    }
}
