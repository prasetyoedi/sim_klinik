<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ref_assessement extends CI_Model
{

	public function get_data_pembelian_obat($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_unit')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_vendor':
						$sqlSearch[] = 'vendor_name like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
					case 'no_faktur':
						$sqlSearch[] = 'pembelianobat_no_faktur like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}

		//buid query
		$sql = "SELECT tbl_vendor.*,trx_pembelian_obat.*,trx_pembelian_obat.updated_by as update_oleh,
		trx_pembelian_obat.updated_on as update_date,
		trx_pembelian_obat.created_by as created_oleh,trx_pembelian_obat.created_on as created_date  
		FROM trx_pembelian_obat left join tbl_vendor on vendor_id = pembelianobat_vendor_id";
		if (count($sqlSearch) > 0) {
			$sql .= ' where ' . implode(' and ', $sqlSearch);
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " and pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		} else {
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " where pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		}
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case 'namaunit-asc':
					$sql .= ' order by vendor_name asc';
					break;
				case 'namaunit-desc':
					$sql .= ' order by vendor_name desc';
					break;
				case 'tanggal-asc':
					$sql .= ' order by pembelianobat_tanggal asc';
					break;
				case 'tanggal-desc':
					$sql .= ' order by pembelianobat_tanggal desc';
					break;
				case 'faktur-asc':
					$sql .= ' order by pembelianobat_no_faktur asc';
					break;
				case 'faktur-desc':
					$sql .= ' order by pembelianobat_no_faktur desc';
					break;
				default:
					$sql .= ' order by trx_pembelian_obat.created_on desc';
					break;
			}
			//set ordering
			if(!empty($limit)){
				$sql .= ' limit ' . $offset . ',' . $limit;
			}
			
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->result();
		} else if ($type == 'count') {
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->num_rows();
		}
		return $result;
	}

	public function get_data_latihan($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_unit')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_vendor':
						$sqlSearch[] = 'vendor_name like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
					case 'no_faktur':
						$sqlSearch[] = 'pembelianobat_no_faktur like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}

		//buid query
		$sql = "SELECT tbl_vendor.*,trx_pembelian_obat.*,trx_pembelian_obat.updated_by as update_oleh,
		trx_pembelian_obat.updated_on as update_date,
		trx_pembelian_obat.created_by as created_oleh,trx_pembelian_obat.created_on as created_date  
		FROM trx_pembelian_obat left join tbl_vendor on vendor_id = pembelianobat_vendor_id";
		if (count($sqlSearch) > 0) {
			$sql .= ' where ' . implode(' and ', $sqlSearch);
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " and pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		} else {
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " where pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		}
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case 'namaunit-asc':
					$sql .= ' order by vendor_name asc';
					break;
				case 'namaunit-desc':
					$sql .= ' order by vendor_name desc';
					break;
				case 'tanggal-asc':
					$sql .= ' order by pembelianobat_tanggal asc';
					break;
				case 'tanggal-desc':
					$sql .= ' order by pembelianobat_tanggal desc';
					break;
				case 'faktur-asc':
					$sql .= ' order by pembelianobat_no_faktur asc';
					break;
				case 'faktur-desc':
					$sql .= ' order by pembelianobat_no_faktur desc';
					break;
				default:
					$sql .= ' order by trx_pembelian_obat.created_on desc';
					break;
			}
			//set ordering
			if(!empty($limit)){
				$sql .= ' limit ' . $offset . ',' . $limit;
			}
			
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->result();
		} else if ($type == 'count') {
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->num_rows();
		}
		return $result;
	}

	// History
	public function get_data_history($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_unit')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_vendor':
						$sqlSearch[] = 'vendor_name like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
					case 'no_faktur':
						$sqlSearch[] = 'pembelianobat_no_faktur like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}

		//buid query
		$sql = "SELECT tbl_vendor.*,trx_pembelian_obat.*,trx_pembelian_obat.updated_by as update_oleh,
		trx_pembelian_obat.updated_on as update_date,
		trx_pembelian_obat.created_by as created_oleh,trx_pembelian_obat.created_on as created_date  
		FROM trx_pembelian_obat left join tbl_vendor on vendor_id = pembelianobat_vendor_id";
		if (count($sqlSearch) > 0) {
			$sql .= ' where ' . implode(' and ', $sqlSearch);
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " and pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		} else {
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " where pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		}
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case 'namaunit-asc':
					$sql .= ' order by vendor_name asc';
					break;
				case 'namaunit-desc':
					$sql .= ' order by vendor_name desc';
					break;
				case 'tanggal-asc':
					$sql .= ' order by pembelianobat_tanggal asc';
					break;
				case 'tanggal-desc':
					$sql .= ' order by pembelianobat_tanggal desc';
					break;
				case 'faktur-asc':
					$sql .= ' order by pembelianobat_no_faktur asc';
					break;
				case 'faktur-desc':
					$sql .= ' order by pembelianobat_no_faktur desc';
					break;
				default:
					$sql .= ' order by trx_pembelian_obat.created_on desc';
					break;
			}
			//set ordering
			if(!empty($limit)){
				$sql .= ' limit ' . $offset . ',' . $limit;
			}
			
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->result();
		} else if ($type == 'count') {
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->num_rows();
		}
		return $result;
	}


	// Yoga
	public function get_data_yoga($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_unit')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_vendor':
						$sqlSearch[] = 'vendor_name like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}

		//buid query
		$sql = "SELECT tbl_vendor.*,trx_pembelian_obat.*,trx_pembelian_obat.updated_by as update_oleh,
		trx_pembelian_obat.updated_on as update_date,
		trx_pembelian_obat.created_by as created_oleh,trx_pembelian_obat.created_on as created_date  
		FROM trx_pembelian_obat left join tbl_vendor on vendor_id = pembelianobat_vendor_id";
		if (count($sqlSearch) > 0) {
			$sql .= ' where ' . implode(' and ', $sqlSearch);
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " and pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		} else {
			if ($search[1]['value'] != NULL && $search[2]['value'] != NULL) $sql .= " where pembelianobat_tanggal between '" . $search[1]['value'] . "' and '" . $search[2]['value'] . "'";
		}
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case 'namaunit-asc':
					$sql .= ' order by vendor_name asc';
					break;
				case 'namaunit-desc':
					$sql .= ' order by vendor_name desc';
					break;
				case 'tanggal-asc':
					$sql .= ' order by pembelianobat_tanggal asc';
					break;
				case 'tanggal-desc':
					$sql .= ' order by pembelianobat_tanggal desc';
					break;
				case 'faktur-asc':
					$sql .= ' order by pembelianobat_no_faktur asc';
					break;
				case 'faktur-desc':
					$sql .= ' order by pembelianobat_no_faktur desc';
					break;
				default:
					$sql .= ' order by trx_pembelian_obat.created_on desc';
					break;
			}
			//set ordering
			if(!empty($limit)){
				$sql .= ' limit ' . $offset . ',' . $limit;
			}
			
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->result();
		} else if ($type == 'count') {
			$query = $this->db->query($sql, $sqlValue);
			$result = $query->num_rows();
		}
		return $result;
	}

	function save_data($data)
	{
		//setup parameter
		$param = array();
		$param['nama_vendor'] = $data['nama_vendor'];
		$param['tanggal'] = $data['tanggal'];
		$param['no_faktur'] = $data['faktur'];
		//query
		$sql 	   = $this->db->insert_string('trx_pembelian_obat', $param);
		$result    = $this->db->query($sql);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	public function checkStokJumlah($id,$jumlah){
		$query = $this->db->query("
		select * from trx_stock where stock_pembelianobtdet_id = ? AND stock_jumlah = ?
		",array($id,$jumlah));
		return $query->num_rows();
	}

	public function checkStokPembelian($id, $kodeobat)
	{
		$query = $this->db->query("
		select * from trx_stock where stock_pembelianobtdet_id = ? AND stock_obat_kode = ?
		", array($id, $kodeobat));
		return $query->num_rows();
	}

	function deletePembelian($id){
		return $this->db->delete('trx_pembelian_obat_detail', array('pembelianobtdet_pembelianobat_id' => $id));
	}

	function checkNomorFaktur($nomor){
		$query = $this->db->query("
		select * from trx_pembelian_obat where pembelianobat_no_faktur = ?
		",array($nomor));
		return $query->first_row();
	}

	function checkNomorFakturEdit($nomor,$id)
	{
		$query = $this->db->query("
		select * from trx_pembelian_obat where pembelianobat_no_faktur = ? AND pembelianobat_id <> ?
		", array($nomor,$id));
		return $query->first_row();
	}

	// function update_vendor($input)
	// {
	// 	//#####################
	// 	// trx_pembelian_obat
	// 	//#####################
	// 	$param1 = array();
	// 	if (!empty($input['input']['nama_vendor'])) {
	// 		$param1['pembelianobat_vendor_id'] = $input['input']['nama_vendor']; //trx_pembelian_obat
	// 	} else {
	// 		$param1['pembelianobat_vendor_id'] = $input['input']['nama_vendor_sebelumnya']; //trx_pembelian_obat
	// 	}

	// 	$param1['pembelianobat_no_faktur'] = $input['input']['faktur'];
	// 	$param1['pembelianobat_tanggal'] = $this->_dmy_to_ymd($input['input']['tanggal']);
	// 	$param1['pembelianobat_type'] = $input['input']['tipe'];
	// 	$param1['created_on'] = date('Y-m-d H:i:s');
	// 	$param1['created_by'] =  $this->session->userdata['userdata']->email;
	// 	$this->db->where("pembelianobat_id", $input['input']['id']);
	// 	return $this->db->update('trx_pembelian_obat', $param1);
	// }

	function update_vendor($input,$id)
	{
		//#####################
		// trx_pembelian_obat
		//#####################
		$param1 = array();
		if (!empty($input['input']['nama_vendor'])) {
			$param1['pembelianobat_vendor_id'] = $input['input']['nama_vendor']; //trx_pembelian_obat
		} else {
			$param1['pembelianobat_vendor_id'] = $input['input']['nama_vendor_sebelumnya']; //trx_pembelian_obat
		}
		$param1['pembelianobat_no_faktur'] = $input['input']['faktur'];
		$param1['pembelianobat_tanggal'] = $this->_dmy_to_ymd($input['input']['tanggal']);
		$param1['pembelianobat_type'] = $input['input']['tipe'];
		$param1['pembelianobat_hna'] =  $input['input']['totalHNA'];
		$param1['pembelianobat_ppn_percent'] =  $input['input']['ppnPercent'];
		$param1['pembelianobat_ppn_nominal'] =  $input['input']['ppnNominal'];
		$param1['pembelianobat_hna_ppn'] =  $input['input']['hnaPPN'];
		$param1['updated_on'] = date('Y-m-d H:i:s');
		$param1['updated_by'] =  $this->session->userdata['userdata']->email;
		$this->db->where("pembelianobat_id", $id);
		return $this->db->update('trx_pembelian_obat', $param1);
	
	}

	function save_vendor($input)
	{
		//#####################
		// trx_pembelian_obat
		//#####################
		$param1 = array();
		$param1['pembelianobat_vendor_id'] = $input['input']['nama_vendor']; //trx_pembelian_obat
		$param1['pembelianobat_no_faktur'] = $input['input']['faktur'];
		$param1['pembelianobat_tanggal'] = $this->_dmy_to_ymd($input['input']['tanggal']);
		$param1['pembelianobat_type'] = $input['input']['tipe'];
		$param1['pembelianobat_hna'] =  $input['input']['totalHNA'];
		$param1['pembelianobat_ppn_percent'] =  $input['input']['ppnPercent'];
		$param1['pembelianobat_ppn_nominal'] =  $input['input']['ppnNominal'];
		$param1['pembelianobat_hna_ppn'] =  $input['input']['hnaPPN'];
		$param1['created_on'] = date('Y-m-d H:i:s');
		$param1['created_by'] =  $this->session->userdata['userdata']->email;
		$this->db->insert('trx_pembelian_obat', $param1);
		return $this->db->insert_id();
	}

	public function _dmy_to_ymd($input)
	{
		$temp = explode('-', $input);
		return $temp[2] . '-' . $temp[1] . '-' . $temp[0];
	}

	public function _ymd_to_dmy($input)
	{
		$temp = explode('-', $input);
		return $temp[2] . '-' . $temp[1] . '-' . $temp[0];
	}

	

	function getIdPembelianDetail($id){
		$query = $this->db->query("
		select CONCAT(pembelianobtdet_id) AS idcolection from trx_pembelian_obat_detail where pembelianobtdet_pembelianobat_id = ?
		",array($id));
		if($query->num_rows()>0){
			$data = $query->first_row();
			return explode(",", $data->idcolection);
		}else{
			return false;
		}
	}

	function update_pembelian($input = array(), $no, $type, $id, $tanggal)
	{
		$tanggal = $this->_dmy_to_ymd($tanggal);
		if (empty($input['input']['nama_vendor'])) {
			$input['input']['nama_vendor'] =$input['input']['nama_vendor_sebelumnya'];
		}

		$datapembeliandetail = $this->db->query("
			select * from trx_pembelian_obat_detail where pembelianobtdet_id = ?
			", array($input['obat']['pembelianobtdet_id'][$no]));
		$datapembeliandetail = $datapembeliandetail->first_row();

		$jumlah = array();
		$param2['pembelianobatdet_batch'] = $input['obat']['batch'][$no]; //trx_pembelian_obat_detail
		$param2['pembelianobtdet_obat_kode'] = $input['obat']['obat'][$no];
		$param2['pembelianobatdet_exp_date'] = $this->_dmy_to_ymd($input['obat']['expdate'][$no]);
		$param2['pembelianobatdet_jumlah_box'] = $input['obat']['jumlah_box'][$no];
		$param2['pembelianobatdet_harga_per_box'] = $input['obat']['harga_per_box'][$no];
		$param2['pembelianobatdet_diskon'] = $input['obat']['diskon'][$no];
		$param2['pembelianobatdet_total_hna'] = $input['obat']['total_hna'][$no];
		$param2['pembelianobatdet_ppn'] = $input['obat']['ppn'][$no];
		$param2['pembelianobatdet_harga_hna_ppn'] = $input['obat']['total_hna_ppn'][$no];
		$param2['pembelianobatdet_jumlah_per_box'] = $input['obat']['jumlah_obat_per_box'][$no];
		$param2['pembelianobatdet_jumlah'] = $input['obat']['total_jumlah_obat'][$no];
		$param2['pembelianobatdet_harga_beli'] = $input['obat']['harga_beli'][$no];
		$param2['pembelianobatdet_harga_satuan'] = $input['obat']['harga_satuan'][$no];
		$param2['updated_on'] = date('Y-m-d H:i:s');
		$param1['updated_by'] =  $this->session->userdata['userdata']->email;


		$dataTipe = $this->mpo->get_data_tipe_pasien();
		$param3 = array();
		foreach ($dataTipe as $key => $val) {
			$param3[$val->tipepasien_kode] = $input['obat']['harga_' . $val->tipepasien_kode][$no];
		}
		//trx_pembelian_detail_harga_obat
		$result = true;



			//#####################
			// trx_pembelian_obat_detail
			//#####################
			$param2['pembelianobtdet_pembelianobat_id'] = $id;
			$this->db->where("pembelianobtdet_id", $input['obat']['pembelianobtdet_id'][$no]);
			$result = $result && $this->db->update('trx_pembelian_obat_detail', $param2);
			$trx_pembelian_obat_detail_id = $input['obat']['pembelianobtdet_id'][$no];

			//#####################
			// trx_stock_obat
			//#####################
			//get id stock obat
			$datastockid = $this->db->query("
			select * from trx_stock where stock_pembelianobtdet_id = ?
			",array($trx_pembelian_obat_detail_id));
			$idstock = $datastockid->first_row();
			$stocksaatini = $param2['pembelianobatdet_jumlah'] + $idstock->stock_jumlah - $datapembeliandetail->pembelianobatdet_jumlah ;
			
			$dataStock['stock_vendor_id'] = $input['input']['nama_vendor'];
			$dataStock['stock_obat_kode'] = $param2['pembelianobtdet_obat_kode'];
			$dataStock['stock_batch'] = $param2['pembelianobatdet_batch'];
			$dataStock['stock_exp_date'] = $param2['pembelianobatdet_exp_date'];
			$dataStock['stock_date'] = $tanggal;
			$dataStock['stock_harga_satuan'] = $param2['pembelianobatdet_harga_satuan'];
			$dataStock['stock_jumlah'] = $stocksaatini;
			$dataStock['updated_by'] = $this->session->userdata['userdata']->email;
			$dataStock['updated_on'] = date('Y-m-d H:i:s');
			$this->db->where("stock_id", $idstock->stock_id);
			$result = $result && $this->db->update('trx_stock', $dataStock);
			$inv_stok_id = $idstock->stock_id;



			//#####################
			// trx_pembelian_obat_detail_harga
			//#####################
			$result = $result && $this->db->delete("trx_pembelian_obat_detail_harga",array('pembelianobtdetharga_pembelianobtdet_id'=> $trx_pembelian_obat_detail_id));
			$result = $result && $this->db->delete("trx_stock_harga",array('stockharga_stock_id'=> $idstock->stock_id));

			foreach ($param3 as $key => $value) {
				$param4['pembelianobtdetharga_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
				$param4['pembelianobtdetharga_harga'] = $value;
				$param4['pembelianobtdetharga_tipepasien_kode'] = $key;
				$result = $result && $this->db->insert('trx_pembelian_obat_detail_harga', $param4);


				//#####################
				// trx_stock_detail_harga_obat
				//#####################
				$param5['stockharga_stock_id'] = $inv_stok_id;
				$param5['stockharga_tipepasien_harga'] = $value;
				$param5['stockharga_tipepasien_kode'] = $key;
				$param5['stockharga_tipepasien_id'] = $this->mpo->getTipeIdByCode($key);
				$result = $result && $this->db->insert('trx_stock_harga', $param5);
			}
			return $result;
		
	}

	public function checkObatExit($obatid,$id){
		$query = $this->db->query("
		select * from trx_pembelian_obat_detail 
		where pembelianobtdet_obat_id = ? AND pembelianobtdet_pembelianobat_id = ?
		",array($obatid,$id));
		if($query->num_rows() > 0){
			return $query->first_row()->pembelianobtdet_id;
		}else{
			return false;
		}
		
	}

	function update_pembelian_data($input = array(), $no, $id, $tanggal)
	{
		$tanggal = $this->_dmy_to_ymd($tanggal);
		if (empty($input['input']['nama_vendor'])) {
			$input['input']['nama_vendor'] = $input['input']['nama_vendor_sebelumnya'];
		}
		$jumlah = array();
		$param2['pembelianobtdet_batch'] = $input['obat']['batch'][$no]; //trx_pembelian_obat_detail
		$param2['pembelianobtdet_obat_id'] = $input['obat']['obatid'][$no];
		$param2['pembelianobtdet_obat_kode'] = $input['obat']['obat'][$no];
		$param2['pembelianobtdet_exp_date'] = $this->_dmy_to_ymd($input['obat']['expdate'][$no]);
		$param2['pembelianobtdet_jumlah_box'] = $input['obat']['jumlah_box'][$no];
		$param2['pembelianobtdet_harga_per_box'] = $input['obat']['harga_per_box'][$no];
		$param2['pembelianobtdet_diskon'] = $input['obat']['diskon'][$no];
		$param2['pembelianobtdet_total_hna'] = $input['obat']['total_hna'][$no];
		$param2['pembelianobtdet_ppn'] = $input['obat']['ppn'][$no];
		$param2['pembelianobtdet_total_hna_ppn'] = $input['obat']['total_hna_ppn'][$no];
		$param2['pembelianobtdet_jumlah_per_box'] = $input['obat']['jumlah_obat_per_box'][$no];
		$param2['pembelianobtdet_jumlah'] = $input['obat']['total_jumlah_obat'][$no];
		$param2['pembelianobtdet_harga_beli'] = $input['obat']['harga_beli'][$no];
		$param2['pembelianobtdet_harga_satuan'] = $input['obat']['harga_satuan'][$no];
		$param2['created_on'] = date('Y-m-d H:i:s');
		$param1['created_by'] =  $this->session->userdata['userdata']->email;


		$dataTipe = $this->mpo->get_data_tipe_pasien();
		$param3 = array();
		foreach ($dataTipe as $key => $val) {
			$param3[$val->tipepasien_kode] = $input['obat']['harga_' . $val->tipepasien_kode][$no];
		}
		//trx_pembelian_detail_harga_obat
		$result = true;
		//#####################
		// trx_pembelian_obat_detail
		//#####################
		$param2['pembelianobtdet_pembelianobat_id'] = $id;

		$result = $result && $this->db->insert('trx_pembelian_obat_detail', $param2);

		$trx_pembelian_obat_detail_id = $this->db->insert_id();

		//#####################
		// trx_stock_obat
		//#####################
		//check batch di stock opname
		$checkBatch = $this->mpo->checkObatId($param2['pembelianobtdet_obat_id'], $input['input']['nama_vendor']);
		if (empty($checkBatch)) {
			$dataStock['stock_vendor_id'] = $input['input']['nama_vendor'];
			$dataStock['stock_obat_id'] = $param2['pembelianobtdet_obat_id'];
			$dataStock['stock_obat_kode'] = $param2['pembelianobtdet_obat_kode'];
			$dataStock['stock_batch'] = $param2['pembelianobtdet_batch'];
			$dataStock['stock_exp_date'] = $param2['pembelianobtdet_exp_date'];
			$dataStock['stock_date'] = $tanggal;
			$dataStock['stock_status'] = 'Aktif';
			$dataStock['stock_harga_satuan'] = $param2['pembelianobtdet_harga_satuan'];
			$dataStock['stock_jumlah'] = $param2['pembelianobtdet_jumlah'];
			$dataStock['created_by'] = $this->session->userdata['userdata']->email;
			$dataStock['created_on'] = date('Y-m-d H:i:s');
			$dataStock['stock_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
			$result = $result && $this->db->insert('trx_stock', $dataStock);
			$inv_stok_id = $this->db->insert_id();

			// delete pembelian stock harga
			$result = $result && $this->mpo->deletePembelianHarga($trx_pembelian_obat_detail_id);
			//#####################
			// trx_pembelian_obat_detail_harga
			//#####################

			foreach ($param3 as $key => $value) {
				$param4['pembelianobtdetharga_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
				$param4['pembelianobtdetharga_harga'] = $value;
				$param4['pembelianobtdetharga_tipepasien_kode'] = $key;
				$result = $result && $this->db->insert('trx_pembelian_obat_detail_harga', $param4);


				//#####################
				// trx_stock_detail_harga_obat
				//#####################
				$param5['stockharga_stock_id'] = $inv_stok_id;
				$param5['stockharga_tipepasien_harga'] = $value;
				$param5['stockharga_tipepasien_kode'] = $key;
				$param5['stockharga_tipepasien_id'] = $this->mpo->getTipeIdByCode($key);
				$result = $result && $this->db->insert('trx_stock_harga', $param5);
			}
		} else {
			//update
			$dataStock['stock_vendor_id'] = $input['input']['nama_vendor'];
			$dataStock['stock_status'] = 'Aktif';
			$dataStock['stock_batch'] = $param2['pembelianobtdet_batch'];
			$dataStock['stock_harga_satuan'] = $param2['pembelianobtdet_harga_satuan'];
			$dataStock['stock_exp_date'] = $param2['pembelianobtdet_exp_date'];
			$dataStock['stock_jumlah'] = $param2['pembelianobtdet_jumlah'];
			$dataStock['updated_by'] = $this->session->userdata['userdata']->email;
			$dataStock['updated_on'] = date('Y-m-d H:i:s');
			$result = $result && $this->db->update('trx_stock', $dataStock, array('stock_id' => $checkBatch->stock_id));
			// delete stock harga
			$result = $result && $this->mpo->deleteHargaStock($checkBatch->stock_id);
			// delete pembelian stock harga
			$result = $result && $this->mpo->deletePembelianHarga($trx_pembelian_obat_detail_id);

			//#####################
			// trx_pembelian_obat_detail_harga
			//#####################

			foreach ($param3 as $key => $value) {
				$param4['pembelianobtdetharga_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
				$param4['pembelianobtdetharga_harga'] = $value;
				$param4['pembelianobtdetharga_tipepasien_kode'] = $key;
				$result = $result && $this->db->insert('trx_pembelian_obat_detail_harga', $param4);


				//#####################
				// trx_stock_detail_harga_obat
				//#####################
				$param5['stockharga_stock_id'] = $checkBatch->stock_id;
				$param5['stockharga_tipepasien_harga'] = $value;
				$param5['stockharga_tipepasien_kode'] = $key;
				$param5['stockharga_tipepasien_id'] = $this->mpo->getTipeIdByCode($key);
				$result = $result && $this->db->insert('trx_stock_harga', $param5);
			}
		}

		return $result;
	}

	function save_pembelian($input = array(), $no, $id, $tanggal)
	{
		$tanggal = $this->_dmy_to_ymd($tanggal);
		if (empty($input['input']['nama_vendor'])) {
			$input['input']['nama_vendor'] = $input['input']['nama_vendor_sebelumnya'];
		}
		$jumlah = array();
		$param2['pembelianobtdet_batch'] = $input['obat']['batch'][$no]; //trx_pembelian_obat_detail
		$param2['pembelianobtdet_obat_id'] = $input['obat']['obatid'][$no];
		$param2['pembelianobtdet_obat_kode'] = $input['obat']['obat'][$no];
		$param2['pembelianobtdet_exp_date'] = $this->_dmy_to_ymd($input['obat']['expdate'][$no]);
		$param2['pembelianobtdet_jumlah_box'] = $input['obat']['jumlah_box'][$no];
		$param2['pembelianobtdet_harga_per_box'] = $input['obat']['harga_per_box'][$no];
		$param2['pembelianobtdet_diskon'] = $input['obat']['diskon'][$no];
		$param2['pembelianobtdet_total_hna'] = $input['obat']['total_hna'][$no];
		$param2['pembelianobtdet_ppn'] = $input['obat']['ppn'][$no];
		$param2['pembelianobtdet_total_hna_ppn'] = $input['obat']['total_hna_ppn'][$no];
		$param2['pembelianobtdet_jumlah_per_box'] = $input['obat']['jumlah_obat_per_box'][$no];
		$param2['pembelianobtdet_jumlah'] = $input['obat']['total_jumlah_obat'][$no];
		$param2['pembelianobtdet_harga_beli'] = $input['obat']['harga_beli'][$no];
		$param2['pembelianobtdet_harga_satuan'] = $input['obat']['harga_satuan'][$no];
		$param2['created_on'] = date('Y-m-d H:i:s');
		$param1['created_by'] =  $this->session->userdata['userdata']->email;

		
		$dataTipe = $this->mpo->get_data_tipe_pasien();
		$param3 = array();
		foreach($dataTipe as $key=>$val){
			$param3[$val->tipepasien_kode] = $input['obat']['harga_'. $val->tipepasien_kode][$no];
		}
		 //trx_pembelian_detail_harga_obat
		$result = true;
		//#####################
		// trx_pembelian_obat_detail
		//#####################
		$param2['pembelianobtdet_pembelianobat_id'] = $id;
		
		$result = $result && $this->db->insert('trx_pembelian_obat_detail', $param2);

		$trx_pembelian_obat_detail_id = $this->db->insert_id();

		//#####################
		// trx_stock_obat
		//#####################
		//check batch di stock opname
		$checkBatch = $this->mpo->checkBatchHargaCode($param2['pembelianobtdet_obat_id'], $param2['pembelianobtdet_batch'], $param2['pembelianobtdet_harga_satuan']);
		if (empty($checkBatch)) {
			$dataStock['stock_vendor_id'] = $input['input']['nama_vendor'];
			$dataStock['stock_obat_id'] = $param2['pembelianobtdet_obat_id'];
			$dataStock['stock_obat_kode'] = $param2['pembelianobtdet_obat_kode'];
			$dataStock['stock_batch'] = $param2['pembelianobtdet_batch'];
			$dataStock['stock_exp_date'] = $param2['pembelianobtdet_exp_date'];
			$dataStock['stock_date'] = $tanggal;
			$dataStock['stock_status'] = 'Aktif';
			$dataStock['stock_harga_satuan'] = $param2['pembelianobtdet_harga_satuan'];
			$dataStock['stock_jumlah'] = $param2['pembelianobtdet_jumlah'];
			$dataStock['created_by'] = $this->session->userdata['userdata']->email;
			$dataStock['created_on'] = date('Y-m-d H:i:s');
			$dataStock['stock_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
			$result = $result && $this->db->insert('trx_stock', $dataStock);
			$inv_stok_id = $this->db->insert_id();

			// delete pembelian stock harga
			$result = $result && $this->mpo->deletePembelianHarga($trx_pembelian_obat_detail_id);
			//#####################
			// trx_pembelian_obat_detail_harga
			//#####################

			foreach ($param3 as $key => $value) {
				$param4['pembelianobtdetharga_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
				$param4['pembelianobtdetharga_harga'] = $value;
				$param4['pembelianobtdetharga_tipepasien_kode'] = $key;
				$result = $result && $this->db->insert('trx_pembelian_obat_detail_harga', $param4);


				//#####################
				// trx_stock_detail_harga_obat
				//#####################
				$param5['stockharga_stock_id'] = $inv_stok_id;
				$param5['stockharga_tipepasien_harga'] = $value;
				$param5['stockharga_tipepasien_kode'] = $key;
				$param5['stockharga_tipepasien_id'] = $this->mpo->getTipeIdByCode($key);
				$result = $result && $this->db->insert('trx_stock_harga', $param5);
			}
		} else {
			$dataStock['stock_vendor_id'] = $input['input']['nama_vendor'];
			//update
			$dataStock['stock_status'] = 'Aktif';
			$dataStock['stock_harga_satuan'] = $param2['pembelianobtdet_harga_satuan'];
			$dataStock['stock_exp_date'] = $param2['pembelianobtdet_exp_date'];
			$dataStock['stock_jumlah'] = $checkBatch->stock_jumlah + $param2['pembelianobtdet_jumlah'];
			$dataStock['updated_by'] = $this->session->userdata['userdata']->email;
			$dataStock['updated_on'] = date('Y-m-d H:i:s');
			$result = $result && $this->db->update('trx_stock', $dataStock, array('stock_id' => $checkBatch->stock_id));
			// delete stock harga
			$result = $result && $this->mpo->deleteHargaStock($checkBatch->stock_id);
			// delete pembelian stock harga
			$result = $result && $this->mpo->deletePembelianHarga($trx_pembelian_obat_detail_id);
			
			//#####################
			// trx_pembelian_obat_detail_harga
			//#####################

			foreach ($param3 as $key => $value) {
				$param4['pembelianobtdetharga_pembelianobtdet_id'] = $trx_pembelian_obat_detail_id;
				$param4['pembelianobtdetharga_harga'] = $value;
				$param4['pembelianobtdetharga_tipepasien_kode'] = $key;
				$result = $result && $this->db->insert('trx_pembelian_obat_detail_harga', $param4);


				//#####################
				// trx_stock_detail_harga_obat
				//#####################
				$param5['stockharga_stock_id'] = $checkBatch->stock_id;
				$param5['stockharga_tipepasien_harga'] = $value;
				$param5['stockharga_tipepasien_kode'] = $key;
				$param5['stockharga_tipepasien_id'] = $this->mpo->getTipeIdByCode($key);
				$result = $result && $this->db->insert('trx_stock_harga', $param5);
			}
		}

		return $result;
	}

	public function getTipeIdByCode($code){
		$query = $this->db->query("select * from ref_tipe_pasien where tipepasien_kode = ? AND tipepasien_is_active='Aktif'",array($code));
		return $query->first_row()->tipepasien_id;
	}

	public function deleteHargaStock($id){
		return $this->db->query("
			delete from trx_stock_harga where stockharga_stock_id = ?
		",array($id));
	}

	public function deletePembelianHarga($id)
	{
		return $this->db->query("
			delete from trx_pembelian_obat_detail_harga where pembelianobtdetharga_pembelianobat_id = ?
		", array($id));
	}

	public function getStock($obatid, $bacth, $harga){
		$query = $this->db->query("
		select * from trx_stock where stock_batch = ?
		AND stock_harga_satuan = ? AND stock_obat_id = ?
		", array($bacth, $harga, $obatid));
		return $query->first_row();
	}

	public function updateStock($id,$jumlah){
		return $this->db->query("
		UPDATE trx_stock 
		set stock_jumlah = ?
		where stock_id = ?
		",array($jumlah,$id));
	}

	public function checkBatchHargaCode($obatid,$bacth,$harga){
		$query = $this->db->query("
		select * from trx_stock where stock_batch = ?
		AND stock_harga_satuan = ? AND stock_obat_id = ?
		",array($bacth,$harga, $obatid));
		return $query->first_row();
	}

	public function checkBatchCode($obatid, $bacth)
	{
		$query = $this->db->query("
		select * from trx_stock where stock_batch = ?
		 AND stock_obat_id = ?
		", array($bacth, $obatid));
		return $query->first_row();
	}

	public function checkObatId($obatid,$vendorId)
	{
		$query = $this->db->query("
		select * from trx_stock where stock_vendor_id = ?
		 AND stock_obat_id = ? AND stock_status = 'Aktif'
		", array($vendorId,$obatid));
		return $query->first_row();
	}


	public function get_vendor_by($var)
	{
		$offset = $var['page'] * 10;
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->like($var['searchBy'], $var['searchVal'], 'both');
		$this->db->order_by('vendor_name');
		$this->db->where('vendor_is_active', 'Aktif');
		$this->db->offset($offset);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	function count_vendor_by($var)
	{
		
		$this->db->like($var['searchBy'], $var['searchVal'], 'both');
		$query = $this->db->get('tbl_vendor');
		return $query->num_rows();
	}



	public function get_obat_by($var)
	{
		$offset = $var['page'] * 10;
		$this->db->select('tbl_obat.*, ref_satuan_obat.satuanobat_satuan');
		$this->db->from('tbl_obat');
		$this->db->join('ref_satuan_obat', 'tbl_obat.obat_satuanobat_id = ref_satuan_obat.satuanobat_id');
		$this->db->like($var['searchBy'], $var['searchVal'], 'both');
		$this->db->order_by('obat_kode');
		$this->db->where('tbl_obat.obat_funcobat_id !=', '4');
		$this->db->offset($offset);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	function count_obat_by($var)
	{
		if ($var['searchBy'] == 'nama') $var['searchBy'] = 'obat';
		$this->db->like($var['searchBy'], $var['searchVal'], 'both');
		$query = $this->db->get('tbl_obat');
		return $query->num_rows();
	}

	function cekBatch($var, $vendor_id)
	{
		// $this->db->like('batch', $var, 'both');
		$this->db->where('stock_batch', $var);
		$this->db->where('stock_vendor_id', $vendor_id);
		$query = $this->db->get('trx_stock');
		return $query->num_rows();
	}

	function getStok($var, $vendor_id)
	{
		// $this->db->like('batch', $var, 'both');
		$this->db->where('stock_batch', $var);
		$this->db->where('stock_vendor_id', $vendor_id);
		$query = $this->db->get('trx_stock');
		return $query->result();
	}

	function update_stock($stokid,$jumlah){
		return $this->db->query('
		UPDATE trx_stock
		SET stock_jumlah = ?,
		stock_status = "Tidak Aktif"
		where stock_id = ?
		',array($jumlah,$stokid));
	}

	function update_stock_zero($stokid, $jumlah)
	{
		return $this->db->query('
		UPDATE trx_stock
		SET stock_jumlah = ?,
		stock_status = "Tidak Aktif"
		where stock_id = ?
		', array($jumlah, $stokid));
	}

	function get_pembelian($id)
	{
		$data = $this->db->query("SELECT * FROM trx_pembelian_obat 
		left join trx_pembelian_obat_detail on pembelianobtdet_pembelianobat_id = pembelianobat_id
		where pembelianobat_id = ?",array($id));
		return $data->result();
	}

	function get_data_tipe_pasien()
	{
		$data = $this->db->query("SELECT * FROM ref_tipe_pasien where tipepasien_is_active = 'Aktif'");
		return $data->result();
	}

	function get_vendor(){
		$data = $this->db->query('select * from tbl_vendor where vendor_is_active = "Aktif"');
		return $data->result();
	}

	function total_harga($kode)
	{
		$sql = "SELECT pembelianobat_hna_ppn AS jumlah FROM trx_pembelian_obat WHERE pembelianobat_id = '" . $kode . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function select($table)
	{
		return $this->db->get($table);
	}

	public function selectwhere($table, $data)
	{
		return $this->db->get_where($table, $data);
	}

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function deleteDetailStok($dataidarray)
	{
		$dataid = implode(',',$dataidarray);
		return $this->db->query("
		Delete from trx_stock where stock_pembelianobtdet_id in (?)
		",array($dataid));
	}

	public function getDetailPembelian($id){
		$query = $this->db->query("
		select * from trx_pembelian_obat_detail where pembelianobtdet_pembelianobat_id = ?
		",array($id));
		return $query->result();
	}

	public function deleteDetailPembelian($idpemebelian)
	{
		return $this->db->query("
		Delete from trx_pembelian_obat_detail where pembelianobtdet_pembelianobat_id = ?
		", array($idpemebelian));
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function insert_vendor($data)
	{
		return $this->db->insert('tbl_vendor', $data);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function get_data_obat($id)
	{
		$this->db->select("trx_pembelian_obat_detail.*, tbl_obat.*, tbl_obat.obat_name as nama");
		$this->db->from("trx_pembelian_obat_detail");
		$this->db->join("tbl_obat", "trx_pembelian_obat_detail.pembelianobtdet_obat_kode = tbl_obat.obat_kode");
		$this->db->where("trx_pembelian_obat_detail.pembelianobtdet_pembelianobat_id", $id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_obat_detail_harga($id,$type)
	{
		$this->db->select("*");
		$this->db->from("trx_pembelian_obat_detail_harga");
		$this->db->where("pembelianobtdetharga_pembelianobtdet_id", $id);
		$this->db->where("pembelianobtdetharga_tipepasien_kode", $type);
		$query = $this->db->get();
		return $query->first_row();
	}

	function delete_data($kode)
	{
		// $query = $this->db->query("SELECT trx_pembelian_obat_detail.pembelianobtdet_obat_kode FROM trx_pembelian_obat_detail WHERE pembelianobtdet_obat_kode = '" . $kode . "'");
		// $data = $query->result();
		// foreach ($data as $value) {
		// 	$trx_pembelian_obat_detail_kode = $value->pembelianobtdet_obat_kode;
		// 	$this->db->delete('trx_pembelian_obat_detail_harga', array('trx_pembelian_obat_detail_kode' => $trx_pembelian_obat_detail_kode));
		// }
		// $this->db->delete('trx_pembelian_obat_detail', array('trx_pembelian_obat_kode' => $kode));
		return $this->db->delete('trx_pembelian_obat', array('pembelianobat_id' => $kode));
	}
}
