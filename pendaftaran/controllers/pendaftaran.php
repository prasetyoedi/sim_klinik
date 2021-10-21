

class pendaftaran extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pendaftaran', 'mdl');
	}

	public function index()
	{
		$data = array();
		$this->varData['menuBreadcrumb'] = array(
			'Pendaftaran'
		);
		$data['pageTitle'] = 'Pendaftaran';
		$data['pageIcon'] = 'ion-monitor';
		//parse data
		$this->varData = array_merge($this->varData, $data);
		$this->template->views('index', $this->varData);
	}

	public function page_fitness()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			$data = array();
			$this->varData['tipePaket'] = $this->mdl->get_tipe_paket();

			$this->varData['tipeBiayaLain'] = $this->mdl->get_tipe_biaya_lain();

			$this->load->view('index_fitness', $this->varData);
		}
	}

	public function page_yoga()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			$data = array();
			$this->load->view('index_yoga', $this->varData);
		}
	}
	

	public function form_cetak_kwitansi($id)
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			$data = array();
			$this->varData["kwitansi"]=  $this->mdl->get_kwitansi($id);
			$this->load->view('form_cetak_kwitansi', $this->varData);
		}
	}

	public function form_fitness()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				$data = array();
				$data['belumBayar'] = (object) array(
					'biaya' => 0,
					'pembayaran' => 0
				);
				$data['tipeMember'] = $this->mdl->get_tipe_member();
				if ($this->input->post('id')) {
					$data['dataPasien'] = $this->mdl->get_pasien_by_id($this->input->post('id'));
					$data['dataMembership'] = $this->mdl->get_membership($this->input->post('id'));
				}
				// $data['gelarPasien'] = explode(';', $this->get_gelar_pasien());
				// $data['gelarPasien'] = $this->mdl->get_gelar_pasien();
				$data['pasienUnit'] = $this->mdl->get_pasien_unit();
				$this->varData = array_merge($this->varData, $data);
				$this->load->view('index_form_fitness', $this->varData);
			}
		}
	}

	public function data_fitness()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			$data = array();
			$this->load->view('index_data_fitness', $this->varData);
		}
	}
	
	public function save_fitness() {
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			if($this->input->server('REQUEST_METHOD') == 'POST') {
				//get data				
				$input = $this->input->post('input');				
				$input = parent::_filter_data($input);								
				$rsMessage = '';
				$rsStatus = 'error';				
				$saveData = $this->mdl->save_fitness($input);
				$saveData = $this->mdl->save_fitness_step_dua($input);
				if(is_int($saveData)) {
					$rsStatus = 'success';
					$rsMessage = 'Data berhasil ditambahkan';
				} else {
					$rsMessage = $saveData;
				}
				// Return json
				die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
			}
		}
	}
	
	public function get_data_pasien()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			if ($this->input->post()) {
				$var = $this->input->post();
				$dataPasien = $this->mdl->get_pasien_by($var);
				$countPasien = $this->mdl->count_pasien_by($var);
				//build data
				$temp = $results = array();
				$a = 0;
				foreach ($dataPasien as $rs) {
					$results[$a]['id'] = $rs->pasien_id;
					$txt = $rs->pasien_norm;
					$txt .= (trim($rs->pasien_nama_lengkap) != '' ? ' | ' . $rs->pasien_nama_lengkap : '');
					$txt .= (trim($rs->pasien_tanggal_lahir) != '' ? ' | ' . parent::_ymd_to_dmy($rs->pasien_tanggal_lahir) : '');
					$txt .= (trim($rs->pesien_no_identitas) != '' ? ' | ' . $rs->pesien_no_identitas : '');
					$txt .= (trim($rs->pasien_no_identitas_profesi) != '' ? ' | ' . $rs->pasien_no_identitas_profesi : '');
					$results[$a++]['text'] = $txt;
				}
				$temp['results'] = $results;
				$temp['total_data'] = $countPasien;
				//parse data	
				echo json_encode($temp);
			}
		}
	}

	public function save_yoga()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed.');
		} else {
			if ($this->input->server('REQUEST_METHOD') == 'POST') {
				//get data				
				$input = $this->input->post('input_satu');
				$input = parent::_filter_data($input);
				$inputDua = $this->input->post('input_dua');
				// $inputDua = parent::_filter_data($inputDua);
				// print_r($inputDua['daftar']);
				$inputDua = json_decode($inputDua['daftar'],true);
				
				$rsMessage = '';
				$rsStatus = 'error';
				$saveiD = $this->mdl->save_yoga_step_satu($input);
				$saveData = $this->mdl->save_yoga_step_dua($inputDua, $saveiD);
				if ($saveData) {
					$rsStatus = 'success';
					$rsMessage = 'Data berhasil ditambahkan';
				} else {
					$rsMessage = $saveData;
				}
				
				// Return json
				die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
			}
		}
	}
}
