// tabel data
$(function() {
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

  $(document).on("click", "#search_form button#btn-submit", function(e) {
    e.preventDefault();
      load_table_data();
  });

  //sorting
  $(document).on("click", "#sorting-table a", function (e) {
    e.preventDefault();
    load_table_data(1, $(this).attr("id"));
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

// tabel latihan
$(function() {
  //load table data member
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

  $(document).on("click", "#search_form button#btn-submit", function(e) {
    e.preventDefault();
    load_table_latihan();
  });

  //sorting
  $(document).on("click", "#sorting-table a", function (e) {
    e.preventDefault();
    load_table_latihan(1, $(this).attr("id"));
  });
});

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

// tabel history
$(function() {
  //load table data member
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

  $(document).on("click", "#search_form button#btn-submit", function(e) {
    e.preventDefault();
    load_table_history();
  });

  //sorting
  $(document).on("click", "#sorting-table a", function (e) {
    e.preventDefault();
    load_table_history(1, $(this).attr("id"));
  });
});

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

// tambah tabel data
$(document).on("click", "#btn_assessment", function (e) {
  e.preventDefault();
  var id = $(this).attr("data-id");
  load_form_assessment(id);
});

function load_form_assessment(id) {
  window.location.href = '<?=base_url("assessment_measurentment/assessment/")?>' + id;
}

// cetak kwitansi
function cetak_kwitansi() {
  $('#modal-print-privew-cetak-kwitansi').modal("toggle");
}

function cetak_kwitansi_print() {
  $('#div-nomor-cetak-kwitansi').printArea();
}