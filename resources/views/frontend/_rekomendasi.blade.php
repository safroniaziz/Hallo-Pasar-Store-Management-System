<div class="osahan-recommend">
    <div class="row">
         @foreach ($rekomendasis as $rekomendasi)
             <div class="col-12 col-md-4 mb-3">
                 <a href="product_details.html" class="text-dark text-decoration-none">
                 <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="recommend-slider2 rounded mb-0">
                         <div class="osahan-slider-item m-2 rounded">
                             <img src="{{ asset('upload/foto_produk/'.$rekomendasi->foto_produk) }}" class="img-fluid mx-auto rounded shadow-sm" style="min-height: 120px !important;" alt="Responsive image">
                         </div>
                         <div class="osahan-slider-item m-2 rounded">
                             <img src="{{ asset('upload/foto_produk/'.$rekomendasi->foto_produk) }}" class="img-fluid mx-auto rounded shadow-sm" style="min-height: 120px !important;" alt="Responsive image">
                         </div>
                         <div class="osahan-slider-item m-2 rounded">
                             <img src="{{ asset('upload/foto_produk/'.$rekomendasi->foto_produk) }}" class="img-fluid mx-auto rounded shadow-sm" style="min-height: 120px !important;" alt="Responsive image">
                         </div>
                     </div>
                     <div class="p-3 position-relative">
                         <h6 class="mb-1 font-weight-bold text-success">{{ $rekomendasi->nama_produk }}
                         </h6>
                         <p class="text-muted">{{ $rekomendasi->deskripsi }}</p>
                         <div class="d-flex align-items-center">
                             <h6 class="m-0">{{ ($rekomendasi->harga + $rekomendasi->tambahan)-$rekomendasi->diskon }}/{{ $rekomendasi->satuan }}</h6>
                 <a class="ml-auto" href="#">
                 <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                 <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
                 <input type='text' name='quantity' value='1' class='qty form-control' />
                 <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
                 </form>
                 </a>
                 </div>
                 </div>
                 </div>
                 </a>
             </div>
         @endforeach
    </div>
 </div>
