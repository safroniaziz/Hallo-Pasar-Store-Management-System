$('#download').on('click',function(e){
    e.preventDefault();
    var $image = $('#image');

    var nama_kategori = $('#nama_kategori').val();
    var cropper = $image.data('cropper');
    if(cropper.getCroppedCanvas() == null)
    {
        $('#alert-gambar').show();
    }
    else
    {
        $('#alert-gambar').hide();
        var url = cropper.getCroppedCanvas().toDataURL('image/jpeg').replace(/^data:image\/[^;]+/, 'data:application/octet-stream');
    }
    let form_url="{{ route('admin.kategori_produk.post') }}";

    var form = new FormData();
    form.append('thumbnail',url);
    form.append('nama_kategori',nama_kategori);
    let token="{{ csrf_token() }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "{{ route('admin.kategori_produk.post') }}",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            toastr.success('Hello', 'Your fun', {
                timeOut: 1000,
                preventDuplicates: true,
                positionClass: 'toast-top-right',
                // Redirect
                onHidden: function() {
                    window.location.href = "{{URL::to('admin/manajemen_kategori_produk')}}"
                }
            });
        },
        error: function(err){
            $('#nama_kategori_error').text(err.responseJSON['errors'].nama_kategori[0]);
            // console.log(err.responseJSON['errors'].nama_kategori[0]);
        }
    });
});
