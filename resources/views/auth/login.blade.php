
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
   <body class="fixed-bottom-padding">
      <div class="border-bottom p-3 d-none mobile-nav">
         <div class="title d-flex align-items-center">
            <a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
               <img class="osahan-logo mr-2" src="img/logo.svg">
               <h4 class="font-weight-bold text-success m-0">Grocery</h4>
            </a>
            <p class="ml-auto m-0">
               <a href="listing.html" class="text-decoration-none bg-white p-1 rounded shadow-sm d-flex align-items-center">
               <i class="text-dark icofont-sale-discount"></i>
               <span class="badge badge-danger p-1 ml-1 small">50%</span>
               </a>
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
      <!-- sign in -->
      <section class="osahan-main-body osahan-signin-main">
         <div class="container">
            <div class="row d-flex align-items-center justify-content-center vh-100">
               <div class="landing-page shadow-sm bg-success col-lg-5">
                  <div class="osahan-slider m-0">
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <i class="icofont-sale-discount display-1 text-warning"></i>
                           <h4 class="my-4 text-white">Banyak Diskon Menarik</h4>
                           <p class="text-center text-white-50 mb-5 px-4">Dapatkan diskon-diskon menarik untuk setiap produk</p>
                        </div>
                     </div>
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <i class="icofont-cart display-1 text-warning"></i>
                           <h4 class="my-4 text-white">Point Belanja</h4>
                           <p class="text-center text-white-50 mb-5 px-4">Dapatkan point belanja setiap produk yang dibeli, lalu tukarkan dengan hadiah menarik dari kami</p>
                        </div>
                     </div>
                     <div class="osahan-slider-item text-center">
                        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
                           <i class="icofont-support-faq display-1 text-warning"></i>
                           <h4 class="my-4 text-white">One Stop Shopping</h4>
                           <p class="text-center text-white-50 mb-5 px-4">Penuhi semua kebutuhan anda, mulai dari perlengkapan dapur, kebutuhan pokok, dll.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-7 pl-lg-5">
                  <div class="osahan-signin shadow-sm bg-white p-4 rounded">
                     <div class="p-3">
                        <h2 class="my-0">Welcome Back</h2>
                        <p class="small mb-4">Sign in to Continue.</p>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>	
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input placeholder="Enter Email" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div>
                                    @if ($errors->has('email'))
                                        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input placeholder="Enter Password" type="password" name="password" class="form-control" id="exampleInputPassword1">
                              <div>
                                    @if ($errors->has('password'))
                                        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                           </div>
                           <button type="submit" class="btn btn-success btn-lg rounded btn-block">Login</button>
                        </form>
                        <p class="text-center mt-3 mb-0"><a href="{{ route('register_user') }}" class="text-dark">Belum memiliki akun? Daftar disini</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @include('frontend/_menu_android')
      @include('js/frontend')
   </body>
</html>