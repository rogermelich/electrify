<?php

namespace App\Http\Controllers;

use App\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function graphjson()
    {
        $translate = trans('message.db_lang');

        $month = date("m");
        DB::SELECT("set lc_time_names = '$translate'");
        $electricities = DB::select("SELECT sum(clamp) as watts, DATE_FORMAT(created_at, '%W %d %M') as date from electricities WHERE created_at >= makedate(year(curdate()), 1) and created_at < makedate(year(curdate()) + 1, 1) and MONTH(created_at) = '$month' GROUP BY created_at");


        return response()->json($electricities);
    }
}
