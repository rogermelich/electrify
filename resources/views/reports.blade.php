@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection


@section('main-content')
    <div class="content">
        <div class="row">
            <div class="box box-success collapsed-box">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="box-title">Informes Consum Màxim, Mínim i Mitjà</h3>

                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--Consum Alt--}}
                    <div class="col-md-4">

                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Informe Consum Maxim Entre Dates</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form action="{{ url('export/maxdaterange') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">


                                        <div class="input-group">
                                            <label>Data Inici</label>
                                            <input class="form-control" name="datainici" type="date"/>
                                        </div>
                                        <div class="input-group">
                                            <label>Data Fi</label>
                                            <input class="form-control" name="datafi" type="date"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Generar Informe</button>
                                </form>

                                <!-- Date and time range -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    {{--Consum Mínim--}}
                    <div class="col-md-4">

                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Informe Consum Mínim Entre Dates</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form action="{{ url('export/mindaterange') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">


                                        <div class="input-group">
                                            <label>Data Inici</label>
                                            <input class="form-control" name="datainici" type="date"/>
                                        </div>
                                        <div class="input-group">
                                            <label>Data Fi</label>
                                            <input class="form-control" name="datafi" type="date"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Generar Informe</button>
                                </form>

                                <!-- Date and time range -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    {{--Consum Mitjà--}}
                    <div class="col-md-4">

                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Informe Consum Mitjà Entre Dates !!! Falta Solucionar problemes
                                    !!!</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <form action="{{ url('export/avgdaterange') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">


                                        <div class="input-group">
                                            <label>Data Inici</label>
                                            <input class="form-control" name="datainici" type="date"/>
                                        </div>
                                        <div class="input-group">
                                            <label>Data Fi</label>
                                            <input class="form-control" name="datafi" type="date"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Generar Informe</button>
                                </form>

                                <!-- Date and time range -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </div>
    </div>
@endsection
