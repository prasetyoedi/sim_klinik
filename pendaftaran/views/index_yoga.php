<style>
    body .stepwizard-step p {
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
<form id="form-yoga">
    <div class="container col-md-12">
        <div class="stepwizard ">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Register</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Billing</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row setup-content" id="step-1">
        <div class="col-md-12">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><strong>DATA MEMBER</strong></span>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-md-6">
                            <label>Nama Latihan</label>
                            <div class="custom-input-group input-group">
                                <input type="text" id="nama_latihan" name="input_satu[nama]" value="<?php echo empty($data->nama) ? '' : $data->nama;  ?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Jumlah peserta</label>
                            <div class="custom-input-group input-group">
                                <input type="text" id="jumlah_latihan" name="input_satu[total_person]" value="<?php echo empty($data->yoga_total_person) ? '' : $data->yoga_total_person;  ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title"><strong>Absensi Member</strong></span>
                    </div>
                    <div class="panel-body">
                        <div class="form-group ">
                            <form id="simpan_sementara">
                                <div id="item"></div>
                            </form>
                        </div>

                        <div class="col-lg-12 text-right">
                            <input type="button" value="Selanjutnya" class="btn btn-primary nextBtn btn-small" id="simpan-local" onclick="nextData();" />
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="row setup-content" id="step-2">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><strong>Absensi Member</strong></span>
                </div>
                <div class="panel-body">

                    <div id="list-data" class="">
                        Tidak ada data...
                    </div>

                </div>
            </div>
            <div class=" text-right">
                        <input class="btn btn-primary prevBtn btn-small" type="button" value="Sebelumnya" onclick="prevData();" />
                        <input onclick="cetak_kwitansi()" type="button" value="Cetak Kwitansi" class="btn btn-secondary btn-small m-r-1 m-l-1" />
                        <input type="button" value="Simpan" id="simpan-yoga" class="btn btn-success btn-small" />
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

<script>
    $(document).ready(function() {
        // localStorage.setItem("data1","");


        $("#jumlah_latihan").change(function() {

            $("#item").html("");
            var valueJumlah = $(this).val();
            for (var i = 0; i < valueJumlah; i++) {
                var item = '<div class=" col-md-6 m-b-2">' +
                    '<label>Nama</label>' +
                    '<input type="text" class="code form-control"  id="nama_yoga_' + i + '" name="input_satu[nama_yoga][]" value="" />' +
                    '</div>' +
                    '<div class=" col-md-6 m-b-2">' +
                    '<label>Alamat</label>' +
                    '<input type="text" class="code form-control" id="alamat_' + i + '" name="input_satu[alamat][]" value="" />' +
                    '</div>';
                $("#item").append(item);
            }
        })

        // $("#simpan-local").click(function(e){

        //     var data = $("form#simpan_sementara").serializeArray();
        //     localStorage.setItem("data1",JSON.stringify(data));
        //     e.preventDefault();
        //     //untuk paggil lagi bisa pakai ini
        //     // var databaru = JSON.stringify(localStorage.getItem("data1"));
        //     // trus di tampilkan di form yang baru


        //     // $('#item_2').html(dataass);
        //     // $('#item_2').append('<tr><td>' + dataass + '</td></tr>'); //disesuaikan aja sama yg kamu mau
        // })	
    })

    function muatDaftarData() {
        if (localStorage.daftar_data) {

            daftar_data = JSON.parse(localStorage.getItem('daftar_data'));
            console.log(daftar_data);

            var data_app = "";

            // var data_app = $("form#simpan_sementara").serializeArray();
            //                 localStorage.setItem("daftar_data",JSON.stringify(data_app));
            //                 e.preventDefault();

            if (daftar_data.length > 0) {

                // localStorage.setItem("daftar_data","");

                for (var i = 0; i < daftar_data.length; i++) {
                    data_app += '<div class=" col-md-6 m-b-2">' +
                        '<label>Nama</label>' +
                        '<input type="text" class="code form-control"  id="nama_yoga_2_'+i+'" name="input_dua[nama_yoga][]" value="' + daftar_data[i].nama_member + '"  disabled />' +
                        '<input type="hidden" id="alamat_yoga_2_'+i+'" name="input_dua[alamat_yoga][]" value="' + daftar_data[i].alamat_member + '">' +
                        '</div>' +
                        '<div class=" col-md-5 m-b-2">' +
                        '<label>Jumlah</label>' +
                        '<input type="text" class="code form-control"  id="harga_2_'+i+'" name="input_dua[harga][]" value="" />' +
                        '</div>' +
                        '<div class="col-md-1 m-b-2">' +
                        '<label>Kwitansi</label>' +
                        '<a onclick="cetak_kwitansi(' + i + ')" type="button" class="btn btn-secondary btn-lg pull-center" data-toggle="tooltip" data-placement="top" data-original-title="Print" ><i class="fa fa-print "></i></a>' +
                        '</div>';

                }


            } else {
                data_app = "Tidak ada data...";
            }


            $('#list-data').html(data_app);
            $('#list-data').hide();
            $('#list-data').fadeIn(100);
        }
    }


    function nextData() {

        var jumlahLatihan = $("#jumlah_latihan").val();
        var namaLatihan = $("#nama_latihan").val();
        var daftar_data = [];
        if (localStorage.daftar_data && localStorage.id_data) {
            daftar_data = JSON.parse(localStorage.getItem('daftar_data'));
            id_data = parseInt(localStorage.getItem('id_data'));
        } else {
            for (var i = 0; i < jumlahLatihan; i++) {
                var valNamaMember = $("#nama_yoga_" + i).val();
                var valAlamat = $("#alamat_" + i).val();
                daftar_data.push({
                    'urutan': i,
                    'nama_member': valNamaMember,
                    'alamat_member': valAlamat
                })
            }
        }

        localStorage.setItem('daftar_data', JSON.stringify(daftar_data));
        localStorage.setItem('nama_latihan', namaLatihan);
        localStorage.setItem('jumlah_latihan', jumlahLatihan);
        // document.getElementById('simpan_sementara').reset();
        gantiMenu('list-data');

        // return false;
    }

    function prevData() {
        localStorage.clear();
    }


    function gantiMenu(menu) {
        if (menu == "list-data") {
            muatDaftarData();
            // $('#tambah-data').hide();
            $('#list-data').fadeIn();
            // $('#edit-data').hide();
        }
    }
</script>

<script type="text/javascript">
    function cetak_kwitansi() {
    $.post(currentUrl + "/form_cetak_kwitansi", function () {}).done(function (
      datadone
    ) {
      $("#index-form").html(datadone);
      preloader("#index-form");
      }); 

        $('#modal-print-privew-cetak-kwitansi').modal("toggle");
    }


    function cetak_kwitansi_print() {
        $('#div-nomor-cetak-kwitansi').printArea();
    }
</script>

<script>
    $(document).ready(function() {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function(e) {
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

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });

    $(document).ready(function() {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allPrevBtn = $('.prevBtn');

        allWells.hide();

        navListItems.click(function(e) {
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

        allPrevBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                prevStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>