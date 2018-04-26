@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
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

                        <p>Consumits este Mes </p>
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

                        <p>Gastats este Mes </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a class="small-box-footer"> <i class="fa fa-check"></i></a>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
	{{--<div class="container-fluid spark-screen">--}}
		{{--<div class="row">--}}
			{{--<div class="col-md-9 col-md-offset-1">--}}

				{{--<div class="box box-success box-solid">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Example box</h3>--}}
                        {{--<div class="box-tools pull-right">--}}
                            {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                            {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>--}}
                        {{--</div>--}}
                        {{--<!-- /.box-tools -->--}}
                    {{--</div>--}}
                    {{--lalala--}}
                    {{--@php--}}
                    {{----}}
                    {{--@endphp--}}
                    {{--<!-- /.box-header -->--}}
                    {{--<div class="box-body">--}}
                        {{--@foreach ($electricities as $electricity)--}}
                            {{--<tr>--}}
                                {{--<td>Mes {{ $array[] = $electricity->month }}</td>--}}
                                {{--<br>--}}
                                {{--<td>Quantitat {{ $array[] = $electricity->sum }} W</td>--}}
                                {{--<br>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}

                            {{--@foreach ($electricities as $electricity)--}}
                                {{--<div class="col-lg-3 col-xs-6">--}}
                                    {{--<!-- small box -->--}}
                                    {{--<div class="small-box bg-red">--}}
                                        {{--<div class="inner">--}}
                                            {{--<h3>{{ $array[] = $electricity->sum }} Watts</h3>--}}

                                            {{--<p>{{ $array[] = $electricity->month }}</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="icon">--}}
                                            {{--<i class="ion ion-pie-graph"></i>--}}
                                        {{--</div>--}}
                                        {{--<a href="#" class="small-box-footer">More info <i--}}
                                                    {{--class="fa fa-arrow-circle-right"></i></a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}

                    {{--</div>--}}
                    {{--<!-- /.box-body -->--}}
                {{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
@endsection
