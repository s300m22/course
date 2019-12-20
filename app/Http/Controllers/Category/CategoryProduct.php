<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryProduct extends ApiConroller
{

    public function __construct()
    {
        // parent::__construct();
        $this->middleware('client.credentials')->only(['index']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $prodducts = $category->products;
        return $this->showAll($prodducts);
    }

}
