<div class="row">
    <div class="col-md-12">
        <?php echo form_open(base_url($controllerName . '/save'), array('id' => 'input_form', 'accept-charset' => 'utf-8', 'autocomplete' => 'off', 'class' => 'form-horizontal')) ?>
        <div class="panel" id="panel-form">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="namaunit-view">Tanggal</label>
                        <div class="col-md-5">
                            <input type="text" placeholder="dd-mm-yyyy" data-date-format='dd-mm-yyyy' id="tanggal-view" name="input[tanggal]" value="<?php echo date('d-m-Y'); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="namaunit-view">Nama Vendor</label>
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
                            <input type="text" id="faktur-view" name="input[faktur]" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="namaunit-view">Tipe</label>
                        <div class="col-md-5">
                            <label class="custom-control custom-radio radio-inline">
                                <input type="radio" value="stok_awal" name="input[tipe]" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                Stok Awal
                            </label>
                            <label class="custom-control custom-radio radio-inline">
                                <input type="radio" value="pembelian" name="input[tipe]" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                Pembelian
                            </label>
                            <label class="custom-control custom-radio radio-inline">
                                <input type="radio" value="penerimaan" name="input[tipe]" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                Penerimaan
                            </label>
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
                    <!-- foreach -->
                    <?php foreach ($harga as $key) : ?>
                        <input type="hidden" id="<?= strtolower($key->tipepasien_kode); ?>" value="<?= $key->tipepasien_harga_pengali; ?>">
                    <?php endforeach; ?>
                    <input type="hidden" id="dataTipe" value="<?php echo base64_encode(json_encode($harga)); ?>">
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel-footer text-right">
                    <a href="<?php echo base_url($controllerName); ?>" class="btn btn-default">Kembali</a>
                    <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    <div class="modal fade" id="modal-vendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="simpan-vendor">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="namaunit-view">Nama</label>
                                <div class="col-md-8  m-b-1">
                                    <input type="text" id="inputvendor_name" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="namaunit-view">Nomor Telphone</label>
                                <div class="col-md-8  m-b-1">
                                    <input type="text" id="inputvendor_phone" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="namaunit-view">Alamat</label>
                                <div class="col-md-8  m-b-1">
                                    <input type="text" id="inputvendor_address" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>