$.ajaxSetup({
    headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// ========================================================================
// Halaman Input Barang
// ========================================================================

$("#type").change(function(){
    changeGambar(this.value);
    // console.log(this.value);
});

$("#btn-preview-type").click(function(){
    previewType(this.value);
    // console.log(this.value);
});

function changeGambar(idType){
    // console.log(idType);
    document.getElementById("btn-preview-type").value = idType;
}

function previewType(idType){
    $.ajax({
        type:'POST',
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/priveiew-type',
        data:'id_type='+idType,
        success:function(html){
            $('#modalType').html(html);
            // $('#cek').html(html);
        }
    });
}


// ========================================================================
// Halaman Pilih Lokasi
// ========================================================================

$("#lokasi").change(function(){
    changeLokasi(this.value);
});

function changeLokasi(idLokasi){
    document.getElementById("lokasiDipilih").href = "petugas-barang/"+idLokasi+"";
}


// ========================================================================
// Halaman Barang
// ========================================================================
// $("#btn-preview-barang").click(function(){
//     // var $value = this.value;
//     // $value = $value.split("/");
//     // var noRegister = $value[0];
//     // var no = $value[1];
//     // console.log(noRegister);
//     // console.log(no);
//     previewBarang(this.value);
//     // console.log(idBarang);
// });

function previewBarang(noRegister){
    $.ajax({
        type:'POST',
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/priveiew-barang',
        data:'no_register='+noRegister,
        success:function(html){
            $("#modalBarang").html(html);
            // $('#cek').html(html);
        }
    });
}