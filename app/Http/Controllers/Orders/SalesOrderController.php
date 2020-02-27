<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SalesOrderRequest;
use App\Services\Orders\SalesOrderService;
use App\Services\Orders\ReturnOrderService;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $SalesOrderService;
    public $ReturnOrderService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->SalesOrderService = new SalesOrderService();
        $this->ReturnOrderService = new ReturnOrderService();
    }

    public function index($status)
    {
        if($status == 1){
            $salesOrders = $this->SalesOrderService->getList();
            $lastUpdate = $this->SalesOrderService->getlastupdate();
            return view('salesOrders.index', compact('salesOrders', 'lastUpdate'));
        }else{
            $returnOrders = $this->ReturnOrderService->getList();
            $lastUpdate = $this->ReturnOrderService->getlastupdate();
            return view('returnOrders.index', compact('returnOrders', 'lastUpdate'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($status){

        if($status == 1){
            $new_shownID = $this->SalesOrderService->generateShownID();
            return view('salesOrders.create', compact('new_shownID'));
        }else{
            $new_shownID = $this->ReturnOrderService->generateShownID();
            return view('returnOrders.create', compact('new_shownID'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesOrderRequest $request){
        $status = $request->status;

        //出貨單
        if($status == 1){
            $salesOrder = $this->SalesOrderService->add($request);
            return response()->json([
                'salesOrder_id' => $salesOrder->id,
                'massenge' => '單號' . $salesOrder->shown_id . '建立成功。',
                'status' => 'OK'
            ]);
        }else{ //退貨單
            $returnOrder = $this->ReturnOrderService->add($request);
            return response()->json([
                'salesOrder_id' => $returnOrder->id,
                'massenge' => '單號' . $returnOrder->shown_id . '建立成功。',
                'status' => 'OK'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status)
    {
        $salesOrder = $this->SalesOrderService->getOne($id);
        if($status == 1){
            return view('salesOrders.show', compact('salesOrder'));
        }else{
            return view('returnOrders.show', compact('salesOrder'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status)
    {
        $salesOrder = $this->SalesOrderService->getOne($id);
        if($status == 1){
            return view('salesOrders.edit', compact('salesOrder'));
        }else{
            return view('returnOrders.edit', compact('salesOrder'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalesOrderRequest $request, $id)
    {
        $status = $request->status;
        //出貨單
        if($status == 1){
            $salesOrder = $this->SalesOrderService->update($request, $id);
        }else{ //退貨單
            $returnOrder = $this->ReturnOrderService->update($request, $id);
        }

        return redirect()->route('salesOrders.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $status)
    {
        //出貨單
        if($status == 1){
            $this->SalesOrderService->delete($id);
        }else{ //退貨單
            $this->ReturnOrderService->delete($id);
        }

        return redirect()->route('salesOrders.index');
    }

    // 以下出貨單用
    public function delivered(Request $request){
        $msg = $this->SalesOrderService->delivered($request);
        return response()->json($msg, 200);
    }

    // 傳 id, paid_at, paidAmount
    public function paid(Request $request){
        $msg = $this->SalesOrderService->paid($request);
        return response()->json($msg, 200);
    }

    // 取消付款 傳id
    public function paymentCancel(Request $request){
        $msg = $this->SalesOrderService->paymentCancel($request);
        return response()->json($msg, 200);
    }
}
