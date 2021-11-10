<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_assessment extends CI_Model
{
	function save_date($start, $end, $id)
	{
		try {
			$param = array();

			$param['assessment_start_latihan_time'] = date('Y-m-d H:i:s', strtotime($start));
			$param['assessment_end_latihan_time'] = date('Y-m-d H:i:s', strtotime($end));
			$param['updated_on'] = date('Y-m-d H:i:s');
			$param['updated_by'] = $this->session->userdata['userdata']->email;
		
			$this->db->update('trx_assessment_measurentment', $param, array('assessment_id' => $id));
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return true;
	}

	public function get_pasien_by_id($id){
		$query = $this->db->query('SELECT assessment_id
		FROM trx_assessment_measurentment
		LEFT JOIN tbl_fitness_membership
		ON assessment_fitmember_id=fitmember_id
		LEFT JOIN tbl_pasien
		ON fitmember_pasien_id=pasien_id
		WHERE pasien_id=?',array($id));
		return $query->first_row();
	}

	// public function get_intensitas(){
	// 	$query = $this->db->get_where('ref_fitness_intensitas', 'fitinten_is_active="Aktif"');
	// 	return $query->first_row();
	// }

	public function get_data_table($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_tipe')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search		
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_member':
						$sqlSearch[] = 'pasien_nama_lengkap like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
						
					case 'tipe':
						$sqlSearch[] = 'fitmember_tmf_id = ?';
						$sqlValue[] = '' . $val . '';
						break;
					
					case 'status':
						$sqlSearch[] = 'assessment_is_fill = ?';
						$sqlValue[] = '' . $val . '';
						break;
				}
			}
		}
		//buid query
		$sql = "SELECT tbl_pasien.pasien_id AS id,
		tbl_pasien.pasien_register_date AS tanggal,
		TIME(tbl_pasien.created_on) AS jam,
		tbl_pasien.pasien_nama_lengkap AS nama_member,
		trx_assessment_measurentment.assessment_is_fill AS status_member

		FROM trx_fitness_membership_billing
		LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id
		LEFT JOIN ref_tipe_member_fitness ON fitmember_tmf_id = tmf_id
		LEFT JOIN trx_assessment_measurentment ON assessment_fitmemberbill_id = fitmemberbill_id";
		
		// if (count($sqlSearch) > 0) $sql .= ' where ' . implode(' and ', $sqlSearch);
		
		if (count($sqlSearch) > 0) {
			$sql .= ' where ' . implode(' and ', $sqlSearch);
			if ($search[0]['value'] != NULL && $search[1]['value'] != NULL) $sql .= " and pasien_register_date between '" . $search[0]['value'] . "' and '" . $search[1]['value'] . "'";
		} else {
			if ($search[0]['value'] != NULL && $search[1]['value'] != NULL) $sql .= " where pasien_register_date between '" . $search[0]['value'] . "' and '" . $search[1]['value'] . "'";
		}

		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case '':
				case 'namatipe-desc':
					$sql .= ' order by id desc';
					break;

			}
			//add offset limit
			if($limit != 'all'){
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

	public function get_latihan_table($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_tipe')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search		
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_member':
						$sqlSearch[] = 'pasien_nama_lengkap like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
						
					case 'tipe':
						$sqlSearch[] = 'fitmember_tmf_id = ?';
						$sqlValue[] = '' . $val . '';
						break;
					
					case 'status':
						$sqlSearch[] = 'assessment_is_fill = ?';
						$sqlValue[] = '' . $val . '';
						break;
				}
			}
		}
		//buid query
		$sql = "SELECT tbl_pasien.pasien_id AS id,
		tbl_pasien.pasien_register_date AS tanggal,
		TIME(tbl_pasien.created_on) AS jam,
		tbl_pasien.pasien_nama_lengkap AS nama_member,
		trx_assessment_measurentment.assessment_is_fill AS status_member,
		trx_assessment_measurentment.assessment_start_latihan_time AS startdate,
		trx_assessment_measurentment.assessment_end_latihan_time AS enddate,
		trx_assessment_measurentment.assessment_id AS assessment_id


		FROM trx_fitness_membership_billing
		LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id
		LEFT JOIN ref_tipe_member_fitness ON fitmember_tmf_id = tmf_id
		LEFT JOIN trx_assessment_measurentment ON assessment_fitmemberbill_id = fitmemberbill_id 
		WHERE assessment_is_fill='Ya'";
				
		if (count($sqlSearch) > 0) {
			$sql .= ' and ' . implode(' and ', $sqlSearch);
			if ($search[0]['value'] != NULL && $search[1]['value'] != NULL) $sql .= " and pasien_register_date between '" . $search[0]['value'] . "' and '" . $search[1]['value'] . "'";
		} else {
			if ($search[0]['value'] != NULL && $search[1]['value'] != NULL) $sql .= " and pasien_register_date between '" . $search[0]['value'] . "' and '" . $search[1]['value'] . "'";
		}		

		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case '':
				case 'namatipe-asc':
					$sql .= ' order by id desc';
					break;

			}
			//add offset limit
			if($limit != 'all'){
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

	public function get_history_table($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_tipe')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search		
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_member':
						$sqlSearch[] = 'pasien_nama_lengkap like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
						
					case 'tipe':
						$sqlSearch[] = 'fitmember_tmf_id = ?';
						$sqlValue[] = '' . $val . '';
						break;
					
					case 'status':
						$sqlSearch[] = 'assessment_is_fill = ?';
						$sqlValue[] = '' . $val . '';
						break;
				}
			}
		}
		//buid query
		$sql = "SELECT tbl_pasien.pasien_id AS id,
		tbl_pasien.pasien_register_date AS tanggal,
		TIME(tbl_pasien.created_on) AS jam,
		tbl_pasien.pasien_nama_lengkap AS nama_member,
		trx_assessment_measurentment.assessment_is_fill AS status_member
		
		FROM trx_assessment_measurentment
		LEFT JOIN tbl_fitness_membership ON assessment_fitmember_id = fitmember_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id WHERE assessment_end_latihan_time IS NOT NULL";
		
		if (count($sqlSearch) > 0) {
			$sql .= ' and ' . implode(' and ', $sqlSearch);
			if ($search[0]['value'] != NULL && $search[1]['value'] != NULL) $sql .= " and pasien_register_date between '" . $search[0]['value'] . "' and '" . $search[1]['value'] . "'";
		} else {
			if ($search[0]['value'] != NULL && $search[1]['value'] != NULL) $sql .= " and pasien_register_date between '" . $search[0]['value'] . "' and '" . $search[1]['value'] . "'";
		}	
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case '':
				case 'namatipe-asc':
					$sql .= ' order by id desc';
					break;

			}
			//add offset limit
			if($limit != 'all'){
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
	
	function save_assessment($data)
	{
		//setup parameter
		$param = array();
		$param['assessment_nadi'] = $data['nadi'];
		$param['assessment_sistol'] = $data['darah_min'];
		$param['assessment_diastol'] = $data['darah_max'];
		$param['assessment_berat_badan'] = $data['berat_badan'];
		$param['assessment_tinggi_badan'] = $data['tinggi_badan'];
		$param['assessment_body_fat'] = $data['body_fat'];
		$param['assessment_lingkar_lengan_atas'] = $data['lengan_atas'];
		$param['assessment_lingkar_dada'] = $data['lingkar_dada'];
		$param['assessment_lingkar_perut'] = $data['lingkar_perut'];
		$param['assessment_lingkar_panggul'] = $data['lingkar_panggul'];
		$param['assessment_lingkar_paha'] = $data['lingkar_paha'];
		$param['assessment_lingkar_betis'] = $data['lingkar_betis'];
		$param['assessment_rm'] = $data['rm'];
		$param['assessment_beban_min'] = $data['beban_min'];
		$param['assessment_beban_max'] = $data['beban_max'];
		$param['assessment_repetisi_min'] = $data['repetisi_min'];
		$param['assessment_repetisi_max'] = $data['repetisi_max'];
		$param['assessment_set_min'] = $data['set_min'];
		$param['assessment_set_max'] = $data['set_max'];
		$param['assessment_frekuensi_min'] = $data['frekuensi_min'];
		$param['assessment_frekuensi_max'] = $data['frekuensi_max'];
		$param['assessment_recovery_min'] = $data['recovery_min'];
		$param['assessment_recovery_max'] = $data['recovery_max'];
		$param['assessment_hr_min'] = $data['hr_min'];
		$param['assessment_hr_max'] = $data['hr_max'];
		$param['assessment_fitmemberbill_id'] = $data['id_membership_billing'];
		$param['assessment_fitmember_id'] = $data['id_membership'];
		$param['assessment_fitintent_id'] = $data['intensitas'];
		$param['assessment_fitproglat_id'] = $data['program_training'];
		$param['created_on'] = date('Y-m-d H:i:s');
		$param['created_by'] = $this->session->userdata['userdata']->email;
		$param['assessment_is_fill'] = "Ya";


		
		//query
		$sql 	   = $this->db->insert_string('trx_assessment_measurentment', $param);
		$result    = $this->db->query($sql);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	public function update_assessment($data, $id)
	{

		try {
			$inputnew = array();
			$inputnew['assessment_nadi'] = $data['nadi'];
			$inputnew['assessment_sistol'] = $data['darah_min'];
			$inputnew['assessment_diastol'] = $data['darah_max'];
			$inputnew['assessment_berat_badan'] = $data['berat_badan'];
			$inputnew['assessment_tinggi_badan'] = $data['tinggi_badan'];
			$inputnew['assessment_body_fat'] = $data['body_fat'];
			$inputnew['assessment_lingkar_lengan_atas'] = $data['lengan_atas'];
			$inputnew['assessment_lingkar_dada'] = $data['lingkar_dada'];
			$inputnew['assessment_lingkar_perut'] = $data['lingkar_perut'];
			$inputnew['assessment_lingkar_panggul'] = $data['lingkar_panggul'];
			$inputnew['assessment_lingkar_paha'] = $data['lingkar_paha'];
			$inputnew['assessment_lingkar_betis'] = $data['lingkar_betis'];
			$inputnew['assessment_rm'] = $data['rm'];
			$inputnew['assessment_beban_min'] = $data['beban_min'];
			$inputnew['assessment_beban_max'] = $data['beban_max'];
			$inputnew['assessment_repetisi_min'] = $data['repetisi_min'];
			$inputnew['assessment_repetisi_max'] = $data['repetisi_max'];
			$inputnew['assessment_set_min'] = $data['set_min'];
			$inputnew['assessment_set_max'] = $data['set_max'];
			$inputnew['assessment_frekuensi_min'] = $data['frekuensi_min'];
			$inputnew['assessment_frekuensi_max'] = $data['frekuensi_max'];
			$inputnew['assessment_recovery_min'] = $data['recovery_min'];
			$inputnew['assessment_recovery_max'] = $data['recovery_max'];
			$inputnew['assessment_hr_min'] = $data['hr_min'];
			$inputnew['assessment_hr_max'] = $data['hr_max'];
			$inputnew['assessment_fitmemberbill_id'] = $data['id_membership_billing'];
			$inputnew['assessment_fitmember_id'] = $data['id_membership'];
			$inputnew['assessment_fitintent_id'] = $data['intensitas'];
			$inputnew['assessment_fitproglat_id'] = $data['program_training'];
			$inputnew['assessment_is_fill'] = "Ya";
			$inputnew['updated_on'] = date('Y-m-d H:i:s');
			$inputnew['updated_by'] = $this->session->userdata['userdata']->email;
			$this->db->update('trx_assessment_measurentment', $inputnew, array('assessment_id' => $id));
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return true;
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
		return $this->db->delete('tbl_pasien', array('pasien_id' => $kode));
	}

}
