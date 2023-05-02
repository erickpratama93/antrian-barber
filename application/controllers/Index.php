<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	function __construct(){
		parent::__construct();
		// $this->load->library('fpdf');
	}

	public function index()
	{
		$nowDate = date('Y-m-d');

		$this->db->limit('1');
		$this->db->where('tgl_antrian',$nowDate);
		$this->db->order_by('no_antrian','DESC');
		$antrian = $this->db->get('antrian')->row();
		if($antrian){
			$data['no_antrian'] = $antrian->no_antrian;

		}else{
			$data['no_antrian'] = 0;
		}

		if(!empty($this->session->userdata('id_member'))){
			$this->db->limit(1);
			$this->db->order_by('id_antrian_barberman','DESC');
			$this->db->where('id_member',$this->session->userdata('id_member'));
			$this->db->where('tgl_antrian_barberman',$nowDate);
			$this->db->join('kategori_barberman','kategori_barberman.id_barberman=antrian_barberman.id_barberman');
			$rowdata=$this->db->get('antrian_barberman')->row();
			if ($rowdata){
				$data['antrian_member']=$rowdata->no_antrian_barberman;
				$data['nama_barberman']=$rowdata->nama_barberman;
				$data['id_antrian_barberman'] = $rowdata->id_antrian_barberman;
			}else{
				$data['antrian_member']='-';
				// $data['antrian_member']='anda belum mengambil nomor antrian barberman';
				$data['nama_barberman']='-';
				$data['id_antrian_barberman'] ="";
			}

			$rowBarberman = $this->db->get('kategori_barberman')->result();
			$data['getBarberman'] = $rowBarberman;

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
		}
		// var_dump($data); die();
		$this->load->view ('user/home',$data);
	}

	public function regis()
	{
		
		$this->load->view ('user/registrasi');
	}

	public function registrasi()
	{
		// $no_identitas = $this->input->post('no_identitas'); //langkah 2
		$nama = $this->input->post('nama');
		// $jenis_kelamin = $this->input->post('jenis_kelamin');
		// $usia = $this->input->post('usia');
		$tgl_lahir = $this->input->post('tgl_lahir');
		// $alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		// $this->db->set('no_identitas',$no_identitas);//langkah ke 3
		$this->db->set('nama',$nama);
		// $this->db->set('jenis_kelamin',$jenis_kelamin);
		// $this->db->set('usia',$usia);
		$this->db->set('tgl_lahir',$tgl_lahir);
		// $this->db->set('alamat',$alamat);
		$this->db->set('no_telp',$no_telp);
		$this->db->set('username',$username);
		$this->db->set('password',$password);


		$this->db->insert('member');

		$this->session->set_flashdata("notif",true);
		$this->session->set_flashdata("pesan",'Registrasi Berhasil');
		$this->session->set_flashdata("type",'success');

		redirect(base_url());

	}

	public function proses_login(){
		print_r($_POST);
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));

		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$getmember=$this->db->get('member')->row();

		if($getmember){
			$this->session->set_userdata('id_member',$getmember->id_member);
			$this->session->set_userdata('nama',$getmember->nama);

			$this->session->set_flashdata("notif",true);
			$this->session->set_flashdata("pesan",'Login Berhasil');
			$this->session->set_flashdata("type",'success');
			redirect(base_url());
		}else{
			$this->session->set_flashdata("notif",true);
			$this->session->set_flashdata("pesan",'Username atau Password Salah');
			$this->session->set_flashdata("type",'warning');
			redirect(base_url());
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
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

    public function saveAntrian(){
    	$id_barberman = $this->input->post('id_barberman');
    	$no_antrian_barberman = substr($this->input->post('no_antrian_barberman'),4);
    	$id_member = $this->session->userdata('id_member');
    	$tanggal = date("Y-m-d");

        // echo $tanggal; exit();

    	$this->db->set('id_barberman',$id_barberman);
    	$this->db->set('no_antrian_barberman',$no_antrian_barberman);
    	$this->db->set('id_member',$id_member);
    	$this->db->set('tgl_antrian_barberman',$tanggal);
    	$this->db->insert('antrian_barberman');

    	$no_antrian = $this->input->post('no_antrian');
    	$this->db->set('no_antrian',$no_antrian+1);
    	$this->db->set('tgl_antrian',$tanggal);
    	$this->db->insert('antrian');

    	redirect(base_url());

    }

    public function cetak($id_antrian_barberman = NULL){
    	$this->db->limit(1);
		$this->db->order_by('id_antrian','DESC');
		$this->db->where('id_antrian_barberman',$id_antrian_barberman);
		$this->db->join('kategori_barberman','kategori_barberman.id_barberman=antrian_barberman.id_barberman');
		$data['row']=$this->db->get('antrian_barberman')->row();
    	$this->load->view('user/cetak',$data);
    }

    public function cetak2(){
    	require(APPPATH."/libraries/fpdf.php");
    	// print_r(dirname(__FILE__) . '/./tcpdf/tcpdf.php'); die();
    	try {
    		$pdf = new FPDF('l','mm','A5');
	// Menambah halaman baru
	    		$pdf->AddPage();
	// Setting jenis font
	    		$pdf->SetFont('Arial','B',16);
	// Membuat string
	    		$pdf->Cell(190,7,'Daftar Harga Motor Dealer Maju Motor',0,1,'C');
		// $pdf->SetFont('Arial','B',9);
	    		$pdf->Cell(190,7,'Jl. Abece No. 80 Kodamar, jakarta Utara.',0,1,'C');

	// print_r($pdf); die();
	    		$path = './assets/pdf/'.date('YmdHis').".pdf";
	    		$pdf->Output('F',$path);
	    		http_response_code(200);
	    		header('Content-Length: '.filesize($path));
	    		header("Content-Type: application/pdf");
				header('Content-Disposition: attachment; filename="downloaded.pdf"'); // feel free to change the suggested filename
				readfile($path);

				exit; 
				    		// redirect(base_url($path));
				//     		$filename = 'pdf.pdf';
				//     		header('Content-type:application/pdf');
				// header('Content-disposition: inline; filename="'.$filename.'"');
				// header('content-Transfer-Encoding:binary');
				// header('Accept-Ranges:bytes');
							// $pdf->Output('I',$filename);
				} catch(Exception $e){
					print_r($e->getMessage());
				}

	}


}