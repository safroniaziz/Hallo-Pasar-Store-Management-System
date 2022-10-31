<div class="pt-3 pb-2  osahan-categories">
    <div class="d-flex align-items-center mb-2">
    <h5 class="m-0">Apa yang anda cari?</h5>
    <a href="listing.html" class="ml-auto btn btn-outline-success btn-sm">See more</a>
    </div>
    <div class="categories-slider">
    @foreach ($kategoris as $kategori)
        <div class="col-c">
            <div class="bg-white shadow-sm rounded text-center my-2 px-2 py-3 c-it">
            <a href="listing.html">
                <img src="{{ asset('upload/gambar_kategori/'.$kategori->thumbnail) }}" class="img-fluid px-2 mx-auto">
                <p class="m-0 pt-2 text-muted text-center">{{ $kategori->nama_kategori }}</p>
            </a>
            </div>
        </div>
    @endforeach

    </div>
</div>
