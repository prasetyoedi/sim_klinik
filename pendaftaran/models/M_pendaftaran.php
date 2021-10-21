<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pendaftaran extends CI_Model
{
	public function get_pasien_unit()
	{
		$this->db->order_by('pasienunit_name');
		$query = $this->db->get_where('ref_pasien_unit', 'pasienunit_is_active="Aktif"');
		return $query->result();
	}

	public function get_pasien_by($var)
	{
		$offset = $var['page'] * 10;
		if ($var['searchBy'] == 'tanggal_lahir'){
			$this->db->like('DATE_FORMAT(pasien_tanggal_lahir,"%d-%m-%Y")', $var['searchVal'], 'both');
		}else{
			$this->db->like($var['searchBy'], $var['searchVal'], 'both');
		}
			
		$this->db->order_by('pasien_norm');
		$this->db->offset($offset);
		$this->db->limit(10);
		$query = $this->db->get('tbl_pasien');
		return $query->result();
	}

	public function count_pasien_by($var)
	{
		$this->db->like($var['searchBy'], $var['searchVal'], 'both');
		$query = $this->db->get('tbl_pasien');
		return $query->num_rows();
	}

	public function get_pasien_by_id($id)
	{
		$query = $this->db->get_where('tbl_pasien', array('pasien_id' => $id));
		return $query->first_row();
	}

	public function get_membership($id)
	{
		$query = $this->db->get_where('tbl_fitness_membership', array('fitmember_pasien_id' => $id));
		return $query->first_row();
	}

	public function get_tipe_member()
	{
		// $this->db->order_by('tipepasien_order');
		$query = $this->db->get_where('ref_tipe_member_fitness', 'tmf_status = "aktif"');
		return $query->result();
	}

	function save_fitness($data)
	{
		//setup parameter
		$param = array();
		$param['fitmember_id_number'] = $data['no_rm'];
		$param['fitmember_riwayat_penyakit'] = $data['riwayat_penyakit'];
		$param['fitmember_keterangan'] = $data['keterangan'];
		$param['fitmember_tmf_id'] = $data['tipe_member'];
		$param['created_on'] = date('Y-m-d H:i:s');
		$param['created_by'] = $this->session->userdata['userdata']->email;

		//query
		$sql 	   = $this->db->insert_string('tbl_fitness_membership', $param);
		$result    = $this->db->query($sql);
		$insertId = $this->db->insert_id();
		return $insertId;
	}
	
	function save_fitness_step_dua($data)
	{
		//setup parameter
		$param = array();
		$param['fitmemberbilldet_fititem_id'] = $data['paket'];
		// $param['fitmemberbilldet_fititem_id'] = $data['biaya_lain'];
		$param['created_on'] = date('Y-m-d H:i:s');
		$param['created_by'] = $this->session->userdata['userdata']->email;

		//query
		$sql 	   = $this->db->insert_string('trx_fitness_membership_billing_detail', $param);
		$result    = $this->db->query($sql);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	function get_tipe_paket()
	{
		$query = $this->db->get_where('ref_fitness_item', 'fititem_tipe = "paket"');
		return $query->result();
	}
	
	function get_tipe_biaya_lain()
	{
		$query = $this->db->get_where('ref_fitness_item', 'fititem_tipe = "biaya_lain"');
		return $query->result();
	}

	function save_yoga_step_satu($data)
	{
		//setup parameter
		$param = array();
		$param['yoga_name'] = $data['nama'];
		$param['yoga_total_person'] = $data['total_person'];
		
		
		//query
		$sql 	   = $this->db->insert_string('trx_yoga', $param);
		$result    = $this->db->query($sql);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	function save_yoga_step_dua($dataarray,$id_trx_yoga)
	{
		//setup parameter
		$params = array();
		foreach($dataarray as $key=>$val){
			$params[$key] = array();
			$params[$key]['yogabill_peserta'] = $val['yogabill_peserta'];
			$params[$key]['yogabill_alamat'] = $val['yogabill_alamat'];
			$params[$key]['yogabill_biaya'] = $val['yogabill_biaya'];
			$params[$key]['yogabill_inv_number'] = date('YmdHis');
			$params[$key]['created_on'] = date('Y-m-d H:i:s');
			$params[$key]['created_by'] = $this->session->userdata['userdata']->email;
			$pay="Ya";
			if(empty ($val['yogabill_biaya'])){
				$pay="Belum";
			}
			$params[$key]['yogabill_is_pay'] = $pay;
			$params[$key]['yogabill_yoga_id'] = $id_trx_yoga;
		}
		
		//query
		return $this->db->insert_batch('trx_yoga_billing', $params);

	}

	function get_kwitansi()
	{
		$query = $this->db->get_where('trx_yoga_billing', array('yogabill_id' => $id));
		return $query->first_row();

		// $query = $this->db->get_where('ref_fitness_item', 'fititem_tipe = "biaya_lain"');
		// return $query->result();
	}
	
}