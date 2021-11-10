// tabel data
$(function() {
  load_table_data();
  load_table_history();
  load_table_latihan();

  //load table data member
  if ($("#div-data").length > 0) {
    load_table_data();
  }

  //pagination table data
  $(document).on(
    "change",
    "#div-data > nav > .list-inline > li > select",
    function (e) {
      console.log(e);
      e.preventDefault();
      var limit = $(
        "#div-data > nav > .list-inline > li > select option:selected"
      ).val();
      load_table_data(1, "", limit);
    }
  );
  $(document).on(
    "click",
    "#div-data > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      if (pageNo != undefined) {
        load_table_data(pageNo);
      }
    }
  );

  if ($("#div-latihan").length > 0) {
    load_table_latihan();
  }

  //pagination table data
  $(document).on(
    "change",
    "#div-latihan > nav > .list-inline > li > select",
    function (e) {
      console.log(e);
      e.preventDefault();
      var limit = $(
        "#div-latihan > nav > .list-inline > li > select option:selected"
      ).val();
      load_table_latihan(1, "", limit);
    }
  );

  $(document).on(
    "click",
    "#div-latihan > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      if (pageNo != undefined) {
        load_table_latihan(pageNo);
      }
    }
  );

// tabel history
  if ($("#div-history").length > 0) {
    load_table_history();
  }

  //pagination table data
  $(document).on(
    "change",
    "#div-history > nav > .list-inline > li > select",
    function (e) {
      console.log(e);
      e.preventDefault();
      var limit = $(
        "#div-history > nav > .list-inline > li > select option:selected"
      ).val();
      load_table_history(1, "", limit);
    }
  );
  $(document).on(
    "click",
    "#div-history > nav > .pagination > li > a",
    function (e) {
      e.preventDefault();
      var pageNo = $(this).attr("data-ci-pagination-page");
      if (pageNo != undefined) {
        load_table_history(pageNo);
      }
    }
  );

  // $(document).on("click", "#search_form button#btn-submit", function(e) {
  //   e.preventDefault();
  //     load_table_data();
  //     load_table_history();
  //     load_table_latihan();
  // });

  $(document).on("click", "#search_form button#btn-submit", function (
    e
  ) {
    e.preventDefault();
      load_table_data();
      load_table_history();
      load_table_latihan();
  });

  //sorting
  $(document).on("click", "#sorting-table a", function (e) {
    e.preventDefault();
    load_table_data(1, $(this).attr("id"));
    load_table_history(1, $(this).attr("id"));
    load_table_latihan(1, $(this).attr("id"));
  });

  // tambah tabel data
  $(document).on("click", "#btn_assessment", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    load_form_assessment(id);
  });

  //save data
  $(document).on("click", "#simpan-data", function () {
    $.when(simpan_data_assessment()).done(function (data) {
    if (data.valid == true) {

    }
        
    });
  }); 

  // menghapus obat
  $(document).on("click", "#delete-data", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var nama = $(this).attr("nama-member");
    delete_data(id, nama);
  });
});

function load_table_data(pageNo = 1, sort = '',limit=5) {        
    //collect search param
    var paramSearch = $("#search_form").serializeArray();
    var paramSort = sort || $("#sortdata").val();        
    var postData = {
        search: paramSearch,
        sort: paramSort
    };
    
    preloader("#div-data");
    $.post(currentUrl+"/index_data_table/"+limit+'/'+pageNo, postData)
    .done(function(datadone){        
        $("#div-data").html(datadone);
        preloader("#div-data");        
        $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        if($("#div-data").find('td').length < 1 && pageNo != 1) load_table_data(pageNo-1);
    });
}


function load_table_latihan(pageNo = 1, sort = '',limit=5) {        
  //collect search param
  var paramSearch = $("#search_form").serializeArray();
  var paramSort = sort || $("#sortdata").val();        
  var postData = {
      search: paramSearch,
      sort: paramSort
  };
  
  preloader("#div-latihan");
  $.post(currentUrl+"/index_latihan_table/"+limit+'/'+pageNo, postData)
  .done(function(datadone){        
      $("#div-latihan").html(datadone);
      preloader("#div-latihan");        
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      if($("#div-latihan").find('td').length < 1 && pageNo != 1) load_table_latihan(pageNo-1);
  });
}

function load_table_history(pageNo = 1, sort = '',limit=5) {        
  //collect search param
  var paramSearch = $("#search_form").serializeArray();
  var paramSort = sort || $("#sortdata").val();        
  var postData = {
      search: paramSearch,
      sort: paramSort
  };
  
  preloader("#div-history");
  $.post(currentUrl+"/index_history_table/"+limit+'/'+pageNo, postData)
  .done(function(datadone){        
      $("#div-history").html(datadone);
      preloader("#div-history");        
      $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
      if($("#div-history").find('td').length < 1 && pageNo != 1) load_table_history(pageNo-1);
  });
}

function load_form_assessment(id) {
  window.location.href = '<?=base_url("assessment_measurentment/assessment/")?>' + id;
}

// cetak kwitansi
// function cetak_kwitansi() {
//   $('#modal-print-privew-cetak-kwitansi').modal("toggle");
// }

function cetak_kwitansi() {
  preloader("#div-nomor-cetak-kwitansi");
  
  var id = $("#id_member").val();
  $.post(currentUrl + "/form_cetak_kwitansi/"+id, function () {}).done(function (
    datadone
  ) {
    $("#div-nomor-cetak-kwitansi").html(datadone);
    preloader("#div-nomor-cetak-kwitansi");
    }); 
  
      $('#modal-print-privew-cetak-kwitansi').modal("toggle");
}

function cetak_kwitansi_print() {
  $('#div-nomor-cetak-kwitansi').printArea();
}

function simpan_data_assessment() {
    //   preloader("#index-form");
    var data = $("#form-assessment");
    var formData = new FormData(data[0]);
    $.ajax({
      type: "POST",
      url: currentUrl + "/save_assessment/",
      data: formData,
      async: false,
      success: function (result) {
        if (result.length) {
          try {
            var obj = $.parseJSON(result);
            if (obj.status == "success") {
              show_alert(obj.status, obj.message);
              // $("#id_billing").val(obj.id_billing);
              // load_index_fit();
              // tblPasienId = obj.tblPasienId;
            } else {
              show_alert(obj.status, obj.message);
            }
            //console.log(obj);
          } catch (err) {
            show_alert("error", err.message);
          }
        } else {
          show_alert(
            "error",
            "Ada kesalahan dalam sistem kami, silakan coba lagi nanti"
          );
        }
      },
      error: function (request, status, errorThrown) {
        show_alert(
          "error",
          "Terjadi kesalahan tak terduga (Gagal menyimpan data), silakan coba lagi"
        );
      },
      complete: function () {
      //   preloader("#index-form");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  
  return {valid:datavalid};
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
              window.location.href = '<?php echo base_url("assessment_measurentment"); ?>';
            },
          });
        }
      },
    });
}