<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Services\AdminService;
use Modules\CustomerModule\Services\CustomerService;
use Modules\OrderModule\Entities\Order;
use Modules\ProductModule\Entities\Product;
use Yajra\DataTables\Facades\DataTables;
use Modules\ProductModule\Services\ProductService;
use Modules\OrderModule\Services\OrderService;
use Modules\ProductModule\Services\StockService;

// use Response;


class OrderAdminController extends Controller
{
    private $productService;
    public function __construct(
        ProductService $productService,
        OrderService $orderService,
        CustomerService $customerService,
        StockService $stockService,
        AdminService $adminService
    ) {
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->customerService = $customerService;
        $this->stockService = $stockService;
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(CustomerService $customerService)
    {
        $customers = $customerService->findAll();
        // dd($customers);
        return view('ordermodule::admin.index', compact('customers'));
    }

    public function indexOrders(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->toArray());
            $orders = [];
            if (auth()->guard('admin')->user()) {
                if ($request->date_from != '' && $request->date_to != '') {
                    $orders = $this->orderService->findAllByDateRange($request->date_from, $request->date_to);
                } else {
                    $orders = $this->orderService->findAll();
                    // dd($orders);
                }
            }
            $table = DataTables::of($orders);
            $table->editColumn('customer_id', function ($orders) {
                if ($orders->customer_id == 0) {
                    $name = "زائر";
                } else {
                    $customer = $this->customerService->findOne($orders->customer_id);
                    $name = $customer->name;
                }
                return $name;
            });
            $table->editColumn('order_nu', function ($orders) {
                $html = '&nbsp;&nbsp;&nbsp;<a class=" showOrder" href="#" data-original-title="showOrder" data-id="' . $orders->id . '" role="button">' . $orders->order_nu . '</a>';
                return $html;
            });

            $table->editColumn('created_at', function ($orders) {
                $date = $orders->created_at;
                $html = date_format($date, 'd-m-Y H:i');
                return $html;
            });
            $table->addColumn('action', function ($orders) {
                $button = '';
                $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-warning showOrder" href="#" data-original-title="showOrder" data-id="' . $orders->id . '" role="button">View</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip"  data-id="' . $orders->id . '"  data-original-title="deleteOrder" class="btn btn-sm btn-danger deleteOrder">Delete</a>';
                // dd($orders->id);
                return $button;
            });
        }
        $table->rawColumns(['action', 'order_nu', 'is_paid', 'created_at']);
        return $table->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request, ProductService $productService)
    {
        $customers = $this->customerService->findAll();
        $admin = auth()->guard('admin')->user();
        $products = $productService->findAll()->where('items_in_stock', '>', 0);

        return view('ordermodule::admin.create', compact('customers', 'admin', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $order_id = $this->orderService->create($request)->id;
        // dd($order_id);
        return redirect()->route('admin.order.show', $order_id);
    }


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
        return view('ordermodule::admin.show', compact('order', 'product_item', 'customer', 'customer'));
        // $order = $this->orderService->findOne($id);
        // $product_item = $this->orderService->findOrderItems($order['products']);
        // $admin = $this->adminService->findOne($order['created_by_id']);

        // if ($order['customer_id'] == 0) {
        //     $customer = null;
        // } else {

        //     $customer = $this->customerService->findOne($order['customer_id']);
        // }
        // return view('ordermodule::admin.show', compact('order', 'product_item', 'customer', 'admin'));
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */


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

    public function showOrder(Request $request, OrderService $orderService)
    {
        $id = $request->get('order_id');
        $order = $orderService->findWhere(['id' => $id]);
        // dd($order);
        if ($request->ajax()) {
            $arr_products = [];
            if ($order->products->count() > 0) {
                foreach ($order->products as $one_product) {
                    $arr_products[] = [
                        "order_nu" => $order['order_nu'],
                        "created_at" =>  date_format($order['created_at'], 'd-m-Y H:i'),
                        "total" => $order['total'],
                        "product_name" => $one_product['product_name'],
                        "item_price" => $one_product['item_price'],
                        "quantity" => $one_product['quantity'],
                        "total_price" => $one_product['total_price'],
                    ];
                }
            }

            return   response()->json($arr_products);
        }
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
    public function delete($id)
    {
        // dd($id);
        $order = $this->orderService->findOne($id);
        $product_item = $this->orderService->findOrderItems($order['products']);
        // dd($product_item);
        $restore = $this->stockService->restore($product_item);

        // dd($restore);
        $delete = $this->orderService->deleteOne($id);
        // dd($delete);
        if ($delete) {
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }
}
