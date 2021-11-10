<input type="hidden" id="sortdata" value="<?php echo $sortData; ?>">
<table class="table table-hover table-striped" id="print_laporan_tindakan">
    <thead id="sorting-table">
        <tr>
        <th style="width: 5%;">No</th>
            <th style="width: 10%;">Aksi</th>
            <th style="width: 15%;">Id Member</th>
            <th style="width: 15%;">Tanggal</th>
            <th style="width: 15%;">Jam</th>
            <th style="width: 15%;">Nama Member</th>
            <th style="width: 15%;">Keterangan</th>
            <th style="width: 15%;">Status</th>
        </tr>
    </thead>
    <tbody id="table-data">
        <?php if (count($dataResult) > 0) {
            foreach ($dataResult as $rs) { ?>
               <tr>
                    <td>
                        <center><?= $noPage++; ?></center>
                    </td>
                    <td>
                        <a data-id="<?= $rs->id; ?>" id="btn_assessment" type="button" class="btn btn-xs btn-success"><i class="px-navbar-icon fa fa-plus"></i></a>
                        <a id="delete-data" data-id="<?= $rs->id; ?>" nama-member="<?= $rs->nama_member; ?>" type="button" class="btn btn-xs btn-danger"><i class="px-navbar-icon fa fa-trash"></i></a>
                        <!-- <button type="button" class="btn btn-xs btn-warning"><i class="px-navbar-icon fa fa-dollar"></i></button> -->
                    </td>
                    <td><?= $rs->id; ?></td>
                    <td><?= $rs->tanggal; ?></td>
                    <td><?= $rs->jam; ?></td>
                    <td><?= $rs->nama_member; ?></td>
                    <td></td>
                    <td>
                        <?php if ($rs->status_member == 'Ya') { ?>
                            Sudah di Data
                        <?php } else { ?>
                            Belum di Data
                        <?php } ?>
                    </td>
                    
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