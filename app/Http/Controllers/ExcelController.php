<?php

namespace App\Http\Controllers;

use App\Electricity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function maxdaterange()
    {
        $hora = ' 00:00:00';
        $data = request()->all();

        $start = $data['datainici'];
        $end = $data['datafi'];

        $translate = trans('message.db_lang');
        DB::SELECT("set lc_time_names = '$translate'");

        $watts = DB::select("SELECT max(clamp) as watts, DATE_FORMAT(created_at, '%d %M') as data from electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY data");

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

        $translate = trans('message.db_lang');
        DB::SELECT("set lc_time_names = '$translate'");
        $watts = DB::select("SELECT min(clamp) as watts, DATE_FORMAT(created_at, '%d %M') as data from electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY data");

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

        $translate = trans('message.db_lang');
        DB::SELECT("set lc_time_names = '$translate'");

        $watts = DB::select("SELECT avg(clamp) as watts, DATE_FORMAT(created_at, '%d %M') as data from electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY data");

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

    public function totaldaydaterange()
    {
        $hora = ' 00:00:00';
        $data = request()->all();

        $start = $data['datainici'];
        $end = $data['datafi'];

        $translate = trans('message.db_lang');
        DB::SELECT("set lc_time_names = '$translate'");

        $watts = DB::select("SELECT sum(clamp) as watts, DATE_FORMAT(created_at, '%d %M') as data from electricities WHERE (created_at >= '$start.$hora' AND created_at < '$end.$hora' ) GROUP BY data");

        $result = array();
        foreach ($watts as $watt){
            $watt->watts;
            $watt->data;
            $result[] = (array)$watt;
        }

        //Afaga les dades de $result imprimeix el Excel
        Excel::create('Consum total per dies', function($excel) use ($result) {

            $excel->sheet('Consum total per dies', function($sheet) use ($result){

                $sheet->fromArray($result);

            });
        })->export('xls');
    }
}
