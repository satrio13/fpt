<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('produk_model','produk_bisa_dijual_model'));
	}

	function index()
	{	
		/*
		$data = '[
					{
						"id_produk": "6",
						"nama_produk": "ALCOHOL GEL POLISH CLEANSER GP-CLN01",
						"kategori_id": "1",
						"harga": "12500",
						"status_id": "1"
					},
					{
						"id_produk": "9",
						"nama_produk": "ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM",
						"kategori_id": "2",
						"harga": "1000",
						"status_id": "1"
					},
					{
						"id_produk": "11",
						"nama_produk": "ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM",
						"kategori_id": "2",
						"harga": "1000",
						"status_id": "1"
					},
					{
						"id_produk": "12",
						"nama_produk": "ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM",
						"kategori_id": "2",
						"harga": "12500",
						"status_id": "2"
					},
					{
						"id_produk": "15",
						"nama_produk": "ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM",
						"kategori_id": "2",
						"harga": "12500",
						"status_id": "1"
					},
					{
						"id_produk": "17",
						"nama_produk": "ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM",
						"kategori_id": "2",
						"harga": "1000",
						"status_id": "1"
					},
					{
						"id_produk": "18",
						"nama_produk": "ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM",
						"kategori_id": "2",
						"harga": "13000",
						"status_id": "2"
					},
					{
						"id_produk": "19",
						"nama_produk": "ALUMUNIUM FOIL PET SHEET 250mm IM",
						"kategori_id": "2",
						"harga": "1000",
						"status_id": "2"
					},
					{
						"id_produk": "22",
						"nama_produk": "ARM PENDEK MODEL U",
						"kategori_id": "2",
						"harga": "13000",
						"status_id": "1"
					},
					{
						"id_produk": "23",
						"nama_produk": "ARM SUPPORT KECIL",
						"kategori_id": "3",
						"harga": "13000",
						"status_id": "2"
					},
					{
						"id_produk": "24",
						"nama_produk": "ARM SUPPORT KOTAK PUTIH",
						"kategori_id": "2",
						"harga": "13000",
						"status_id": "2"
					},
					{
						"id_produk": "26",
						"nama_produk": "ARM SUPPORT PENDEK POLOS",
						"kategori_id": "3",
						"harga": "13000",
						"status_id": "1"
					},
					{
						"id_produk": "27",
						"nama_produk": "ARM SUPPORT S IM",
						"kategori_id": "2",
						"harga": "1000",
						"status_id": "2"
					},
					{
						"id_produk": "28",
						"nama_produk": "ARM SUPPORT T (IMPORT)",
						"kategori_id": "2",
						"harga": "13000",
						"status_id": "1"
					},
					{
						"id_produk": "29",
						"nama_produk": "ARM SUPPORT T - MODEL 1 ( LOKAL )",
						"kategori_id": "3",
						"harga": "10000",
						"status_id": "1"
					},
					{
						"id_produk": "50",
						"nama_produk": "BLACK LASER TONER FP-T3 (100gr)",
						"kategori_id": "2",
						"harga": "13000",
						"status_id": "2"
					},
					{
						"id_produk": "56",
						"nama_produk": "BODY PRINTER CANON IP2770",
						"kategori_id": "4",
						"harga": "500",
						"status_id": "1"
					},
					{
						"id_produk": "58",
						"nama_produk": "BODY PRINTER T13X",
						"kategori_id": "4",
						"harga": "15000",
						"status_id": "1"
					},
					{
						"id_produk": "59",
						"nama_produk": "BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)",
						"kategori_id": "5",
						"harga": "10000",
						"status_id": "1"
					},
					{
						"id_produk": "60",
						"nama_produk": "BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)",
						"kategori_id": "5",
						"harga": "10000",
						"status_id": "2"
					},
					{
						"id_produk": "61",
						"nama_produk": "BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)",
						"kategori_id": "5",
						"harga": "1500",
						"status_id": "1"
					},
					{
						"id_produk": "62",
						"nama_produk": "BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM",
						"kategori_id": "5",
						"harga": "1500",
						"status_id": "2"
					},
					{
						"id_produk": "63",
						"nama_produk": "BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM",
						"kategori_id": "5",
						"harga": "1500",
						"status_id": "2"
					},
					{
						"id_produk": "64",
						"nama_produk": "BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)",
						"kategori_id": "5",
						"harga": "1000",
						"status_id": "1"
					},
					{
						"id_produk": "65",
						"nama_produk": "BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)",
						"kategori_id": "5",
						"harga": "1500",
						"status_id": "2"
					},
					{
						"id_produk": "66",
						"nama_produk": "BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)",
						"kategori_id": "5",
						"harga": "1500",
						"status_id": "1"
					},
					{
						"id_produk": "67",
						"nama_produk": "BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)",
						"kategori_id": "5",
						"harga": "1000",
						"status_id": "2"
					},
					{
						"id_produk": "68",
						"nama_produk": "BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)",
						"kategori_id": "5",
						"harga": "1500",
						"status_id": "2"
					},
					{
						"id_produk": "70",
						"nama_produk": "BOTOL KOTAK 100ML LK",
						"kategori_id": "6",
						"harga": "1000",
						"status_id": "1"
					},
					{
						"id_produk": "72",
						"nama_produk": "BOTOL 10ML IM",
						"kategori_id": "7",
						"harga": "1000",
						"status_id": "2"
					}
				]';
		
		$data_array = json_decode($data, true);
		$this->db->insert_batch('tb_produk', $data_array);
		*/
		$data['title'] = 'Master Produk';
		$data['kategori'] = $this->db->select('*')->from('tb_kategori')->order_by('nama_kategori','asc')->get()->result();
		$data['status'] = $this->db->select('*')->from('tb_status')->order_by('id_status','asc')->get()->result();
		//layout
		$this->load->view('template/head');
		$this->load->view('template/topbar');
		$this->load->view('produk/index', $data);
		$this->load->view('template/js');
		$this->load->view('produk/script');
    }

	function get_data_produk()
	{
		$list = $this->produk_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $r)
		{	
			if($r->status_id == 1)
			{
				$status = '<span class="badge badge-success">Bisa Dijual</span>';
			}else
			{
				$status = '<span class="badge badge-danger">Tidak Bisa Dijual</span>';
			}

			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
            $row[] = $r->nama_produk;
           	$row[] = '<div class="text-right">'.number_format($r->harga, 0, ',', '.').'</div>';
			$row[] = $r->nama_kategori;
			$row[] = '<div class="text-center">'.$status.'</div>';
			$action = '<div class="text-center">
						<a href="javascript:void(0)" class="btn btn-info btn-xs" title="EDIT DATA" onclick="edit_produk('.$r->id_produk.')"><i class="fa fa-edit"></i> EDIT</a>
						<a href="javascript:void(0)" class="btn btn-danger btn-xs" title="HAPUS DATA" onclick="delete_produk('.$r->id_produk.')"><i class="fa fa-trash"></i> HAPUS</a>
                    </div>';
			$row[] = $action;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->produk_model->count_all(),
			"recordsFiltered" => $this->produk_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    } 

	function tambah_produk()
	{ 
		$kategori_id = $this->input->post('kategori_id',TRUE); 
		$status_id = $this->input->post('status_id',TRUE); 
		$this->_validate($kategori_id, $status_id);  
        $q = $this->produk_model->tambah_produk();
        echo json_encode($q);	
    }

	function get_produk_by_id($id_produk)
	{ 
        $data = $this->produk_model->get_produk_by_id($id_produk);
        echo json_encode($data);
    }

    function edit_produk()
	{ 
		$id_produk = $this->input->post('id_produk',TRUE);
		$kategori_id = $this->input->post('kategori_id',TRUE); 
		$status_id = $this->input->post('status_id',TRUE); 
		$this->_validate($kategori_id, $status_id); 
		$q = $this->produk_model->edit_produk($id_produk);
		echo json_encode($q);	
    }

	function hapus_produk($id_produk)
	{ 
        $cek = $this->produk_model->cek_produk($id_produk);
        if(!$cek)
        {
            show_404();
        }else
        {
            $q = $this->produk_model->hapus_produk($id_produk);
            echo json_encode($q);   
        }  
    }

	private function _validate($kategori_id, $status_id)
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$cek_kategori = $this->db->get_where('tb_kategori', ['id_kategori' => $kategori_id])->row();
		$cek_status = $this->db->get_where('tb_status', ['id_status' => $status_id])->row();
		if($this->input->post('nama_produk') == '')
		{
			$data['inputerror'][] = 'nama_produk';
			$data['error_string'][] = 'Nama Produk wajib diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('harga') == '')
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Harga wajib diisi';
			$data['status'] = FALSE;
		}elseif(!is_numeric($this->input->post('harga')))
		{
			$data['inputerror'][] = 'harga';
			$data['error_string'][] = 'Masukan angka';
			$data['status'] = FALSE;
		}
		
		if($this->input->post('') == 'kategori_id')
		{
			$data['inputerror'][] = 'kategori_id';
			$data['error_string'][] = 'Kategori wajib diisi';
			$data['status'] = FALSE;
		}elseif(!$cek_kategori)
		{
			$data['inputerror'][] = 'kategori_id';
			$data['error_string'][] = 'Kategori tidak terdaftar';
			$data['status'] = FALSE;
		}

		if($this->input->post('') == 'status_id')
		{
			$data['inputerror'][] = 'status_id';
			$data['error_string'][] = 'Status wajib diisi';
			$data['status'] = FALSE;
		}elseif(!$cek_status)
		{
			$data['inputerror'][] = 'status_id';
			$data['error_string'][] = 'Status wajib diisi';
			$data['status'] = FALSE;
		}
		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	
	function bisa_dijual()
	{
		$data['title'] = 'Produk Bisa Dijual';
		//layout
		$this->load->view('template/head');
		$this->load->view('template/topbar');
		$this->load->view('produk/bisa_dijual', $data);
		$this->load->view('template/js');
		$this->load->view('produk/script');
	}

	function get_data_produk_bisa_dijual()
	{
		$list = $this->produk_bisa_dijual_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $r)
		{	
			if($r->status_id == 1)
			{
				$status = '<span class="badge badge-success">Bisa Dijual</span>';
			}else
			{
				$status = '<span class="badge badge-danger">Tidak Bisa Dijual</span>';
			}

			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
            $row[] = $r->nama_produk;
           	$row[] = '<div class="text-right">'.number_format($r->harga, 0, ',', '.').'</div>';
			$row[] = $r->nama_kategori;
			$row[] = '<div class="text-center">'.$status.'</div>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->produk_bisa_dijual_model->count_all(),
			"recordsFiltered" => $this->produk_bisa_dijual_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    } 

}