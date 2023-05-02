<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Super.php');

class Antrian_barberman extends Super
{
    
    function __construct()
    {
        parent::__construct();
        $this->language       = 'english'; /** Indonesian / english **/
        $this->tema           = "flexigrid"; /** datatables / flexigrid **/
        $this->tabel          = "antrian_barberman";
        $this->active_id_menu = "Antrian barberman";
        $this->nama_view      = "Antrian barberman";
        $this->status         = true; 
        $this->field_tambah   = array(); 
        $this->field_edit     = array(); 
        $this->field_tampil   = array('id_barberman','id_member','tgl_antrian_barberman','no_antrian_barberman'); 
        $this->folder_upload  = 'assets/uploads/files';
        $this->add            = true;
        $this->edit           = false;
        $this->delete         = false;
        $this->crud;
    }

    function index(){
            $data = [];
            if($this->crud->getState() == "add")
            redirect(base_url('admin/Antrian_barberman/addAntrianBarberman'));
            /** Bagian GROCERY CRUD USER**/


            /** Relasi Antar Tabel 
            * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
            **/
            $this->crud->set_relation('id_member','member','nama');
            $this->crud->set_relation('id_barberman','kategori_barberman','nama_barberman');

            /** Upload **/
            // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  
            // $this->crud->set_field_upload('gambar',$this->folder_upload);  
            
            /** Ubah Nama yang akan ditampilkan**/
            // ->display_as('nama','Nama Setelah di Edit')
            $this->crud->display_as('id_barberman','Barberman'); 
            $this->crud->display_as('id_member','Nama Member'); 
            
            /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
            $data = array_merge($data,$this->generateBreadcumbs());
            $data = array_merge($data,$this->generateData());
            $this->generate();
            $data['output'] = $this->crud->render();
            $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }

    private function generateBreadcumbs(){
        $data['breadcumbs'] = array(
                array(
                    'nama'=>'Dashboard',
                    'icon'=>'fa fa-dashboard',
                    'url'=>'admin/dashboard'
                ),
                array(
                    'nama'=>'Admin',
                    'icon'=>'fa fa-users',
                    'url'=>'admin/useradmin'
                ),
            );
        return $data;
    }

    public function addAntrianBarberman(){
        $data = [];
        $data = array_merge($data,$this->generateBreadcumbs());
        $data = array_merge($data,$this->generateData());
        $this->generate();

        $rowBarberman = $this->db->get('kategori_barberman')->result();
        $data['getBarberman'] = $rowBarberman;
        // var_dump($rowBarberman); exit();

        $rowMember =$this->db->get('member')->result();
        $data['getMember'] = $rowMember;

        $data['page'] = 'v_antrian_barberman';
        $data['output'] = $this->crud->render();
        $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }

    public function getNoAntrian(){
        $id_barberman = $this->input->post('id_barberman');
        $tanggal = date("Y-m-d");

        $this->db->where('antrian_barberman.id_barberman',$id_barberman);
        $this->db->where('antrian_barberman.tgl_antrian_barberman',$tanggal);
        $sql = $this->db->get('antrian_barberman');
        $getBarberman = $sql->num_rows();//cek jumlah row


        

        if($getBarberman==0){//kondisi jika belum ada yg daftar perhari
            $this->db->where('id_barberman',$id_barberman);
            $sql2 = $this->db->get('kategori_barberman');
            $rowBarberman = $sql2->row();
            $no = 1;
            $kode=$rowBarberman->kode_barberman;
            $noAntrian = $kode.$no;
            $maks = $rowBarberman->jumlah_maksimal;

        }else{
            //kondisi jika sudah ada data per hari
            $this->db->limit(1);
            $this->db->order_by('no_antrian_barberman',"DESC");
            $this->db->where('antrian_barberman.id_barberman',$id_barberman);
            $this->db->where('antrian_barberman.tgl_antrian_barberman',$tanggal);
            $sql = $this->db->get('antrian_barberman');
            $rowNo = $sql->row();


            $this->db->where('id_barberman',$id_barberman);
            $sql2 = $this->db->get('kategori_barberman');
            $rowBarberman = $sql2->row();
            $kode = $rowBarberman->kode_barberman;
            $no = $rowNo->no_antrian_barberman + 1;
            $maks = $rowBarberman->jumlah_maksimal;

            // var_dump($rowNo); exit();
            $noAntrian = $kode.$no;
        }

        $hasil = array("no_hasil"=>$noAntrian, "no"=>$no, "maks"=>$maks);
        echo json_encode($hasil);
    }

    public function save(){
        // var_dump($_POST); exit();
        $id_barberman = $this->input->post('id_barberman');
        $no_antrian_barberman = $this->input->post('no_antrian_barberman');
        // $no_antrian_barberman = substr($this->input->post('no_antrian_barberman'),4);
        $id_member = $this->input->post('id_member');
        $tanggal = date("Y-m-d");

        // echo $tanggal; exit();

        $this->db->set('id_barberman',$id_barberman);
        $this->db->set('no_antrian_barberman',$no_antrian_barberman);
        $this->db->set('id_member',$id_member);
        $this->db->set('tgl_antrian_barberman',$tanggal);
        $this->db->insert('antrian_barberman');

        redirect(base_url('admin/Antrian_barberman'));

    }
}