<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\CustomerModule\Services\CustomerService;
use Modules\OrderModule\Entities\Order;
use Modules\ProductModule\Entities\Product;
use Yajra\DataTables\Facades\DataTables;
use Modules\ProductModule\Services\ProductService;
use Modules\OrderModule\Services\OrderService;
use Modules\ProductModule\Services\StockService;

// use Response;


class OrderCustomerController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService, OrderService $orderService,  StockService $stockService, CustomerService $customerService)
    {
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->customerService = $customerService;
        // $this->customerService = $customerService;

        $this->stockService = $stockService;
    }


    // search by barcode for product
    public function search(Request $request)
    {
        // dd($request->toArray());
        $id = $request->get('search');
        // dd($id);
        $product = Product::find($id);
        // dd($product);
        if ($request->ajax()) {

            return   response()->json([
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'in_stock' => $product['items_in_stock']
            ]);
        }
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('ordermodule::customer.index');
    }

    public function indexOrders(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->toArray());
            $orders = [];
            if (auth()->guard('customer')->user()) {
                if ($request->date_from != '' && $request->date_to != '') {
                    $orders = $this->orderService->findAllByDateRange($request->date_from, $request->date_to);
                } else {
                    $orders = $this->orderService->findAll()->where('customer_id', Auth::id());
                    // dd($orders);
                }
            }
            $table = DataTables::of($orders);

            $table->editColumn('created_at', function ($orders) {
                $date = $orders->created_at;
                $html = date_format($date, 'd-m-Y H:i');
                return $html;
            });
            $table->addColumn('action', function ($orders) {
                $button = '';
                $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-warning showOrder" href="' . route('customer.order.show', $orders->id) . '" data-original-title="showOrder" data-id="' . $orders->id . '" role="button">View</a>';
                // dd($orders->id);
                return $button;
            });
        }
        $table->rawColumns(['action',  'created_at']);
        return $table->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $customer = auth()->guard('customer')->user();

        $customers = $this->productService->findAll()->where('items_in_stock', '>', 0);

        return view('ordermodule::customer.create', compact('customers', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        // $payment_method = '';
        // if ($request->paymentStatus == 1) {
        //     $payment_method = 'cash';
        // }
        $order_id = $this->orderService->create($request)->id;

        return redirect()->route('customer.order.show', $order_id);
        //   }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $order = $this->orderService->findOne($id);
        $product_item = $this->orderService->findOrderItems($order['products']);

        $customer =
            $this->customerService->findOne($order['customer_id']);
        if ($order['customer_id'] == 0) {
            $customer = null;
        } else {

            $customer = $this->customerService->findOne($order['customer_id']);
        }
        return view('ordermodule::customer.show', compact('order', 'product_item', 'customer', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ordermodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
