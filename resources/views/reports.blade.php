@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6 col-md-offset-1">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informes per data</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Date and time range -->
                        <input type="text" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM" />

                        {{--<script type="text/javascript">--}}
                            {{--$(function() {--}}
                                {{--$('input[name="daterange"]').daterangepicker({--}}
                                    {{--timePicker: true,--}}
                                    {{--timePickerIncrement: 30,--}}
                                    {{--locale: {--}}
                                        {{--format: 'MM/DD/YYYY h:mm A'--}}
                                    {{--}--}}
                                {{--});--}}
                            {{--});--}}
                        {{--</script>--}}

                        <!-- Date and time range -->
                        </div>
                    <!-- /.box-body -->
                </div>
			</div>
            {{--<div class="box box-primary">--}}
                {{--<div class="box-header">--}}
                    {{--<h3 class="box-title">Date picker</h3>--}}
                {{--</div>--}}
                {{--<div class="box-body">--}}
                    {{--<!-- Date -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Date:</label>--}}

                        {{--<div class="input-group date">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<i class="fa fa-calendar"></i>--}}
                            {{--</div>--}}
                            {{--<input type="text" class="form-control pull-right" id="datepicker">--}}
                        {{--</div>--}}
                        {{--<!-- /.input group -->--}}
                    {{--</div>--}}
                    {{--<!-- /.form group -->--}}

                    {{--<!-- Date range -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Date range:</label>--}}

                        {{--<div class="input-group">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<i class="fa fa-calendar"></i>--}}
                            {{--</div>--}}
                            {{--<input type="text" class="form-control pull-right" id="reservation">--}}
                        {{--</div>--}}
                        {{--<!-- /.input group -->--}}
                    {{--</div>--}}
                    {{--<!-- /.form group -->--}}

                    {{--<!-- Date and time range -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Date and time range:</label>--}}

                        {{--<div class="input-group">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<i class="fa fa-clock-o"></i>--}}
                            {{--</div>--}}
                            {{--<input type="text" class="form-control pull-right" id="reservationtime">--}}
                        {{--</div>--}}
                        {{--<!-- /.input group -->--}}
                    {{--</div>--}}
                    {{--<!-- /.form group -->--}}

                    {{--<!-- Date and time range -->--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Date range button:</label>--}}

                        {{--<div class="input-group">--}}
                            {{--<button type="button" class="btn btn-default pull-right" id="daterange-btn">--}}
                                {{--<span>April 1, 2018 - April 30, 2018</span>--}}
                                {{--<i class="fa fa-caret-down"></i>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.form group -->--}}

                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
		</div>
	</div>
@endsection
