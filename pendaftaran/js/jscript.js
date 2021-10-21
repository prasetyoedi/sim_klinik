//index
$(function() {
  load_index_fit();
});


function load_index_fit() {
  //data pasien section
  preloader("#index-form");

  $.post(currentUrl + "/page_fitness", function () {}).done(function (
    datadone
  ) {
    $("#index-form").html(datadone);
    preloader("#index-form");
    });
}


$("#tipe_pendaftaran").on("select2:select", function (e) {
  if ($("#tipe_pendaftaran").val() == "fitness") {
    load_fitness();
    
  } else  {
    load_yoga();
    
  }
});

  function load_fitness() {
    //data pasien section
    preloader("#index-form");
  
    $.post(currentUrl + "/page_fitness", function () {}).done(function (
      datadone
    ) {
      $("#index-form").html(datadone);
      preloader("#index-form");
      });
  }

  function load_yoga() {
    //data pasien section
    preloader("#index-form");
  
    $.post(currentUrl + "/page_yoga", function () {}).done(function (
      datadone
    ) {
      $("#index-form").html(datadone);
      preloader("#index-form");
      });
  }

  $(function() {
    $(document).on("click", "#simpan-yoga", function () {
      $.when(simpan_data_yoga()).done(function (data) {
        if (data.valid == true) {
          
        }
        
      });
    });
  });

  function simpan_data_yoga() {
    var validator = $("#form-yoga").validate({
      rules: {
        
        'input_satu[nama]': 'required'
        // 'input_dua[harga]': 'required'
       
      },
    });
    var datavalid = validator.form();
    var tblPasienId = "";
    if (datavalid == true) {
      // preloader("#index-data-pasien");
      var data = $("#form-yoga");
      var formData = new FormData(data[0]);
      
      var daftar_data = JSON.parse(localStorage.getItem("daftar_data"));
      var jumlahData = daftar_data.length;
      var dataDua = [];
      for (var i = 0; i < jumlahData; i++) {
        dataDua.push({
          yogabill_peserta: $("#nama_yoga_2_" + i).val(),
          yogabill_alamat: $("#alamat_yoga_2_" + i).val(),
          yogabill_biaya: $("#harga_2_" + i).val(),
        });
        if (i + 1 == jumlahData) {
          formData.append("input_dua[daftar]", JSON.stringify(dataDua));
          $.ajax({
            type: "POST",
            url: currentUrl + "/save_yoga",
            data: formData,
            async: false,
            success: function (result) {
              if (result.length) {
                try {
                  var obj = $.parseJSON(result);
                  if (obj.status == "success") {
                    show_alert(obj.status, obj.message);
                    //load_widget();
                    tblPasienId = obj.tblPasienId;
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
              // preloader("#index-data-pasien");
            },
            cache: false,
            contentType: false,
            processData: false,
          });
        }
      }
      
    }
    return { valid: datavalid, id: tblPasienId };
  }