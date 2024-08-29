</div>
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 Fitforalegend.</strong> | All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>



<script src="{{asset('public/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

    
    


<script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/sparklines/sparkline.js')}}"></script>

<script src="{{asset('public/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<script src="{{asset('public/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('public/assets/dist/js/adminlte2167.js?v=3.2.0')}}"></script>

<script src="{{asset('public/assets/dist/js/demo.js')}}"></script>

<script src="{{asset('public/assets/dist/js/pages/dashboard.js')}}"></script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Sep 2023 10:38:35 GMT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{asset('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script src="{{asset('public/assets/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>

    <script src="{{asset('public/assets/dist/js/demo.js')}}"></script>
    

 <script>
     $(document).on('click','.notification_count',function(e){  
        
         $.ajax({
               url    :"{{ route('all-notification') }}",
               type   : "get",
               success: function(data) { 
                $('.orderCount').text(data.orderCount);
                $('.orderheaderCount').text(data.orderCount+ ' Notifications');
                var html ='';
                 $.each(data.orders, function (key, value) {
                            var url = '{{ route("orders.show", ":id") }}';
                            url = url.replace(':id', value.id); 
                            var d = new Date(value.created_at);
                            var day = d.getDate();
                            var month =  d.getMonth();
                            var year = d.getFullYear();
                            let hrs = d.getHours();
                            let m = d.getMinutes();
                            // Condition to add zero before minute
                            let min = m < 10 ? `0${m}` : m;
                            const currTime = hrs >= 12 ? `${hrs - 12}:${min} pm` : `${hrs}:${min} am`;
                            var html ='<a href="'+url+'" class="dropdown-item"><i class="fas fa-envelope mr-2"></i> New Order<span class="float-right text-muted text-sm">'+day+'-'+month+'-'+year+' '+currTime+'</span></a><div class="dropdown-divider"></div>';
                              $("#notificatins").append(html);
                          });
               }

              })
      });
 </script>

</html>
