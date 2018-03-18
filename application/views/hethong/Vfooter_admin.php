</div>

<footer>
    <div class="pull-right"></div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<!-- Bootstrap -->
<script src="{base_url('sourceadmin/vendor/bootstrap/dist/js/bootstrap.min.js')}"></script>
<!-- FastClick -->
<script src="{base_url('sourceadmin/vendor/fastclick/lib/fastclick.js')}"></script>

<script src="{$url}assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{$url}assets/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- start datatable -->
<script src="{$url}assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{$url}assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{$url}assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{$url}assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{$url}assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{$url}assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{$url}assets/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{$url}assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{$url}assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{$url}assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{$url}assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{$url}assets/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!-- NProgress -->
<script src="{base_url('sourceadmin/vendor/nprogress/nprogress.js')}"></script>
<!-- Chart.js -->
<script src="{base_url('sourceadmin/vendor/Chart.js/dist/Chart.min.js')}"></script>
<!-- gauge.js -->
<script src="{base_url('sourceadmin/vendor/gauge.js/dist/gauge.min.js')}"></script>
<!-- bootstrap-progressbar -->
<script src="{base_url('sourceadmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}"></script>
<!-- iCheck -->
<script src="{base_url('sourceadmin/vendor/iCheck/icheck.min.js')}"></script>
<!-- Skycons -->
<script src="{base_url('sourceadmin/vendor/skycons/skycons.js')}"></script>
<!-- Flot -->
<script src="{base_url('sourceadmin/vendor/Flot/jquery.flot.js')}"></script>
<script src="{base_url('sourceadmin/vendor/Flot/jquery.flot.pie.js')}"></script>
<script src="{base_url('sourceadmin/vendor/Flot/jquery.flot.time.js')}"></script>
<script src="{base_url('sourceadmin/vendor/Flot/jquery.flot.stack.js')}"></script>
<script src="{base_url('sourceadmin/vendor/Flot/jquery.flot.resize.js')}"></script>
<!-- Flot plugins -->
<script src="{base_url('sourceadmin/vendor/flot.orderbars/js/jquery.flot.orderBars.js')}"></script>
<script src="{base_url('sourceadmin/vendor/flot-spline/js/jquery.flot.spline.min.js')}"></script>
<script src="{base_url('sourceadmin/vendor/flot.curvedlines/curvedLines.js')}"></script>
<!-- DateJS -->
<script src="{base_url('sourceadmin/vendor/DateJS/build/date.js')}"></script>
<!-- JQVMap -->
<script src="{base_url('sourceadmin/vendor/jqvmap/dist/jquery.vmap.js')}"></script>
<script src="{base_url('sourceadmin/vendor/jqvmap/dist/maps/jquery.vmap.world.js')}"></script>
<script src="{base_url('sourceadmin/vendor/jqvmap/examples/js/jquery.vmap.sampledata.js')}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{base_url('sourceadmin/vendor/moment/min/moment.min.js')}"></script>
<script src="{base_url('sourceadmin/vendor/bootstrap-daterangepicker/daterangepicker.js')}"></script>

<!-- Custom Theme Scripts -->
<script src="{base_url('sourceadmin/vendor/build/js/custom.js')}"></script>
{if !empty($message)}
    {if  $message['type']=='success'}
        <script>success('{$message["message"]}');</script>
    {else}
        {if $message['type']=='warning'}
            <script>warning('{$message["message"]}');</script>
        {else}
            {if $message['type']=='error'}
                <script>error('{$message["message"]}');</script>
            {/if}
        {/if}
    {/if}
{/if}
</body>
</html>
