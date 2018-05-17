<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Cost del kW</h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <div class="form-group">

                            <h4 class="control-sidebar-subheading">
                                Preu kWs
                            </h4>
                            <input type="number" class="form-control" name="price_kws" value="{{$price_kw}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Canvi Preu</button>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">{{ trans('adminlte_lang::message.statstab') }}</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">{{ trans('adminlte_lang::message.generalset') }}</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        {{ trans('adminlte_lang::message.reportpanel') }}
                        <input type="checkbox" class="pull-right" {{ trans('adminlte_lang::message.checked') }} />
                    </label>
                    <p>
                        {{ trans('adminlte_lang::message.informationsettings') }}
                    </p>
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>