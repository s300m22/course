<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Categoy;
use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryTransactionController extends ApiConroller
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
        $transaction = $category->product()
        ->whereHas('transaction')
        ->with('transaction')
        ->get()
        ->pluck('transaction')
        ->unique('id')
        ->values();
        return $this->showAll($transaction);
    }

}
