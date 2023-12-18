<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk_model extends CI_Model
{
    private $table = 'tb_produk p'; //nama tabel dari database
    private $column_order = array(null,'p.nama_produk','p.harga','k.nama_kategori','s.nama_status','p.id_produk');
    private $column_search = array('p.nama_produk','p.harga','k.nama_kategori','s.nama_status','p.id_produk');
    private $order = array('p.id_produk' => 'desc'); // default order 
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {   
        $this->db->select('p.*,k.*,s.*');
        $this->db->from($this->table);
        $this->db->join('tb_kategori k','p.kategori_id=k.id_kategori');
        $this->db->join('tb_status s','p.status_id=s.id_status');
        $i = 0;
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // cek kalo ada search data
			{				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open group like or like
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close group like or like
			}
			$i++;
		}		
		if(isset($_POST['order'])) // cek kalo click order
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
        
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function tambah_produk()
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk',TRUE),
            'harga' => $this->input->post('harga',TRUE),
            'kategori_id' => $this->input->post('kategori_id',TRUE),
            'status_id' => $this->input->post('status_id',TRUE)
        ];

        $this->db->insert('tb_produk', $data);
        if($this->db->affected_rows() > 0)
        {
            return ['status' => true, 'message' => 'Data Berhasil Disimpan'];
        }else
        {
            return ['status' => false, 'message' => 'Data Gagal Disimpan!'];
        }
    }

    function edit_produk($id_produk)
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk',TRUE),
            'harga' => $this->input->post('harga',TRUE),
            'kategori_id' => $this->input->post('kategori_id',TRUE),
            'status_id' => $this->input->post('status_id',TRUE)
        ];

        $this->db->update('tb_produk', $data, ['id_produk' => $id_produk]);
        if($this->db->affected_rows() > 0)
        {
            return ['status' => true, 'message' => 'Data Berhasil Diupdate'];
        }else
        {
            return ['status' => false, 'message' => 'Data Gagal Diupdate!'];
        }
    }

    function cek_produk($id_produk)
    {
        return $this->db->select('id_produk')->from('tb_produk')->where('id_produk',$id_produk)->get()->row();
    }

    function get_produk_by_id($id_produk)
    {
        return $this->db->get_where('tb_produk', ['id_produk' => $id_produk])->row();
    }

    function hapus_produk($id_produk)
    {   
        $this->db->delete('tb_produk', ['id_produk' => $id_produk]);
        if($this->db->trans_status() == TRUE)
        {
            return ['status' => true, 'message' => 'Data Berhasil Dihapus'];
        }else
        {
            return ['status' => false, 'message' => 'Data Gagal Dihapus!'];
        }   
    }    

    function list_produk()
    {
        return $this->db->select('p.*,k.*')->from('tb_produk p')->join('tb_kategori k','p.kategori_id=k.id_kategori')->where('p.status_id', 1)->order_by('p.id_produk','desc')->get()->result();
    }

}