<input type="hidden" id="sortdata" value="<?php echo $sortData; ?>">
<table class="table table-hover table-striped" id="print_laporan_tindakan">
    <thead id="sorting-table">
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 10%;">Aksi</th>
            <th style="width: 10%;">Id Member</th>
            <th style="width: 10%;">Tanggal</th>
            <th style="width: 10%;">Jam</th>
            <th style="width: 10%;">Nama Member</th>
            <th style="width: 10%;">Keterangan</th>
            <th style="width: 10%;">Status</th>
            <th style="width: 10%;">Waktu Mulai</th>
            <th style="width: 10%;">Waktu Berakhir</th>
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
                        <a type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-original-title="Play" id="hide<?= $rs->id;?>" onclick='changeIcon(<?= $rs->id;?>)' ><i class="fa fa-play" id="icon_<?= $rs->id; ?>"  ></i></a>
                        <!-- <button type="button" class="btn btn-xs btn-warning"><i class="px-navbar-icon fa fa-dollar"></i></button> -->
                    </td>
                    <td>
                        <input type="hidden" class="id_assessment<?= $rs->id; ?>" value="<?= $rs->assessment_id; ?>"/>
                        <?= $rs->id; ?>
                    </td>
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

                    <td>
                        <p id="start-db<?= $rs->id; ?>"><?= $rs->startdate; ?></p>
                        <p id="start-date<?= $rs->id; ?>"></p>
                        <input type="hidden" name="start" class="start-date<?= $rs->id; ?>"/>
                    </td>

                    <td>
                        <p id="end-db<?= $rs->id; ?>"><?= $rs->enddate; ?></p>
                        <p id="end-date<?= $rs->id; ?>"></p>
                        <input type="hidden" name="end" class="end-date<?= $rs->id; ?>"/>
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

<script>
    function changeIcon(id) {
            if ($("#icon_"+id).hasClass('fa fa-play'))
			{	
                // interval = window.setInterval(stopWatch, 1000);
                $("#icon_"+id).removeClass('fa fa-play');
                $("#icon_"+id).addClass('fa fa-stop');
                $("#start-db"+id).addClass("hidden");
                start_date(id);
                save_date(id);
                load_table_history();
                
			} else {
                // window.clearInterval(interval);
                // $("#icon_"+id).removeClass('fa fa-stop');
				$("#hide"+id).addClass('hidden');
                $("#end-db"+id).addClass("hidden");
                end_date(id);
                save_date(id);
                load_table_history();
			}
    }

    function save_date(id){
        var start = $('.start-date'+id).val();
        var end = $('.end-date'+id).val();
        var id_ass = $('.id_assessment'+id).val();
        $.ajax({
            type: "POST",
            url: currentUrl + "/save_start_date/" + id_ass,
            data:  {start: start, end: end },
            success: function (data) {
            // do whatever you want with a successful response
            }
        });
    }


    function start_date(id){
        var date = new Date();
        var startMonth = date.getMonth()+1;
        var startDay = date.getDate();
        if (startDay < 10) {
            startDay = "0" + startDay;
        }
        var startYears = date.getFullYear();
        var jam = date.getHours();
        var menit = date.getMinutes();
        if (menit < 10) {
            menit = "0" + menit;
        }
        var second = date.getSeconds();
        if (second < 10) {
            second = "0" + second;
        }
	    $("#start-date"+id).html(startYears+"-"+startMonth+"-"+startDay+" "+jam+":"+menit+":"+second);
	    $(".start-date"+id).val(startDay+"-"+startMonth+"-"+startYears+" "+jam+":"+menit+":"+second);
        // console.log(startDay+"-"+startMonth+"-"+startYears);
    }

    function end_date(id){
        var date = new Date();
        var startMonth = date.getMonth()+1;
        var startDay = date.getDate();
        if (startDay < 10) {
            startDay = "0" + startDay;
        }
        var startYears = date.getFullYear();
        var jam = date.getHours();
        var menit = date.getMinutes();
        if (menit < 10) {
            menit = "0" + menit;
        }
        var second = date.getSeconds();
         
	    $("#end-date"+id).html(startYears+"-"+startMonth+"-"+startDay+" "+jam+":"+menit+":"+second);
	    $(".end-date"+id).val(startDay+"-"+startMonth+"-"+startYears+" "+jam+":"+menit+":"+second);
        // console.log(startDay+"-"+startMonth+"-"+startYears);
    }
    // let seconds = 0;
    // let minutes = 0;
    // let hours = 0;

    // let displaySeconds = 0;
    // let displayMinutes = 0;
    // let displayHours = 0;

    // let interval = null;

    // function stopWatch(){
    //     seconds++;

    //     if(seconds / 60 === 1){
    //         seconds = 0;
    //         minutes++;

    //         if(minutes / 60 === 1){
    //             minutes = 0;
    //             hours++;
    //         }

    //     }

    //     if(seconds < 10){
    //         displaySeconds = "0" + seconds.toString();
    //     }
    //     else{
    //         displaySeconds = seconds;
    //     }

    //     if(minutes < 10){
    //         displayMinutes = "0" + minutes.toString();
    //     }
    //     else{
    //         displayMinutes = minutes;
    //     }

    //     if(hours < 10){
    //         displayHours = "0" + hours.toString();
    //     }
    //     else{
    //         displayHours = hours;
    //     }

    //     document.getElementById("display").innerHTML = displayHours + ":" + displayMinutes + ":" + displaySeconds;

    // }
</script>
