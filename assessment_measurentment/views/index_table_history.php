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
            <th style="width: 15%;">Waktu</th>
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
                        <button id="btn_assessement" type="button" class="btn btn-xs btn-success"><i class="px-navbar-icon fa fa-plus"></i></button>
                        <button id="delete-obat" type="button" class="btn btn-xs btn-danger"><i class="px-navbar-icon fa fa-trash"></i></button>
                        <!-- <button type="button" class="btn btn-xs btn-warning"><i class="px-navbar-icon fa fa-dollar"></i></button> -->
                    </td>
                    <td><?= $rs->id; ?></td>
                    <td><?= $rs->tanggal; ?></td>
                    <td><?= $rs->jam; ?></td>
                    <td><?= $rs->nama_member; ?></td>
                    
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