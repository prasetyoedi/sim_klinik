<div class=" col-md-12">
    <div class="form-group ">
        <label>Foto</label>
        <center>
            <div title="Ambil Foto">
                <img data-toggle="modal" onerror="this.onerror=null;this.src='assets/gt/dist/demo/foto.png';" class="widget-products-image" width="168px" height="208px">
            </div>
        </center>
    </div>

    <div class="form-group ">
        <center>
            <button type="button" class="btn btn-xs btn-danger">Hapus Foto</button>
        </center>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="tipe_member">Tipe Member</label>
        <select class="form-control" id="tipe_member" name="input[tipe_member]">
            <?php foreach ($tipeMember as $rs) : ?>
                 <option value=<?= $rs->tmf_id; ?> <?php echo ($rs->tmf_id == @$dataPasien->fitmember_tmf_id ? 'selected' : ''); ?>><?= $rs->tmf_nama; ?></option>
             <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group col-md-6">
    <label for="no_rm">No ID Member</label>
        <input type="text" id="no_rm" name="input[no_rm]" class="form-control" value="<?= @$dataPasien->pasien_norm; ?>" readonly>
        <input type="hidden" id="id_member" name="input[id_member]" value="<?= @$dataPasien->fitmember_id_number; ?>">    
</div>

<div class="form-group col-md-6">
    <label>KTP/SIM/Paspor</label>
    <input type="text" id="no_identitas" name="input[no_identitas]" class="form-control id-group" value="<?= @$dataPasien->pesien_no_identitas; ?>">
</div>

<div class="form-group col-md-6">
    <label>NIM/NIP</label>
    <input type="text" id="no_identitas_profesi" name="input[no_identitas_profesi]" class="form-control id-group" value="<?= @$dataPasien->pasien_no_identitas_profesi; ?>">
</div>

<div class="form-group col-md-6">
    <label>No. BPJS</label>
    <input type="text" id="no_bpjs" name="input[no_bpjs]" class="form-control id-group" value="<?= @$dataPasien->pasien_no_bpjs; ?>">
</div>

<div class="form-group col-md-6">
    <label >Nama</label>
    <input type="text" id="nama_lengkap" name="input[nama_lengkap]" class="form-control" value="<?= @$dataPasien->pasien_nama_lengkap; ?>">
</div>                                                                               

<div class="form-group col-md-6">
    <label>Jenis Kelamin</label>
    <select class="form-control" id="jenis_kelamin" name="input[jenis_kelamin]">
        <option value="L" <?php echo ('L' == @$dataPasien->pasien_jenis_kelamin ? 'selected' : ''); ?>>Laki-Laki</option>
        <option value="P" <?php echo ('P' == @$dataPasien->pasien_jenis_kelamin ? 'selected' : ''); ?>>Perempuan</option>
    </select>
</div>                    

<div class="form-group col-md-6">
    <label>Tanggal Lahir</label>
    <input type="text" id="tanggal_lahir" name="input[tanggal_lahir]" class="form-control datepicker2" data-date-format="dd-mm-yyyy" value="<?= date('d-m-Y', strtotime(@$dataPasien->pasien_tanggal_lahir)); ?>">
</div>

<div class="form-group col-md-6">
    <label>Fakultas</label>
    <select class="form-control select2" id="pasien-unit" name="input[ref_pasien_unit_id]">
        <?php foreach ($pasienUnit as $rs) : ?>
            <option value="<?= $rs->pasienunit_id; ?>" <?php echo ($rs->pasienunit_id == @$dataPasien->pasien_pasienunit_id ? 'selected' : ''); ?>><?= $rs->pasienunit_name; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group col-md-6">
    <label>Email</label>
    <input type="text" id="email" class="form-control" name="input[email]" value="<?= @$dataPasien->pasien_email; ?>">
</div>

<div class="form-group col-md-6">
    <label>Nomor Telp/HP</label>
    <input type="text" id="no_hp" name="input[no_hp]" class="form-control" value="<?= @$dataPasien->pasien_no_hp; ?>">
</div>

<div class="form-group col-md-6">
    <label>Tanggal Membership Mulai Berlaku</label>
    <p class="form-control-static">
        <?php if (!empty($dataMembership)){ ?>
            <?= date('d-m-Y', strtotime($dataMembership->fitmember_start)) ?> / <?= date('d-m-Y', strtotime($dataMembership->fitmember_expired)) ?>
        <?php } ?>
    </p>
</div>


<div class="form-group col-md-6">
    <label>Riwayat Penyakit</label>
    <textarea class="form-control" id="email" name="input[riwayat_penyakit]" class="form-control" readonly></textarea>
</div>

<div class="form-group col-lg-6">
    <label>Keterangan</label>
    <textarea class="form-control" name="input[keterangan]" class="form-control"></textarea>
<div>