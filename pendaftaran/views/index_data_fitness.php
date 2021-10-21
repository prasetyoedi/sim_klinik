<!-- <form> -->
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <select class="form-control" id="searchBy">
                    <option value="pasien_nama_lengkap">Nama</option>
                    <option value="pasien_norm">No.RM</option>
                    <option value="pesien_no_identitas">No.KTP/SIM/Paspor</option>
                    <option value="pasien_no_identitas_profesi">NIM/NIP</option>
                    <option value="pasien_tanggal_lahir">Tanggal Lahir</option>
                </select>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select  class="form-control" id="searchVar">
                </select>
                <input type="hidden" name="" class="form-control" placeholder="" id="searchVar" title="Tipe">
            </div>
        </div>
    </div>

    <hr>

    <div>
        <div class="row">
            <div id="index-form-fitness">
            
            </div>   
        </div>
    </div>
<!-- </form> -->

<script>
//search pasien load autocomplete function
$("#searchVar").select2({
    placeholder: "Cari pasien...",
    minimumInputLength: 1,
    dropdownAutoWidth: true,
    ajax: {
    delay: 250,
    url: currentUrl + "/get_data_pasien",
    dataType: "json",
    type: "POST",
    data: function (params) {
        var queryParameters = {
        searchVal: params.term,
        page: params.page || 0,
        searchBy: $("#searchBy").val(),
        };
        return queryParameters;
    },
    processResults: function (data, params) {
                
        params.page = params.page || 0;
        return {
            results: data.results,
            pagination: {
                more:
                params.page * 10 < data.total_data && data.total_data > 10,
            },
        };
    },
    cache: true,
    },
});
        //on select patient
$("#searchVar").on("select2:select", function (e) {

    load_pasien(this.value);
});


function load_pasien(idPasien) {
    preloader("#index-form-fitness");
    $.post(currentUrl + "/form_fitness", { id: idPasien }, function (
    data
    ) { }).done(function (datadone) {
        $("#index-form-fitness").html(datadone);
        preloader("#index-form-fitness");
        $(".datepicker2").datepicker();
    });
}
</script>