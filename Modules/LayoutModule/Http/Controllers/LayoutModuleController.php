<?php

namespace Modules\LayoutModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LayoutModuleController extends Controller
{
    private $DoctorService;

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function homePage()
    {
        return view('layoutmodule::public.home_template');
    }
}
