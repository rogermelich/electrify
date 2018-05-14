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

        return response()->json($electricities);
    }

    public function graphjsonsummonthyear()
    {
        $translate = trans('message.db_lang');

        $year = date("Y");
        $any = $year-1;
        DB::SELECT("set lc_time_names = '$translate'");
        $electricities = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any, MONTH(created_at) AS mes, MONTHNAME(created_at) as mes_nom FROM electricities WHERE YEAR(created_at) = $any GROUP BY YEAR(created_at), mes, mes_nom ORDER BY YEAR(created_at), mes ASC");

        return response()->json($electricities);
    }

    public function graphjsonsumyears()
    {
        $translate = trans('message.db_lang');

        $year = date("Y");
        $any = $year-1;
        $any_dos = $year-2;
        $any_tres = $year-3;
        $any_quatre = $year-4;
        DB::SELECT("set lc_time_names = '$translate'");
        $actual_year = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any FROM electricities WHERE YEAR(created_at) = $year GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");
        $actual_year_u = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any FROM electricities WHERE YEAR(created_at) = $any GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");
        $actual_year_dos = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any FROM electricities WHERE YEAR(created_at) = $any_dos GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");
        $actual_year_tres = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any FROM electricities WHERE YEAR(created_at) = $any_tres GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");
        $actual_year_quatre = DB::select("SELECT sum(clamp) AS watts, YEAR(created_at) AS any FROM electricities WHERE YEAR(created_at) = $any_quatre GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");

        return response()->json(array($actual_year, $actual_year_u, $actual_year_dos, $actual_year_tres, $actual_year_quatre));
    }

}
