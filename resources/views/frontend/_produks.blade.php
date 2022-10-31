<div class="pick_today">
    <div class="row">
         @foreach ($produks as $produk)
             <div class="col-6 col-md-3 mb-3">
                 <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                 <div class="list-card-image">
                     <a href="product_details.html" class="text-dark">
                         <div class="member-plan position-absolute"><span class="badge m-3 badge-danger">{{ $produk->kategori->nama_kategori }}</span></div>
                         <div class="p-3">
                             <img src="{{ asset('upload/foto_produk/'.$produk->foto_produk) }}" class="img-fluid item-img w-100 mb-3" style="max-height: 120px !important; min-height:120px !important">
                             <h6>{{ $produk->nama_produk }}</h6>
                             <div class="d-flex align-items-center">
                             <h6 class="price m-0 text-success">{{ ($produk->harga + $produk->tambahan)-$produk->diskon }}/{{ $produk->satuan }}</h6>
                     <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" class="btn btn-success btn-sm ml-auto">+</a>
                     <div class="collapse qty_show" id="collapseExample1">
                     <div>
                     <span class="ml-auto" href="#">
                     <form id='myform' class="cart-items-number d-flex" method='POST' action='#'>
                     <input type='button' value='-' class='qtyminus btn btn-success btn-sm' field='quantity' />
                     <input type='text' name='quantity' value='1' class='qty form-control' />
                     <input type='button' value='+' class='qtyplus btn btn-success btn-sm' field='quantity' />
                     </form>
                     </span>
                     </div>
                     </div>
                     </div>
                     </div>
                     </a>
                 </div>
                 </div>
             </div>
         @endforeach
    </div>
 </div>
