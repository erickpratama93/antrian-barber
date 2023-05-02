<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         if(!$this->session->userdata('login_admin')){
            redirect('admin/login');
        }
    }

    function index(){
        $data['active']     = 'dash';
        $data['judul_1']    = 'Dashboard';
        $data['judul_2']    = 'Selamat Datang | Admin';
        
        $data['page']       = 'v_dashboard';
        $data['menu']       = $this->Menus->generateMenu();
        $data['breadcumbs'] = array(
            array(
                'nama'=>'Dashboard',
                'icon'=>'fa fa-dashboard',
                'url'=>'admin/dashboard'
            ),
        );
        $nowDate = date('Y-m-d');
        $getBarberman = $this->db->get('kategori_barberman')->result();
            foreach ($getBarberman as $key) {
                $this->db->limit('1');
                $this->db->where('id_barberman',$key->id_barberman);
                $this->db->where('tgl_antrian_barberman',$nowDate);
                $this->db->order_by('no_antrian_barberman','DESC');
                $antrianbarberman = $this->db->get('antrian_barberman')->row();

                if($key->id_barberman == 1){
                    if($antrianbarberman){
                        $data['barberman1'] = $antrianbarberman->no_antrian_barberman;

                    }else{
                        $data['barberman1'] = 0;
                    }
                }elseif($key->id_barberman == 2){
                    if($antrianbarberman){
                        $data['barberman2'] = $antrianbarberman->no_antrian_barberman;

                    }else{
                        $data['barberman2'] = 0;
                    }
                }elseif($key->id_barberman == 3){
                    if($antrianbarberman){
                        $data['barberman3'] = $antrianbarberman->no_antrian_barberman;

                    }else{
                        $data['barberman3'] = 0;
                    }
                }elseif($key->id_barberman == 4){
                    if($antrianbarberman){
                        $data['barberman4'] = $antrianbarberman->no_antrian_barberman;

                    }else{
                        $data['barberman4'] = 0;
                    }
                }
            }

        $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }
}