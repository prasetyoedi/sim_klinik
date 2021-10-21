<style>
    body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>

<div class="stepwizard ">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Register</p>
        </div>

        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Pilih Paket</p>
        </div>

        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Billing</p>
        </div>
    </div>
</div>

<form id="form-pasien">
    <div class="row setup-content" id="step-1">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><strong>DATA MEMBER</strong></span>
                </div>

                <div class="panel-body">
                    <div id="index-data-fitness">
                        
                    </div>

                    <div class="col-lg-12 text-right">
                        <button type="button" class="btn btn-default" id="reset-member">Reset</button>
                        <input type="button" value="Selanjutnya" class="btn btn-primary nextBtn btn-small"/>
                        <!-- <button class="btn btn-primary nextBtn" type="button" >Selanjutnya</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row setup-content" id="step-2">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><strong>PAKET</strong></span>
            </div>

            <div class="panel-body">
                <!-- <h3> Step 2</h3> -->
                <div class="form-group col-md-12  m-t-3">
                    <label class="control-label" for="tipe_pasien">Pilih Paket</label>
                    <select class="form-control select2" id="paket" name="input[paket]">
                        <option value="">--Pilih Paket--</option>
                        <?php foreach ($tipePaket as $key => $val) : ?>
                            <option value="<?php echo $val->fititem_id; ?>" data-days="<?= $val->fititem_days ?>" data-harga-paket="<?= $val->fititem_biaya ?>" data-paket="<?= $val->fititem_name ?>"><?php echo $val->fititem_name ?></option>
                        <?php endforeach ?>
                    </select>        
                </div>

                <div class="form-group">
                    <!-- <label class="control-label">Last Name</label> -->
                    <div class="form-group col-md-6">
                        <label>Tanggal Membership Mulai Berlaku</label>
						<p class="form-control-static" id="start-date"></p>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tanggal Membership Berakhir</label>
						<p class="form-control-static" id="end-date"></p>
                    </div>

                    <div class=" col-md-5">
                        <input type="hidden" class="code form-control" id="harga-paket" value=""/> &nbsp;
                    </div>
                    
                    <div class=" col-md-5">
                        <input type="hidden" class="code form-control" id="nama-paket" value=""/> &nbsp;
                    </div>
                </div>
            </div>
        </div>
          
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><strong>BIAYA LAIN</strong></span>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group col-md-6">
                        <label>Nama</label>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Jumlah Biaya</label>
                    </div>

                    <div class="form-group" >
                        <!-- <tr valign="top"> -->
                        
                    </div>

                    
                    <input type="hidden" class="code form-control" id="nama-item" value="<?= json_encode($tipeBiayaLain) ?>"/> &nbsp;
                    
                    <div id="customFields" >
                        <div class="form-group" >

                            <div class=" col-md-6">
                                <select class="form-control select2" onChange="biayaLain(this);" name="input[biaya_lain]">
                                    <option value="">--Pilih Item--</option>
                                    <?php foreach ($tipeBiayaLain as $key => $val) { ?>
                                        <option value="<?php echo $val->fititem_id; ?>" data-harga="<?php echo $val->fititem_biaya; ?>" data-nama-biaya-lain="<?php echo $val->fititem_name; ?>"><?php echo $val->fititem_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            
    
                            <div class=" col-md-5">
                                <input type="text" class="form-control" id="harga-biaya-lain" name="" value="" readonly/>
                            </div>

                            <div class=" col-md-1">
                                <a href="javascript:void(0);" class="addCF btn btn-default btn-number fa fa-plus-circle" type="button"></a>
                            </div>
                                    <!-- <a href="javascript:void(0);" class="addCF btn btn-default btn-number fa fa-plus-circle" type="button"></a> -->
                        </div>
                    </div>
                    
                    <div class="form-group col-md-5">
                        <input type="hidden" class="code form-control" id="nama-biaya-lain" value="" readonly/> &nbsp;
                    </div>
                               

                    <div class="col-lg-12 text-right">
                        <button class="btn btn-primary prevBtn" type="button" >Sebelumya</button>
                        <input type="button" value="Selanjutnya" onclick="nextData();" id="simpan-local" class="btn btn-primary nextBtn btn-small"/>
                        <!-- <button class="btn btn-primary nextBtn" id="simpan-local" type="button" >Selanjutnya</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row setup-content" id="step-3">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><strong>PEMBAYARAN</strong></span>
            </div>


            <div class="panel-body">
                <!-- <h3> Step 1</h3> -->
                <div class="form-group col-md-12  m-t-3">
                    <label><strong>Tagihan Member</strong></label>
                </div>

                <div id="list-data-paket" class="col-md-12 ">

                </div>
            </div>
        </div>

        <!-- <div class="col-xs-12 panel">
            <div class="col-md-12 panel-body">
                <div class="form-group col-md-12  m-t-3">
                    <label><strong>Tagihan Biaya Lain</strong></label>
                </div>
                
                <div id="list-data-lain" class="col-md-12 ">

                </div>
            </div>
        </div> -->

        <div class="col-xs-12 panel">
            <div class="col-md-12 panel-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Sub Total</label>
                    <div class="col-md-9  m-b-1">
                        <input type="text" class="form-control" placeholder="Sub Total" maxlength="50" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Pembulatan</label>
                    <div class="col-md-9  m-b-1">
                        <input type="text" class="form-control" placeholder="Pembulatan" maxlength="50" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Total</label>
                    <div class="col-md-9  m-b-1">
                        <input type="text" class="form-control" placeholder="Total" maxlength="50" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Pembayaran</label>
                    <div class="col-md-9  m-b-1">
                        <input type="text" class="form-control" placeholder="Pembayaran" maxlength="50">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Kembali</label>
                    <div class="col-md-9  m-b-1">
                        <input type="text" class="form-control" placeholder="Kembali" maxlength="50" readonly>
                    </div>
                </div>

                <div class="col-lg-12 text-right">
                    <button onclick="cetak_kwitansi()" type="button" class="btn btn-secondary">Cetak Kwitansi</button>
                    <button class="btn btn-primary prevBtn" type="button">Sebelumya</button>
                    <!-- <button class="btn btn-success" type="submit">Kirim</button> -->
                    <button type="button" class="btn btn-success" id="simpan-fitness" onclick="hapusData();">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="<?= base_url(); ?>compressfile/jqueryPrintArea.js"></script>
<div class="modal fade" id="modal-print-privew-cetak-kwitansi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Kwitansi</h4>
                <button type="button" class="btn btn-success" onclick="cetak_kwitansi_print()">Cetak</button>
            </div>
            <div class="modal-body">
                <div id="div-nomor-cetak-kwitansi" style="padding-top:20px;">
                    <?= $this->load->view("form_cetak_kwitansi") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


// cetak kwitansi
function cetak_kwitansi() {
    $('#modal-print-privew-cetak-kwitansi').modal("toggle");
}

function cetak_kwitansi_print() {
    $('#div-nomor-cetak-kwitansi').printArea();
}

// tambah row biaya lain

$(document).ready(function(){
	$(".addCF").click(function(){
		$("#customFields").append(
            '<div class="form-group" >' +
            '<div class=" col-md-6">' +
            '<select class="form-control select2" onChange="biayaLain(this);" name="input[biaya_lain]">' +
            '<option value="">--Pilih Item--</option>' +
            '<?php foreach ($tipeBiayaLain as $key => $val) { ?>' +
            '<option value="<?php echo $val->fititem_id; ?>" data-harga="<?php echo $val->fititem_biaya; ?>" data-nama-biaya-lain="<?php echo $val->fititem_name; ?>"><?php echo $val->fititem_name; ?></option>' +
            '<?php } ?>' +
            '</select>' +
            '</div>' +
            '<div class=" col-md-5">' +
            '<input type="text" class="code form-control" id="harga-biaya-lain" name="customFieldValue[]" value="" readonly/> &nbsp;' +
            '</div>' +
            '<div class=" col-md-1">' +
            '<a href="javascript:void(0);" class="remCF btn btn-default btn-number fa fa-minus-circle" type="button"></a>' +
            '</div>' +
            '</div>');
	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});

// wizard next prev button
$(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function(){
    var ktp = $("#no_identitas").val()
    var nim = $("#no_identitas_profesi").val()
    var bpjs = $("#no_bpjs").val()
    var nama = $("#nama_lengkap").val()

    if(nama.length<3){
        alert('Nama Wajib Diisi')
    } else if(ktp.length>10 || nim.length>5 || bpjs.length>12){
        var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
        
    } else{
        alert('Data KTP/NIM/BPJS Wajib Diisi Salah Satu')
    } 
});

$('div.setup-panel div a.btn-primary').trigger('click');
});

$(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allPrevBtn = $('.prevBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allPrevBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid)
        prevStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');
});


$(function () {
  load_widget();
});

function load_widget() {
  preloader("#index-data-fitness");

  $.post(currentUrl + "/data_fitness", function (data) {}).done(function (
    datadone
  ) {
    $("#index-data-fitness").html(datadone);
    //form pasien section
    $.post(currentUrl + "/form_fitness", function (data) {}).done(function (
      datadone
    ) {
      $("#index-form-fitness").html(datadone);
      preloader("#index-data-fitness");
      attach_select2("#paket");
      attach_select2("#biayaLain");
    //   attach_select2("#pasien-unit");
      $(".datepicker2").datepicker();
    });
  });
}

// reset form fitness
$(document).on("click", "#reset-member", function () {
    load_widget();
});

//save data
$(document).on("click", "#simpan-fitness", function () {
    $.when(simpan_data_fitness()).done(function (data) {
    if (data.valid == true) {

    }
        
    });
});

function simpan_data_fitness() {
    var validator = $("#form-pasien").validate({
      rules: {                
        'input[paket]': 'required'
    } 
    });
    var datavalid = validator.form();
    var tblPasienId = "";
    if (datavalid == true) {
    //   preloader("#index-form");
      var data = $("#form-pasien");
      var formData = new FormData(data[0]);
      $.ajax({
        type: "POST",
        url: currentUrl + "/save_fitness",
        data: formData,
        async: false,
        success: function (result) {
          if (result.length) {
            try {
              var obj = $.parseJSON(result);
              if (obj.status == "success") {
                show_alert(obj.status, obj.message);
                load_index_fit();
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
    }
    return {valid:datavalid};
}

// tampil localstorage
function muatDaftarDataPaket(){
    if (localStorage.daftar_paket && localStorage.daftar_lain_select || localStorage.daftar_lain_input){
            
        daftar_paket = JSON.parse(localStorage.getItem('daftar_paket'));
        daftar_lain_select = JSON.parse(localStorage.getItem('daftar_lain_select'));
        daftar_lain_input = JSON.parse(localStorage.getItem('daftar_lain_input'));
            
        var data_item = JSON.parse('<?= json_encode($tipeBiayaLain) ?>')
        var data_app = "";
                
        if (daftar_paket.length > 0){
            data_app = '<table class="table">';
            data_app += '<thead>'+
                        '<th>No</th>'+
                        '<th>Keterangan</th>'+
                        '<th>Harga</th>'+
                        '</thead>'+
                        '<tbody>';
            
            var i=1;
            for (a in daftar_paket){
                data_app += '<tr>';
                data_app += '<td>'+ i++ + ' </td>'+
                            '<td>'+ daftar_paket[a].ket + ' </td>'+
                            '<td>Rp. '+ daftar_paket[a].harga + ' </td>';
                data_app += '</tr>';
                            
            }
                console.log(data_item)
            for (var j=0; j<daftar_lain_select.length; j++){
                var nama_item=""
                for (var a=0; a<data_item.length; a++){
                    console.log(data_item[a])
                    if (data_item[a]["fititem_id"]==daftar_lain_select[j].value){
                    nama_item=data_item[a]["fititem_name"];
                    console.log(nama_item)

                    }
                }
                data_app += '<tr>';
                data_app += '<td>'+ i++ + ' </td>'+
                            '<td>'+ nama_item + ' </td>'+
                            '<td>Rp. '+ daftar_lain_input[j].value + ' </td>';
                data_app += '</tr>';
                            
            }
                    
            data_app += '</tbody></table>';
               
        }
        else {
            data_app = "Tidak ada data...";
        }
               
                
        $('#list-data-paket').html(data_app);
        $('#list-data-paket').hide();
        $('#list-data-paket').fadeIn(100);
    }
}
		
// function muatDaftarDataLain(){
//     if (localStorage.daftar_lain && localStorage.id_data){
            
//         daftar_lain = JSON.parse(localStorage.getItem('daftar_lain'));
                
//         var data_app = "";
                    
//         if (daftar_paket.length > 0){
//             data_app = '<table class="table">';
//             data_app += '<thead>'+
//                         '<th>No</th>'+
//                         '<th>Keterangan</th>'+
//                         '<th>Harga</th>'+
//                         '</thead>'+
//                         '<tbody>';

//             for (i in daftar_lain){
//                 data_app += '<tr>';
//                 data_app += '<td>'+ daftar_lain[i].id_data + ' </td>'+
//                             '<td>'+ daftar_lain[i].ketlain + ' </td>'+
//                             '<td>Rp. '+ daftar_lain[i].hargalain + ' </td>';
//                 data_app += '</tr>';
                                
//             }
                        
//             data_app += '</tbody></table>';
                
//         }

//         else {
//             data_app = "Tidak ada data...";
//         }
                
                
//         $('#list-data-lain').html(data_app);
//         $('#list-data-lain').hide();
//         $('#list-data-lain').fadeIn(100);
//     }
// }
		
// save localstorage
$("#simpan-local").click(function(e){
    var i=1
    
    paket = $('#nama-paket').val();
    hargaPaket = $('#harga-paket').val();
    hargaBiayaLain = $('#harga-biaya-lain').val();
    biayaLain = $('#nama-biaya-lain').val();
    // biayaLain = $('#paket').val();
        
    daftar_paket = [];
    daftar_lain_select = [];
    daftar_lain_input = [];
    id_data = 0;

    if (localStorage.daftar_paket && localStorage.daftar_lain_select && localStorage.daftar_lain_input){
        localStorage.removeItem('daftar_paket')
        localStorage.removeItem('daftar_lain_select')
        localStorage.removeItem('daftar_lain_input')
    }

    $('#customFields :input').each(function(){
        if( i==1){ 
            daftar_lain_select.push({'id':i, 'value':this.value});

        } else if(i%2==0){
            daftar_lain_input.push({'id':i, 'value':this.value});

        } else{
            daftar_lain_select.push({'id':i, 'value':this.value});

        }
        if($('#customFields :input').length==i){
            daftar_paket.push({'harga':hargaPaket, 'ket':paket});
            localStorage.setItem('daftar_paket', JSON.stringify(daftar_paket));
            localStorage.setItem('daftar_lain_select', JSON.stringify(daftar_lain_select));
            localStorage.setItem('daftar_lain_input', JSON.stringify(daftar_lain_input));
            // document.getElementById('form-pasien').reset();
            menuPaket('list-data-paket');
            menuLain('list-data-lain');
        }
        i++;
    });

    
                
    return false;
});
		
// delete localstorage
// function hapusData(){
            
//     if (localStorage.daftar_paket && localStorage.daftar_lain && localStorage.id_data){
//         daftar_paket = JSON.parse(localStorage.removeItem('daftar_paket'));
//         daftar_lain = JSON.parse(localStorage.removeItem('daftar_lain'));
//         id_data = parseInt(localStorage.removeItem('id_data'));
//     }
//     else {
//         daftar_paket = [];
//         daftar_lain = [];
//         id_data = 0;
//     }

//     return false;
// }
                				

function menuPaket(menu){
    if (menu == "list-data-paket"){
        muatDaftarDataPaket();
        $('#tambah-data').hide();
        $('#list-data-paket').fadeIn();
    }
}

function menuLain(menu){
    if (menu == "list-data-lain"){
        // muatDaftarDataLain();
        $('#tambah-data').hide();
        $('#list-data-lain').fadeIn();
    }
}

function biayaLain(obj){
    var harga = $(obj).find(':selected').data('harga')
	var nama = $(obj).find(':selected').data('nama-biaya-lain')
    
    $(obj).parent().parent().find("#harga-biaya-lain").val(harga);					
	// $("#harga-biaya-lain").val(harga);
	$("#nama-biaya-lain").val(nama);
}

// $("#biayaLain").on("change",function(e){
//     var harga = $(this).find(':selected').data('harga')
// 	var nama = $(this).find(':selected').data('nama-biaya-lain')
    
//     console.log('test')
//     $(this).parent().parent().find("#harga-biaya-lain").val(harga);					
// 	// $("#harga-biaya-lain").val(harga);
// 	$("#nama-biaya-lain").val(nama);

// })
 
$("#paket").on("change",function(e){
    var hargaPaket = $(this).find(':selected').data('harga-paket')
    var paket = $(this).find(':selected').data('paket')
	var days = $(this).find(':selected').data('days')
    var date = new Date();
	var startMonth = date.getMonth()+1;
	var startDay = date.getDate();
	var startYears = date.getFullYear();
	var endDate = new Date();
	endDate.setDate(endDate.getDate() + days); 
	var endMonth = endDate.getMonth()+1;
	var endDay = endDate.getDate();
	var endYears = endDate.getFullYear();
	$("#harga-paket").val(hargaPaket);
    $("#nama-paket").val(paket);
	$("#start-date").html(startDay+"-"+startMonth+"-"+startYears);
	$("#end-date").html(endDay+"-"+endMonth+"-"+endYears);
})
                        
</script>