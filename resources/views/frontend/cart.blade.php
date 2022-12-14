
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                              {{ Auth::user()->carts()->get()->count() }} Barang Ditambahkan Dalam Keranjang
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
                                                <form id='myform' class="cart-items-number d-flex ml-auto" method='POST' action='#'>
                                                   <input type='button' value='-' data-val="{{ $cart->id }}" min="1" class='qtyminus btn btn-success btn-sm kurangiJumlah' field='quantity{{ $cart->id }}' id="minus{{ $cart->id }}" />
                                                   <input type='text' name='quantity{{ $cart->id }}' id="{{ $cart->id }}" value='{{ $cart->jumlah }}' class='qty form-control'/>
                                                   <input type='button' data-val="{{ $cart->id }}" value='+' class='qtyplus btn btn-success btn-sm ubahJumlah' onkeypress="quantity(this)" field='quantity{{ $cart->id }}' id="quantity{{ $cart->id }}"/>
                                                </form>
                                            </div>
                                            <form action="{{ route('cart.delete',[$cart->id]) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i>&nbsp; </button>
                                          </form>
                                        </a>
                                        </div>
                                    </div>
                                @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="sticky_sidebar">
                     <div class="bg-white rounded overflow-hidden shadow-sm mb-3 checkout-sidebar">
                        <div class="d-flex align-items-center osahan-cart-item-profile border-bottom bg-white p-3">
                           <img alt="osahan" src="https://www.pngfind.com/pngs/m/470-4703547_icon-user-icon-hd-png-download.png" class="mr-3 rounded-circle img-fluid">
                           <div class="d-flex flex-column">
                              <h6 class="mb-1 font-weight-bold" style="text-transform: capitalize">{{ Auth::user()->nama_user }}</h6>
                              <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> {{ Auth::user()->alamat }}</p>
                           </div>
                        </div>
                        <div>
                           <form method="POST" action="{{ route('cart.transaksi') }}">
                              {{ csrf_field() }} {{ method_field('POST') }}
                              <div class="bg-white p-3 clearfix" style="padding-bottom: 0px !important;">
                                 <p class="font-weight-bold small mb-2">Metode Pembayaran</p>
                                 <div class="tab-content bg-white" id="myTabContent">
                                    <div class="tab-pane fade show active" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                       <div class="osahan-card-body pt-3">
                                          <div class="form-row">
                                             <div class="col-md-12 form-group">
                                                <label class="form-label font-weight-bold small">Pilih Metode Pembayaran</label>
                                                <select name="metode_pembayaran" class="form-control" id="metode_pembayaran">
                                                   <option disabled selected>-- pilih metode pembayaran --</option>
                                                   @foreach ($metodes as $metode)
                                                       <option value="{{ $metode->id }}">{{ $metode->nama_metode }}</option>
                                                   @endforeach
                                                </select>
                                                <div>
                                                   @if ($errors->has('metode_pembayaran'))
                                                       <small class="form-text text-danger">{{ $errors->first('metode_pembayaran') }}</small>
                                                   @endif
                                               </div>
                                             </div>
                                             <div class="col-md-12 alert alert-info" id="cod" style="display: none">

                                             </div>
                                             <div class="col-md-12 form-group" id="transfer" style="display: none">
                                                <p class="mb-1">Silahkan Transfer Ke  <span class="float-right text-dark" id="tujuan_transfer"></span></p>
                                                <p class="mb-1">Nomor Rekening <span class="float-right text-dark" id="nomor_rekening"></span></p>
                                                <p class="mb-1">Atas Nama <span class="float-right text-dark" id="atas_nama"></span></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <input type="hidden" name="metode_pembayaran" id="metode_pembayaran_id">
                              
                              <input type="hidden" name="total_belanja" value="{{ Auth::user()->carts()->sum('total_harga') }}">
                              <input type="hidden" name="ongkir" value="{{ Auth::user()->village->ongkir }}">
                              <input type="hidden" name="total_tambahan" value="{{ Auth::user()->carts()->sum('total_tambahan') }}">
                              <input type="hidden" name="total_diskon" value="{{ Auth::user()->carts()->sum('total_diskon') }}">
                              <div class="bg-white p-3 clearfix">
                                 <p class="font-weight-bold small mb-2">Detail Pembayaran</p>
                                 <p class="mb-1">Total Item Barang <span class="small text-muted">({{ Auth::user()->carts()->get()->count() }} Item)</span> <span class="float-right text-dark">Rp.{{ number_format(Auth::user()->carts()->sum('total_harga')) }}</span></p>
                                 <p class="mb-1">Biaya Tambahan (parkir, dll) <span class="float-right text-dark">Rp.{{ number_format(Auth::user()->carts()->sum('total_tambahan')) }}</span></p>
                                 <p class="mb-3">Ongkos Kirim <span  data-toggle="tooltip" data-placement="top" title="Delivery partner fee - $3" class="text-info ml-1"></span><span class="float-right text-dark">Rp.{{ number_format(Auth::user()->village->ongkir) }}</span></p>
                                 <h6 class="mb-0 text-muted">Total Harga<span class="float-right text-muted">Rp.{{ number_format(Auth::user()->carts()->sum('total_tambahan') + Auth::user()->carts()->sum('total_harga') + Auth::user()->village->ongkir) }}</span></h6>
                                 <h6 class="mb-0 text-success">Diskon<span class="float-right text-success">Rp.{{ number_format(Auth::user()->carts()->sum('total_diskon')) }}</span></h6>
                              </div>
                              <div class="p-3 border-top">
                                 <h5 class="mb-0">Total Dibayarkan  <span class="float-right text-danger">{{ number_format((Auth::user()->carts()->sum('total_tambahan') + Auth::user()->carts()->sum('total_harga') + Auth::user()->village->ongkir) - Auth::user()->carts()->sum('total_diskon')) }}</span></h5>
                              </div>
                              <div class="p-3 border-top">
                                 <button type="submit" style="width: 100%" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Lanjutkan</button>
                              </div>
                           </form>

                        </div>
                     </div>
                     <p class="text-success text-center">Anda menghemat sebanyak Rp.{{ number_format(Auth::user()->carts()->sum('total_diskon')) }} </p>
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
      <script>

      // function quantity(arg){
      //    var id = arg.getAttribute('id');
      //    var value = arg.value;
      //    alert(value);
      // }
      $('.kurangiJumlah').on('click',function(e){
         e.preventDefault();
         var id = $(this).data('val');
         var cart_id = $('#'+id).val();
         let form_url="{{ route('cart.update_kurangi') }}";

         var form = new FormData();
         form.append('id',id);
         let token="{{ csrf_token() }}";
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         $.ajax({
               type: "post",
               url: "{{ route('cart.update_kurangi') }}",
               data: form,
               contentType: false,
               processData: false,
               success: function (data) {
                  if (data.jumlah <1) {
                     $('#minus'+id).attr('disabled',true);
                  }
               window.location.href = "{{ route('cart') }}";
                 $('#nama_kategori_error').hide();
                 toastr.success('Berhasil', 'jumlah produk dikeranjang berhasil diubah', {
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

      $('.ubahJumlah').on('click',function(e){
         e.preventDefault();
         var id = $(this).data('val');
         var cart_id = $('#'+id).val();
         let form_url="{{ route('cart.update') }}";

         var form = new FormData();
         form.append('id',id);
         let token="{{ csrf_token() }}";
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         $.ajax({
               type: "post",
               url: "{{ route('cart.update') }}",
               data: form,
               contentType: false,
               processData: false,
               success: function (data) {
               window.location.href = "{{ route('cart') }}";
                 $('#nama_kategori_error').hide();
                 toastr.success('Berhasil', 'jumlah produk dikeranjang berhasil diubah', {
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

      $(document).on('change','#metode_pembayaran',function(){
        var metode_pembayaran = $('#metode_pembayaran').val();

         $.ajax({
         type :'get',
         url: "{{ url('cari_metode_pembayaran') }}",
         data:{'metode_pembayaran':metode_pembayaran},
               success:function(data){
                  if (data.id == 1) {
                     $('#metode_pembayaran_id').val(metode_pembayaran);
                     $('#transfer').hide();
                     $('#cod').show();
                     $('#cod').text('Silahkan perhatikan alamat anda untuk melakukan transaksi Cash On Delivery');
                  }else{
                     $('#metode_pembayaran_id').val(metode_pembayaran);
                     $('#transfer').show();
                     $('#cod').hide();
                     $('#tujuan_transfer').text(data.nama_metode);
                     $('#nomor_rekening').text(data.nomor_rekening);
                     $('#atas_nama').text(data.keterangan);
                  }
                  
               },
                  error:function(){
               }
         });
    });
      </script>
   </body>
</html>