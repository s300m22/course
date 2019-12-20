<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiConroller;
use Illuminate\Http\Request;

class BuyerController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,buyer')->only('show');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyeers = Buyer::has('transaction')->get();
        return response()->json(['data' => $buyeers] , 200);
    }



    public function show(Buyer $buyeers)
    {
        // $buyeers = Buyer::has('transaction')->findOrFail();
        return response()->json(['data' => $buyeers] , 200);
    }
//


}
