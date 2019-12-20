<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiConroller;
use App\Seller;
use Illuminate\Http\Request;

class SellerController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,seller')->only('show');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::has('product')->get();
        return response()->json(['data' => $sellers] , 200);
    }


    public function show(Seller $seller)
    {

        // $sellers = Seller::has('product')->findOrFail();
        return response()->json(['data' => $seller] , 200);
    }


}
