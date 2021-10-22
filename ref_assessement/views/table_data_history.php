<input type="hidden" id="sortdata" value="<?php echo $sortData; ?>">
<table class="table table-hover table-striped">
    <thead id="sorting-table">
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 10%;">Aksi</th>
            <!-- <th style="width: 15%;"><a href="javascript:void(0);" id="<?php echo $sort['namaunit-sort']; ?>">Nama Vendor <?php echo $sort['namaunit-icon']; ?></a></th> -->
            <!-- <th style="width: 15%;"><a href="javascript:void(0);" id="<?php echo $sort['tanggal-sort']; ?>">Tanggal <?php echo $sort['tanggal-icon']; ?></a></th> -->
            <!-- <th style="width: 15%;"><a href="javascript:void(0);" id="<?php echo $sort['faktur-sort']; ?>">No Faktur <?php echo $sort['faktur-icon']; ?></a></th> -->
            <th style="width: 15%;">Id Member</th>
            <th style="width: 15%;">Tanggal</th>
            <th style="width: 15%;">Jam</th>
            <th style="width: 15%;">Nama Member</th>
            <th style="width: 15%;">Keterangan</th>
            <th style="width: 15%;">Status</th>
            <th style="width: 15%;">Waktu</th>
        </tr>
    </thead>
    <tbody id="table-data-obat">
        <?php $no = 1;
        if (count($dataResult) > 0) {
            foreach ($dataResult as $rs) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                        <button nama-vendor="<?= $rs->vendor_name; ?>" id="btn_assessement" data-id="<?= $rs->pembelianobat_id; ?>" type="button" class="btn btn-xs btn-success"><i class="px-navbar-icon fa fa-plus"></i></button>
                        <!-- <button nama-vendor="<?= $rs->vendor_name; ?>" id="detail-obat" data-id="<?= $rs->pembelianobat_id; ?>" type="button" class="btn btn-xs btn-success"><i class="px-navbar-icon fa fa-eye"></i></button> -->
                        <button nama-vendor="<?= $rs->vendor_name; ?>" id="delete-obat" data-id="<?= $rs->pembelianobat_id; ?>" type="button" class="btn btn-xs btn-danger"><i class="px-navbar-icon fa fa-trash"></i></button>
                    </td>
                    <td><?= $rs->vendor_name; ?></td>
                    <td><?= date('d-m-Y', strtotime($rs->pembelianobat_tanggal)); ?></td>
                    <td><?= $rs->pembelianobat_no_faktur; ?></td>
                    <td>

                        <?php if ($rs->pembelianobat_type == 'stok_awal') { ?>
                            Stok Awal
                        <?php } else if ($rs->pembelianobat_type == 'pembelian') { ?>
                            Pembelian
                        <?php } else if ($rs->pembelianobat_type == 'penerimaan') { ?>
                            Penerimaan
                        <?php } ?>
                    </td>
                    <?php
                    $jumlah = $this->mpo->total_harga($rs->pembelianobat_id);
                    // echo var_dump($jumlah);
                    ?>
                    <td>Rp. <?= number_format(ceil($jumlah[0]->jumlah), 0, ",", ".");
                            $no++; ?></td>
                    <td><?= $rs->created_oleh; ?></td>
                    <!-- <td><?= date('d-m-Y H:i:s', strtotime($rs->created_date)); ?></td> -->
                    <!-- <td><?= empty($rs->update_oleh) ? '': $rs->update_oleh ?></td> -->
                    <!-- <td><?= empty($rs->update_date) ? '': date('d-m-Y H:i:s', strtotime($rs->update_date)); ?></td> -->
                    <td><?= date('d-m-Y', strtotime($rs->pembelianobat_tanggal)); ?></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="99" class="text-center">-tidak ada data-</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?= $pagination; ?>
<div style="display: inline-block;" class="form-group">
    <select class="form-control" id="limit_halaman" name="limit">
        <option value="5" <?php echo $limit == 5 ? 'selected' : '' ?>>5</option>
        <option value="10" <?php echo $limit == 10 ? 'selected' : '' ?>>10</option>
        <option value="20" <?php echo $limit == 20 ? 'selected' : '' ?>>20</option>
        <option value="" <?php echo $limit == '' ? 'selected' : '' ?>>All</option>
    </select>
</div>