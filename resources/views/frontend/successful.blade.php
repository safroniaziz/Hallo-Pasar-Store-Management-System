
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <title>Grofarweb - Online Grocery Supermarket HTML Template</title>
      @include('css/frontend')
   </head>
   <body class="fixed-bottom-padding bg-success">
    <div class="border-bottom p-3 d-none mobile-nav">
        <div class="title d-flex align-items-center">
           <a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
              <img class="osahan-logo mr-2" src="{{ asset('assets/images/logo.png') }}">
              <h4 class="font-weight-bold text-success m-0">HalloPasar</h4>
           </a>
           <p class="ml-auto m-0">
              
           </p>
           <a class="toggle ml-3" href="#"><i class="icofont-navigation-menu"></i></a>
        </div>
        <a href="search.html" class="text-decoration-none">
           <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
              <div class="input-group-prepend">
                 <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
              </div>
              <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Search for Products.." aria-label="" aria-describedby="basic-addon1">
           </div>
        </a>
     </div>
      <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div>
      <!-- Nav bar -->
      <div class="bg-white shadow-sm osahan-main-nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-white osahan-header py-0 container" style="padding:10px 0px 10px 0px !important">
           <a class="navbar-brand mr-0" href="{{ route('home') }}"><img class="img-fluid logo-img rounded-pill border shadow-sm" src="{{ asset('assets/images/logo.png') }}"></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="ml-3 d-flex align-items-center">
              <!-- search  -->
              <div class="input-group mr-sm-2 col-lg-12">
                 <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Search for Products..">
                 <div class="input-group-prepend">
                    <div class="btn btn-success rounded-right"><i class="icofont-search"></i></div>
                 </div>
              </div>
           </div>
           <div class="ml-auto d-flex align-items-center">
              <!-- login/signup -->
              @if (Auth::check())
                 <!-- cart -->
                 <a href="{{ route('cart') }}" class="ml-2 text-dark bg-light rounded-pill p-2 icofont-size border shadow-sm">
                    <i class="icofont-shopping-cart"></i>&nbsp;<label class="text-danger"  style="font-size: 15px; font-weight:bold">{{ Auth::user()->carts()->get()->count() }}</label>
                 </a>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <!-- my account -->
                 <div class="dropdown mr-3">
                    <a href="#" class="dropdown-toggle text-dark" style="text-transform: capitalize !important;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://www.pngfind.com/pngs/m/470-4703547_icon-user-icon-hd-png-download.png" class="img-fluid rounded-circle header-user mr-2"> Hi {{ explode(' ', trim(Auth::user()->nama_user))[0] }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right top-profile-drop" aria-labelledby="dropdownMenuButton">
                       <a class="dropdown-item" href="my_account.html">My account</a>
                       <a class="dropdown-item btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
                    </div>
                 </div>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                 </form> 
              @else
                 <a href="{{ URL('login') }}" class=" btn btn-flat btn-sm mr-2 text-dark bg-light p-2 border shadow-sm">
                    <i class="icofont-login"></i>&nbsp; Login
                 </a>
              @endif
           </div>
        </nav>
        <!-- Menu bar -->
        <div class="bg-color-head">
           @include('frontend/menu')
        </div>
     </div>
      <!-- bread_cum -->
      <nav aria-label="breadcrumb" class="breadcrumb mb-0">
        <div class="container">
           <ol class="d-flex align-items-center mb-0 p-0">
              <li class="breadcrumb-item"><a href="#" class="text-success">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
           </ol>
        </div>
     </nav>
      <!-- content -->
      <div class="row d-flex justify-content-center">
         <div class="col-md-6">
            <div class="p-5 text-center" style="padding-bottom: 10px !important;">
               <i class="icofont-check-circled display-1 text-warning"></i>
               <h1 class="text-white font-weight-bold" style="text-transform:capitalize">{{ Auth::user()->nama_user }}, Order anda sudah berhasil ????</h1>
               <p class="text-white">Check your order status in <a href="complete_order.html" class="font-weight-bold text-decoration-none text-white">My Order</a> about next steps information.</p>
            </div>
            <!-- continue -->
            <div class="bg-white rounded p-3 m-5 text-center" style="margin-top: 10px !important;">
               <a href="status_onprocess.html" class="btn rounded btn-warning btn-lg btn-block">Track My Order</a>
            </div>
         </div>
      </div>
      @include('frontend/_menu_android')
      <!-- footer -->
      <footer class="section-footer border-top bg-white">

        <section class="footer-bottom border-top py-4">
           <div class="container">
              <div class="row">
                 <div class="col-md-6">
                    <span class="pr-2">?? 2022 HalloPasar</span>
                    <span class="pr-2"><a href="privacy.html" class="text-dark">Privacy</a></span>
                    <span class="pr-2"><a href="terms&conditions.html" class="text-dark">Terms & Conditions</a></span>
                 </div>
                 <div class="col-md-6 text-md-right">
                    <a href=""><img src="{{ asset('assets/front/img/appstore.png') }}" height="30"></a>
                    <a href=""><img src="{{ asset('assets/front/img/playmarket.png') }}" height="30"></a>
                 </div>
              </div>
              <!-- row.// -->
           </div>
           <!-- //container -->
        </section>
     </footer>
      @include('js/frontend')
   </body>
</html>