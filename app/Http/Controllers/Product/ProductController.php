<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiConroller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('client.credentials')->only(['index' , 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->showAll($products);
    }


    public function show(Product $product)
    {
        return $this->showOne($product);
    }

}
