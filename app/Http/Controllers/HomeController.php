<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Electricity;
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
        PricekWController::class;
    }

    /**
     * @return float
     */
    public function wattstoeuros()
    {
        $month = date("m");
        $electricities = DB::select("select MonthName(created_at) as month, sum(clamp) as sum from electricities where created_at >= makedate(year(curdate()), 1) and created_at < makedate(year(curdate()) + 1, 1) and MONTH(created_at) = '$month' group by MonthName(created_at)");

        //Calcul euros
        foreach ($electricities as $value) {
            $kw = $value->sum / 1000;
            $resultat = $kw * PricekWController::price_kw();
        }

        return round($resultat, 2);
    }

    /**
     * @return float
     */
    public function totalyearwatts()
    {
        $year = date("Y");

        $totalwatts = DB::select("select sum(clamp) as sum from electricities where created_at LIKE '%$year%'");

        foreach ($totalwatts as $totalwatt) {
            $resultat = $totalwatt->sum / 1000;

        }

        return round($resultat, 2);
    }

    /**
     * @return float
     */
    public function totalyeareuros()
    {
        $year = date("Y");

        $totaleuros = DB::select("select sum(clamp) as sum from electricities where created_at LIKE '%$year%'");

        foreach ($totaleuros as $totaleuros) {
            $kw = $totaleuros->sum / 1000;
            $resultat = $kw * PricekWController::price_kw();

        }

        return round($resultat, 2);
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

        $yeareuros = $this->totalyeareuros();

        $electricities = DB::select("select MonthName(created_at) as month, sum(clamp) as sum from electricities where created_at >= makedate(year(curdate()), 1) and created_at < makedate(year(curdate()) + 1, 1) and MONTH(created_at) = '$month' group by MonthName(created_at)");

        return view('home',compact(['electricities', 'euros', 'yearkwatts', 'yeareuros']));
    }
}
