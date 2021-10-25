<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_assessment extends CI_Model
{
	public function get_data_table($type = 'select', $search = array(), $offset = 0, $limit = 10, $sort = 'nama_tipe')
	{
		$sqlSearch = $sqlValue = $result = array();
		//build search		
		foreach ($search as $arr) {
			$val = trim($arr['value']);
			if (!empty($val)) {
				switch ($arr['name']) {
					case 'nama_vendor':
						$sqlSearch[] = 'pasien_nama_lengkap like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}
		//buid query
		$sql = "SELECT tbl_pasien.pasien_id AS id,
				DATE(tbl_pasien.created_on) AS tanggal,
				TIME(tbl_pasien.created_on) AS jam,
				tbl_pasien.pasien_nama_lengkap AS nama_member
				
				FROM trx_fitness_membership_billing
				LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
				LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id";
		if (count($sqlSearch) > 0) $sql .= ' where ' . implode(' and ', $sqlSearch);
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case '':
				case 'namatipe-asc':
					$sql .= ' order by jam desc';
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
					case 'nama_vendor':
						$sqlSearch[] = 'pasien_nama_lengkap like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}
		//buid query
		$sql = "SELECT tbl_pasien.pasien_id AS id,
				DATE(tbl_pasien.created_on) AS tanggal,
				TIME(tbl_pasien.created_on) AS jam,
				tbl_pasien.pasien_nama_lengkap AS nama_member
				
				FROM trx_fitness_membership_billing
				LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
				LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id";
		if (count($sqlSearch) > 0) $sql .= ' where ' . implode(' and ', $sqlSearch);
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case '':
				case 'namatipe-asc':
					$sql .= ' order by nama_member asc';
					break;
				case 'namatipe-desc':
					$sql .= ' order by nama_member desc';
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
					case 'nama_vendor':
						$sqlSearch[] = 'pasien_nama_lengkap like ?';
						$sqlValue[] = '%' . $val . '%';
						break;
				}
			}
		}
		//buid query
		$sql = "SELECT tbl_pasien.pasien_id AS id,
				DATE(tbl_pasien.created_on) AS tanggal,
				TIME(tbl_pasien.created_on) AS jam,
				tbl_pasien.pasien_nama_lengkap AS nama_member
				
				FROM trx_fitness_membership_billing
				LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
				LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id";
		if (count($sqlSearch) > 0) $sql .= ' where ' . implode(' and ', $sqlSearch);
		//add offset limit
		if ($type == 'select') {
			//set sort query
			switch ($sort) {
				case '':
				case 'namatipe-asc':
					$sql .= ' order by id asc';
					break;
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

	function delete($id){
		$sql = "SELECT tbl_pasien.pasien_id AS id,
				DATE(tbl_pasien.created_on) AS tanggal,
				TIME(tbl_pasien.created_on) AS jam,
				tbl_pasien.pasien_nama_lengkap AS nama_member
				
				FROM trx_fitness_membership_billing
				LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
				LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id
				WHERE pasien_id=?";
		$id=array();
		return $this->db->query($sql,$id);
	}

}
