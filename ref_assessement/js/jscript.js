$(function () {
  load_table_pembelian_obat();
  load_table_data_latihan();
  load_table_data_history();
  load_table_data_yoga();
  attach_obat();
  attach_vendor();
  
  $("#list-vendor").select2({
    placeholder: "Pilih Vendor",
    allowClear: true,
  });
  $("#simpan-vendor").submit(function (e) {
    
    e.preventDefault();
    if ($("#inputvendor_name").val() != "") {
      $.post(currentUrl + "/save_vendor/", {
        name: $("#inputvendor_name").val(),
        phone: $("#inputvendor_phone").val(),
        address: $("#inputvendor_address").val(),
      }).done(function (data) {
       
        if (data.status == "success") {
          swal("Tambah Data Vendor Berhasil").then((value) => {
            attach_vendor();
            $("#modal-vendor").modal("hide");
            $("#inputvendor_name").val("");
            $("#inputvendor_phone").val("");
            $("#inputvendor_address").val("");
          });
        }
      });
    }
    
  });

  // data
  $(document).on("change", "#div-data-obat select#limit_halaman", function (e) {
    e.preventDefault();
    var limit = $("select#limit_halaman option:selected").val();
    load_table_pembelian_obat((pageNo = 1), limit);
  });

  // latihan
  $(document).on("change", "#div-data-latihan select#limit_halaman", function (e) {
    e.preventDefault();
    var limit = $("select#limit_halaman option:selected").val();
    load_table_data_latihan((pageNo = 1), limit);
  });

  // History
  // data
  $(document).on("change", "#div-data-history select#limit_halaman", function (e) {
    e.preventDefault();
    var limit = $("select#limit_halaman option:selected").val();
    load_table_data_history((pageNo = 1), limit);
  });

  // Data Yoga
  $(document).on("change", "#div-data-yoga select#limit_halaman", function (e) {
    e.preventDefault();
    var limit = $("select#limit_halaman option:selected").val();
    load_table_data_yoga((pageNo = 1), limit);
  });

  //date
 
  $("#tanggal-view").datepicker("setDate", $("#tanggal-view").val());
  $(".datepicker").datepicker();

  //pagination
  // data
  $(document).on(
    "click",
    "#div-data-obat > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      var limit = $("select#limit_halaman option:selected").val();
      if (pageNo != undefined) {
        load_table_pembelian_obat(pageNo,limit);
      }
    }
  );

  // latihan
  $(document).on(
    "click",
    "#div-data-latihan > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      var limit = $("select#limit_halaman option:selected").val();
      if (pageNo != undefined) {
        load_table_data_latihan(pageNo,limit);
      }
    }
  );

  // history
  $(document).on(
    "click",
    "#div-data-history > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      var limit = $("select#limit_halaman option:selected").val();
      if (pageNo != undefined) {
        load_table_data_history(pageNo,limit);
      }
    }
  );

  // Data Yoga
  $(document).on(
    "click",
    "#div-data-yoga > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      var limit = $("select#limit_halaman option:selected").val();
      if (pageNo != undefined) {
        load_table_data_yoga(pageNo,limit);
      }
    }
  );

  // search
  $(document).on("click", "#search_form_data_obat button#btn-submit", function (
    e
  ) {
    e.preventDefault();
    load_table_pembelian_obat();
    load_table_data_latihan();
    load_table_data_history();
    load_table_data_yoga();
  });

  //sorting
  $(document).on("click", "#sorting-table a", function (e) {
    e.preventDefault();
    var limit = $("select#limit_halaman option:selected").val();
    load_table_pembelian_obat(1, limit,$(this).attr("id"));
  });

  //save data
  $(document).on("submit", "#input_form", function (e) {
    $.when(save_data()).done(function (e) {
      preloader("#panel-form");
      if (e.valid == true) window.location.href = currentUrl;
    });
    e.preventDefault();
  });

  // load detail obat
  $(document).on("click", "#detail-obat", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    load_detail(id);
  });

  // load detail yoga
  $(document).on("click", "#detail-yoga", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    load_detail_yoga(id);
  });

  $(document).on("click", "#edit-obat", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    load_edit(id);
  });

  // menghapus obat
  $(document).on("click", "#delete-obat", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var nama = $(this).attr("nama-vendor");
    delete_data(id, nama);
  });

  // menampilkan form Assessement
  $(document).on("click", "#btn_assessement", function (e) {
    e.preventDefault();
    load_form_assessement();
  });

  // menampilkan form tambah
  $(document).on("click", "#btn_tambah", function (e) {
    e.preventDefault();
    load_form_tambah();
  });

  // menambah list obat dengan select2
  $(document).on("change", "#select_obat", function (e) {
    var dataObat = $("#select_obat").select2("data");
   
    var dataTipe = JSON.parse(atob($("#dataTipe").val()));

    var obat = dataObat[0].text;
    var id = dataObat[0].id;
    var kode = dataObat[0].kode;
    var harga = dataObat[0].harga;
    var satuan = dataObat[0].satuan;
    // var satuan = selectObat.data('satuan');
    if (null != kode) {
      var tipe='';
      for (var i = 0; i < dataTipe.length; i++){
        tipe +=
          '<td><input style="width: 100px;" type="text" class="form-control harga_' +
          dataTipe[i]["tipepasien_kode"] +
          '" name="obat[harga_' +
          dataTipe[i]["tipepasien_kode"] +
          '][]" value="0"></td>';
      }
      var rowTable =
        '<tr class="tablerow">' +
        "<td>" +
        $("#row-obat").find("tr").length +
        "</td>" +
        '<td><center><button type="button" class="btn btn-danger" onclick="deleteObat(this);"><i class="fa fa-minus"></i></button></center></td> ' +
        '<td><input style="width: 100px;" type="text" class="form-control" value="' +
        kode.trim() +
        '" disabled><input hidden style="width: 100px;" type="text" id="obat_kode" name="obat[obat][]" value="' +
        kode.trim() +
        '"><input hidden style="width: 100px;" type="text" id="obatid" name="obat[obatid][]" value="' +
        id +
        '"></td>' +
        '<td><input style="width: 200px;" type="text" class="form-control" value="' +
        obat +
        '" disabled></td>' +
        '<td><input style="width: 200px;" type="text" class="form-control" name="obat[batch][]" value=""></td>' +
        '<td><input style="width: 200px;" placeholder="dd-mm-yyyy" type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" name="obat[expdate][]" value=""></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="jumlah_box" name="obat[jumlah_box][]"></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="harga_per_box" name="obat[harga_per_box][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="diskon" name="obat[diskon][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="total_hna" name="obat[total_hna][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="ppn" name="obat[ppn][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="total_hna_ppn" name="obat[total_hna_ppn][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control " onkeyup="jumlah(this)" id="jumlah_obat_per_box"  name="obat[jumlah_obat_per_box][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control "  id="total_jumlah_obat"  name="obat[total_jumlah_obat][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control "  id="harga_beli"  name="obat[harga_beli][]" ></td>' +
        '<td><input style="width: 100px;" type="text" class="form-control "  id="harga_satuan"  name="obat[harga_satuan][]" ></td>' +
        harga +
        '"></td>' +
        tipe +
        "</tr>";
      $("#row-obat").append(rowTable);
        $(".datepicker").datepicker();
    }
  });

  $(document).on("click", "form#input_form button#btn-simpan", function (e) {
    // alert('btn_simpan');
    $.when(save_data()).done(function (e) {
      if (e.valid == true) window.location.href = currentUrl;
    });
    e.preventDefault();
  });

  $(document).on("click", "form#input_form button#btn-ubah", function (e) {
    // alert('btn_simpan');
    $.when(update_data()).done(function (e) {
      if (e.valid == true) window.location.href = currentUrl;
    });
    e.preventDefault();
  });
});

function jumlah(obj) {
  
  var $row = $(obj).closest("tr");
  var jumlah_box = $row.find("#jumlah_box").val();
  var harga_per_box = $row.find("#harga_per_box").val();
  var diskon = $row.find("#diskon").val();
  var total_hna = $row.find("#total_hna").val();
  var ppn = $row.find("#ppn").val();
  var total_hna_ppn = $row.find("#total_hna_ppn").val();
  var jumlah_obat_per_box = $row.find("#jumlah_obat_per_box").val();
  var total_jumlah_obat = $row.find("#total_jumlah_obat").val();
  var harga_beli = $row.find("#harga_beli").val();
  var harga_satuan = $row.find("#harga_satuan").val();
  
  if (jumlah_box == '') {
    jumlah_box = 0;
  }

  if (harga_per_box == "") {
    harga_per_box = 0;
  }

  if (diskon == "") {
    diskon = 0;
  } else {
    diskon = diskon / 100;
  }

  total_hna = (jumlah_box * harga_per_box)-((jumlah_box * harga_per_box)*diskon)
 
  $row.find("#total_hna").val(total_hna);
  
  if (ppn == "") {
    ppn = 0;
  } else {
    ppn = ppn / 100;
  }
  total_hna_ppn = total_hna + (total_hna * ppn)
  $row.find("#total_hna_ppn").val(total_hna_ppn);

  if (jumlah_obat_per_box == "") {
    jumlah_obat_per_box = 0;
  }

  total_jumlah_obat = jumlah_obat_per_box * jumlah_box;
  $row.find("#total_jumlah_obat").val(total_jumlah_obat);

  harga_beli = total_hna_ppn / total_jumlah_obat;
 

  $row.find("#harga_beli").val(harga_beli);
  
  harga_satuan = Math.ceil(harga_beli);
  

  $row.find("#harga_satuan").val(harga_satuan);
  // var harga_beli = jumlah * harga_satuan;
  // $row.find(".harga_beli").val(harga_beli);
  if (harga_satuan != "") {
    if (Number.isNaN(harga_satuan)) {
      harga_satuan = 0;
    }
    var dataTipe = JSON.parse(atob($("#dataTipe").val()));
    for (var i = 0; i < dataTipe.length; i++) {
      var kali = $(
        "input#" + dataTipe[i]["tipepasien_kode"].toLowerCase()
      ).val();
      $row
        .find(".harga_" + dataTipe[i]["tipepasien_kode"])
        .val(Math.ceil(kali * harga_satuan));
    }
  }
  
  // var bmug = $("input#bmug").val();
  // var bpkg = $("input#bpkg").val();
  // var bpug = $("input#bpug").val();
  // var bpum = $("input#bpum").val();
  // var mhug = $("input#mhug").val();
  // var pgug = $("input#pgug").val();
  // var umum = $("input#umum").val();
  // $row.find(".harga_bmug").val(bmug * hargaBeli);
  // $row.find(".harga_bpkg").val(bpkg * hargaBeli);
  // $row.find(".harga_bpug").val(bpug * hargaBeli);
  // $row.find(".harga_bpjs_umum").val(bpum * hargaBeli);
  // $row.find(".harga_mhs_ugm").val(mhug * hargaBeli);
  // $row.find(".harga_peg_ugm").val(pgug * hargaBeli);
  // $row.find(".harga_umum").val(umum * hargaBeli);
  // console.log(umum);
}

function jumlah2(obj) {
  var $row = $(obj).closest("tr");
  var hargaBeli = $row.find("#harga_satuan").val();

  var dataTipe = JSON.parse(atob($("#dataTipe").val()));
  for (var i = 0; i < dataTipe.length; i++) {
    var kali = $("input#" + dataTipe[i]["tipepasien_kode"].toLowerCase()).val();
    $row
      .find(".harga_" + dataTipe[i]["tipepasien_kode"])
      .val(Math.ceil(kali * hargaBeli));
  }
  // console.log(harga_beli);
}

function deleteObat(e) {
  var $row = $(e).closest("tr");
  var id = $row.find("#detail_id_hidden").val();
  var jumlah = $row.find("#total_jumlah_obat_hidden").val();
  if (id != undefined && id != "") {
     $(e).closest("tr").remove();
    //cek apakah sudah digunakan atau belum
    
  } else {
    $(e).closest("tr").remove();
  }

  
  
  
}

function load_table_pembelian_obat(pageNo = 1,limit=5,sort = "") {
  preloader("#div-data-obat");
  $("#waktu-index-data-obat").html("").append(get_current_time());
  //collect search param
  var paramSearch = $("#search_form_data_obat").serializeArray();
  var paramSort = sort || $("#sortdata").val();
  var postData = {
    varsearch: paramSearch,
    sort: paramSort,
    limit: limit,
  };
  //console.log(paramSearch);
  $.post(currentUrl + "/table_pembelian_obat/" + pageNo, postData).done(
    function (datadone) {
      $("#div-data-obat").html(datadone);
      preloader("#div-data-obat");
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      if ($("#div-data-obat").find("td").length < 1 && pageNo != 1)
        load_table_pembelian_obat(pageNo - 1,limit);
    }
  );
}

// latihan
function load_table_data_latihan(pageNo = 1,limit=5,sort = "") {
  preloader("#div-data-latihan");
  $("#waktu-index-data-obat").html("").append(get_current_time());
  //collect search param
  var paramSearch = $("#search_form_data_obat").serializeArray();
  var paramSort = sort || $("#sortdata").val();
  var postData = {
    varsearch: paramSearch,
    sort: paramSort,
    limit: limit,
  };
  //console.log(paramSearch);
  $.post(currentUrl + "/table_data_latihan/" + pageNo, postData).done(
    function (datadone) {
      $("#div-data-latihan").html(datadone);
      preloader("#div-data-latihan");
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      if ($("#div-data-latihan").find("td").length < 1 && pageNo != 1)
      load_table_data_latihan(pageNo - 1,limit);
    }
  );
}


// History
function load_table_data_history(pageNo = 1,limit=5,sort = "") {
  preloader("#div-data-history");
  $("#waktu-index-data-obat").html("").append(get_current_time());
  //collect search param
  var paramSearch = $("#search_form_data_obat").serializeArray();
  var paramSort = sort || $("#sortdata").val();
  var postData = {
    varsearch: paramSearch,
    sort: paramSort,
    limit: limit,
  };
  //console.log(paramSearch);
  $.post(currentUrl + "/table_data_history/" + pageNo, postData).done(
    function (datadone) {
      $("#div-data-history").html(datadone);
      preloader("#div-data-history");
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      if ($("#div-data-history").find("td").length < 1 && pageNo != 1)
        load_table_data_history(pageNo - 1,limit);
    }
  );
}

// Yoga
function load_table_data_yoga(pageNo = 1,limit=5,sort = "") {
  preloader("#div-data-yoga");
  $("#waktu-index-data-obat").html("").append(get_current_time());
  //collect search param
  var paramSearch = $("#search_form_data_obat").serializeArray();
  var paramSort = sort || $("#sortdata").val();
  var postData = {
    varsearch: paramSearch,
    sort: paramSort,
    limit: limit,
  };
  //console.log(paramSearch);
  $.post(currentUrl + "/table_data_yoga/" + pageNo, postData).done(
    function (datadone) {
      $("#div-data-yoga").html(datadone);
      preloader("#div-data-yoga");
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      if ($("#div-data-yoga").find("td").length < 1 && pageNo != 1)
      load_table_data_yoga(pageNo - 1,limit);
    }
  );
}

function save_data() {
  var validator = $("#input_form").validate({
    rules: {
      "input[nama_vendor]": "required",
      "input[tanggal]": "required",
      "input[faktur]": "required",
      "input[total]": "required",
      "input[tipe]": "required",
    },
  });
  var datavalid = validator.form();
  preloader("#panel-form");
  if (datavalid == true) {
    preloader("#panel-form");
    var data = $("#input_form");
    var formData = new FormData(data[0]);
    $.ajax({
      type: "POST",
      url: currentUrl + "/save",
      data: formData,
      async: false,
      success: function (result) {
        if (result.length) {
          try {
            var obj = $.parseJSON(result);
            if (obj.status == "success") {
              show_alert(obj.status, obj.message);
              
            } else {
              show_alert(obj.status, obj.message);
              datavalid = false;
              
            }
          } catch (err) {
            show_alert("error", err.message);
            datavalid = false;
            preloader("#panel-form");
          }
        } else {
          show_alert(
            "error",
            "Ada kesalahan dalam sistem kami, silakan coba lagi nanti"
          );
          datavalid = false;
          preloader("#panel-form");
        }
      },
      error: function (request, status, errorThrown) {
        show_alert(
          "error",
          "Terjadi kesalahan tak terduga (Gagal menyimpan data), silakan coba lagi"
        );
        datavalid = false;
        preloader("#panel-form");
      },
      complete: function () {
        preloader("#panel-form");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  }
  preloader("#panel-form");
  return { valid: datavalid };
}

function update_data() {
  var validator = $("#input_form").validate({
    rules: {
      "input[tanggal]": "required",
      "input[faktur]": "required",
      "input[total]": "required",
      "input[tipe]": "required",
    },
  });
  var datavalid = validator.form();
  preloader("#panel-form");
  if (datavalid == true) {
    
    var data = $("#input_form");
    var formData = new FormData(data[0]);
    $.ajax({
      type: "POST",
      url: currentUrl + "/save_update",
      data: formData,
      async: false,
      success: function (result) {
        if (result.length) {
          try {
            var obj = $.parseJSON(result);
            if (obj.status == "success") {
              show_alert(obj.status, obj.message);
            } else {
              show_alert(obj.status, obj.message);
              datavalid = false;
            }
          } catch (err) {
            show_alert("error", err.message);
            datavalid = false;
            preloader("#panel-form");
          }
        } else {
          show_alert(
            "error",
            "Ada kesalahan dalam sistem kami, silakan coba lagi nanti"
          );
          datavalid = false;
          preloader("#panel-form");
        }
      },
      error: function (request, status, errorThrown) {
        show_alert(
          "error",
          "Terjadi kesalahan tak terduga (Gagal menyimpan data), silakan coba lagi"
        );
        datavalid = false;
        preloader("#panel-form");
      },
      complete: function () {
        preloader("#panel-form");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  }
  return { valid: datavalid };
}

function load_form_tambah() {
  console.log("form");
  window.location.href = '<?=base_url("pembelian_obat/form")?>';
}

// // assessement
function load_form_assessement() {
  console.log("assessement");
  window.location.href = '<?=base_url("ref_assessement/assessement")?>';
}

function load_detail(id) {
  console.log("detail");
  window.location.href = '<?=base_url("pembelian_obat/detail/")?>' + id;
}

// yoga
function load_detail_yoga(id) {
  console.log("detail_yoga");
  window.location.href = '<?=base_url("ref_assessement/detail_yoga/")?>' + id;
}

function load_edit(id) {
  window.location.href = '<?=base_url("ref_assessement/edit/")?>' + id;
  
}

function delete_data(id, nama) {
  console.log(id);
  console.log(nama);
  bootbox.confirm({
    message: "Anda yakin akan menghapus data assessment " + nama + " ?",
    size: "small",
    callback: function (r) {
      if (r == true) {
        // preloader("#index-table-antrian");
        var formData = new FormData();
        formData.append("kode", id);
        $.ajax({
          type: "POST",
          url: currentUrl + "/delete/",
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          success: function (result) {
            console.log(result.length);
            window.location.href = '<?php echo base_url("ref_assessement"); ?>';
          },
        });
      }
    },
  });
}

function attach_vendor() {
  $("#select-vendor").select2({
    placeholder: "Cari Vendor...",
    allowClear: true,
    minimumInputLength: 1,
    dropdownAutoWidth: true,
    ajax: {
      delay: 250,
      url: "<?php echo base_url(); ?>" + "pembelian_obat/get_data_vendor",
      dataType: "json",
      type: "POST",
      data: function (params) {
        var queryParameters = {
          searchVal: params.term,
          page: params.page || 0,
          searchBy: "vendor_name",
        };
        return queryParameters;
      },
      processResults: function (data, params) {
        params.page = params.page || 0;
        return {
          results: data.results,
          pagination: {
            more: params.page * 10 < data.total_data && data.total_data > 10,
          },
        };
      },
      cache: true,
    }
  });
}




function attach_obat() {
  console.log("attach_obat");
  $("#select_obat").select2({
    placeholder: "Cari obat...",
    minimumInputLength: 1,
    dropdownAutoWidth: true,
    ajax: {
      delay: 250,
      url: "<?php echo base_url(); ?>" + "pembelian_obat/get_data_obat",
      dataType: "json",
      type: "POST",
      data: function (params) {
        var queryParameters = {
          searchVal: params.term,
          page: params.page || 0,
          searchBy: "obat_name",
        };
        return queryParameters;
      },
      processResults: function (data, params) {
        params.page = params.page || 0;
        return {
          results: data.results,
          pagination: {
            more: params.page * 10 < data.total_data && data.total_data > 10,
          },
        };
      },
      cache: true,
    },
    templateSelection: function (data, container) {
      $(data.element).attr("data-harga", data.harga);
      $(data.element).attr("data-satuan", data.satuan);
      return data.text;
    },
  });
}

// Cetak Kwitansi
function cetak_kwitansi() {
  $('#modal-print-privew-cetak-kwitansi').modal("toggle");
}

function cetak_kwitansi_print() {
  $('#div-nomor-cetak-kwitansi').printArea();
}




