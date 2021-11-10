<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Search</span>
            </div>
            <div class="panel-body">
                <?php echo form_open($controllerName, array('id' => 'search_form', 'accept-charset' => 'utf-8', 'autocomplete' => 'off')) ?>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Taggal</label>
                        <div class="col-md-9  m-b-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input name="tanggal_from" type="text" class="form-control" placeholder="From" onfocus="(this.type='date')" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input name="tanggal_to" type="text" class="form-control" placeholder="To" onfocus="(this.type='date')" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipe</label>
                        <div class="form-group col-md-9">
                            <select class="form-control select2" name="tipe">
                                    <option value="">--Semua Tipe Member--</option>
                                    <?php foreach ($tipe as $key => $val) : ?>
                                        <option value="<?php echo $val->tmf_id; ?>"><?php echo $val->tmf_nama ?></option>
                                    <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="form-group col-md-9">
                            <select class="form-control select2" name="status">
                                    <option value="">--Semua Status--</option>
                                    <option value="Ya">Sudah di Data</option>
                                    <option value="Tidak">Belum di Data</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama</label>
                        <div class="col-md-9  m-b-1">
                            <input type="text" name="nama_member" class="form-control" placeholder="Nama">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" id="btn-submit" class="btn btn-default from-control" title="Search">
                                <b class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                <b class="visible-xs">Search</b>
                            </button>
                        </div>

                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel-body">
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
        </ul>

        <div class="tab-content tab-content-bordered">
            <div class="tab-pane active" id="tabs-data">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="panel" id="div-data">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-latihan">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel" id="div-latihan">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tabs-history">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel" id="div-history">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

