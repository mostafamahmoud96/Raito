<?php

namespace Modules\ProductModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Services\ProductService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class ProductModuleController extends Controller
{

    private $productService;
    public function __construct(
        ProductService $productService
    ) {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('productmodule::admin.index');
    }

    public function indexProducts(Request $request)
    {
        // dd($request);
        if ($request->ajax()) {
            $products = [];
            if (auth()->guard('admin')->user()) {
                $products = $this->productService->findAll();
                // dd($products->name);
            }
            $table = DataTables::of($products);
            $table->editColumn('items_in_stock', function ($products) {
                $html = null;
                if ($products->items_in_stock < 1) {
                    $html .= '<span style="color:red"> not available</span><a class="btn btn-sm  float-right addToStock" href="#" data-original-title="addToStock"  data-id="' . $products->id . '"role="button"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                    </a>';
                } else {
                    $html .= $products->items_in_stock . '<a class="btn btn-sm  float-right addToStock" href="#" data-original-title="addToStock"  data-id="' . $products->id . '"role="button"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                    </a>';
                }
                return $html;
            });

            $table->addColumn('normal_action', function ($products) {
                $button = null;
                $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-warning" href="' . route('admin.products.edit', $products->id) . '" role="button">edit</a>';
                // $button .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="' . route('admin.products.delete', $products->id) . '" role="button">delete</a>';
                $button .= '&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip" data-id="' . $products->id . '"  data-original-title="Delete" class="btn-sm btn-danger deleteProduct">Delete</a>';

                return $button;
            });
        }
        $table->rawColumns(['normal_action', 'items_in_stock']);
        return $table->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('productmodule::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // get barcode
        $id = $request->get('id');
        $product = Product::find($id);

        //validation
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|string',
                'price' => 'required',

            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $requests = $request->all();
        $this->productService->create($requests);

        return redirect()->route('admin.products')
            ->with('success', 'Added Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = $this->productService->findOne($id);
        return view('productmodule::admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // dd($request->barcode);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|string',
                'price' => 'required',
            ]
        );
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->productService->update($validator, $id);
        return redirect()->route('admin.products')->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $product = $this->productService->deleteOne($id);
        // dd($product);
        if ($product) {
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }

    public function active($id)
    {
        $this->productService->updateActivation($id);
        return redirect()->route('admin.products')
            ->with('success', 'Suspended Successfully.');
    }
}
