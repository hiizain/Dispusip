$.ajaxSetup({
    headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#type").change(function(){
    changeGambar(this.value);
    // console.log(this.value);
});

$("#btn-preview").click(function(){
    previewType(this.value);
    // console.log(this.value);
});

function changeGambar(idType){
    // console.log(idType);
    document.getElementById("btn-preview").value = idType;
}

function previewType(idType){
    $.ajax({
        type:'POST',
        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/priveiew-type',
        data:'id_type='+idType,
        success:function(html){
            $('#modal').html(html);
            $('#cek').html(html);
        }
    });
}