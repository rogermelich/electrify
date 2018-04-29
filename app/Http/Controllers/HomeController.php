<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Electricity;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hoursmonth()
    {
        $hours = DB::select("SELECT timestampdiff(HOUR, (SELECT SUBDATE(created_at, DAYOFMONTH(created_at) - 1) as hours FROM electricities LIMIT 1), now()) as value");

        foreach ($hours as $hour) {
            $result = $hour->value;
        }

        return $result;
    }

    public function wattstoeuros()
    {
        $month = date("m");
        //$electricities = Electricity::all();
        $electricities = DB::select("select MonthName(created_at) as month, sum(clamp) as sum from electricities where created_at >= makedate(year(curdate()), 1) and created_at < makedate(year(curdate()) + 1, 1) and MONTH(created_at) = '$month' group by MonthName(created_at)");



        //$electricities = DB::select('select * from electricities');
        //Calcul euros
        foreach ($electricities as $value) {
            //$wh = $value->sum * $this->hoursmonth() / 1000;
            //$kwh = $wh / 1000;
            $kw = $value->sum / 1000;
            $resultat = $kw * 0.12159;
        }
//
//        print_r($result);
        //print_r($electricities);
        //return $this->hoursmonth();
        return $resultat;
        //return view('home');
    }

    public function totalyearwatts()
    {
        $year = date("Y");

        $totalwatts = DB::select("select sum(clamp) as sum from electricities where created_at LIKE '%$year%'");

        foreach ($totalwatts as $totalwatt) {
            $resultat = $totalwatt->sum / 1000;

        }

        return $resultat;
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $month = date("m");

        $euros = $this->wattstoeuros();
        $yearkwatts = $this->totalyearwatts();
        //$electricities = Electricity::all();
        $electricities = DB::select("select MonthName(created_at) as month, sum(clamp) as sum from electricities where created_at >= makedate(year(curdate()), 1) and created_at < makedate(year(curdate()) + 1, 1) and MONTH(created_at) = '$month' group by MonthName(created_at)");
        //$electricities = DB::select('select * from electricities');
//        foreach ($electricities as $key => $value) {
//            $result[] = $value->month;
//            $result[] = $value->sum;
//        }
//
//        print_r($result);
        //print_r($electricities);
        return view('home',compact(['electricities', 'euros', 'yearkwatts']));
        //return view('home');
    }
}
