<?php

namespace App\Http\Controllers;

use App\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
//        Excel::create('Laravel Excel', function($excel) {
//
//            $excel->sheet('Electricity', function($sheet) {
//
//                $products = DB::select("SELECT max(clamp) as watts, created_at as data FROM electricities WHERE (created_at >= '2018' AND created_at < '2018' ) GROUP BY created_at");
//
//                $sheet->fromArray($products);
//
//            });
//        })->export('xls');


    }

    public function maxdaterange($start, $end)
    {
        Excel::create('Laravel Excel', function($excel) {

            $excel->sheet('ElectricityMaxDateRange', function($sheet) {

                $start = $this->start;
                $end = $this->end;

                $products = DB::select("SELECT max(clamp) as watts, created_at as data FROM electricities WHERE (created_at >= '$start' AND created_at < '$end' ) GROUP BY created_at");

                $sheet->fromArray($products);

            });
        })->export('xls');
    }
}
