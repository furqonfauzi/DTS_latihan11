<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title>Form Daftar </title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  

</head>
<?php 
  session_start();
  include '../koneksi.php';

  $id_anggota = $_GET['id_anggota'];

$query = "SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'";
  $data = mysqli_query($koneksi, $query);


   while($i=mysqli_fetch_array($data)){
              $id_anggota = $i['id_anggota'];
              $nama = $i['nama'];
              $alamat = $i['alamat'];
              $jk = $i['jk'];

              if (empty($i['gambar']) OR ($i['gambar']=='-')) {
              	$foto = "../login/img/avatar.png";
              }else{
              	$foto = $i['gambar'];
              }
     }

 ?>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">DIGITAL TALENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../dasboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="pages/data_anggota.php">Data Anggota</a>
          <a class="dropdown-item" href="#">Data Buku</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Data Pinjaman</a>
          <a class="dropdown-item" href="#">Data Pengembalian</a>
        </div>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="../proses/logout.php">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container">
      <div class="row" style="margin-top: 10px">
        <div class="col-md-12">
        <h1> DIGITAL TALENT  |<small> Selamat Datang <b><u><?=ucfirst($_SESSION['session_login'])?></u></b></small> </h1>
       
          <div class="alert alert-none" role="alert">
			

      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header bg-success">
                <h5 class="card-title"><center><img src="../gambar/<?=$foto?>" width="150px" hight="70px" class="rounded mx-auto d-block"> <br><small>Edit Profil ( <b><?=ucfirst($nama)?> </b>)</small></center>  </h5>
                   
                </div>               
                <div class="container">
                  <div class="alert alert-none" role="alert">
                  <form action="../proses/edit_anggota.php" method="post" enctype="multipart/form-data">
                  	<div class="form-row">
                      <div class="form-group col-md-6">
                       
                        <input type="hidden" class="form-control" id="foto" name="foto" value="<?=$foto?>" placeholder="Masukan Gambar Anda" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="foto2">Gambar</label>
                        <input type="file" class="form-control" id="foto2" name="foto2" placeholder="Masukan Gambar Anda" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="id_anggota">ID Anggota </label>
                        <input type="hidden" name="id" id="id" value="<?=$id?>">
                        <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?=$id_anggota?>" placeholder="Masukan Id Anggota Anda" required readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="umur">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"   value="<?=$nama?>" placeholder="Masukan Nama Anda" required>
                      </div>
                      <div class="form-group col-md-6">
                         <label>Gender</label>
                            <select  name='jk' class="form-control select2bs4" required>
                               <option value="">Pilih</option>
                               <option value="L" <?=$jk == 'L'?'selected':''?>>Laki - Laki</option>
                        	   <option value="P" <?=$jk == 'P'?'selected':''?>>Perempuan</option>
                               </select>
                              </div>
                            </div>
                  <div class="form-row">          
                    <div class="form-group col-md-12">
                      <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required> <?=$alamat?> </textarea>
                    </div>
                  </div>
                  <button type="submit" name="edit" value="cek" class="btn btn-success">Simpan</button>
                   <a href="../pages/data_anggota.php" type="button" class="btn btn-warning">Kembali</a>
                </form>
              </div>
            </div>
          </div>
        </section>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

</body>
</html>