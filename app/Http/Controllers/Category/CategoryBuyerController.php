<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Categoy;
use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryBuyerController extends ApiConroller
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
    public function index(Category $category)
    {
        $buyer =  $category->products()
        ->whereHas('transaction.buyer')
        ->with('transaction.buyer')
        ->get()
        ->pluck('transaction')
        ->callapse()
        ->pluck('buyer')
        ->unique('id')
        ->values();
        return $this->showAll($buyer);
    }

}
