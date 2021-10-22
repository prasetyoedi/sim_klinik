<div class="row">
  <div class="col-md-12">
    <?php echo form_open(base_url($controllerName . '/save'), array('id' => 'input_form', 'accept-charset' => 'utf-8', 'autocomplete' => 'off', 'class' => 'form-horizontal')) ?>
    <div class="panel" id="panel-form">
      <div class="panel-body">
        <?php foreach ($pembelian_obat as $key) : ?>
          <input type="hidden" name="input[id]" value="<?= $key->pembelianobat_id; ?>" />
          <div class="row">
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Tanggal</label>
              <div class="col-md-5">
                <input type="text" id="tanggal-view" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" name="input[tanggal]" value="<?= date('d-m-Y', strtotime($key->pembelianobat_tanggal)); ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Nama Vendor</label>
              <div class="col-md-5">
                <input type="text" class=" form-control" id="select-vendor-text" value="<?= $key->vendor_name; ?>" disabled />
                <input type="hidden" id="select-vendor-value" name="input[nama_vendor_sebelumnya]" value="<?= $key->pembelianobat_vendor_id; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Pilih Vendor Baru</label>
              <div class="col-md-5">


                <select class="form-control" id="select-vendor" name="input[nama_vendor]">


                </select>
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-scondary form-control" data-toggle="modal" data-target="#modal-vendor"><span><i class="fa fa-plus"></i> Tambah Vendor</span></button>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Nomor Faktur</label>
              <div class="col-md-5">
                <input type="text" id="faktur-view" name="input[faktur]" value="<?= $key->pembelianobat_no_faktur; ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Tipe</label>
              <div class="col-md-5">
                <label class="custom-control custom-radio radio-inline">
                  <input type="radio" value="stok_awal" name="input[tipe]" class="custom-control-input" <?php echo $key->pembelianobat_type == 'stok_awal' ? 'checked' : '' ?>>
                  <span class="custom-control-indicator"></span>
                  Stok Awal
                </label>
                <label class="custom-control custom-radio radio-inline">
                  <input type="radio" value="pembelian" name="input[tipe]" class="custom-control-input" <?php echo $key->pembelianobat_type == 'pembelian' ? 'checked' : '' ?>>
                  <span class="custom-control-indicator"></span>
                  Pembelian
                </label>
                <label class="custom-control custom-radio radio-inline">
                  <input type="radio" value="penerimaan" name="input[tipe]" class="custom-control-input" <?php echo $key->pembelianobat_type == 'penerimaan' ? 'checked' : '' ?>>
                  <span class="custom-control-indicator"></span>
                  Penerimaan
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2">Obat:</label>
            <div class="col-md-5">
              <select style="width:100%" class="form-control" id="select_obat">
                <!-- cari obat -->
              </select>
            </div>
          </div>
          <?php foreach ($harga as $key) : ?>
            <input type="hidden" id="<?= strtolower($key->tipepasien_kode); ?>" value="<?= $key->tipepasien_harga_pengali; ?>">
          <?php endforeach; ?>
          <input type="hidden" id="dataTipe" value="<?php echo base64_encode(json_encode($harga)); ?>">
        <?php endforeach; ?>

        <div style="overflow-x: scroll;">
          <table class="table table-hover table-striped" id="row-obat">
            <thead>
              <th>No</th>
              <th>Aksi</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Kode Batch</th>
              <th>Exp. Date</th>
              <th>Jumlah Box</th>
              <th>Harga Per Box</th>
              <th>Disc(%)</th>
              <th>Total HNA</th>
              <th>PPN(%)</th>
              <th>Total HNA + PPN</th>
              <th>Jumlah Obat Per Box</th>
              <th>Total Jumlah Obat</th>
              <th>Harga Beli</th>
              <th>Harga Pasien/Jual</th>
              <?php foreach ($harga as $key => $val) { ?>
                <th>Harga <?= $val->tipepasien_name ?></th>
              <?php } ?>
            </thead>
            <tbody>
              <!-- ================
                        data obat pilihan
                        ================ -->
              <?php $no = 1; ?>
              <?php foreach ($data_obat as $value) : ?>
                <tr class="tablerow">
                  <td><?php echo $no; ?></td>
                  <td>
                    <center><button type="button" class="btn btn-danger" onclick="deleteObat(this);"><i class="fa fa-minus"></i></button></center>
                  </td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_obat_kode; ?>" disabled>
                    <input hidden style="width: 100px;" type="text" id="obat_kode" name="obat[obat][]" value="<?= $value->pembelianobtdet_obat_kode; ?>">
                    <input hidden style="width: 100px;" type="text" id="obatid" name="obat[obatid][]" value="<?= $value->pembelianobtdet_obat_id; ?>">
                  </td>
                  <td><input style="width: 200px;" type="text" class="form-control" value="<?php echo $value->nama; ?>" disabled></td>
                  <td><input style="width: 200px;" type="text" name="obat[batch][]" class="form-control" value="<?= $value->pembelianobtdet_batch ?>"></td>
                  <td><input style="width: 200px;" type="text" placeholder="dd-mm-yyyy" class="form-control datepicker" data-date-format="dd-mm-yyyy" name=" obat[expdate][]" value="<?= date('d-m-Y', strtotime($value->pembelianobtdet_exp_date)); ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="jumlah_box" name="obat[jumlah_box][]" value="<?= $value->pembelianobtdet_jumlah_box; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="harga_per_box" name="obat[harga_per_box][]" value="<?= $value->pembelianobtdet_harga_per_box; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="diskon" name="obat[diskon][]" value="<?= $value->pembelianobtdet_diskon; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="total_hna" name="obat[total_hna][]" value="<?= $value->pembelianobtdet_total_hna; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="ppn" name="obat[ppn][]" value="<?= $value->pembelianobtdet_ppn; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="total_hna_ppn" name="obat[total_hna_ppn][]" value="<?= $value->pembelianobtdet_total_hna_ppn; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" onkeyup="jumlah(this)" id="jumlah_obat_per_box" name="obat[jumlah_obat_per_box][]" value="<?= $value->pembelianobtdet_jumlah_per_box; ?>"></td>

                  <td>
                    <input style="width: 100px;" type="text" class="form-control" id="total_jumlah_obat" name="obat[total_jumlah_obat][]" value="<?= $value->pembelianobtdet_jumlah; ?>">
                    <input style="width: 100px;" type="hidden" class="form-control" id="total_jumlah_obat_hidden" value="<?= $value->pembelianobtdet_jumlah; ?>">
                    <input style="width: 100px;" type="hidden" class="form-control" name="obat[pembelianobtdet_id][]" id="detail_id_hidden" value="<?= $value->pembelianobtdet_id; ?>">
                  </td>
                  <td><input style="width: 100px;" type="text" class="form-control" id="harga_beli" name="obat[harga_beli][]" value="<?= $value->pembelianobtdet_harga_beli; ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" id="harga_satuan" name="obat[harga_satuan][]" value="<?= $value->pembelianobtdet_harga_satuan; ?>"></td>
                  <?php

                  foreach ($harga as $key => $val) {
                    $valpem =  $this->mpo->get_data_obat_detail_harga($value->pembelianobtdet_id, $val->tipepasien_kode);
                  ?>
                    <td>
                      <?php if (!empty($valpem)) { ?>
                        <input style="width: 100px;" type="text" class="form-control harga_<?= $val->tipepasien_kode ?>" name="obat[harga_<?= $val->tipepasien_kode ?>][]" value=" <?= ceil($valpem->pembelianobtdetharga_harga) ?>">
                      <?php } else { ?>
                        <input style="width: 100px;" type="text" class="form-control harga_<?= $val->tipepasien_kode ?>" name="obat[harga_<?= $val->tipepasien_kode ?>][]" value="">
                      <?php } ?>
                    </td>
                  <?php } ?>
                </tr>
              <?php $no++;
              endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="panel-footer text-right">
        <a href="<?php echo base_url($controllerName); ?>" class="btn btn-default">Kembali</a>
        <button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>