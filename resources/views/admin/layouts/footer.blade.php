



{{--map--}}
@stack('location-picker')




{{--@include('sweet::alert')--}}

<!-- Vendor -->




	










</section>
    	
<footer> 
{{-- <script src="{{ asset('admin-assets/assets/vendor/jquery/jquery.js')}}"></script>
 --}}<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ujs/1.2.2/rails.js"></script>
 <script src="{{ asset('admin-assets/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
<link href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>


<script src="{{ asset('admin-assets/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
<script src="{{ asset('admin-assets/assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
<script src="{{ asset('admin-assets/assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
<script src="{{ asset('admin-assets/assets/vendor/jquery-appear/jquery-appear.js')}}"></script>

<script src="{{ asset('admin-assets/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('admin-assets/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
<script src="{{ asset('admin-assets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('admin-assets/assets/vendor/owl.carousel/owl.carousel.js')}}"></script>
        <!-- Specific Page Vendor -->

<script src="{{ asset('admin-assets/assets/vendor/isotope/isotope.js')}}"></script>
        <!-- Theme Base, Components and Settings -->

<script src="{{ asset('admin-assets/assets/javascripts/theme.js')}}"></script>
        <!-- Theme Custom -->

<script src="{{ asset('admin-assets/assets/javascripts/theme.custom.js')}}"></script>
        <!-- Theme Initialization Files -->

<script src="{{ asset('admin-assets/assets/javascripts/theme.init.js')}}"></script>
        <!-- Examples -->

<script src="{{ asset('admin-assets/assets/javascripts/dashboard/examples.landing.dashboard.js')}}"></script>


     <link type="text/css" rel="stylesheet" 
    href="{{ asset('admin-assets/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}"/>


<script>    
        $(document).ready(function() {
            $('#datatable-default').dataTable();
            $('#datatable-default_filter input').addClass('form-control')
            $('#datatable-default_filter input').css('width','100%');
            $('td,th').addClass('text-center');
    
        } );



            
   $(document).ready(function() {
    
     

     $("#search_text ul").css({
        'background-color':'#fff'
     });
});
    </script>


<script>

        src = "{{ route('searchajax') }}";

        

        $('#search_text').select2({
        placeholder: 'Select an item',
        ajax: {
          url: src,
          dataType: 'json',
          
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text:item.name,
                        id:item.id
                    }
                })
            };
          },
          
        }
      });
    </script>
</footer>
</body>


</html>
