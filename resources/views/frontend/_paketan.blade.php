<div class="py-3 osahan-promos">
    <div class="d-flex align-items-center mb-3">
       <h5 class="m-0">Paketan Sayur Tanpa Ribet</h5>
       <a href="promos.html" class="ml-auto btn btn-outline-success btn-sm">See more</a>
    </div>
    <div class="promo-slider pb-0 mb-0">
       @foreach ($paketans as $paketan)
         <div class="osahan-slider-item mx-2">
             <a href="promo_details.html"><img src="{{ asset('upload/foto_produk/'.$paketan->foto_produk) }}" class="img-fluid mx-auto rounded" alt="Responsive image"></a>
         </div>
       @endforeach
    </div>
 </div>
