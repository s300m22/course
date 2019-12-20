<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use App\Seller;
use Illuminate\Http\Request;

class SellerTransactionController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:view,seller')->only('index');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $transaction = $seller->products()
        ->whereHas('transactions')
        ->with('transactions')
        ->get();
        // ->pluck('transactions');
        // ->collapse();
         return $this->showAll($transaction);
    }

}
