<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyerProductController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,buyer')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $products = $buyer->transactions()
            ->with('product')
            ->get();
//            ->pluck('product');
        return  $this->showAll($products);
    }

}
