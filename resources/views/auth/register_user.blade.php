
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
                <div class="osahan-signup shadow bg-white p-4 rounded">
                   <div class="p-3">
                      <h2 class="my-0">Ayo buat akun anda di sini</h2>
                      <p class="small mb-4">buat akun untuk dapat menikmati layanan yang kami berikan</p>
                      <form action="{{ route('register_user_post') }}" method="POST">
                        {{ csrf_field() }} {{ method_field("POST") }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Nama Lengkap</label>
                                <input type="text" name="nama_user" class="form-control" aria-describedby="emailHelp">
                                <div>
                                  @if ($errors->has('nama_user'))
                                     <small class="form-text text-danger">{{ $errors->first('nama_user') }}</small>
                                  @endif
                               </div>
                             </div>
 
                             <div class="form-group col-md-6">
                               <label for="exampleInputName1">Email</label>
                               <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                               <div>
                                 @if ($errors->has('email'))
                                    <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                 @endif
                              </div>
                            </div>
                             <div class="form-group col-md-6">
                                <label for="exampleInputNumber1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                  <option selected disabled>-- pilih jenis kelamin --</option>
                                  <option value="L">Laki-Laki</option>
                                  <option value="P">Perempuan</option>
                                </select>
                                <div>
                                  @if ($errors->has('jenis_kelamin'))
                                     <small class="form-text text-danger">{{ $errors->first('jenis_kelamin') }}</small>
                                  @endif
                               </div>
                             </div>
                             <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div>
                                  @if ($errors->has('pekerjaan'))
                                     <small class="form-text text-danger">{{ $errors->first('pekerjaan') }}</small>
                                  @endif
                               </div>
                             </div>
                             <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">No. Handphone (WA)</label>
                               <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                               <div>
                                 @if ($errors->has('no_hp'))
                                    <small class="form-text text-danger">{{ $errors->first('no_hp') }}</small>
                                 @endif
                              </div>
                            </div>
                             <div class="form-group col-md-6">
                               <label for="exampleInputEmail1">Tanggal Lahir</label>
                               <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                               <div>
                                  @if ($errors->has('tanggal_lahir'))
                                     <small class="form-text text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                  @endif
                               </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Pilih Provinsi</label>
                                <select name="provinsi_id" id="provinsi_id" class="form-control">
                                    <option disabled selected>-- pilih provinsi --</option>
                                    @foreach ($provinces as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @if ($errors->has('provinsi_id'))
                                        <small class="form-text text-danger">{{ $errors->first('provinsi_id') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 ">
                                <label>Pilih Kota</label>
                                <select name="kota_id" id="kota_id" class="form-control">
                                    <option disabled selected>-- pilih kota --</option>
                                </select>
                                <div>
                                    @if ($errors->has('kota_id'))
                                        <small class="form-text text-danger">{{ $errors->first('kota_id') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 ">
                                <label>Pilih Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                    <option disabled selected>-- pilih kecamatan --</option>
                                </select>
                                <div>
                                    @if ($errors->has('kecamatan_id'))
                                        <small class="form-text text-danger">{{ $errors->first('kecamatan_id') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 ">
                                <label>Pilih Kelurahan</label>
                                <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                                    <option disabled selected>-- pilih kelurahan --</option>
                                </select>
                                <div>
                                    @if ($errors->has('kelurahan_id'))
                                        <small class="form-text text-danger">{{ $errors->first('kelurahan_id') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                               <label for="exampleInputEmail1">Alamat Lengkap</label>
                               <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                               <div>
                                  @if ($errors->has('alamat'))
                                     <small class="form-text text-danger">{{ $errors->first('alamat') }}</small>
                                  @endif
                               </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <div>
                                    @if ($errors->has('password'))
                                       <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                 </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="konfirmasi_password">
                                <div class="form-group col-md-12">
                                    <a class="password_sama" style="color: green; font-size:12px; font-style:italic; display:none;"><i class="fa fa-check-circle"></i>&nbsp;Password Sama!!</a>
                                    <a class="password_tidak_sama" style="color: red; font-size:12px; font-style:italic; display:none;"><i class="fa fa-close"></i>&nbsp;Password Tidak Sama!!</a>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success rounded btn-lg btn-block" id="create" disabled>Buat Akun</button>
                            </div>
                        </div>
                      </form>
                      <p class="text-center mt-3 mb-0"><a href="{{ URL('login') }}" class="text-dark">Sudah memiliki akun? Login disini</a></p>
                   </div>
                </div>
            </div>
            </div>
         </div>
    </section>
    @include('frontend/_menu_android')
    @include('js/frontend')
    @include('js/get_region')
    <script>
        $(document).ready(function(){
            $("#password, #konfirmasi_password").keyup(function(){
                var password = $("#password").val();
                var ulangi = $("#konfirmasi_password").val();
                if($("#password").val() == $("#konfirmasi_password").val()){
                    $('.password_sama').show(200);
                    $('.password_tidak_sama').hide(200);
                    $('#create').attr("disabled",false);
                }
                else{
                    $('.password_sama').hide(200);
                    $('.password_tidak_sama').show(200);
                    $('#create').attr("disabled",true);
                }
            });
        });
    </script>
   </body>
</html>