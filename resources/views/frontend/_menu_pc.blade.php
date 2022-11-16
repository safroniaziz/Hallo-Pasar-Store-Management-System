<div class="modal fade right-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header p-0">
             <nav class="schedule w-100">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                   <a class="nav-link active col-5 py-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                      <p class="mb-0 font-weight-bold">Sign in</p>
                   </a>
                   <a class="nav-link col-5 py-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                      <p class="mb-0 font-weight-bold">Sign up</p>
                   </a>
                   <a class="nav-link col-2 p-0 d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                      <h1 class="m-0 h4 text-dark"><i class="icofont-close-line"></i></h1>
                   </a>
                </div>
             </nav>
          </div>
          <div class="modal-body p-0">
             <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                   <div class="osahan-signin p-4 rounded">
                      <div class="p-2">
                         <h2 class="my-0">Selamat Datang</h2>
                         <p class="small mb-4">Silahkan masuk untuk melanjutkan</p>
                         <form method="POST" action="{{ route('login') }}">
                           @csrf
                            <div class="form-group">
                               <label for="exampleInputEmail1">Email</label>
                               <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                               <div>
                                    @if ($errors->has('email'))
                                       <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                              </div>
                            </div>
                            <div class="form-group">
                               <label for="exampleInputPassword1">Password</label>
                               <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                 <div>
                                    @if ($errors->has('password'))
                                       <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                 </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg rounded btn-block">Login</button>
                         </form>
                         <p class="text-center mt-3 mb-0"><a href="signup.html" class="text-dark">Belum memiliki akun? Daftar Disini</a></p>
                      </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="nav-profile"  role="tabpanel" aria-labelledby="nav-profile-tab">
                   <div class="osahan-signup bg-white p-4">
                      <div class="p-2">
                         <h2 class="my-0">Ayo daftar sekarang</h2>
                         <p class="small mb-4">buat akunmu untuk dapat menikmati kemudahan berbelanja</p>
                         <form action="verification.html">
                            <div class="form-group">
                               <label for="exampleInputName1">Nama Lengkap</label>
                               <input type="text" name="nama_user" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                               <div>
                                 @if ($errors->has('nama_user'))
                                    <small class="form-text text-danger">{{ $errors->first('nama_user') }}</small>
                                 @endif
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputName1">Nama Lengkap</label>
                              <input type="email" name="email" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                              <div>
                                @if ($errors->has('email'))
                                   <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                @endif
                             </div>
                           </div>
                            <div class="form-group">
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
                            <div class="form-group">
                               <label for="exampleInputEmail1">Pekerjaan</label>
                               <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                               <div>
                                 @if ($errors->has('pekerjaan'))
                                    <small class="form-text text-danger">{{ $errors->first('pekerjaan') }}</small>
                                 @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">No. Handphone (WA)</label>
                              <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div>
                                @if ($errors->has('no_hp'))
                                   <small class="form-text text-danger">{{ $errors->first('no_hp') }}</small>
                                @endif
                             </div>
                           </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal Lahir</label>
                              <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div>
                                 @if ($errors->has('tanggal_lahir'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Alamat Lengkap</label>
                              <textarea name="alamat_lengkap" id="" cols="30" rows="3" class="form-control"></textarea>
                              <div>
                                 @if ($errors->has('alamat'))
                                    <small class="form-text text-danger">{{ $errors->first('alamat') }}</small>
                                 @endif
                              </div>
                           </div>
                            <div class="form-group">
                               <label for="exampleInputPassword1">Password</label>
                               <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-success rounded btn-lg btn-block">Buat Akun</button>
                         </form>
                         <p class="text-center mt-3 mb-0"><a href="signin.html" class="text-dark">sudah memiliki akun? login sekarang</a></p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="modal-footer p-0 border-0">
             <div class="col-12 m-0 p-0">
                <a href="#" class="btn border-top border-right btn-lg btn-block" data-dismiss="modal">Close</a>
             </div>
          </div>
       </div>
    </div>
 </div>