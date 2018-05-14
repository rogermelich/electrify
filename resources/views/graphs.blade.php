@extends('adminlte::page')

@section('contentheader_title')
    Graphs
@endsection

@section('htmlheader_title')
    Graphs
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total KWs per Mes (Any Actual)</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <canvas class="container" id="chartSumMonth"></canvas>
                    <!-- row -->
                </div>
                <!-- /.box-body -->
            </div>
            <div class="col-md-6">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Comparativa KWs entre l'any actual i l'anterior</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                {{--<canvas class="container" id="chartMonthYear"></canvas>--}}
                <!-- row -->
                </div>
                <!-- /.box-body -->
            </div>
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Comparativa KWs entre l'any actual i l'anterior</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <canvas class="container" id="chartMonthYear"></canvas>
                    <!-- row -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@section('add-scripts')
    @include('scripts.graph_scripts')
@endsection
