<input type="hidden" id="sortdata" value="<?php echo $sortData; ?>">
<table class="table table-hover table-striped">
    <thead id="sorting-table">
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 10%;">Aksi</th>
            <th style="width: 15%;">Tanggal</th>
            <th style="width: 15%;">Jam</th>
            <th style="width: 15%;">Nama Latihan</th>
            <th style="width: 15%;">Total Peserta</th>
            <th style="width: 15%;">Total Pendapatan</th>
        </tr>
    </thead>
    <tbody id="table-data-yoga">
        <?php $no = 1;
        if (count($dataResult) > 0) {
            foreach ($dataResult as $rs) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                        <button nama-vendor="<?= $rs->vendor_name; ?>" id="detail-yoga" data-id="<?= $rs->pembelianobat_id; ?>" type="button" class="btn btn-xs btn-info"><i class="px-navbar-icon fa fa-eye"></i></button>
                        <button nama-vendor="<?= $rs->vendor_name; ?>" id="delete-obat" data-id="<?= $rs->pembelianobat_id; ?>" type="button" class="btn btn-xs btn-danger"><i class="px-navbar-icon fa fa-trash"></i></button>
                    </td>
                    <td><?= date('d-m-Y', strtotime($rs->pembelianobat_tanggal)); ?></td>
                    <td><?= $rs->pembelianobat_no_faktur; ?></td>
                    <td>

                        <?php if ($rs->pembelianobat_type == 'stok_awal') { ?>
                            Yoga
                        <?php } else if ($rs->pembelianobat_type == 'pembelian') { ?>
                            Senam
                        <?php } else if ($rs->pembelianobat_type == 'penerimaan') { ?>
                            Pemanasan
                        <?php } ?>
                    </td>
                    <td><?= $rs->vendor_name; ?></td>
                    <?php
                    $jumlah = $this->mpo->total_harga($rs->pembelianobat_id);
                    // echo var_dump($jumlah);
                    ?>
                    <td>Rp. <?= number_format(ceil($jumlah[0]->jumlah), 0, ",", ".");
                            $no++; ?></td>
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