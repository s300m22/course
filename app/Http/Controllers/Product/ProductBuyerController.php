<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductBuyerController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:purchase,buyer')->only('store');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $buyer = $product->products()
        ->with('buyer')
        // ->select('category_id')
        ->get();
        // ->pluck('transactions');
        // ->collapse();
         return $this->showAll($buyer);
    }


}
