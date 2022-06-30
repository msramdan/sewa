console.log("ready");
$(document).ready(function() {
    let row = 1;


    function addDynamicKategori()
    {
        console.log('di tambah');

        let categories = window.data.categories;
        let row_option = "";

        categories.forEach( item => {
            row_option += "<option selected value="+ item.kategori_id+">"+ item.nama_kategori +"</option>";
        });

        let template   = "<tr id='"+ row +"' ><td><select name='kategori_id[]' class='form-control' aria-label='.form-select' style='width:100% !important' value=''>" + row_option + " <option value='' selected>--Pilih--</option></select></td><td><textarea class='form-control .height-auto'  name='keterangan[]' id='keterangan' placeholder='Keterangan' resizable></textarea></td><td><button type='button' class='btn btn-sm btn-danger btn-remove-category' id='" + row + "'><i class='icon fas fa-trash'></i></button></td></tr>";


        $("#dynamic-kategori-field").append( template );

        row++;
    }

    $("#add-pemeliharaan-dynamic-kategori").on('click', addDynamicKategori );

    $(document).on('click', '.btn-remove-category', function() {
        let button_id = $(this).attr("id");
    
    $('#dynamic-kategori-field #' + button_id ).remove();
    });
});
