<script src="{{ asset('assets/front/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- slick Slider JS-->
<script type="text/javascript" src="{{ asset('assets/front/vendor/slick/slick.min.js') }}"></script>
<!-- Sidebar JS-->
<script type="text/javascript" src="{{ asset('assets/front/vendor/sidebar/hc-offcanvas-nav.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/front/js/osahan.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
          toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-bottom-left","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
              toastr.info("{{ Session::get('message') }}");
              break;
  
          case 'warning':
          toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-bottom-left","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
              toastr.warning("{{ Session::get('message') }}");
              break;
  
          case 'success':
          toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-bottom-left","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
              toastr.success("{{ Session::get('message') }}");
              break;
  
          case 'error':
          toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-bottom-left","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
  
      $(window).on('load', function(){
          // will first fade out the loading animation
          jQuery(".status").fadeOut();
          // will fade out the whole DIV that covers the website.
          jQuery(".preloader").delay(0).fadeOut("slow");
      });
  </script>