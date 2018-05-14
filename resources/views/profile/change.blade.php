@extends('adminlte::page')

@section('contentheader_title')

@endsection

@section('htmlheader_title')

@endsection


@section('main-content')
    <div class="spark-screen">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="box box-tools">
                    <div class="box-header">
                        <h3 class="box-title">Canvi Password</h3>
                    </div>
                    <!-- /.form group -->
                    <div class="box-body">
                        <form action="{{ route('password.change') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field("PATCH") }}
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-error alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="old_password" class="control-label">Contrasenya Actual</label>
                                <input type="password" name="old_password" id="old_password" class="form-control"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label text-lg-right">Nova Contrasenya</label>
                                <input type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label text-lg-right">Confirmar Contrasenya</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Change password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection