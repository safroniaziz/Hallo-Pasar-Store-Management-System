<script>
    $(document).on('change','#provinsi_id',function(){
        var provinsi_id = $(this).val();
        // alert(provinsi_id);
        var div = $(this).parent().parent();

        var op=" ";
        $.ajax({
        type :'get',
        url: "{{ url('cari_kota') }}",
        data:{'provinsi_id':provinsi_id},
            success:function(data){
                // alert(data[i].id);
                // alert(data['prodi'][0]['dosen'][0]['pegawai'].pegIsAktif);
                op+='<option value="0" selected disabled>-- pilih kota --</option>';
                for(var i=0; i<data.length;i++){
                    var ke = 1+i;
                    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                div.find('#kota_id').html(" ");
                div.find('#kota_id').append(op);
            },
                error:function(){
            }
        });
    });

    $(document).on('change','#kota_id',function(){
        var kota_id = $(this).val();
        // alert(kota_id);
        var div = $(this).parent().parent();

        var op=" ";
        $.ajax({
        type :'get',
        url: "{{ url('cari_kecamatan') }}",
        data:{'kota_id':kota_id},
            success:function(data){
                // alert(data[i].id);
                // alert(data['prodi'][0]['dosen'][0]['pegawai'].pegIsAktif);
                op+='<option value="0" selected disabled>-- pilih kecamatan --</option>';
                for(var i=0; i<data.length;i++){
                    var ke = 1+i;
                    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                div.find('#kecamatan_id').html(" ");
                div.find('#kecamatan_id').append(op);
            },
                error:function(){
            }
        });
    });

    $(document).on('change','#kecamatan_id',function(){
        var kecamatan_id = $(this).val();
        // alert(kecamatan_id);
        var div = $(this).parent().parent();

        var op=" ";
        $.ajax({
        type :'get',
        url: "{{ url('cari_kelurahan') }}",
        data:{'kecamatan_id':kecamatan_id},
            success:function(data){
                // alert(data[i].id);
                // alert(data['prodi'][0]['dosen'][0]['pegawai'].pegIsAktif);
                op+='<option value="0" selected disabled>-- pilih kelurahan --</option>';
                for(var i=0; i<data.length;i++){
                    var ke = 1+i;
                    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                div.find('#kelurahan_id').html(" ");
                div.find('#kelurahan_id').append(op);
            },
                error:function(){
            }
        });
    });

    $(document).on('change','#kelurahan_id',function(){
        var kelurahan_id = $(this).val();
        $.ajax({
        type :'get',
        url: "{{ url('cari_ongkir') }}",
        data:{'kelurahan_id':kelurahan_id},
            success:function(data){
                $('#ongkir').val(data.ongkir);
            },
                error:function(){
            }
        });
    });
</script>
