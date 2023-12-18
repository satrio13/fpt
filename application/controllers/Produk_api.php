<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk_api extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{	
		$data['title'] = 'Master Produk';
        
        $url = api_url()."list-kategori";
        $output = call_api_get($url);
        $kategori = json_decode($output);

        $url = api_url()."list-status";
        $output = call_api_get($url);
        $status = json_decode($output);
        
		$data['kategori'] = $kategori->data;
		$data['status'] = $status->data;
		//layout
		$this->load->view('template/head');
		$this->load->view('template/topbar');
		$this->load->view('produk_fe/index', $data);
		$this->load->view('template/js');
		$this->load->view('produk_fe/script');
    }

    function get_data_produk()
	{
        $page = $_POST['start'] / $_POST['length'] + 1;
		$limit = $_POST['length'];
		$search = $_POST['search']['value'];
		if(!empty($search))
		{
			$url = api_url()."list-produk?page=$page&limit=$limit&search=$search";
		}else
		{
			$url = api_url()."list-produk?page=$page&limit=$limit";
		}

		$output = call_api_get($url);
		$dt = json_decode($output);

		$list = $dt->data;
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
			"recordsTotal" => $dt->totalRecords,
			"recordsFiltered" => $dt->totalRecords,
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    }

    function tambah_produk()
	{ 
		$url = api_url().'tambah-produk';
		$nama_produk = $this->input->post('nama_produk', true);
		$harga = $this->input->post('harga', true);
		$kategori_id = $this->input->post('kategori_id', true);
		$status_id = $this->input->post('status_id', true);

		$this->_validate($kategori_id, $status_id);  

		$param = '{ "nama_produk":"'.$nama_produk.'", "harga":"'.$harga.'", "kategori_id":"'.$kategori_id.'", "status_id":"'.$status_id.'" }';
		
		$output = call_api_post($url, $param);
		echo $output;	
    }

    function get_produk_by_id($id_produk)
	{
		$url = api_url()."get_produk_by_id/$id_produk";
		$output = call_api_get($url);
		echo $output;
	}

    function edit_produk()
	{ 
		$id_produk = $this->input->post('id_produk', true);
		$nama_produk = $this->input->post('nama_produk', true);
		$harga = $this->input->post('harga', true);
		$kategori_id = $this->input->post('kategori_id', true);
		$status_id = $this->input->post('status_id', true);
        $url = api_url()."edit-produk/$id_produk";

		$this->_validate($kategori_id, $status_id);

		$param = '{ "id_produk":"'.$id_produk.'", "nama_produk":"'.$nama_produk.'", "harga":"'.$harga.'", "kategori_id":"'.$kategori_id.'", "status_id":"'.$status_id.'" }';
		
		$output = call_api_put($url, $param);
		echo $output;	
    }

    function hapus_produk($id_produk)
	{ 
		$url = api_url()."hapus-produk/$id_produk";
		$output = call_api_delete($url);
		echo $output;
    }

    private function _validate($kategori_id, $status_id)
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$cek_kategori = $this->cek_kategori($kategori_id);
		$cek_status = $this->cek_status($status_id);

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
			$data['error_string'][] = 'Status tidak terdaftar';
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
		$this->load->view('produk_fe/bisa_dijual', $data);
		$this->load->view('template/js');
		$this->load->view('produk_fe/script');
	}

	function get_data_produk_bisa_dijual()
	{
		$page = $_POST['start'] / $_POST['length'] + 1;
		$limit = $_POST['length'];
		$search = $_POST['search']['value'];
		if(!empty($search))
		{
			$url = api_url()."list-produk-bisa-dijual?page=$page&limit=$limit&search=$search";
		}else
		{
			$url = api_url()."list-produk-bisa-dijual?page=$page&limit=$limit";
		}

		$output = call_api_get($url);
		$dt = json_decode($output);

		$list = $dt->data;
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
			"recordsTotal" => $dt->totalRecords,
			"recordsFiltered" => $dt->totalRecords,
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    } 

	function cek_kategori($kategori_id = '')
    {
		$url = api_url()."get_kategori_by_id/$kategori_id";
		$output = call_api_get($url);
		$dt = json_decode($output);

		if($dt->status == true)
        {
			return FALSE;
        }else
        {
			return TRUE;
		}
	}

	function cek_status($status_id = '')
    {
		$url = api_url()."get_status_by_id/$status_id";
		$output = call_api_get($url);
		$dt = json_decode($output);

		if($dt->status == true)
        {
			return FALSE;
        }else
        {
			return TRUE;
		}
	}

}