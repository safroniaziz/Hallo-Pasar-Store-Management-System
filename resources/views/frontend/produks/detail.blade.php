
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
      <title>HalloPasar</title>
      @include('css/frontend')
   </head>
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
               <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
            </ol>
         </div>
      </nav>
      <!-- body -->
      <section class="py-4 osahan-main-body">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="recommend-slider mb-3">
                     @if ($produk->photos()->get()->count() >0)
                         @foreach ($produk->photos()->get() as $foto)
                            <div class="osahan-slider-item">
                                <img src="{{ asset('upload/foto_produk_detail/'.$foto->foto_produk) }}" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                            </div>
                         @endforeach
                        @else
                        <div class="osahan-slider-item">
                            <img src="{{ asset('upload/foto_produk/'.$produk->foto_produk) }}" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
                        </div>
                     @endif
                  </div>
                  <div class="pd-f d-flex align-items-center mb-3">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="p-4 bg-white rounded shadow-sm">
                     <div class="pt-0">
                        <h2 class="font-weight-bold">{{ $produk->nama_produk }}</h2>
                        <p class="font-weight-light text-dark m-0 d-flex align-items-center">
                           Harga Per {{ $produk->satuan }} : <b class="h6 text-dark m-0">Rp.{{ number_format($produk->harga) }}</b>
                           <span class="badge badge-danger ml-2">Potongan Sebesar Rp.{{ number_format($produk->diskon) }}</span>
                        </p>
                        {{-- <a href="review.html">
                           <div class="rating-wrap d-flex align-items-center mt-2">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star text-warning"></i>
                                    <i class="icofont-star"></i>
                                 </li>
                              </ul>
                              <p class="label-rating text-muted ml-2 small"> (245 Reviews)</p>
                           </div>
                        </a> --}}
                     </div>
                     <div class="pt-2">
                        <div class="row">
                           <div class="col-6">
                              <p class="font-weight-bold m-0">Biaya Pengantaran</p>
                              <p class="text-muted m-0">
                                @if (Auth::check())
                                    Rp.{{ number_format(Auth::user()->village->ongkir) }}
                                @else
                                    <a href="{{ URL('/login') }}"><i class="fa fa-sign-in"></i>&nbsp;Login untuk cek ongkir</a>
                                @endif
                              </p>
                           </div>
                           <div class="col-6 text-right">
                              <p class="font-weight-bold m-0">Waktu Pengantaran:</p>
                              <p class="text-muted m-0">
                                Setiap Hari
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="pt-4">
                        <div class="row">
                           <div class="col-6">
                              <p class="font-weight-bold m-0">Kandungan Gizi</p>
                                 @if ($produk->tags()->count() > 0)
                                    @foreach ($produk->tags()->get() as $tag)
                                          <li>{{ $tag->nama_tag }}</li>
                                    @endforeach
                                 @else
                                    <a class="text-danger">-</a>
                                 @endif
                           </div>
                        </div>
                     </div>
                     <div class="details">
                        <div class="pt-3">
                            <p class="font-weight-bold mb-2">Deskripsi Produk</p>
                            <p class="text-muted small mb-0">
                             {{ $produk->deskripsi }}
                             </p>
                         </div>
                         <input type="hidden" name="produk_id" id="produk_id" value="{{ $produk->id }}">
                        <div class="pt-3 bg-white">
                           <p style="margin-bottom: 0px !important;">Satuan Produk: {{ $produk->satuan }}</p>
                           <form id='myform' class="cart-items-number d-flex d-flex">
                              <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
                              <input type='text' name='quantity' id="quantity" value='1' class='qty form-control' />
                              <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' /> <br>
                           </form>
                           @if (Auth::check())
                              <a href="javascript:void(0);" id="tambahKeranjang" class="btn btn-success p-2 mt-2 rounded d-flex align-items-center justify-content-center btn-sm "><i class="icofont-cart m-0 mr-2"></i> Tambah Keranjang</a>
                           @else
                              <a href="{{ route('login') }}" class="btn btn-success p-2 mt-2 rounded d-flex align-items-center justify-content-center btn-sm "><i class="icofont-cart m-0 mr-2"></i> Tambah Keranjang</a>
                           @endif
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            <h5 class="mt-3 mb-3">Paketan Hemat Tanpa Repot</h5>
               @include('frontend/_produks')
         </div>
      </section>
      @include('frontend/_menu_android')
     <!-- footer -->
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
      <script type="text/javascript">
         $('#tambahKeranjang').on('click',function(e){
            e.preventDefault();

            var quantity = $('#quantity').val();
            var produk_id = $('#produk_id').val();
            let form_url="{{ route('cart.post') }}";

            var form = new FormData();
            form.append('quantity',quantity);
            form.append('produk_id',produk_id);
            let token="{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('cart.post') }}",
                data: form,
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.href = "{{ route('cart') }}";
                    toastr.success('Berhasil', 'produk ditambahkan ke keranjang', {
                        timeOut: 1000,
                        preventDuplicates: true,
                        positionClass: 'toast-top-right',
                    });
                },
                error: function(err){
                  //   $('#nama_kategori_error').show();
                  //   $('#nama_kategori_error').text(err.responseJSON['errors'].nama_kategori[0]);
                    // consol class="text-danger text-muted"e.log(err.responseJSON['errors'].nama_kategori[0]); class="text-danger text-muted"
                }
            });
         });
      </script>
   </body>
</html>