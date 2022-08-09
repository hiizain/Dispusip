$.ajaxSetup({
    headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// ========================================================================
// Halaman Input Barang
// ========================================================================

$("#type").change(function(){
    var split = this.value.split("/"); 
    var idType = split[0];
    var satuan = split[1];
    changeGambar(idType);
    addFormInput(satuan);
    // addFormInput();
    // console.log(this.value);
});

$("#btn-preview-type").click(function(){
    previewType(this.value);
    // console.log(this.value);
});

// $("#saveBarang").click(function(){
//     removeFormInput();
//     // console.log(this.value);
// });

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

function addFormInput(satuan){
    // $(".add-form").classList.add('active');
    $.ajax({
        type:'POST',
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/add-form-input',
        data:'satuan='+satuan,
        success:function(html){
            $('#form').html(html);
            // $('#cek').html(html);
        }
    });
}

function removeFormInput(satuan){
    $(".add-form").classList.remove('active');;
    // $.ajax({
    //     type:'POST',
    //     // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //     url:'/add-form-input',
    //     data:'satuan='+satuan,
    //     success:function(html){
    //         $('#form').html(html);
    //         // $('#cek').html(html);
    //     }
    // });
}


// ========================================================================
// Halaman Pilih Lokasi
// ========================================================================

$("#lokasi").change(function(){
    changeLokasi(this.value);
});

function changeLokasi(idLokasi){
    // console.log(getElementById("lokasiDipilih").href);
    var lokasi = document.getElementById("lokasiDipilih");
    lokasi.href = "petugas-barang/"+idLokasi;
    lokasi.removeAttribute('data-toggle');
    lokasi.removeAttribute('data-target');
}

$("#lokasiDipilih").click(function(){
    // console.log(this.href);
    if (this.href === ""){
        $.ajax({
            type:'GET',
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:'/alert-lokasi',
            success:function(html){
                $("#modalAlertLokasi").html(html);
                // $('#cek').html(html);
            }
        });
    }
});

function toast(){
    $('.toast').toast('show');
}

// ========================================================================
// Halaman Barang
// ========================================================================

function modalBarang(img){
    $('#imgModalBarang').attr("src", img);
    $('.modal').modal('show');
}