<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Categoy;
use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorySellerController extends ApiConroller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $seller =  $category->products()
        ->with('seller')
        ->get();
        // ->pluck('seller')
        // ->unique('id')
        // ->values();
        return $this->showAll($seller);

    }

}
