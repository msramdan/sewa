console.log("ready");
$(document).ready(function () {
  let row = 1;

  function addDynamicKategori() {

    let categories = window.data.categories;

    let row_option = "";
    let name_group = "";
    let i = 0;

    categories.forEach((item) => {


      if (name_group !== item.main_kategori) {
        if (i > 0) {
          row_option += "</optgroup>"
        }

        row_option += "<optgroup label='" + item.main_kategori + "'>";
      }

      row_option += "<option value=" + item.kategori_id + ">" + item.nama_kategori + "</option>";

      if (name_group !== item.main_kategori) {
        name_group = item.main_kategori;
      }

      if (i === (categories.length - 1)) {
        row_option += "</optgroup>"
      }

      i++;
    });

    let template = "<tr id='" + row + "' ><td><select name='kategori_id[]' class='form-control select2-kategori' aria-label='.form-select' style='width:100% !important' value=''>" + row_option + " <option value='' selected>--Pilih--</option></select></td><td><textarea class='form-control .height-auto'  name='keterangan[]' id='keterangan' placeholder='Keterangan' resizable></textarea></td><td><button type='button' class='btn btn-sm btn-danger btn-remove-category' id='" + row + "'><i class='icon fas fa-trash'></i></button></td></tr>";

    $("#dynamic-kategori-field").append(template);
    row++;
  }

  $("#add-pemeliharaan-dynamic-kategori").on('click', addDynamicKategori);

  $(document).on('click', '.btn-remove-category', function () {
    let button_id = $(this).attr("id");

    $('#dynamic-kategori-field #' + button_id).remove();
  });
});
