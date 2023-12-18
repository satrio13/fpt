<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'core/REST_Controller.php';
class Produk extends REST_Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    function list_produk()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $limit = $this->input->get('limit') ? $this->input->get('limit') : 10;
        $search = $this->input->get('search');
        
        $offset = ($page - 1) * $limit;
        
        $this->db->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->join('tb_status s','p.status_id=s.id_status');
        if($search)
        {
            $this->db->like('p.nama_produk', $search)->or_like('p.harga', $search)->or_like('k.nama_kategori', $search)->or_like('s.nama_status', $search);
        }

        $totalRecords = $this->db->count_all_results(); // Menghitung total jumlah data (tanpa memperhitungkan pagination)

        $this->db->select('p.*,k.*,s.*')->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->join('tb_status s','p.status_id=s.id_status')->order_by('p.id_produk','desc')->limit($limit, $offset);
        
        if($search)
        {
            $this->db->like('p.nama_produk', $search)->or_like('p.harga', $search)->or_like('k.nama_kategori', $search)->or_like('s.nama_status', $search);
        }
        
        $q = $this->db->get();
        return $this->response(['data' => $q->result(), 'totalRecords' => $totalRecords]);
    }

    function listproduk()
    {
        $q = $this->db->select('p.*,k.*,s.*')->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->join('tb_status s','p.status_id=s.id_status')->order_by('p.id_produk','desc')->get();
        return $this->response(['data' => $q->result(), 'totalRecords' => $q->num_rows()]);
    }

    function list_kategori()
    {
        $q = $this->db->select('*')->from('tb_kategori')->order_by('nama_kategori','asc')->get();
        return $this->response(['data' => $q->result(), 'totalRecords' => $q->num_rows()]);
    }

    function list_status()
    {
        $q = $this->db->select('*')->from('tb_status')->order_by('id_status','asc')->get();
        return $this->response(['data' => $q->result(), 'totalRecords' => $q->num_rows()]);
    }

    function tambah_produk()
    {
        $param = json_decode(file_get_contents('php://input'), true);
		if(!isset($param))
        {
			echo "REQUEST NOT ALLOWED";	
		}else
        {
            $this->form_validation->set_data($param);
            $this->form_validation->set_rules('nama_produk', 'Nama Barang', 'required|max_length[100]');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|numeric|callback_cek_kategori_id['.$param['kategori_id'].']');
            $this->form_validation->set_rules('status_id', 'Status', 'required|numeric|callback_cek_status_id['.$param['status_id'].']');
            if($this->form_validation->run() == false)
            {
                $message = $this->form_validation->error_array();
                return $this->response(['status' => false, 'message' => $message], 400);
            }else
            {
                $data = [
                    'nama_produk' => $param['nama_produk'],
                    'harga' => $param['harga'],
                    'kategori_id' => $param['kategori_id'],
                    'status_id' => $param['status_id']           
                ];

                $this->db->insert('tb_produk', $data);
                if($this->db->affected_rows() > 0)
                {
                    return $this->response(['status' => true, 'message' => 'Data Berhasil Disimpan']);
                }else
                {
                    return $this->response(['status' => false, 'message' => 'Data Gagal Disimpan!'], 400);
                }
            }
        }
    }

    function get_produk_by_id($id_produk)
	{
		$q = $this->db->get_where('tb_produk', ['id_produk'=>$id_produk])->row();
        if($q)
        {
            return $this->response($q);
        }else
        {
            return $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 204);
        }
	}

    function edit_produk($id_produk)
    {
        $param = json_decode(file_get_contents('php://input'), true);
		if(!isset($param))
        {
			echo "REQUEST NOT ALLOWED";	
		}else
        {
            $this->form_validation->set_data($param);
            $this->form_validation->set_rules('nama_produk', 'Nama Barang', 'required|max_length[100]');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
            $this->form_validation->set_rules('kategori_id', 'Kategori', 'required|numeric|callback_cek_kategori_id['.$param['kategori_id'].']');
            $this->form_validation->set_rules('status_id', 'Status', 'required|numeric|callback_cek_status_id['.$param['status_id'].']');
            if($this->form_validation->run() == false)
            {
                $message = $this->form_validation->error_array();
                return $this->response(['status' => false, 'message' => $message], 400);
            }else
            {
                $data = [
                    'nama_produk' => $param['nama_produk'],
                    'harga' => $param['harga'],
                    'kategori_id' => $param['kategori_id'],
                    'status_id' => $param['status_id']           
                ];

                $this->db->update('tb_produk', $data, ['id_produk' => $id_produk]);
                if($this->db->affected_rows() > 0)
                {
                    return $this->response(['status' => true, 'message' => 'Data Berhasil Diupdate']);
                }else
                {
                    return $this->response(['status' => false, 'message' => 'Data Gagal Diupdate!'], 400);
                }
            }
        }
    }

    function hapus_produk($id_produk)
    {    
        $this->db->delete('tb_produk', ['id_produk' => $id_produk]);
        if($this->db->affected_rows() > 0)
        {
            return $this->response(['status' => true, 'message' => 'Data Berhasil Dihapus']);
        }else
        {
            return $this->response(['status' => false, 'message' => 'Data Gagal Dihapus!'], 400);
        }    
    }

    function list_produk_bisa_dijual()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $limit = $this->input->get('limit') ? $this->input->get('limit') : 10;
        $search = $this->input->get('search');
        
        $offset = ($page - 1) * $limit;
        
        $this->db->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->join('tb_status s','p.status_id=s.id_status')->where('p.status_id',1);
        if($search)
        {
            $this->db->like('p.nama_produk', $search)->or_like('p.harga', $search)->or_like('k.nama_kategori', $search)->or_like('s.nama_status', $search);
        }

        $totalRecords = $this->db->count_all_results(); // Menghitung total jumlah data (tanpa memperhitungkan pagination)

        $this->db->select('p.*,k.*,s.*')->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->join('tb_status s','p.status_id=s.id_status')->where('p.status_id',1)->order_by('p.id_produk','desc')->limit($limit, $offset);
        
        if($search)
        {
            $this->db->like('p.nama_produk', $search)->or_like('p.harga', $search)->or_like('k.nama_kategori', $search)->or_like('s.nama_status', $search);
        }
        
        $q = $this->db->get();
        return $this->response(['data' => $q->result(), 'totalRecords' => $totalRecords]);
    }

    function listproduk_bisa_dijual()
    {
        $q = $this->db->select('p.*,k.*,s.*')->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->join('tb_status s','p.status_id=s.id_status')->where('p.status_id',1)->order_by('p.id_produk','desc')->get();
        return $this->response(['data' => $q->result(), 'totalRecords' => $q->num_rows()]);
    }

    function get_kategori_by_id($id_kategori)
	{	
        $q = $this->db->get_where('tb_kategori', ['id_kategori'=>$id_kategori])->row();
        if($q)
        {
            return $this->response($q);
        }else
        {
            return $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 204);
        }
    }

    function get_status_by_id($id_status)
	{	
        $q = $this->db->get_where('tb_status', ['id_status'=>$id_status])->row();
        if($q)
        {
            return $this->response($q);
        }else
        {
            return $this->response(['status' => false, 'message' => 'Data tidak ditemukan'], 204);
        }
    }

    function cek_kategori_id($id_kategori)
	{	
        $cek = $this->db->get_where('tb_kategori', ['id_kategori'=>$id_kategori])->row();
        if(!$cek)
        {
			$this->form_validation->set_message('cek_kategori_id', 'ID Kategori tidak terdaftar!');
			return FALSE;
        }else
        {
			return TRUE;
		}
    }

    function cek_status_id($id_status)
	{	
        $cek = $this->db->get_where('tb_status', ['id_status'=>$id_status])->row();
        if(!$cek)
        {
			$this->form_validation->set_message('cek_status_id', 'ID Status tidak terdaftar!');
			return FALSE;
        }else
        {
			return TRUE;
		}
    }

}