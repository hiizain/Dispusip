$.ajaxSetup({
    headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// ========================================================================
// Halaman Input Barang
// ========================================================================
function form(){
    var valueType = document.getElementById("type").value;
    if (valueType !== "0"){
        $('.hide').show();   
    }
    console.log(valueType);
}

$("#type").change(function(){
    changeGambar(this.value);
    console.log(document.getElementById("type").value);
    $('.hide').show(); 
});

$("#btn-preview-type").click(function(){
    previewType(this.value);
});

function changeGambar(idType){
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

function tambahMerek(){
    var merek = document.getElementById("inputMerek").value;
    var lokasi = document.getElementById("lokasi").value;
    // console.log(lokasi);
    $.ajax({
        type:'POST',
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/add-merek',
        data: {'merek':merek,'lokasi':lokasi},
        // success: function(html){
        //     // $('#modalMerek').modal('toggle');
        //     // $('#merek').val('');
        //     // location.reload();
        //     $("#modalMerek .close").click()
        // },
        success: function(){
            $('#errorModal').html(`<div class="row alert alert-success mt-2">
                <div class="col-md-11">
                    <p>Data berhasil ditambahkan</p>
                </div>
                <div class="col-md-1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>`);
            $('#inputMerek').val('');
        },
        error: function(html){
            $('#errorModal').html(`<div class="row alert alert-danger mt-2">
                <div class="col-md-11">
                    <p>Data gagal ditambahkan</p>
                </div>
                <div class="col-md-1">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>`);
            $('#inputMerek').val('');
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