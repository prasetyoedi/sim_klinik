<div id="print_caseopnamse" >
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title"><strong>Detail Member</strong></div>
        </div>
        <div class="panel-body">
            <div class="col-md-4">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">ID Member :</label>
                        <div class="col-md-9">
                             <!-- <p class="form-control-static"><?= @$dataPasien->no_antrian; ?></p> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama :</label>
                        <div class="col-md-9">
                            <!-- <p class="form-control-static"></p>
                            <input type="hidden"  id="id_pendaftaran" >
                            <input type="hidden"  id="data-no-antrian"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tanggal Lahir :</label>
                        <div class="col-md-9">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tipe Member :</label>
                        <div class="col-md-9">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Hasil Lab :</label>
                        <div class="col-md-9">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="panel" >
            <div class="panel-heading">
                <div class="panel-title"><strong>Data</strong></div>
            </div>
            <div class="panel-body" id="">
                <!-- <?php echo form_open(null, array('id' => 'form_pengkajian_awal', 'accept-charset' => 'utf-8', 'autocomplete' => 'off')) ?>
                <input type="hidden" id="trx_pendaftaran_id" name="input[trx_pendaftaran_id]" value="<?= @$dataPasien->id; ?>">
                <input type="hidden" id="meja_id" name="input[meja]" value="<?= @$dataPasien->meja; ?>"> -->

                <div class="row">
                    <div class="col-lg-6">
                        <!-- Kiri Atas-->
                        <div class="form-group">
                            <label for="nadi">Nadi*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="nadi" name="input[nadi]" class="form-control" value="">
                                        <span class="input-group-addon">x / menit</span>
                                </div>
                        </div>
                        <div class="form-group" style="width:50%">
                            <label for="tekanan_darah">Tekanan Darah*</label>
                            <div class="input-group">
                                <input type="text" id="" name="" class="form-control" value="">
                                <span class="input-group-addon">/</span>
                                <input type="text" id="" name="" class="form-control" value="">
                                <span class="input-group-addon">mmHg</span>
                            </div>
                        </div>
                        <div class="form-group" style="width:50%">
                            <label for="">Tinggi Badan*</label>
                                <div class="input-group">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">Cm</span>
                                </div>
                        </div>
                        <div class="form-group" style="width:50%">
                            <label for="">Berat Badan*</label>
                                <div class="input-group">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">Kg</span>
                                </div>
                        </div>
                        <div class="form-group" style="width:50%">
                            <label for="">BMI</label>
                            <input type="text" id="" name="" class="form-control" >
                        </div>
                        <div class="form-group" style="width:50%">
                            <label for="">Body Fat*</label>
                                <div class="input-group">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">%</span>
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-6 ">
                        <!-- Kanan atas -->
                        <div class="form-group">
                            <label for="">Lingkar Lengan Atas*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">cm</span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lingkar Dada*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">cm</span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lingkar Perut*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">cm</span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lingkar Panggul*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">cm</span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lingkar Paha*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">cm</span>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lingkar Betis*</label>
                                <div class="input-group"  style="width:50%">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">cm</span>
                                </div>
                        </div>
                        
                    </div>
                </div>
                <!-- <?php echo form_close(); ?> -->
                <div class="form-group">
                    <label for="">Riwayat Penyakit</label>
                    <textarea id="" class="form-control" name=""></textarea>
                </div>
            </div>
    </div>
   


    <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"><strong>Plan / Program Training </strong></div>
            </div>
            <div class="panel-body" id="">
                <div class="row">
                    <div class="form-group">
                            <select class="form-control" id="" name="">
                                <option>
                                    <label>Fitnes</label>
                                </option>
                                <option>
                                    <label>Yoga</label>
                                </option>
                                    <!-- <?php foreach ($refKesadaran as $key => $val) { ?>
                                        <option value="<?php echo $val->kesadaran_id; ?>" <?= ($val->kesadaran_id == @$dataDetailPengkajian->kesadaran ? 'selected' : ''); ?>><?php echo $val->kesadaran_name; ?></option>
                                    <?php } ?> -->
                            </select>
                    </div>
                    <div class="text-center p-b-2">
                            <div class="panel-title"><strong>Rekomendasi Program Latihan Menaikan Berat Badan </strong></div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Kiri Bawah-->
                        <div class="form-group">
                            <label for="">RM (kg/100%)*</label>
                                <div class="input-group">
                                     <input type="text" id="" name="" class="form-control" value="">
                                        <span class="input-group-addon">Kg</span>
                                </div>
                        </div>

                        <div >
                            <div class="form-group">
                                <label for="">Beban (Kg/60-80% RM)*</label>
                                    <div class="form-inline ">
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control" >
                                        <i class="fa fa-minus m-l-2 m-r-2"></i>
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control">                 
                                    </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="">Repetisi*</label>
                                    <div class="form-inline">
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control" >
                                        <i class="fa fa-minus m-l-2 m-r-2"></i>
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control">                 
                                    </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="">Set*</label>
                                    <div class="form-inline">
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control" >
                                        <i class="fa fa-minus m-l-2 m-r-2"></i>
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control">                 
                                    </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="">Frekuensi (x/week)*</label>
                                    <div class="form-inline">
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control" >
                                        <i class="fa fa-minus m-l-2 m-r-2"></i>
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control">                  
                                    </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="">Recovery antar set*</label>
                                    <div class="form-inline">
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control" >
                                        <i class="fa fa-minus m-l-2 m-r-2"></i>
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control">                 
                                    </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label>Intensitas</label>
                            <select class="form-control" id="" name="" > </select>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="">HR max (x/menit / 220-usia* presentasi intensitas)</label>
                                    <div class="form-inline">
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control" >
                                        <i class="fa fa-minus m-l-2 m-r-2"></i>
                                        <input type="text" id="" name=""  value="" style="width:15%" class="form-control">                 
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12 text-right">
                <a type="button" onclick="cetak_kwitansi()" class="btn btn-secondary">Cetak Kwitansi</a>
                <a href="javascript:void(0);" onclick="print_content('print_caseopnamse');" class="btn btn-sucess"><i class="fa fa-print "></i> Print</a>
                <a href="<?php echo base_url($controllerName); ?>" class="btn btn-danger">Batal</a>
                <button type="button" class="btn btn-primary" id="">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CETAK KWITANSI -->
<div class="modal fade" id="modal-print-privew-cetak-kwitansi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Formulir</h4>
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
    function print_content(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>