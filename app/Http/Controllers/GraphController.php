<?php

namespace App\Http\Controllers;

use App\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function graphjsonactualmonth()
    {
        $translate = trans('message.db_lang');

        $month = date("m");
        DB::SELECT("set lc_time_names = '$translate'");
        $electricities = DB::select("SELECT sum(clamp) as watts, DATE_FORMAT(created_at, ' %d %W %M') as date from electricities WHERE created_at >= makedate(year(curdate()), 1) and created_at < makedate(year(curdate()) + 1, 1) and MONTH(created_at) = '$month' GROUP BY date");


        return response()->json($electricities);
    }


    public function graphjsonsummonth()
    {
        $translate = trans('message.db_lang');

        $any = date("Y");
        DB::SELECT("set lc_time_names = '$translate'");
        $electricities = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any, MONTH(created_at) AS mes, MONTHNAME(created_at) as mes_nom FROM electricities WHERE YEAR(created_at) = $any GROUP BY YEAR(created_at), mes, mes_nom ORDER BY YEAR(created_at), mes ASC");

//        foreach ($electricities as $electricity){
//            $watts = $electricity->watts / 1000;
//            $mes = $electricity->mes;
//            $any = $electricity->any;
//        }


        return response()->json($electricities);
    }
}