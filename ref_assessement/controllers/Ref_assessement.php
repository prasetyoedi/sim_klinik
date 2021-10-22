<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Ref_assessement extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_ref_assessement', 'mpo');
  }

  public function index()
  {
    $data = array();
    $this->varData['menuBreadcrumb'] = array(
      'Assessement & Measurement',
      'Data'
    );
    $data['pageTitle'] = 'Assessement & Measurement';
    $data['pageIcon'] = 'ion-ios-pencil"';

    //parse data
    $this->varData = array_merge($this->varData, $data);
    $this->template->views('index', $this->varData);
  }

  public function table_pembelian_obat($page = 1)
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      $search = $this->input->post('varsearch');
      $search = parent::_filter_data($search);
      $sortData = $this->input->post('sort');
      $limit = $this->input->post('limit');
      echo $sortData;

      //set custom search
      $customSearch = array(
        // array('name' => 'tanggal', 'value' => date('Y-m-d')),
        // array('name' => 'progres_notequal', 'value' => array('SLS', 'TAD'))
      );
      $search = array_merge($search, $customSearch);

      //get data
      $offset = ($page - 1) * $limit;
      $dataResult = $this->mpo->get_data_pembelian_obat('select', $search, $offset, $limit, $sortData);
      $dataCount = $this->mpo->get_data_pembelian_obat('count', $search);

      // echo json_encode($search);
      //set sorting
      $sort = array();
      $sort['namaunit-sort']  = 'namaunit-asc';
      $sort['namaunit-icon'] =  '&#9661;';
      $sort['tanggal-sort']  = 'tanggal-asc';
      $sort['tanggal-icon'] =  '&#9661;';
      $sort['faktur-sort']  = 'faktur-asc';
      $sort['faktur-icon'] =  '&#9661;';
      switch ($sortData) {
        case '':
        case 'namaunit-asc':
          $sort['namaunit-sort'] = 'namaunit-desc';
          $sort['namaunit-icon'] = '&#9650;';
          break;
        case 'namaunit-desc':
          $sort['namaunit-sort'] = 'namaunit-asc';
          $sort['namaunit-icon'] = '&#9660;';
          break;
        case 'tanggal-asc':
          $sort['tanggal-sort'] = 'tanggal-desc';
          $sort['tanggal-icon'] = '&#9650;';
          break;
        case 'tanggal-desc':
          $sort['tanggal-sort'] = 'tanggal-asc';
          $sort['tanggal-icon'] = '&#9660;';
          break;
        case 'faktur-asc':
          $sort['faktur-sort'] = 'faktur-desc';
          $sort['faktur-icon'] = '&#9650;';
          break;
        case 'faktur-desc':
          $sort['faktur-sort'] = 'faktur-asc';
          $sort['faktur-icon'] = '&#9660;';
          break;
      }

      //config pagination
      $config = parent::_config_pagination();
      $config['base_url'] = 'pembelian_obat/table_pembelian_obat';
      $config['total_rows'] = $dataCount;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);

      $this->varData['pagination'] = $this->pagination->create_links();
      $this->varData['dataResult'] = $dataResult;
      $this->varData['dataCount'] = $dataCount;
      $this->varData['noPage'] = $offset + 1;
      $this->varData['sort'] = $sort;
      $this->varData['sortData'] = $sortData;
      $this->varData['limit'] = $limit;
      $this->load->view('table_pembelian_obat', $this->varData);
      
    }
  }

  // Latihan
  public function table_data_latihan($page = 1)
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      $search = $this->input->post('varsearch');
      $search = parent::_filter_data($search);
      $sortData = $this->input->post('sort');
      $limit = $this->input->post('limit');
      echo $sortData;

      //set custom search
      $customSearch = array(
        // array('name' => 'tanggal', 'value' => date('Y-m-d')),
        // array('name' => 'progres_notequal', 'value' => array('SLS', 'TAD'))
      );
      $search = array_merge($search, $customSearch);

      //get data
      $offset = ($page - 1) * $limit;
      $dataResult = $this->mpo->get_data_latihan('select', $search, $offset, $limit, $sortData);
      $dataCount = $this->mpo->get_data_latihan('count', $search);

      // echo json_encode($search);
      //set sorting
      $sort = array();
      $sort['namaunit-sort']  = 'namaunit-asc';
      $sort['namaunit-icon'] =  '&#9661;';
      $sort['tanggal-sort']  = 'tanggal-asc';
      $sort['tanggal-icon'] =  '&#9661;';
      $sort['faktur-sort']  = 'faktur-asc';
      $sort['faktur-icon'] =  '&#9661;';
      switch ($sortData) {
        case '':
        case 'namaunit-asc':
          $sort['namaunit-sort'] = 'namaunit-desc';
          $sort['namaunit-icon'] = '&#9650;';
          break;
        case 'namaunit-desc':
          $sort['namaunit-sort'] = 'namaunit-asc';
          $sort['namaunit-icon'] = '&#9660;';
          break;
        case 'tanggal-asc':
          $sort['tanggal-sort'] = 'tanggal-desc';
          $sort['tanggal-icon'] = '&#9650;';
          break;
        case 'tanggal-desc':
          $sort['tanggal-sort'] = 'tanggal-asc';
          $sort['tanggal-icon'] = '&#9660;';
          break;
        case 'faktur-asc':
          $sort['faktur-sort'] = 'faktur-desc';
          $sort['faktur-icon'] = '&#9650;';
          break;
        case 'faktur-desc':
          $sort['faktur-sort'] = 'faktur-asc';
          $sort['faktur-icon'] = '&#9660;';
          break;
      }

      //config pagination
      $config = parent::_config_pagination();
      $config['base_url'] = 'ref_assessement/table_data_latihan';
      $config['total_rows'] = $dataCount;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);

      $this->varData['pagination'] = $this->pagination->create_links();
      $this->varData['dataResult'] = $dataResult;
      $this->varData['dataCount'] = $dataCount;
      $this->varData['noPage'] = $offset + 1;
      $this->varData['sort'] = $sort;
      $this->varData['sortData'] = $sortData;
      $this->varData['limit'] = $limit;
      $this->load->view('table_data_latihan', $this->varData);
      
    }
  }



  // History
  public function table_data_history($page = 1)
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      $search = $this->input->post('varsearch');
      $search = parent::_filter_data($search);
      $sortData = $this->input->post('sort');
      $limit = $this->input->post('limit');
      echo $sortData;

      //set custom search
      $customSearch = array(
        // array('name' => 'tanggal', 'value' => date('Y-m-d')),
        // array('name' => 'progres_notequal', 'value' => array('SLS', 'TAD'))
      );
      $search = array_merge($search, $customSearch);

      //get data
      $offset = ($page - 1) * $limit;
      $dataResult = $this->mpo->get_data_history('select', $search, $offset, $limit, $sortData);
      $dataCount = $this->mpo->get_data_history('count', $search);

      // echo json_encode($search);
      //set sorting
      $sort = array();
      $sort['namaunit-sort']  = 'namaunit-asc';
      $sort['namaunit-icon'] =  '&#9661;';
      $sort['tanggal-sort']  = 'tanggal-asc';
      $sort['tanggal-icon'] =  '&#9661;';
      $sort['faktur-sort']  = 'faktur-asc';
      $sort['faktur-icon'] =  '&#9661;';
      switch ($sortData) {
        case '':
        case 'namaunit-asc':
          $sort['namaunit-sort'] = 'namaunit-desc';
          $sort['namaunit-icon'] = '&#9650;';
          break;
        case 'namaunit-desc':
          $sort['namaunit-sort'] = 'namaunit-asc';
          $sort['namaunit-icon'] = '&#9660;';
          break;
        case 'tanggal-asc':
          $sort['tanggal-sort'] = 'tanggal-desc';
          $sort['tanggal-icon'] = '&#9650;';
          break;
        case 'tanggal-desc':
          $sort['tanggal-sort'] = 'tanggal-asc';
          $sort['tanggal-icon'] = '&#9660;';
          break;
        case 'faktur-asc':
          $sort['faktur-sort'] = 'faktur-desc';
          $sort['faktur-icon'] = '&#9650;';
          break;
        case 'faktur-desc':
          $sort['faktur-sort'] = 'faktur-asc';
          $sort['faktur-icon'] = '&#9660;';
          break;
      }

      //config pagination
      $config = parent::_config_pagination();
      $config['base_url'] = 'ref_assessement/table_data_history';
      $config['total_rows'] = $dataCount;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);

      $this->varData['pagination'] = $this->pagination->create_links();
      $this->varData['dataResult'] = $dataResult;
      $this->varData['dataCount'] = $dataCount;
      $this->varData['noPage'] = $offset + 1;
      $this->varData['sort'] = $sort;
      $this->varData['sortData'] = $sortData;
      $this->varData['limit'] = $limit;
      $this->load->view('table_data_history', $this->varData);
      
    }
  }


  // Yoga
  public function table_data_yoga($page = 1)
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      $search = $this->input->post('varsearch');
      $search = parent::_filter_data($search);
      $sortData = $this->input->post('sort');
      $limit = $this->input->post('limit');
      echo $sortData;

      //set custom search
      $customSearch = array(
        // array('name' => 'tanggal', 'value' => date('Y-m-d')),
        // array('name' => 'progres_notequal', 'value' => array('SLS', 'TAD'))
      );
      $search = array_merge($search, $customSearch);

      //get data
      $offset = ($page - 1) * $limit;
      $dataResult = $this->mpo->get_data_yoga('select', $search, $offset, $limit, $sortData);
      $dataCount = $this->mpo->get_data_yoga('count', $search);

      // echo json_encode($search);
      //set sorting
      $sort = array();
      $sort['namaunit-sort']  = 'namaunit-asc';
      $sort['namaunit-icon'] =  '&#9661;';
      $sort['tanggal-sort']  = 'tanggal-asc';
      $sort['tanggal-icon'] =  '&#9661;';
      $sort['faktur-sort']  = 'faktur-asc';
      $sort['faktur-icon'] =  '&#9661;';
      switch ($sortData) {
        case '':
        case 'namaunit-asc':
          $sort['namaunit-sort'] = 'namaunit-desc';
          $sort['namaunit-icon'] = '&#9650;';
          break;
        case 'namaunit-desc':
          $sort['namaunit-sort'] = 'namaunit-asc';
          $sort['namaunit-icon'] = '&#9660;';
          break;
        case 'tanggal-asc':
          $sort['tanggal-sort'] = 'tanggal-desc';
          $sort['tanggal-icon'] = '&#9650;';
          break;
        case 'tanggal-desc':
          $sort['tanggal-sort'] = 'tanggal-asc';
          $sort['tanggal-icon'] = '&#9660;';
          break;
        case 'faktur-asc':
          $sort['faktur-sort'] = 'faktur-desc';
          $sort['faktur-icon'] = '&#9650;';
          break;
        case 'faktur-desc':
          $sort['faktur-sort'] = 'faktur-asc';
          $sort['faktur-icon'] = '&#9660;';
          break;
      }

      //config pagination
      $config = parent::_config_pagination();
      $config['base_url'] = 'ref_assessement/table_data_yoga';
      $config['total_rows'] = $dataCount;
      $config['per_page'] = $limit;
      $this->pagination->initialize($config);

      $this->varData['pagination'] = $this->pagination->create_links();
      $this->varData['dataResult'] = $dataResult;
      $this->varData['dataCount'] = $dataCount;
      $this->varData['noPage'] = $offset + 1;
      $this->varData['sort'] = $sort;
      $this->varData['sortData'] = $sortData;
      $this->varData['limit'] = $limit;
      $this->load->view('table_data_yoga', $this->varData);
      
    }
  }

  public function assessement()
  {
    $this->varData['pageTitle'] = 'Tambah Assessement & Measurement';
    $this->varData['pageIcon'] = 'ion-gear-a';
    $this->varData['menuBreadcrumb'] = array(
      'Penerimaan Obat',
      'Data Assessement',
      'Tambah'
    );
    $this->template->views('assessement', $this->varData);
  }

  public function detail_yoga()
  {
    $this->varData['pageTitle'] = 'Detail Data Yoga';
    $this->varData['pageIcon'] = 'ion-gear-a';
    $this->varData['menuBreadcrumb'] = array(
      'Assessement and Measurement',
      'Data Yoga',
      'Detail'
    );
    $data = $this->mpo->get_data_tipe_pasien();
    $id = $this->uri->segment(3);
    $data_pembelian_obat = $this->db->query('select * 
    from trx_pembelian_obat 
    left join tbl_vendor on vendor_id = pembelianobat_vendor_id
    where pembelianobat_id = ?',array($id));
    $data_obat = $this->mpo->get_data_obat($id);

    $this->varData['harga'] = $data;
    $this->varData['pembelian_obat'] = $data_pembelian_obat->result();
    $this->varData['data_obat'] = $data_obat;

    $this->template->views('detail_yoga', $this->varData);
  }

  public function delete()
  {
    $kode = $this->input->post('kode');
    $datapembelian = $this->mpo->get_pembelian($kode);
    $updateStock = true;
    $rsMessage = '';
    $rsStatus = 'error';
   
    foreach ($datapembelian as $k=>$v) {
      $stock = $this->mpo->getStok($v->pembelianobtdet_batch, $v->pembelianobat_vendor_id);
      
      
      if (count($stock) > 0) {
        $resultstok = $stock[0];
        $total = (float)$resultstok->stock_jumlah - (float)$v->pembelianobtdet_jumlah;
       
        if(empty($total)){
          $updateStock = $updateStock && $this->mpo->update_stock_zero($resultstok->stock_id, $total);
        }else{
          $updateStock = $updateStock && $this->mpo->update_stock($resultstok->stock_id, $total);
        }
      }
    }
    if($updateStock){
      $delete = $this->mpo->delete_data($kode);
      if ($delete) {
        $rsStatus = 'success';
        $rsMessage = 'Data berhasil dihapus';
      } else {
        $rsMessage = $delete;
      }
    }else{
      $rsMessage = $updateStock;
    }
    

    
    
    // Return json
    die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
  }





  // Function Yang tidak digunakan

  public function check_obat()
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      if ($this->input->server('REQUEST_METHOD') == 'POST') {
        //get data
        $data = $this->input->post();

        $rsStatus = 'error';
        $check = $this->mpo->checkStokJumlah($data['id'],$data['jumlah']);
        if (!empty($check)) {
          $rsStatus = 'success';
          $rsMessage = 'Data berhasil dihapus';
        } else{
          $rsMessage = 'Data tidak bisa dihapus, karena sudah digunakan pada transaksi Farmasi!';
        }
        // Return json
        die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
      }
    }
  }

  public function form()
  {
    $this->varData['pageTitle'] = 'Tambah Penerimaan Obat';
    $this->varData['pageIcon'] = 'ion-gear-a';
    $this->varData['menuBreadcrumb'] = array(
      'Penerimaan Obat',
      'Data Obat',
      'Tambah'
    );
    $data = $this->mpo->get_data_tipe_pasien();
    $vendor = $this->mpo->get_vendor();
    $this->varData['harga'] = $data;
    $this->varData['vendor'] = $vendor;
    $this->template->views('form', $this->varData);
  }

  public function save()
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      if ($this->input->server('REQUEST_METHOD') == 'POST') {
        //get data
        $this->db->trans_begin();
        $var1 = $this->input->post('input');
        $var2 = $this->input->post('obat');
        if(!empty($var2)){
          $input['input'] = parent::_filter_data($var1);
          $input['obat'] = parent::_filter_data($var2);



          $tgl_masuk = $input['input']['tanggal'];

          $no = 0;
          $saveData = true;
          foreach ($input['obat']['harga_satuan'] as $expdate) {
            if (empty($expdate) && $input['input']['tipe'] != "penerimaan") {
              $saveData = $saveData && false;
            }
          }
          foreach ($input['obat']['total_jumlah_obat'] as $expdate) {
            if (empty($expdate)) {
              $saveData = $saveData && false;
            }
          }
          $input['input']['totalHNA'] = 0;
          $i = 0;
          foreach ($input['obat']['total_hna'] as $hna) {

            $input['input']['totalHNA'] = $input['input']['totalHNA'] + $hna;
            $i++;
          }

          $input['input']['hnaPPN'] = 0;
          $i = 0;
          foreach ($input['obat']['total_hna_ppn'] as $hna) {
            $input['input']['hnaPPN'] = $input['input']['hnaPPN'] + $hna;
            $input['input']['ppnPercent'] = $input['obat']['ppn'][$i];
            $i++;
          }

          $input['input']['ppnNominal'] =  $input['input']['hnaPPN'] - $input['input']['totalHNA'];
          //check faktur nomor faktur 
          $checkFaktur = $this->mpo->checkNomorFaktur($input['input']['faktur']);
          if (!empty($checkFaktur)) {
            $saveData = false;
            $rsMessage = 'Data dengan Nomor Faktur "' . $input['input']['faktur'] . '" sudah digunakan!';
            $rsStatus = 'error';
          } else {
            $tbl_pembelian_obat_kode = $this->mpo->save_vendor($input);
            foreach ($input['obat']['expdate'] as $expdate) {
              if (empty($expdate)) {
                $saveData = $saveData && false;
              }
            }
            foreach ($input['obat']['batch'] as $batch) {
              // $cekBatch = $this->mpo->cekBatch($batch, $input['input']['nama_vendor']);
              // if ($cekBatch > 0) {
              //   $saveData = $this->mpo->save_pembelian($input, $no, $type = 'update', $tbl_pembelian_obat_kode, $tgl_masuk);
              // } else {

              // }
              if (empty($batch)) {
                $saveData = $saveData && false;
              } else {
                $saveData = $saveData && $this->mpo->save_pembelian($input, $no, $tbl_pembelian_obat_kode, $tgl_masuk);
              }
              $no++;
            }

            $rsMessage = 'Kode Batch, Expired Date, Jumlah, dan Harga Satuan Harus diisi!';
            $rsStatus = 'error';
          }

          if ($saveData) {
            $rsStatus = 'success';
            $rsMessage = 'Data berhasil ditambahkan';
            $this->db->trans_commit();
          } else {

            if (!empty($saveData)) {
              $rsMessage = $saveData;
            }
            $this->db->trans_rollback();
          }
        }else{
          $rsMessage = 'Data obat tidak boleh kosong!';
          $rsStatus = 'error';
        }

        
        // Return json
        die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
      }
    }
  }

  public function save_update()
  {
    if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed.');
    } else {
      if ($this->input->server('REQUEST_METHOD') == 'POST') {
        //get data
        $this->db->trans_begin();
        $var1 = $this->input->post('input');
        $var2 = $this->input->post('obat');
        if (!empty($var2)) {
          $input['input'] = parent::_filter_data($var1);
          $input['obat'] = parent::_filter_data($var2);
          $saveData = true;

          $tgl_masuk = $input['input']['tanggal'];

          $no = 0;

          foreach ($input['obat']['harga_satuan'] as $expdate) {
            if (empty($expdate) && $input['input']['tipe'] != "penerimaan") {
              $saveData = $saveData && false;
            }
          }
          foreach ($input['obat']['total_jumlah_obat'] as $expdate) {
            if (empty($expdate)) {
              $saveData = $saveData && false;
            }
          }
          $input['input']['totalHNA'] = 0;
          $i = 0;
          foreach ($input['obat']['total_hna'] as $hna) {

            $input['input']['totalHNA'] = $input['input']['totalHNA'] + $hna;
            $i++;
          }

          $input['input']['hnaPPN'] = 0;
          $i = 0;
          foreach ($input['obat']['total_hna_ppn'] as $hna) {
            $input['input']['hnaPPN'] = $input['input']['hnaPPN'] + $hna;
            $input['input']['ppnPercent'] = $input['obat']['ppn'][$i];
            $i++;
          }
          $input['input']['ppnNominal'] =  $input['input']['hnaPPN'] - $input['input']['totalHNA'];
          //check faktur nomor faktur 
          $checkFaktur = $this->mpo->checkNomorFakturEdit($input['input']['faktur'], $input['input']['id']);
          if (!empty($checkFaktur)) {
            $saveData = false;
            $rsMessage = 'Data dengan Nomor Faktur "' . $input['input']['faktur'] . '" sudah digunakan!';
            $rsStatus = 'error';
          } else {
            $tbl_pembelian_obat_kode = $this->mpo->update_vendor($input, $input['input']['id']);
            foreach ($input['obat']['total_jumlah_obat'] as $expdate) {
              if (empty($expdate)) {
                $saveData = $saveData && false;
              }
            }
            foreach ($input['obat']['expdate'] as $expdate) {
              if (empty($expdate)) {
                $saveData = $saveData && false;
              }
            }

            //pertama ambil data sebelumnya
            $getDetailPembelian = $this->mpo->getDetailPembelian($input['input']['id']);
            // proses kurangi data yang ada di trx_stock
            if (!empty($getDetailPembelian)) {
              foreach ($getDetailPembelian as $key => $val) {
                //get stock by obat id, kode batch, harga satuan
                $dataStock = $this->mpo->getStock($val->pembelianobtdet_obat_id, $val->pembelianobtdet_batch, $val->pembelianobtdet_harga_satuan);
                if (!empty($dataStock)) {
                  //terus stock dikurang dengann data pembelian tadi
                  $jumlahStock = $dataStock->stock_jumlah - $val->pembelianobtdet_jumlah;
                  //update stock
                  $saveData = $saveData && $this->mpo->updateStock($dataStock->stock_id, $jumlahStock);
                }
              }
            }
            // delete detail pembelian
            if (!empty($getDetailPembelian)) {
              $saveData = $saveData && $this->mpo->deleteDetailPembelian($input['input']['id']);
            }
            // input data ulang
            foreach ($input['obat']['batch'] as $batch) {
              if (empty($batch)) {
                $saveData = $saveData && false;
              } else {
                $saveData = $saveData && $this->mpo->update_pembelian_data($input, $no, $input['input']['id'], $tgl_masuk);
              }
              $no++;
            }



            $rsMessage = 'Kode Batch, Expired Date, Jumlah, dan Harga Satuan Harus diisi!';
            $rsStatus = 'error';
          }

          if ($saveData) {
            $rsStatus = 'success';
            $rsMessage = 'Data berhasil ditambahkan';
            $this->db->trans_commit();
          } else {

            if (!empty($saveData)) {
              $rsMessage = $saveData;
            }
            $this->db->trans_rollback();
          }
        }else{
          $rsMessage = 'Data obat tidak boleh kosong!';
          $rsStatus = 'error';
        }
        // echo json_encode($var2);

        
        // Return json
        die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
      }
    }
  }

  public function save_vendor(){
    $name = $this->input->post('name');
    $phone = $this->input->post('phone');
    $address = $this->input->post('address');
    $rsMessage = '';
    $rsStatus = 'error';
    $params = array(
      'vendor_name'=>$name,
      'vendor_address'=> $address,
      'vendor_phone' => $phone,
    );
    $insert = $this->mpo->insert_vendor($params);
    if ($insert) {
      $rsStatus = 'success';
      $rsMessage = 'Data berhasil ditambah';
    } else {
      $rsMessage = $insert;
    }
    header('Content-Type: application/json');
    // Return json
    die(json_encode(array('status' => $rsStatus, 'message' => $rsMessage)));
  }

  public function get_data_obat()
  {
    if ($this->input->post()) {
      $var = $this->input->post();
      // echo json_encode($var);
      $dataObat = $this->mpo->get_obat_by($var);
      $countObat = $this->mpo->count_obat_by($var);
      //build data
      $temp = $results = array();
      $a = 0;
      foreach ($dataObat as $dO) {
        $results[$a]['id'] = $dO->obat_id;
        $results[$a]['kode'] = $dO->obat_kode;
        $txt = $dO->obat_name;
        $results[$a]['harga'] = empty($dO->obat_price) ? 0 : round($dO->obat_price);
        $results[$a]['satuan'] = $dO->satuanobat_satuan;
        $results[$a++]['text'] = $txt;
      }
      $temp['results'] = $results;
      $temp['total_data'] = $countObat;
      //parse data
      echo json_encode($temp);
    }
  }

  public function get_data_vendor()
  {
    if ($this->input->post()) {
      $var = $this->input->post();
      // echo json_encode($var);
      $dataObat = $this->mpo->get_vendor_by($var);
      $countObat = $this->mpo->count_vendor_by($var);
      //build data
      $temp = $results = array();
      $a = 0;
      foreach ($dataObat as $dO) {
        $results[$a]['id'] = $dO->vendor_id;
        $txt = $dO->vendor_name;
        $results[$a++]['text'] = $txt;
      }
      $temp['results'] = $results;
      $temp['total_data'] = $countObat;
      //parse data
      echo json_encode($temp);
    }
  }

  public function get_data_tipe_pasien()
  {
    $data = $this->mpo->get_data_tipe_pasien();
    echo json_encode($data);
  }

  public function edit()
  {
    $this->varData['pageTitle'] = 'Edit Penerimaan Obat';
    $this->varData['pageIcon'] = 'ion-gear-a';
    $this->varData['menuBreadcrumb'] = array(
      'Penerimaan Obat',
      'Data Obat',
      'Edit'
    );
    $data = $this->mpo->get_data_tipe_pasien();
    $id = $this->uri->segment(3);
    $data_pembelian_obat = $this->db->query('select * 
    from trx_pembelian_obat 
    left join tbl_vendor on vendor_id = pembelianobat_vendor_id
    where pembelianobat_id = ?', array($id));
    $data_obat = $this->mpo->get_data_obat($id);
    
    $this->varData['harga'] = $data;
    $this->varData['pembelian_obat'] = $data_pembelian_obat->result();
    $this->varData['data_obat'] = $data_obat;

    $this->template->views('edit', $this->varData);
  }

  public function detail()
  {
    $this->varData['pageTitle'] = 'Detail Penerimaan Obat';
    $this->varData['pageIcon'] = 'ion-gear-a';
    $this->varData['menuBreadcrumb'] = array(
      'Penerimaan Obat',
      'Data Obat',
      'Detail'
    );
    $data = $this->mpo->get_data_tipe_pasien();
    $id = $this->uri->segment(3);
    $data_pembelian_obat = $this->db->query('select * 
    from trx_pembelian_obat 
    left join tbl_vendor on vendor_id = pembelianobat_vendor_id
    where pembelianobat_id = ?',array($id));
    $data_obat = $this->mpo->get_data_obat($id);

    $this->varData['harga'] = $data;
    $this->varData['pembelian_obat'] = $data_pembelian_obat->result();
    $this->varData['data_obat'] = $data_obat;

    $this->template->views('detail', $this->varData);
  }
}


