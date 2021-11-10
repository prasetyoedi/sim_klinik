<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment_measurentment extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_assessment','mrpu');	
        $this->load->library('excel');

	}
	
	public function index() {		
		$tipe = $this->db->get_where('ref_tipe_member_fitness' , 'tmf_status="Aktif"');
		
		$this->varData['pageTitle'] = 'Assessment & Measurenment';
		$this->varData['pageIcon'] = 'ion-gear-a';		
		$this->varData['menuBreadcrumb'] = array(
			'Assessment & Measurenment',
		);

		$this->varData['tipe'] = $tipe->result();

		$this->template->views('index', $this->varData);
    }
    
	public function save_start_date($id) {
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			if($this->input->server('REQUEST_METHOD') == 'POST') {
				//get data				
				$start=$this->input->post('start');			
				$end=$this->input->post('end');		
			// print_r($start);
			// exit;
				$saveData = $this->mrpu->save_date($start, $end, $id);

				// Return json
				die(json_encode(array()));
			}
		}
	}

    public function index_data_table($limit=5,$page = 1) {
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			//set searching
			$search = $this->input->post('search');
			$search = parent::_filter_data($search);
			// print_r($search[0]);
			// exit;
			$sortData = $this->input->post('sort');			

			//get data
			$config = parent::_config_pagination();
			if ($limit == 5) {
				$config['select_limit'] = '<option value="5" selected>5</option><option value="10" >10</option><option value="100" >100</option><option value="all" >All</option>';
			} else if ($limit == 10) {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" selected>10</option><option value="100" >100</option><option value="all" >All</option>';
			} else if ($limit == 100) {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" >10</option><option value="100" selected>100</option><option value="all" >All</option>';
			} else {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" >10</option><option value="100" >100</option><option value="all" selected>All</option>';
				$limit = 'all';
			}
			$offset = ($page-1)*$limit;
			$dataResult = $this->mrpu->get_data_table('select', $search, $offset, $limit, $sortData);
			$dataCount = $this->mrpu->get_data_table('count', $search);

			//config pagination
			$config['base_url'] = 'assessment/index_table_data';			
			$config['total_rows'] = $dataCount;
			$config['per_page'] = $limit == 'all'?$dataCount:$limit;
			$this->pagination->initialize($config);

			//set sorting
			$sort = array();
			$sort['namatipe-sort']	= 'namatipe-asc';			
			$sort['namatipe-icon'] =  '&#9661;';
			switch($sortData) {
				case ''					:
				case 'namatipe-asc'		: $sort['namatipe-sort'] = 'namatipe-desc'; $sort['namatipe-icon'] = '&#9650;'; break;
				case 'namatipe-desc'	: $sort['namatipe-sort'] = 'namatipe-asc'; $sort['namatipe-icon'] = '&#9660;'; break;				
			}

            //parse data
			$this->varData['pagination'] = $this->pagination->create_links();
			$this->varData['dataResult'] = $dataResult;
            $this->varData['dataCount'] = $dataCount;
			$this->varData['noPage'] = $offset+1;
			$this->varData['sort'] = $sort;
			$this->varData['sortData'] = $sortData;
			$this->load->view('index_table_data', $this->varData);
		}
	}

	public function index_latihan_table($limit=5,$page = 1) {
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			//set searching
			$search = $this->input->post('search');
			$search = parent::_filter_data($search);
			$sortData = $this->input->post('sort');			

			//get data
			$config = parent::_config_pagination();
			if ($limit == 5) {
				$config['select_limit'] = '<option value="5" selected>5</option><option value="10" >10</option><option value="100" >100</option><option value="all" >All</option>';
			} else if ($limit == 10) {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" selected>10</option><option value="100" >100</option><option value="all" >All</option>';
			} else if ($limit == 100) {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" >10</option><option value="100" selected>100</option><option value="all" >All</option>';
			} else {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" >10</option><option value="100" >100</option><option value="all" selected>All</option>';
				$limit = 'all';
			}
			$offset = ($page-1)*$limit;
			$dataResult = $this->mrpu->get_latihan_table('select', $search, $offset, $limit, $sortData);
			$dataCount = $this->mrpu->get_latihan_table('count', $search);

			//config pagination
			$config['base_url'] = 'assessment/index_table_latihan';			
			$config['total_rows'] = $dataCount;
			$config['per_page'] = $limit == 'all'?$dataCount:$limit;
			$this->pagination->initialize($config);

			//set sorting
			$sort = array();
			$sort['namatipe-sort']	= 'namatipe-asc';			
			$sort['namatipe-icon'] =  '&#9661;';
			switch($sortData) {
				case ''					:
				case 'namatipe-asc'		: $sort['namatipe-sort'] = 'namatipe-desc'; $sort['namatipe-icon'] = '&#9650;'; break;
				case 'namatipe-desc'	: $sort['namatipe-sort'] = 'namatipe-asc'; $sort['namatipe-icon'] = '&#9660;'; break;				
			}

            //parse data
			$this->varData['pagination'] = $this->pagination->create_links();
			$this->varData['dataResult'] = $dataResult;
            $this->varData['dataCount'] = $dataCount;
			$this->varData['noPage'] = $offset+1;
			$this->varData['sort'] = $sort;
			$this->varData['sortData'] = $sortData;
			$this->load->view('index_table_latihan', $this->varData);
		}
	}

	public function index_history_table($limit=5,$page = 1) {
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			//set searching
			$search = $this->input->post('search');
			$search = parent::_filter_data($search);
			$sortData = $this->input->post('sort');			

			//get data
			$config = parent::_config_pagination();
			if ($limit == 5) {
				$config['select_limit'] = '<option value="5" selected>5</option><option value="10" >10</option><option value="100" >100</option><option value="all" >All</option>';
			} else if ($limit == 10) {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" selected>10</option><option value="100" >100</option><option value="all" >All</option>';
			} else if ($limit == 100) {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" >10</option><option value="100" selected>100</option><option value="all" >All</option>';
			} else {
				$config['select_limit'] = '<option value="5" >5</option><option value="10" >10</option><option value="100" >100</option><option value="all" selected>All</option>';
				$limit = 'all';
			}
			$offset = ($page-1)*$limit;
			$dataResult = $this->mrpu->get_history_table('select', $search, $offset, $limit, $sortData);
			$dataCount = $this->mrpu->get_history_table('count', $search);

			//config pagination
			$config['base_url'] = 'assessment/index_table_latihan';			
			$config['total_rows'] = $dataCount;
			$config['per_page'] = $limit == 'all'?$dataCount:$limit;
			$this->pagination->initialize($config);

			//set sorting
			$sort = array();
			$sort['namatipe-sort']	= 'namatipe-asc';			
			$sort['namatipe-icon'] =  '&#9661;';
			switch($sortData) {
				case ''					:
				case 'namatipe-asc'		: $sort['namatipe-sort'] = 'namatipe-desc'; $sort['namatipe-icon'] = '&#9650;'; break;
				case 'namatipe-desc'	: $sort['namatipe-sort'] = 'namatipe-asc'; $sort['namatipe-icon'] = '&#9660;'; break;				
			}

            //parse data
			$this->varData['pagination'] = $this->pagination->create_links();
			$this->varData['dataResult'] = $dataResult;
            $this->varData['dataCount'] = $dataCount;
			$this->varData['noPage'] = $offset+1;
			$this->varData['sort'] = $sort;
			$this->varData['sortData'] = $sortData;
			$this->load->view('index_table_history', $this->varData);
		}
	}

	public function assessment(){
		$this->varData['pageTitle'] = 'Tambah Assessement & Measurement';
		$this->varData['pageIcon'] = 'ion-gear-a';
		$this->varData['menuBreadcrumb'] = array(
			'Penerimaan Obat',
			'Data Assessement',
			'Tambah'
		);

	  	$id = $this->uri->segment(3);
		$data_detail = $this->db->query('SELECT tbl_pasien.pasien_id AS id,
		DATE(tbl_pasien.pasien_tanggal_lahir) AS tanggal_lahir,
		tbl_pasien.pasien_nama_lengkap AS nama_member,
		ref_tipe_member_fitness.tmf_nama AS tipe_member
		
		FROM trx_fitness_membership_billing
		LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
		LEFT JOIN ref_tipe_member_fitness ON fitmember_tmf_id = tmf_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id WHERE pasien_id=?',array($id));
		
		$program = $this->db->query('SELECT*FROM ref_fitness_program_latihan 
		WHERE fitproglat_is_active="Aktif"');

		$intensitas = $this->db->query('SELECT*FROM ref_fitness_intensitas 
		WHERE fitinten_is_active="Aktif"');

		$id_member = $this->db->query('SELECT tbl_fitness_membership.fitmember_id FROM tbl_fitness_membership 
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id WHERE fitmember_pasien_id=?',array($id));

		$data_assessment = $this->db->query('SELECT * FROM trx_assessment_measurentment
		LEFT JOIN tbl_fitness_membership ON assessment_fitmember_id = fitmember_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id
		LEFT JOIN ref_fitness_program_latihan ON fitproglat_id=assessment_fitproglat_id
		LEFT JOIN ref_fitness_intensitas ON fitinten_id=assessment_fitintent_id
		WHERE fitmember_pasien_id=?',array($id));

		$id_member_billing = $this->db->query('SELECT* FROM tbl_fitness_membership 
		LEFT JOIN trx_fitness_membership_billing ON fitmemberbill_fitmember_id = fitmember_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id WHERE fitmember_pasien_id=?',array($id));
		
		// $id_assessment = $this->db->query('SELECT * FROM trx_assessment_measurentment
		// LEFT JOIN tbl_fitness_membership ON assessment_fitmember_id=fitmember_id
		// LEFT JOIN tbl_pasien ON fitmember_pasien_id=pasien_id
		// WHERE pasien_id=?',array($id));

		$this->varData['id_member'] = $id_member->result();
		$this->varData['id_member_billing'] = $id_member_billing->result();
		// $this->varData['intensitas'] = $this->mrpu->get_intensitas();
		$this->varData['intensitas'] = $intensitas->result();
		$this->varData['program'] = $program->result();
		$this->varData['dataDetail'] = $data_detail->result();
		$this->varData['dataAssessment'] = $data_assessment->result();
		// $data = array();
		$this->varData['idAssessment'] = $this->mrpu->get_pasien_by_id($id);
		// $this->varData['idAssessment'] = $id_assessment->result();
	  	$this->template->views('assessment', $this->varData);
	}

	public function save_assessment() {
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			if($this->input->server('REQUEST_METHOD') == 'POST') {
				$rsMessage = $rsStatus = '';
				$rsStatus = 'error';
				$input = $this->input->post('input');					
				// print_r($input);
				// exit;
			
				$id = $input['id_assessment'];
				unset($input['id_assessment']);

				if ($id == 0) {
					$saveData = $this->mrpu->save_assessment($input);
					if(is_int($saveData)) {
					$rsStatus = 'success';
					// $rsMessage = 'Data berhasil ditambahkan';

					$this->db->trans_commit();
					} else {

					$rsMessage = $saveData;

					$this->db->trans_rollback();
					}
				} else{
					$updateData = $this->mrpu->update_assessment($input, $id);
					if($input['program_training'] == 0){
						$rsStatus = 'error';
						$rsMessage = 'silahkan pilih program latihan';

					}else if($updateData == true) {
						$rsStatus = 'success';
						// $rsMessage = 'Data berhasil diupdate';
	
						$this->db->trans_commit();
					} else {
	
						$rsMessage = $updateData;
	
						$this->db->trans_rollback();
					}
				}
				
				
				// if(is_int($saveData)) {
				// 	$rsStatus = 'success';
				// 	$rsMessage = 'Data berhasil ditambahkan';

				// 	$this->db->trans_commit();
				// } else {

				// 	$rsMessage = $saveData;

				// 	$this->db->trans_rollback();
				// }
				// Return json
				die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
			}
		}
	}

	public function form_cetak_kwitansi($id)
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			$this->varData['listBilling'] = 
			$this->db->query("SELECT 
			trx_fitness_membership_billing.fitmemberbill_inv_number AS fitmemberbill_inv_number,
			ref_fitness_program_latihan.fitproglat_name AS fitproglat_name,
			trx_assessment_measurentment.created_on AS created_on,
			tbl_pasien.pasien_nama_lengkap AS nama
			FROM trx_assessment_measurentment
			LEFT JOIN trx_fitness_membership_billing ON assessment_fitmemberbill_id = fitmemberbill_id 
			LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
			LEFT JOIN ref_tipe_member_fitness ON fitmember_tmf_id = tmf_id
			LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id 
			LEFT JOIN ref_fitness_program_latihan ON fitproglat_id = assessment_fitproglat_id 
			WHERE fitmember_id= $id")->result();
			
			$data = array();
			$this->load->view('form_cetak_kwitansi', $this->varData);
		}
	}

	public function delete()
	{
	  $kode = $this->input->post('kode');
	  $datapembelian = $this->mrpu->get_data_table($kode);
	  $updateStock = true;
	  $rsMessage = '';
	  $rsStatus = 'error';
	 
	  if($updateStock){
		$delete = $this->mrpu->delete_data($kode);
		if ($delete) {
		  $rsStatus = 'success';
		  $rsMessage = 'Data berhasil dihapus';
		} else {
		  $rsMessage = $delete;
		}
	  }else{
		$rsMessage = $updateStock;
	  }
	}
}