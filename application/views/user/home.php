<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>D'Kriwoel Barbershop </title>
  <link rel="shortcut icon" href="assets/user/img/logo-2.png">

  <!-- Custom fonts for this theme -->
  <link href="<?php echo base_url('assets/user')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="<?php echo base_url('assets/user')?>/css/freelancer.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/user')?>/lib/noty.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/user')?>/lib/themes/metroui.css" rel="stylesheet">
  <!-- custom css -->
  <link href="<?php echo base_url('assets/user')?>/css/style.css" rel="stylesheet">

</head>
<style type="text/css">
  .btncostume{
    background: #2c3e50;
    color: white;
  }
  sup{
    color: red;
  }
  .border1{
    border: thin solid;
  }

  .costum{
    background: white;
    border: thin solid #fff;
  }

  .masthead .masthead-avatar {
    width: 8rem !important;
}
</style>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger logo" href="#page-top">D'Kriwoel Barbershop</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php if(empty($this->session->userdata('id_member'))) {?>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#registrasi">Login</a>
            </li>
          <?php }else{?>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#"><?php echo $this->session->userdata('nama'); ?></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('Index/logout') ?>">Logout</a>
            </li>
          <?php }?>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#bantuan">Bantuan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Masthead -->
  <header class="masthead bg-image text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0 title"><img class="masthead-avatar mb-5" src="<?php echo base_url('assets/user') ?>/img/logo-2.png" alt="">Kriwoel Barbershop</h1>
      <div class="row">
          <div class="col-md-12" style="border: thin solid; ">
            <h3>NO ANTRIAN BERLANGSUNG</h3>
          <h1 style="margin-top: 5px;"><?php echo $no_antrian; ?></h1>
          </div>
      </div>
      <?php if(!empty($this->session->userdata('id_member'))){ ?>
        <div class="row" style="margin-top: 60px">
          <div class="col-md-3" style="border: thin solid; ">
            <h3><?php echo $barberman1; ?></h3>
            <H6>Barberman1</H6></div>
          <div class="col-md-3" style="border: thin solid; ">
            <h3><?php echo $barberman2; ?></h3>
            <H6>Barberman2</H6></div>
          <div class="col-md-3" style="border: thin solid; ">
            <h3><?php echo $barberman3; ?></h3>
            <H6>Barberman3</H6></div>
          <div class="col-md-3" style="border: thin solid; ">
            <h3><?php echo $barberman4; ?></h3>
            <H6>Barberman4</H6>
          </div>
        </div>
      <?php } ?>
      <?php if(empty($this->session->userdata('id_member'))){ ?>
        <h4 class="masthead mb-0" style="margin-top: 10px !important;padding: 20px;">Selamat Datang di D`Kriwoel Barbershop. 
        <br> Jika anda belum memiliki akun, silakan Registrasi terlebih dahulu.</h4>
        <button type="button" class="btn btncostume" data-toggle="modal" data-target="#exampleModal">
          Registrasi
        </button>
      <?php } ?>
      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <?php if(!empty($this->session->userdata('id_member'))){ ?>
        <!-- <div class="row" style="width: 60%;">
          <div class="col-md-5 text-right">
            <label><h5>Nomor Antrian Anda :</label></h5>
          </div>
          <div class="col-md-1 text-justify"><h5><?php echo $antrian_member ?></h5></div>
          <?php if(!empty($id_antrian_barberman)){?>
            <div class="col-md-6" style="align-item">
              <a href="<?php echo base_url('Index/cetak')."/".$id_antrian_barberman ?>" style="color: #000; background: #fff; padding: 10px;" target="_blank">Cetak</a>
            </div>
          <?php } ?>
        </div> -->
        <div class="d-flex" style="width: 60%">
        <div class="" style="margin : 0 30px 0px 35px;">
            <label><h5>Nomor Antrian Anda :</label></h5>
          </div>
          <div class="col-md-1 text-justify"><h5><?php echo $antrian_member ?></h5></div>
          <?php if(!empty($id_antrian_barberman)){?>
            <div style="margin-left: 20px;">
              <a href="<?php echo base_url('Index/cetak')."/".$id_antrian_barberman ?>" style="color: #000; background: #fff; padding: 10px;" target="_blank">Cetak</a>
            </div>
          <?php } ?>
        </div>
        <div class="row" style="width: 60%;">
          <div class="col-md-5 text-right"><label><h5>Barberman :</label></h5></div>
          <div class="col-md-5 text-justify"><h5><?php echo $nama_barberman?></h5></div>
        </div>
      <?php } ?>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="registrasi">
     <?php if(empty($this->session->userdata('id_member'))){ ?>
      <div class="container">

        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>

        <!-- Portfolio Grid Items -->
        <div class="row">

          <div class="container">
            <div class="row justify-content-md-center">
              <div class="col-md-4" style="margin-top: 20px">
                <!-- <h1 align="center">Login </h1> -->
                <form action="<?php echo base_url('Index/proses_login') ?>" method='post'>
                  <label >Username</label>
                  <input type="username" name="username" class="form-control" >
               
                  <label>Password</label>
                  <input type="password" name="password" class="form-control">
                  <br><br>

                  <div align="right">
                  <button type="submit" class="btn btn-dark">Login</button>
                  </div>
                  
                </form>
                <br><center><p>By <a href='https://instagram.com/erickpratama_/'>Erick Asrillah Pratama</a></p></center>
                
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
    <?php }else{ ?>
      <div class="container">

        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ambil Antrian</h2>

        <!-- Icon Divider -->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>

        <!-- Portfolio Grid Items -->
        <div class="row">
          <div class="container">
            <div class="row justify-content-md-center">
              <div class="col-md-12" style="margin-top: 20px">
                <!-- <h1 align="center">Login </h1> -->
                <form action="<?php echo base_url('Index/saveAntrian') ?>" method="post">
                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>Pilih Barberman</label></h6>   
                    </div>

                    <div class="col-md-5">
                      <select name="id_barberman" id="id_barberman" class="form-control" onchange="noAntrian(this.value)">
                        <option value=""> pilih </option>
                        <?php foreach ($getBarberman as $row ) {
                        ?>
                          <option value="<?php echo $row->id_barberman; ?>"> <?php echo $row->kode_barberman; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class ="row">
                    <div class ="col-md-2">
                      <h6><label>No Antrian Barberman</label></h6>    
                    </div>

                    <div class="col-md-5">
                      <input type="text" name="no_antrian_barberman2" id="no_antrian_barberman2" value="" disabled="" class="form-control">
                      <input type="hidden" name="no_antrian_barberman" id="no_antrian_barberman" value="" class="form-control">
                      <input type="hidden" name="no_antrian" value="<?php echo $no_antrian ?>">
                    </div>
                  </div>

                 
                  <div class="row text-right">
                    <div class="col-md-7">
                      <input type="submit" name="simpan" id="simpan" value="Ambil Antrian" class="btn btn-primary">
                    </div>
                  </div>
                </form>

                 <div class="row text-justify" >
                 <h6>Keterangan :</h6>
                  <ol>
                    <li>Barberman 1 (BBM1)</li>
                    <li>Barberman 2 (BBM2)</li>
                    <li>Barberman 3 (BBM3)</li>
                    <li>Barberman 4 (BBM4)</li>
                  </ol>
              </div>
              </div>


            </div>
          </div>

        </div>
        <!-- /.row -->
      </div>
    <?php } ?>
  </section>

  <!-- About Section -->
  <section class="page-section bg-image text-white mb-0" id="bantuan">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Bantuan</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
    <div class="container">  
      <div class="row">
        <div class="col-lg-4.ml-auto" align="center" >
          <p class="lead">Klik Login > Pilih Barberman > Klik Cetak</p>
          <p class="lead">Member melakukan Registrasi > Input Nama Member, Tanggal Lahir, Alamat, Nomor Telephone, Username dan Password > Klik Login >  Pilih barberman > Klik Cetak </p>
      </div>
    </div>
    </div>
      <!-- About Section Button -->
      <!-- <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/themes/freelancer/">
          <i class="fas fa-download mr-2"></i>
          Free Download!
        </a>
      </div> -->
    <!-- </div>
    </div> -->
  </section>

  


  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Jl. Supriyadi, Gg. Merpati
            <br>Kademangan, Bondowoso</p>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-6">
          <h4 class="text-uppercase mb-4">WhatsApp</h4>
          
          <p class="lead mb-0">0852 5802 8681</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
  <div class="copyright text-center my-auto">
             <span>Copyright &copy; Erick Company Limited <?= date('Y'); ?></span>
         </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Index/registrasi') ?>" method="post">

            <!-- <div>
                <label >Nomor KTP <sup>*</sup></label>
                <input type="text" id="no_identitas" name="no_identitas" class="form-control" value="" placeholder="Nomor KTP" required="">
            </div> -->

            <div>
               <label >Nama <sup>*</sup></label>
               <input type="text" id="nama" name="nama" class="form-control" value="" placeholder="Nama" required="">
            </div>

            <!-- <div>
              <label >Jenis Kelamin</label>
              <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
              <option value="">Pilih</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
              </select>
            </div> -->

            <div>
                <label >Tanggal Lahir <sup>*</sup></label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="" placeholder="Tanggal Lahir" required="">
            </div>

            <!-- <div>
              <label >Alamat</label>
              <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
            </div> -->

            <div>
                <label >No WhatsApp</label>
                <input type="no_telp" id="no_telp" name="no_telp" class="form-control" value="" placeholder="No Telephone">
            </div>

            <div>
                <label >Username <sup>*</sup></label>
                <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username" required="">
            </div>

            <div>
                <label >Password <sup>*</sup></label>
                <input type="password" id="password" name="password" class="form-control" value="" placeholder="Password" required="">
            </div>

            <br><br>
            <div align="right">
            <!-- <a href="<?php //echo base_url() ?>"  >Registrasi</a> -->
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          
          </form>
      </div>
      
    </div>
  </div>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/user')?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/user')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url('assets/user')?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?php echo base_url('assets/user')?>/js/jqBootstrapValidation.js"></script>
  <script src="<?php echo base_url('assets/user')?>/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url('assets/user')?>/js/freelancer.min.js"></script>
  <script src="<?php echo base_url('assets/user')?>/lib/noty.min.js"></script>
  <script type="text/javascript">
    function noAntrian(id_barberman){
    // alert(id_barberman);?
    if(id_barberman!=""){
      $.ajax({

        url: "<?php echo base_url('Index/getNoAntrian'); ?>",
        type : "POST",
        data : "id_barberman="+id_barberman,
        datatype: "json",
        success:function(response){
          console.log(response);
          // alert(data);
          var output = JSON.parse(response);
          if(output.no > output.maks){
            $("#no_antrian_barberman2").val('Data Sudah Penuh');
            // $("#simpan").toggle('slow');
            $("#simpan").prop("disabled",true);
          }else{

            $("#no_antrian_barberman").val(output.no_hasil);
            $("#no_antrian_barberman2").val(output.no_hasil);
            $("#simpan").prop("disabled",false);
          }
        } // Munculkan alert error
      });
    }else{
      $("#no_antrian_barberman").val("");
      $("#no_antrian_barberman2").val("");
    }
  }
  </script>

   <?php if($this->session->flashdata('notif')){?>
        <script type="text/javascript">
            new Noty({
                
                text: '<?php echo $this->session->flashdata('pesan'); ?>',
                timeout: 3000,
                theme: "metroui",
                type: "<?php echo $this->session->flashdata('type'); ?>",

                
            }).show();
        </script>
        <?php } ?>

</body>

</html>
