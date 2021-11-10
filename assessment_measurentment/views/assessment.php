<div id="print_caseopnamse">
    <form id="form-assessment">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"><strong>Detail Member</strong></div>
                    <?php foreach ($id_member as $key => $val) : ?>
                        <input type="hidden" id="id_member" name="input[id_membership]" value="<?php echo $val->fitmember_id ?>"/>
                    <?php endforeach ?>

                    <?php foreach ($id_member_billing as $key => $val) : ?>
                        <input type="hidden" id="id_membership" name="input[id_membership_billing]" value="<?php echo $val->fitmemberbill_id ?>"/>
                    <?php endforeach ?>
                    
                    <input type="hidden" id="id_assessment" name="input[id_assessment]" value="<?= @$idAssessment->assessment_id; ?>"/>
            </div>

            <?php foreach ($dataDetail as $key) : ?>
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label">ID Member :</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?= $key->id; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama :</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?= $key->nama_member; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal Lahir :</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?= $key->tanggal_lahir; ?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipe Member :</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?= $key->tipe_member; ?></p>
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
            <?php endforeach; ?>
        </div>
    
        <?php foreach ($dataAssessment as $key) : ?>
        <div class="panel" >
            <div class="panel-heading">
                <div class="panel-title"><strong>Data</strong></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Kiri Atas-->
                        <div class="form-group">
                            <label for="nadi">Nadi*</label>
                                <div class="input-group"  style="width:50%">
                                    <input type="text" value="<?= $key->assessment_nadi; ?>" id="nadi" name="input[nadi]" class="form-control" >
                                        <span class="input-group-addon">x / menit</span>
                                </div>
                        </div>

                            <div class="form-group" style="width:50%">
                                <label for="tekanan_darah">Tekanan Darah*</label>
                                <div class="input-group">
                                    <input type="text" value="<?= $key->assessment_sistol; ?>" name="input[darah_min]" class="form-control">
                                    <span class="input-group-addon">/</span>
                                    <input type="text" value="<?= $key->assessment_diastol; ?>" name="input[darah_max]" class="form-control" >
                                    <span class="input-group-addon">mmHg</span>
                                </div>
                            </div>
                            
                            <div class="form-group" style="width:50%">
                                <label for="">Tinggi Badan*</label>
                                <div class="input-group">
                                    <input type="text" value="<?= $key->assessment_tinggi_badan; ?>" name="input[tinggi_badan]" class="form-control" >
                                    <span class="input-group-addon">Cm</span>
                                </div>
                            </div>

                            <div class="form-group" style="width:50%">
                                <label for="">Berat Badan*</label>
                                <div class="input-group">
                                    <input type="text" value="<?= $key->assessment_berat_badan; ?>" name="input[berat_badan]" class="form-control">
                                    <span class="input-group-addon">Kg</span>
                                </div>
                            </div>

                            <div class="form-group" style="width:50%">
                                <label for="">BMI</label>
                                <input type="text" value="" name="input[bmi]" class="form-control" >
                            </div>

                            <div class="form-group" style="width:50%">
                                <label for="">Body Fat*</label>
                                <div class="input-group">
                                    <input type="text" value="<?= $key->assessment_body_fat; ?>" name="input[body_fat]" class="form-control">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 ">
                            <!-- Kanan atas -->
                            <div class="form-group">
                                <label for="">Lingkar Lengan Atas*</label>
                                    <div class="input-group"  style="width:50%">
                                        <input type="text" value="<?= $key->assessment_lingkar_lengan_atas; ?>" name="input[lengan_atas]" class="form-control">
                                            <span class="input-group-addon">cm</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lingkar Dada*</label>
                                    <div class="input-group"  style="width:50%">
                                        <input type="text" value="<?= $key->assessment_lingkar_dada; ?>" name="input[lingkar_dada]" class="form-control">
                                            <span class="input-group-addon">cm</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lingkar Perut*</label>
                                    <div class="input-group"  style="width:50%">
                                        <input type="text" value="<?= $key->assessment_lingkar_perut; ?>" name="input[lingkar_perut]" class="form-control">
                                            <span class="input-group-addon">cm</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lingkar Panggul*</label>
                                    <div class="input-group"  style="width:50%">
                                        <input type="text" value="<?= $key->assessment_lingkar_panggul; ?>" name="input[lingkar_panggul]" class="form-control">
                                            <span class="input-group-addon">cm</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lingkar Paha*</label>
                                    <div class="input-group"  style="width:50%">
                                        <input type="text" value="<?= $key->assessment_lingkar_paha; ?>" name="input[lingkar_paha]" class="form-control">
                                            <span class="input-group-addon">cm</span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lingkar Betis*</label>
                                <div class="input-group"  style="width:50%">
                                    <input type="text" value="<?= $key->assessment_lingkar_betis; ?>" name="input[lingkar_betis]" class="form-control">
                                    <span class="input-group-addon">cm</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Riwayat Penyakit</label>
                        <textarea class="form-control" value="" name="input[riwayat_penyakit]"></textarea>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"><strong>Plan / Program Training </strong></div>
                </div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                                <select class="form-control select2" name="input[program_training]">
                                    <!-- <option value="">--Pilih Program--</option> -->
                                    <?php foreach ($program as $rs) : ?>
                                        <option value="<?= $rs->fitproglat_id; ?>" <?php echo (@$dataAssessment[0]->assessment_fitproglat_id == $rs->fitproglat_id ? 'selected' : ''); ?>><?= $rs->fitproglat_name; ?></option>
                                    <?php endforeach; ?>
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
                                        <input type="text" value="<?= $key->assessment_rm; ?>" name="input[rm]" class="form-control">
                                        <span class="input-group-addon">Kg</span>
                                    </div>
                            </div>

                            <div >
                                <div class="form-group">
                                    <label for="">Beban (Kg/60-80% RM)*</label>
                                        <div class="form-inline ">
                                            <input type="text" value="<?= $key->assessment_beban_min; ?>" name="input[beban_min]"  style="width:15%" class="form-control" >
                                            <i class="fa fa-minus m-l-2 m-r-2"></i>
                                            <input type="text"value="<?= $key->assessment_beban_max; ?>" name="input[beban_max]"  style="width:15%" class="form-control">                 
                                        </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="">Repetisi*</label>
                                        <div class="form-inline">
                                            <input type="text" value="<?= $key->assessment_repetisi_min; ?>" name="input[repetisi_min]" style="width:15%" class="form-control" >
                                            <i class="fa fa-minus m-l-2 m-r-2"></i>
                                            <input type="text" value="<?= $key->assessment_repetisi_max; ?>" name="input[repetisi_max]" style="width:15%" class="form-control">                 
                                        </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="">Set*</label>
                                        <div class="form-inline">
                                            <input type="text" value="<?= $key->assessment_set_min; ?>" name="input[set_min]" style="width:15%" class="form-control" >
                                            <i class="fa fa-minus m-l-2 m-r-2"></i>
                                            <input type="text" value="<?= $key->assessment_set_max; ?>" name="input[set_max]" style="width:15%" class="form-control">                 
                                        </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="">Frekuensi (x/week)*</label>
                                        <div class="form-inline">
                                            <input type="text" value="<?= $key->assessment_frekuensi_min; ?>" name="input[frekuensi_min]" style="width:15%" class="form-control" >
                                            <i class="fa fa-minus m-l-2 m-r-2"></i>
                                            <input type="text" value="<?= $key->assessment_frekuensi_max; ?>" name="input[frekuensi_max]" style="width:15%" class="form-control">                  
                                        </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label for="">Recovery antar set*</label>
                                        <div class="form-inline">
                                            <input type="text" value="<?= $key->assessment_recovery_min; ?>" name="input[recovery_min]"  style="width:15%" class="form-control" >
                                            <i class="fa fa-minus m-l-2 m-r-2"></i>
                                            <input type="text" value="<?= $key->assessment_recovery_max; ?>" name="input[recovery_max]"  style="width:15%" class="form-control">                 
                                        </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Intensitas</label>
                                <select class="form-control" name="input[intensitas]">
                                    <!-- <option value="">--Pilih Intensitas--</option> -->
                                    <?php foreach ($intensitas as $rs) : ?>
                                    <option value="<?= $rs->fitinten_id; ?>" <?php echo ($rs->fitinten_id == @$dataAssessment[0]->assessment_fitintent_id  ? 'selected=""' : ''); ?>><?= $rs->fitinten_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <?php echo "<pre>"; print_r( @$dataAssessment  ); ?> -->

                            </div>

                            <div>
                                <div class="form-group">
                                    <label>HR max (x/menit / 220-usia* presentasi intensitas)</label>
                                        <div class="form-inline">
                                            <input type="text" value="<?= $key->assessment_hr_min; ?>" name="input[hr_max]" style="width:15%" class="form-control" >
                                            <i class="fa fa-minus m-l-2 m-r-2"></i>
                                            <input type="text" value="<?= $key->assessment_hr_max; ?>" name="input[hr_min]" style="width:15%" class="form-control">                 
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
                    <button type="button" class="btn btn-primary" id="simpan-data">Simpan</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </form>
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
        $('#div-nomor-cetak-kwitansi').printArea();
    }
</script>