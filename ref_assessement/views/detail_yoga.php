<div class="row">
  <div class="col-md-12">
    <?php echo form_open(base_url($controllerName . '/save'), array('id' => 'input_form', 'accept-charset' => 'utf-8', 'autocomplete' => 'off', 'class' => 'form-horizontal')) ?>
    <div class="panel" id="panel-form">
      <div class="panel-body">
        <?php foreach ($pembelian_obat as $key) : ?>
          <div class="row">
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Nama Latihan :</label>
              <div class="col-md-5">
                <input type="text" id="namavendor-view" name="input[nama_vendor]"  disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="namaunit-view">Jumlah Peserta :</label>
              <div class="col-md-5">
              <input type="text" id="namavendor-view" name="input[nama_vendor]"  disabled>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="panel" >
          <table class="table table-hover table-striped" id="row-obat">
            <thead class="bg-success">
              <th><strong>No</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Jumlah</strong></th>
              <th><strong>Aksi</strong></th>
            </thead>

            <tbody>
              <!-- ================
                        data obat pilihan
                        ================ -->
              <?php $no = 1; ?>
              <?php foreach ($data_obat as $value) : ?>
                <tr class="tablerow">
                  <td><?php echo $no; ?></td>
                  <td><?= $value->nama; ?></td>
                  <td><?= $value->pembelianobtdet_jumlah_box; ?></td>
                  <td><a type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" data-original-title="Print" ><i class="fa fa-print "></i></a></td>
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