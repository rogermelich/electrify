<?php

namespace App\Http\Controllers;

use App\price_kw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PricekWController extends Controller
{
    public static function price_kw()
    {
        $prices = DB::select("select price_kw from price_kw");
        foreach ($prices as $price){
            $price_kw = $price->price_kw;
        }

        return $price_kw;
    }

    public function price_kw_update()
    {
        $this->validate(request(), [
            'price_kws' => 'required',
        ]);

        $data = request()->all();

        DB::table('price_kw')
            ->where('id', 1)
            ->update(['price_kw' => $data['price_kws']]);


        return redirect()->back()->with('status', 'Preu Modificat Correctament!');

    }
}
