@extends('adminlte::page')


@section('contentheader_title')
    Dashboard
@endsection

@section('htmlheader_title')
	Dashboard
@endsection


@section('main-content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                @foreach ($electricities as $electricity)
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $array[] = $electricity->sum }} Watts</h3>

                        <p>Consumits aquest Mes </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bolt"></i>
                    </div>
                    <a class="small-box-footer"> <i class="fa fa-check"></i></a>
                </div>
                @endforeach

            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $euros }} <sup style="font-size: 20px">€</sup></h3>

                        <p>Gastat aquest Mes </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a class="small-box-footer"> <i class="fa fa-check"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $yearkwatts }} <sup style="font-size: 20px">Kw</sup></h3>

                        <p>Consumits aquest Any {{ date("Y") }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-balance-scale"></i>
                    </div>
                    <a class="small-box-footer"> <i class="fa fa-check"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->

                <div class="small-box bg-olive-active">
                    <div class="inner">
                        <h3>{{ $yeareuros }} <sup style="font-size: 20px">€</sup></h3>

                        <p>Gastats aquest Any {{ date("Y") }} </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calculator"></i>
                    </div>
                    <a class="small-box-footer"> <i class="fa fa-check"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->



    </section>
    <!-- /.content -->
@endsection
