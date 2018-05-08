@extends('adminlte::page')

@section('contentheader_title')
    Graphs
@endsection

@section('htmlheader_title')
    Graphs
@endsection


@section('main-content')
    <div class="spark-screen">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Perfil</h3>
                    </div>
                    <!-- /.form group -->
                    <div class="box-body">
                        <div align="center" class="form-group">
                            <div class="input-group col-xs-offset-22">
                                <img src="{{Gravatar::get(Auth::loginUsingId($id)->email)}}" class="img-circle"
                                     alt="User Image" width="150px" height="150px"/><br>
                            </div>
                            <hr>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <form method="POST" action="">
                        <!-- /.form group -->
                        <div class="box-body">
                            <div class="form-group">
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Id:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <input class="form-control" type="text" readonly="readonly"
                                               value="{{ Auth::user()->id }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Nom:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input class="form-control" type="text"
                                               value="{{ Auth::user()->name }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Email:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-at"></i>
                                        </div>
                                        <input class="form-control" type="text"
                                               value="{{ Auth::user()->email }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Creat:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-check-o"></i>
                                        </div>
                                        <input class="form-control" type="text" readonly="readonly"
                                               value="{{ Auth::user()->created_at }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Actalitzat:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-plus-o"></i>
                                        </div>
                                        <input class="form-control" type="text" readonly="readonly"
                                               value="{{ Auth::user()->created_at }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <hr>

                            </div>
                            <!-- /.box-body -->
                            <button type="submit" class="btn btn-danger">Actualitzar</button>
                        </div>
                        <!-- /.box -->
                    </form>
                </div>
            </div>
            <!-- /.col (left) -->
        </div>
    </div>
@endsection