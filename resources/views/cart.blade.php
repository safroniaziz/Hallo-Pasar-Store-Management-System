
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <title>Grofarweb - Online Grocery Supermarket HTML Template</title>
      <!-- Slick Slider -->
      @include('css/frontend')
   <body class="fixed-bottom-padding">
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
      <section class="py-4 osahan-main-body">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="accordion" id="accordionExample">
                     <!-- cart items -->
                     <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden">
                        <!-- cart header -->
                        <div class="card-header bg-white border-0 p-0" id="headingOne">
                           <h2 class="mb-0">
                              <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <span class="c-number">1</span> Cart ({{ Auth::user()->carts()->get()->count() }} Barang) Ditambahkan
                              </button>
                           </h2>
                        </div>
                        <!-- body cart items -->
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body p-0 border-top">
                              <div class="osahan-cart">
                                @foreach (Auth::user()->carts()->get() as $cart)
                                    <div class="cart-items bg-white position-relative border-bottom">
                                        <div class="d-flex  align-items-center p-3">
                                        <a><img src="{{ asset('upload/foto_produk/'.$cart->produk->foto_produk) }}" class="img-fluid"></a>
                                        <a class="ml-3 text-dark text-decoration-none w-100">
                                            <h5 class="mb-1">{{ $cart->produk->nama_produk }}</h5>
                                            <p class="text-success mb-2">Rp.{{ number_format($cart->produk->harga) }}</del></p>
                                            <div class="d-flex align-items-center">
                                                <p class="total_price font-weight-bold m-0">Rp.{{ number_format($cart->total_harga) }}</p>
                                                <form id='myform' class=" d-flex ml-auto" method='POST'>
                                                    <div class="form-group">
                                                        <label for="">Jumlah</label>
                                                        <input type="number" class="form-control" value="{{ $cart->jumlah }}">
                                                    </div>
                                                </form>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- cart address -->
                     <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">
                        <!-- address header -->
                        <div class="card-header bg-white border-0 p-0" id="headingtwo">
                           <h2 class="mb-0">
                              <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                              <span class="c-number">2</span> Order Address <a href="#"  data-toggle="modal" data-target="#exampleModal" class="text-decoration-none text-success ml-auto"> <i class="icofont-plus-circle mr-1"></i>Add New Delivery Address</a>
                              </button>
                           </h2>
                        </div>
                        <!-- body address -->
                        <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExample">
                           <div class="card-body p-0 border-top">
                              <div class="osahan-order_address">
                                 <div class="p-3 row">
                                    <div class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">
                                       <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                                       <label class="custom-control-label w-100" for="customRadioInline1">
                                          <div>
                                             <div class="p-3 bg-white rounded shadow-sm w-100">
                                                <div class="d-flex align-items-center mb-2">
                                                   <p class="mb-0 h6">Home</p>
                                                   <p class="mb-0 badge badge-success ml-auto"><i class="icofont-check-circled"></i> Default</p>
                                                </div>
                                                <p class="small text-muted m-0">1001 Veterans Blvd</p>
                                                <p class="small text-muted m-0">Redwood City, CA 94063</p>
                                                <p class="pt-2 m-0 text-right"><span class="small"><a href="#"  data-toggle="modal" data-target="#exampleModal" class="text-decoration-none text-info">Edit</a></span></p>
                                             </div>
                                             <span class="btn btn-light border-top btn-lg btn-block">
                                             Deliver Here
                                             </span>
                                          </div>
                                       </label>
                                    </div>
                                    <div class="custom-control col-lg-6 custom-radio position-relative border-custom-radio">
                                       <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                       <label class="custom-control-label w-100" for="customRadioInline2">
                                          <div>
                                             <div class="p-3 rounded bg-white shadow-sm w-100">
                                                <div class="d-flex align-items-center mb-2">
                                                   <p class="mb-0 h6">Work</p>
                                                   <p class="mb-0 badge badge-light ml-auto"><i class="icofont-check-circled"></i> Select</p>
                                                </div>
                                                <p class="small text-muted m-0">Model Town, Ludhiana</p>
                                                <p class="small text-muted m-0">Punjab 141002, India</p>
                                                <p class="pt-2 m-0 text-right"><span class="small"><a href="#"  data-toggle="modal" data-target="#exampleModal" class="text-decoration-none text-info">Edit</a></span></p>
                                             </div>
                                             <span class="btn btn-light border-top btn-lg btn-block">
                                             Deliver Here
                                             </span>
                                          </div>
                                       </label>
                                    </div>
                                    <a href="#" class="btn btn-success btn-lg btn-block mt-3" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">Continue</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- cart delivery -->
                     <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">
                        <!-- delivery header -->
                        <div class="card-header bg-white border-0 p-0" id="headingthree">
                           <h2 class="mb-0">
                              <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                              <span class="c-number">3</span> Delivery Time
                              </button>
                           </h2>
                        </div>
                        <!-- body delivery --> 
                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExample">
                           <div class="card-body p-0 border-top">
                              <div class="osahan-order_address">
                                 <div class="text-center mb-4 py-4">
                                    <p class="display-2"><i class="icofont-ui-calendar text-success"></i></p>
                                    <p class="mb-1">Your Current Slot:</p>
                                    <h6 class="font-weight-bold text-dark">Tommorow, 6AM - 10AM</h6>
                                 </div>
                                 <div class="schedule">
                                    <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">
                                       <li class="nav-item" role="presentation">
                                          <a class="nav-link active text-dark" id="mon-tab" data-toggle="tab" href="#mon" role="tab" aria-controls="mon"
                                             aria-selected="true">
                                             <p class="mb-0 font-weight-bold">MON</p>
                                             <p class="mb-0">7 Sep</p>
                                          </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                          <a class="nav-link text-dark" id="tue-tab" data-toggle="tab" href="#tue" role="tab" aria-controls="tue"
                                             aria-selected="false">
                                             <p class="mb-0 font-weight-bold">TUE</p>
                                             <p class="mb-0">8 Sep</p>
                                          </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                          <a class="nav-link text-dark" id="wed-tab" data-toggle="tab" href="#wed" role="tab" aria-controls="wed"
                                             aria-selected="false">
                                             <p class="mb-0 font-weight-bold">WED</p>
                                             <p class="mb-0">9 Sep</p>
                                          </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                          <a class="nav-link text-dark" id="thu-tab" data-toggle="tab" href="#thu" role="tab" aria-controls="thu"
                                             aria-selected="false">
                                             <p class="mb-0 font-weight-bold">THU</p>
                                             <p class="mb-0">10 Sep</p>
                                          </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                          <a class="nav-link text-dark" id="fri-tab" data-toggle="tab" href="#fri" role="tab" aria-controls="fri"
                                             aria-selected="false">
                                             <p class="mb-0 font-weight-bold">FRI</p>
                                             <p class="mb-0">11 Sep</p>
                                          </a>
                                       </li>
                                       <li class="nav-item" role="presentation">
                                          <a class="nav-link text-dark" id="sat-tab" data-toggle="tab" href="#sat" role="tab" aria-controls="sat"
                                             aria-selected="false">
                                             <p class="mb-0 font-weight-bold">SAT</p>
                                             <p class="mb-0">12 Sep</p>
                                          </a>
                                       </li>
                                    </ul>
                                    <div class="tab-content filter bg-white" id="myTabContent">
                                       <div class="tab-pane fade show active" id="mon" role="tabpanel" aria-labelledby="mon-tab">
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="mon1" value="mon1" checked>
                                             <label class="custom-control-label py-3 w-100 px-3" for="mon1">
                                             <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="mon2" value="mon2">
                                             <label class="custom-control-label py-3 w-100 px-3" for="mon2">
                                             <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="mon3" value="mon3">
                                             <label class="custom-control-label py-3 w-100 px-3" for="mon3">
                                             <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="mon4" value="mon4">
                                             <label class="custom-control-label py-3 w-100 px-3" for="mon4">
                                             <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                             </label>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="tue" role="tabpanel" aria-labelledby="tue-tab">
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="tue1" value="tue1" checked>
                                             <label class="custom-control-label py-3 w-100 px-3" for="tue1">
                                             <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="tue2" value="tue2">
                                             <label class="custom-control-label py-3 w-100 px-3" for="tue2">
                                             <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="tue3" value="tue3">
                                             <label class="custom-control-label py-3 w-100 px-3" for="tue3">
                                             <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="tue4" value="tue4">
                                             <label class="custom-control-label py-3 w-100 px-3" for="tue4">
                                             <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                             </label>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="wed" role="tabpanel" aria-labelledby="wed-tab">
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="wed1" value="wed1" checked>
                                             <label class="custom-control-label py-3 w-100 px-3" for="wed1">
                                             <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="wed2" value="wed2">
                                             <label class="custom-control-label py-3 w-100 px-3" for="wed2">
                                             <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="wed3" value="wed3">
                                             <label class="custom-control-label py-3 w-100 px-3" for="wed3">
                                             <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="wed4" value="wed4">
                                             <label class="custom-control-label py-3 w-100 px-3" for="wed4">
                                             <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                             </label>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="thu" role="tabpanel" aria-labelledby="thu-tab">
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="thu1" value="thu1" checked>
                                             <label class="custom-control-label py-3 w-100 px-3" for="thu1">
                                             <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="thu2" value="thu2">
                                             <label class="custom-control-label py-3 w-100 px-3" for="thu2">
                                             <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="thu3" value="thu3">
                                             <label class="custom-control-label py-3 w-100 px-3" for="thu3">
                                             <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="thu4" value="thu4">
                                             <label class="custom-control-label py-3 w-100 px-3" for="thu4">
                                             <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                             </label>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="fre" role="tabpanel" aria-labelledby="fre-tab">
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="fri1" value="fri1" checked>
                                             <label class="custom-control-label py-3 w-100 px-3" for="fri1">
                                             <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="fri2" value="fri2">
                                             <label class="custom-control-label py-3 w-100 px-3" for="fri2">
                                             <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="fri3" value="fri3">
                                             <label class="custom-control-label py-3 w-100 px-3" for="fri3">
                                             <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="fri4" value="fri4">
                                             <label class="custom-control-label py-3 w-100 px-3" for="fri4">
                                             <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                             </label>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade" id="sat" role="tabpanel" aria-labelledby="sat-tab">
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="sat1" value="sat1" checked>
                                             <label class="custom-control-label py-3 w-100 px-3" for="sat1">
                                             <i class="icofont-clock-time mr-2"></i> 6AM - 10AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="sat2" value="sat2">
                                             <label class="custom-control-label py-3 w-100 px-3" for="sat2">
                                             <i class="icofont-clock-time mr-2"></i> 4PM - 6AM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="sat3" value="sat3">
                                             <label class="custom-control-label py-3 w-100 px-3" for="sat3">
                                             <i class="icofont-clock-time mr-2"></i> 6PM - 9PM
                                             </label>
                                          </div>
                                          <div class="custom-control border-bottom px-0 custom-radio">
                                             <input class="custom-control-input" type="radio" name="exampleRadios" id="sat4" value="sat4">
                                             <label class="custom-control-label py-3 w-100 px-3" for="sat4">
                                             <i class="icofont-clock-time mr-2"></i> 10AM - 1PM
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="p-3">
                                 <a href="#" class="btn btn-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">Schedule Order</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- cart payment -->
                     <div class="card border-0 osahan-accor rounded shadow-sm overflow-hidden mt-3">
                        <!-- payment header -->
                        <div class="card-header bg-white border-0 p-0" id="headingfour">
                           <h2 class="mb-0">
                              <button class="btn d-flex align-items-center bg-white btn-block text-left btn-lg h5 px-3 py-4 m-0" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                              <span class="c-number">4</span> Payment
                              </button>
                           </h2>
                        </div>
                        <!-- body payment -->
                        <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
                           <div class="card-body px-3 pb-3 pt-1 border-top">
                              <div class="schedule">
                                 <ul class="nav nav-tabs justify-content-center nav-fill" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link active text-dark" id="credit-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit"
                                          aria-selected="true">
                                          <p class="mb-0 font-weight-bold"><i class="icofont-credit-card mr-2"></i> Credit/Debit Card</p>
                                       </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link text-dark" id="banking-tab" data-toggle="tab" href="#banking" role="tab" aria-controls="banking"
                                          aria-selected="false">
                                          <p class="mb-0 font-weight-bold"><i class="icofont-globe mr-2"></i> Net Banking</p>
                                       </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <a class="nav-link text-dark" id="cash-tab" data-toggle="tab" href="#cash" role="tab" aria-controls="cash"
                                          aria-selected="false">
                                          <p class="mb-0 font-weight-bold"><i class="icofont-dollar mr-2"></i> Cash on Delivery</p>
                                       </a>
                                    </li>
                                 </ul>
                                 <div class="tab-content bg-white" id="myTabContent">
                                    <div class="tab-pane fade show active" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                       <div class="osahan-card-body pt-3">
                                          <h6 class="m-0">Add new card</h6>
                                          <p class="small">WE ACCEPT <span class="osahan-card ml-2 font-weight-bold">( Master Card / Visa Card / Rupay )</span></p>
                                          <form>
                                             <div class="form-row">
                                                <div class="col-md-12 form-group">
                                                   <label class="form-label font-weight-bold small">Card number</label>
                                                   <div class="input-group">
                                                      <input placeholder="Card number" type="number" class="form-control">
                                                      <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="icofont-credit-card"></i></button></div>
                                                   </div>
                                                </div>
                                                <div class="col-md-8 form-group"><label class="form-label font-weight-bold small">Valid through(MM/YY)</label><input placeholder="Enter Valid through(MM/YY)" type="number" class="form-control"></div>
                                                <div class="col-md-4 form-group"><label class="form-label font-weight-bold small">CVV</label><input placeholder="Enter CVV Number" type="number" class="form-control"></div>
                                                <div class="col-md-12 form-group"><label class="form-label font-weight-bold small">Name on card</label><input placeholder="Enter Card number" type="text" class="form-control"></div>
                                                <div class="col-md-12 form-group">
                                                   <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" id="custom-checkbox1" class="custom-control-input">
                                                      <label title="" type="checkbox" for="custom-checkbox1" class="custom-control-label small pt-1">Securely save this card for a faster checkout next time.</label>
                                                   </div>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="banking" role="tabpanel" aria-labelledby="banking-tab">
                                       <div class="osahan-card-body pt-3">
                                          <form>
                                             <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary active">
                                                <input type="radio" name="options" id="option1" checked=""> HDFC
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                <input type="radio" name="options" id="option2"> ICICI
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                <input type="radio" name="options" id="option3"> AXIS
                                                </label>
                                             </div>
                                             <div class="form-row pt-3">
                                                <div class="col-md-12 form-group">
                                                   <label class="form-label small font-weight-bold">Select Bank</label><br>
                                                   <select class="custom-select form-control">
                                                      <option>Bank</option>
                                                      <option>KOTAK</option>
                                                      <option>SBI</option>
                                                      <option>UCO</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="cash" role="tabpanel" aria-labelledby="cash-tab">
                                       <div class="custom-control custom-checkbox pt-3">
                                          <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                          <label class="custom-control-label" for="customControlAutosizing">
                                             <b>Cash</b><br>
                                             <p class="small text-muted m-0">Please keep exact change handy to help us serve you better</p>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <a href="checkout.html" class="btn btn-success btn-lg btn-block mt-3" type="button">Continue</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="sticky_sidebar">
                     <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
                        <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                           <img alt="osahan" src="img/starter1.jpg" class="mr-3 rounded-circle img-fluid">
                           <div class="d-flex flex-column">
                              <h6 class="mb-1 font-weight-bold">Osahan Fresh Store</h6>
                              <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>
                           </div>
                        </div>
                        <div>
                           <div class="bg-white p-3 clearfix">
                              <p class="font-weight-bold small mb-2">Bill Details</p>
                              <p class="mb-1">Item Total <span class="small text-muted">(3 item)</span> <span class="float-right text-dark">$3140</span></p>
                              <p class="mb-1">Store Charges <span class="float-right text-dark">$62.8</span></p>
                              <p class="mb-3">Delivery Fee <span  data-toggle="tooltip" data-placement="top" title="Delivery partner fee - $3" class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark">$10</span></p>
                              <h6 class="mb-0 text-success">Total Discount<span class="float-right text-success">$1884</span></h6>
                           </div>
                           <div class="p-3 border-top">
                              <h5 class="mb-0">TO PAY  <span class="float-right text-danger">$1329</span></h5>
                           </div>
                        </div>
                     </div>
                     <p class="text-success text-center">Your Total Savings on this order $8.52</p>
                  </div>
               </div>
            </div>
            <h5 class="mt-3 mb-3">Paketan Hemat Tanpa Repot</h5>
               @include('frontend/_rekomendasi')
         </div>
      </section>
      @include('frontend/_menu_android')
      <footer class="section-footer border-top bg-white">

        <section class="footer-bottom border-top py-4">
           <div class="container">
              <div class="row">
                 <div class="col-md-6">
                    <span class="pr-2">© 2022 HalloPasar</span>
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