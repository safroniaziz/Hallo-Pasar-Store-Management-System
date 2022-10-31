<script>
    function previewFoto() {
        var preview = document.querySelector('#preview-foto');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
        preview.src = reader.result;
        }

        if (file) {
        reader.readAsDataURL(file);
        } else {
        preview.src = "";
        }
    }
</script>
