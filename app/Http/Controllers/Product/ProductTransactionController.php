<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductTransactionController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $transation = $product->transactions;
        return $this->showAll($transation);

    }

}
