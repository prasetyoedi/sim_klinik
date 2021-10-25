<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment_measurentment extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_assessment','mrpu');	
        $this->load->library('excel');

	}
	
	public function index() {		
		$this->varData['pageTitle'] = 'Riwayat Assessment & Measurenment';
		$this->varData['pageIcon'] = 'ion-gear-a';		
		$this->varData['menuBreadcrumb'] = array(
			'Riwayat Assessment & Measurenment',
		);		
		$this->template->views('index', $this->varData);
    }
    
    public function index_data_table($limit=5,$page = 1) {
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
		$data_pembelian_obat = $this->db->query('SELECT tbl_pasien.pasien_id AS id,
		DATE(tbl_pasien.created_on) AS tanggal,
		TIME(tbl_pasien.created_on) AS jam,
		DATE(tbl_pasien.pasien_tanggal_lahir) AS tanggal_lahir,
		tbl_pasien.pasien_nama_lengkap AS nama_member,
		ref_tipe_member_fitness.tmf_nama AS tipe_member
		
		FROM trx_fitness_membership_billing
		LEFT JOIN tbl_fitness_membership ON fitmemberbill_fitmember_id = fitmember_id
		LEFT JOIN ref_tipe_member_fitness ON fitmember_tmf_id = tmf_id
		LEFT JOIN tbl_pasien ON pasien_id = fitmember_pasien_id Where pasien_id=?',array($id));
		
		$program = $this->db->get_where('ref_fitness_program_latihan' , 'fitproglat_is_active="Aktif"');
		$intensitas = $this->db->get_where('ref_fitness_intensitas' ,  'fitinten_is_active="Aktif"');

		$this->varData['intensitas'] = $intensitas->result();
		$this->varData['program'] = $program->result();
		$this->varData['dataDetail'] = $data_pembelian_obat->result();
	  	$this->template->views('assessment', $this->varData);
	}

}