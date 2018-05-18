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
// SELECT max(clamp) AS watts, MONTH(created_at) AS mes, MONTHNAME(created_at) as mes_nom, DAY(created_at) AS dia, DAYNAME(created_at) as dia_nom FROM electricities WHERE (created_at >= '2018-04-23 19:04:54' AND created_at < '2018-04-23 23:59:59' ) GROUP BY mes, mes_nom ORDER BY mes ASC

    }

    public function maxdaterange()
    {
        $hora = ' 00:00:00';
        $data = request()->all();

        $start = $data['datainici'];
        $end = $data['datafi'];

        $watts = DB::select("SELECT max(clamp) as watts, created_at as data FROM electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY created_at");

        $result = array();
        foreach ($watts as $watt){
            $watt->watts;
            $watt->data;
            $result[] = (array)$watt;
        }

        //Afaga les dades de $result imprimeix el Excel
        Excel::create('Consum Màxim Entre Dates', function($excel) use ($result) {

            $excel->sheet('Consum Màxim Entre Dates', function($sheet) use ($result){

                $sheet->fromArray($result);

            });
        })->export('xls');
    }

    public function mindaterange()
    {
        $hora = ' 00:00:00';
        $data = request()->all();

        $start = $data['datainici'];
        $end = $data['datafi'];

        $watts = DB::select("SELECT min(clamp) as watts, created_at as data FROM electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY created_at");

        $result = array();
        foreach ($watts as $watt){
            $watt->watts;
            $watt->data;
            $result[] = (array)$watt;
        }

        //Afaga les dades de $result imprimeix el Excel
        Excel::create('Consum Mínim Entre Dates', function($excel) use ($result) {

            $excel->sheet('Consum Mínim Entre Dates', function($sheet) use ($result){

                $sheet->fromArray($result);

            });
        })->export('xls');
    }

    public function avgdaterange()
    {
        $hora = ' 00:00:00';
        $data = request()->all();

        $start = $data['datainici'];
        $end = $data['datafi'];

        $watts = DB::select("SELECT avg(clamp) as watts, created_at as data FROM electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY created_at");

        $result = array();
        foreach ($watts as $watt){
            $watt->watts;
            $watt->data;
            $result[] = (array)$watt;
        }

        //Afaga les dades de $result imprimeix el Excel
        Excel::create('Consum Mitjà Dates', function($excel) use ($result) {

            $excel->sheet('Consum Mitjà Dates', function($sheet) use ($result){

                $sheet->fromArray($result);

            });
        })->export('xls');
    }
}
