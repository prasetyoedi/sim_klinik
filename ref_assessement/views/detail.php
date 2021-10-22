<div class="row">
  <div class="col-md-12">
    <?php echo form_open(base_url($controllerName . '/save'), array('id' => 'input_form', 'accept-charset' => 'utf-8', 'autocomplete' => 'off', 'class' => 'form-horizontal')) ?>
    <div class="panel" id="panel-form">
      <div class="panel-body">
        <?php foreach ($pembelian_obat as $key) : ?>
          <div class="row">
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Tanggal</label>
              <div class="col-md-5">
                <input type="text" value="<?= date('d/m/Y', strtotime($key->pembelianobat_tanggal)); ?>" class="form-control" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Nama Vendor</label>
              <div class="col-md-5">
                <input type="text" id="namavendor-view" name="input[nama_vendor]" value="<?= $key->vendor_name; ?>" class="form-control" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Nomor Faktur</label>
              <div class="col-md-5">
                <input type="text" id="faktur-view" name="input[faktur]" value="<?= $key->pembelianobat_no_faktur; ?>" class="form-control" disabled>
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
        <?php endforeach; ?>

        <div style="overflow-x: scroll;">
          <table class="table table-hover table-striped" id="row-obat">
            <thead>
              <th>No</th>
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
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_obat_kode; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?php echo $value->nama; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_batch ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" disabled value="<?= date('d/m/Y', strtotime($value->pembelianobtdet_exp_date)); ?>"></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_jumlah_box; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_harga_per_box; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_diskon; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_total_hna; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_ppn; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_total_hna_ppn; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_jumlah_per_box; ?>" disabled></td>

                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_jumlah; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_harga_beli; ?>" disabled></td>
                  <td><input style="width: 100px;" type="text" class="form-control" value="<?= $value->pembelianobtdet_harga_satuan; ?>" disabled></td>
                  <?php

                  foreach ($harga as $key => $val) {
                    $valpem =  $this->mpo->get_data_obat_detail_harga($value->pembelianobtdet_id, $val->tipepasien_kode);
                  ?>
                    <td>
                      <?php if (!empty($valpem)) { ?>
                        <input style="width: 100px;" type="text" class="form-control" value="<?= ceil($valpem->pembelianobtdetharga_harga) ?>" disabled>
                      <?php } else { ?>
                        <input style="width: 100px;" type="text" class="form-control" value="" disabled>
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
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>