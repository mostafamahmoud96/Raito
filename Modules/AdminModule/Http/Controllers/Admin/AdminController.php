<?php

namespace Modules\AdminModule\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\AdminModule\Services\AdminService;
use Modules\CustomerModule\Services\CustomerService;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService, CustomerService $customerService)
    {
        $this->adminService = $adminService;
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('adminmodule::admin.index');
    }
    public function getIndexAdmins(Request $request)
    {
        if ($request->ajax()) {
            $admins = [];
            if (auth()->guard('admin')->user()) {
                $admins = $this->adminService->findAll();
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
        return view('adminmodule::admin.create');
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
        $this->adminService->create($request);
        return redirect()->route('admin.admins')
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
        $admin = $this->customerService->findOne($id);
        return view('adminmodule::admin.edit', compact('admin'));
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
                'username' => 'required|unique:customers,email,' . $request->id,
                'password' => 'nullable|min:4',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $request['first_password'] = null;
        $this->adminService->update($request);
        return redirect()->route('admin.admins')
            ->with('success', 'Added Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customer = $this->adminService->deleteOne($id);
        // dd($customer);
        if ($customer) {
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }

}
