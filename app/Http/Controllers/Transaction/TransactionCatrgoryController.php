<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiConroller;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionCatrgoryController extends ApiConroller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('can:view,transaction')->only('show');

    }

    public function index(Transaction $transaction)
    {
        $categories = $transaction->products->categories;
        return $this->showAll($categories);
    }

}
