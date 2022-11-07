<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
<script src="{{ asset('assets/cropper/jquery-cropper.js') }}"></script>
<script src="{{ asset('assets/cropper/main.js') }}"></script>

<script type="text/javascript">
    var $image = $('#image');

    $image.cropper({
        aspectRatio: 1 / 1,
    });

    $('#crop').on('click', function(){
        var $image = $('#image');
        var cropper = $image.data('cropper');
        var url = cropper.getCroppedCanvas().toDataURL('image/jpeg').replace(/^data:image\/[^;]+/, 'data:application/octet-stream');
        $(this).attr('href', url);
    });
</script>

