 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('/')}}/design/adminlte/plugins/jquery/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
   <link rel="stylesheet" href="{{url('/')}}/design/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<script src="{{url('/')}}/design/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{url('/')}}/design/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{url('/')}}/vendor/datatables/buttons.server-side.js">
</script>
<script src="{{url('/')}}/design/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/design/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script type="text/javascript">
  function check_all() {
 
  $('input[class="item_checkbox"]:checkbox').each(function(){
       if($('input[class="check_all"]:checkbox:checked').length==0){
           $(this).prop('checked',false)
        }else{
          $(this).prop('checked',true)
             }
    });
}
 function delete_all() {

$(document).on('click', '.del_all', function(){
   $('#form_data').submit();
});

  $(document).on('click', '.delBtn', function(){
    var item_checked= $('input[class="item_checkbox"]:checkbox:checked').length;
      if(item_checked>0){
        $('.not_empty_record').css("display", "block");
        $('.empty_record').css("display", "none");
        $('.record_count').text(item_checked);
        }else{
        $('.empty_record').css("display", "block");
        $('.not_empty_record').css("display", "none");
        $('.record_count').text('');
        }
      
   $('#multipaleDelete').modal('show');
    // do the button binding work..
});
 }
 delete_all(); 
</script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/design/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{url('/')}}/design/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{url('/')}}/design/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{url('/')}}/design/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{url('/')}}/design/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/')}}/design/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{url('/')}}/design/adminlte/plugins/moment/moment.min.js"></script>
<script src="{{url('/')}}/design/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/')}}/design/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{url('/')}}/design/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('/')}}/design/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/design/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/design/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/design/adminlte/dist/js/demo.js"></script>
<script src="{{url('/')}}/design/adminlte/jstree/jstree.js"></script>
<script src="{{url('/')}}/design/adminlte/jstree/jstree.wholerow.js"></script>
<script src="{{url('/')}}/design/adminlte/jstree/jstree.checkbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js"></script>
@stack('js')
@stack('css')

</body>
</html>
