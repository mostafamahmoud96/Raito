<?php

namespace Modules\CustomerModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

use Modules\CustomerModule\Services\CustomerService;

use DataTables;
class CustomerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct(CustomerService $CustomerService)
    {
               $this->CustomerService = $CustomerService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('customermodule::admin.indexCustomers');
    }
    public function getIndexAdmins(Request $request)
    {
        if ($request->ajax()) {
            $admins = [];
            if (auth()->guard('admin')->user()) {
                $admins = $this->CustomerService->findAll();
            }
            $table = DataTables::of($admins);
            $table->addColumn('action', function ($admins) {
                $button = null;
                if ($admins->deleted_at == null) {

                    $button = '<a class="btn-sm btn-warning" href="' . route('admin.admins.edit', $admins->id) . '" role="button">Edit</a>';
                    if ($admins->id != 2) {
                        // not super admin
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip" data-id="' . $admins->id . '"  data-original-title="Delete" class="btn-sm btn-danger deleteAdmin">Delete</a>';
                    }
                }
                return $button;
            });

            $table->rawColumns(['action']);

            return $table->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('CustomerModule::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'username' => 'required|unique:customers',
                'password' => 'required|min:4',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->CustomerService->create($request);
        return redirect()->route('admin.customers')
            ->with('success', 'Added Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('adminmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = $this->CustomerService->findOne($id);
        return view('customermodule::admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:customers,email,' . $request->id,
                'password' => 'nullable|min:4',
                'address'=>'required|min:4'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->CustomerService->update($request);
        return redirect()->route('admin.customers')
            ->with('success', 'Added Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customer = $this->CustomerService->deleteOne($id);
        // dd($customer);
        if ($customer) {
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }

    // public function customer()
    // {
    //     return view('CustomerModule::admin.indexCustomers');
    // }

    public function getIndexCustomers(Request $request)
    {
        if ($request->ajax()) {
            $customers = [];
            if (auth()->guard('admin')->user()) {
                $customers = $this->CustomerService->findAll();
            }

            $table = DataTables::of($customers);
            // dd($customers);

            $table->editColumn('orders', function ($customers) {
                $html = null;
                if (($customers->orders->count()) < 1) {
                    $html .= 0;
                } else {
                    $html .= $customers->orders->count();
                                  }
                return $html;
            });
            $table->addColumn('action', function ($customers) {
                $button = null;
                if ($customers->deleted_at == null) {

                    $button = '<a class="btn btn-sm btn-warning" href="' . route('admin.customers.edit', $customers->id) . '" role="button">Edit</a>';

                        $button .= '&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="tooltip" data-id="' . $customers->id . '"  data-original-title="Delete" class="btn btn-sm btn-danger deleteCustomer">Delete</a>';

                }
                return $button;
            });

            $table->rawColumns(['action','orders']);

            return $table->make(true);
        }
    }
}
