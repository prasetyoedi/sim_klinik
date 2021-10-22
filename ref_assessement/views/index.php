<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Search</span>
      </div>
      <div class="panel-body">

        <?php echo form_open($controllerName, array('id' => 'search_form_data_obat', 'accept-charset' => 'utf-8', 'autocomplete' => 'off')) ?>
        <div class="row">
        <div class="form-group">
            <label class="col-md-3 control-label">Tanggal</label>
            <div class="col-md-9  m-b-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <input name="tanggal_from" type="text" class="form-control" placeholder="Awal" onfocus="(this.type='date')" />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <input name="tanggal_to" type="text" class="form-control" placeholder="Akhir" onfocus="(this.type='date')" />
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Tipe Member</label>
            <div class="col-md-9  m-b-1">
              <select name="nama_vendor" class="form-control" placeholder="Nama Vendor" maxlength="50" style="width:48%"></select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-9  m-b-1">
              <select name="no_faktur" class="form-control" placeholder="Nomor Faktur" maxlength="50" style="width:48%"></select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Nama </label>
            <div class="col-md-9  m-b-1">
              <input type="text" name="nama_vendor" class="form-control" placeholder="Nama" maxlength="50" style="width:48%">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" id="btn-submit" class="btn btn-primary" title="Search">
                <b class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;</b>
                <b class="visible-xs">Search</b>
              </button>
              <button type="submit" id="btn-submit" class="btn btn-default from-control" title="Refresh" onClick="history.go(0);">
                  <b class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>&nbsp;&nbsp;&nbsp;&nbsp;</b>
                  <b class="visible-xs">Refresh</b>
              </button>
            </div>

          </div>
        </div>


        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<div id="tabs" >
<ul class="nav nav-tabs">
            <li class="active">
                <a href="#tabs-data" data-toggle="tab" id="click-data">
                    <strong>Data</strong>
                </a>
            </li>
            <li>
                <a href="#tabs-latihan" data-toggle="tab" id="click-latihan">
                    <strong>Latihan</strong>
                </a>
            </li>
            <li>
                <a href="#tabs-history" data-toggle="tab" id="click-history">
                    <strong>History</strong>
                </a>
            </li>
            <li>
                <a href="#tabs-yoga" data-toggle="tab" id="click-data-yoga">
                    <strong>Data Yoga</strong>
                </a>
            </li>
        </ul>

  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-heading">
          <!-- <span class="panel-title"><a href="" id="btn_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a></span> -->
          <!-- <span class="panel-title"><a href="" id="btn_assessement" class="btn btn-info"><i class="fa fa-plus"></i>Form</a></span> -->
          <div class="panel-heading-controls">
            <span class="label label-pill label-info">Diperbaharui pada : <b id="waktu-index-data-obat"></b></span>
          </div>
        </div>
        <!-- <div class="panel-body" id="index-data-obat"> -->

          <!-- <div id="div-data-obat" style="padding-top:20px;"> -->

          <!-- Bagian tabs -->
         <div class="tab-content tab-content-bordered">
            <div class="tab-pane active" id="tabs-data">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="panel" id="div-data-obat">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-latihan">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel" id="div-data-latihan">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-history">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel" id="div-data-history">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-yoga">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel" id="div-data-yoga">

                        </div>
                    </div>
                </div>
            </div>
        </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>