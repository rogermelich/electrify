<?php

namespace App\Http\Controllers;

use App\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function graphjson()
    {
        //$electricities = Electricity::select('clamp', 'created_at')->get();
        $electricities = DB::select("SELECT sum(clamp) as watts, DAY(created_at) as date from electricities GROUP BY date");


        //print json_encode($electricities);
        //return $electricities;
        return response()->json($electricities);
    }
}
