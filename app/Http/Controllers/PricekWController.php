<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PricekWController extends Controller
{
    public function price_kw()
    {
        $price_kw = DB::select("select price_kw from price_kw");

        return $price_kw;
    }
}
