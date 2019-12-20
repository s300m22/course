<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ApiConroller extends Controller
{
    use ApiResponser;

    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth:api');
    }
}
