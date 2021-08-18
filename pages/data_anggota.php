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

 ?>


<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../dasboard.php">DIGITAL TALENT</a>
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
          <a class="dropdown-item" href="#">Data Anggota</a>
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
            

<br>
 <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                 <div class="float-right"> 
                  <a href="form_add.php" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Anggota</a>   
                  <a href="../pages/form_cetak.php" target="_blank" class="btn btn-warning btn-sm">Print</a>   
                </div>
              </div>
    <div class="card-body"> 
        <table id="example" class="table table-bordered table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>NO</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
  <?php 
      $no = 1;
      $data=mysqli_query($koneksi,"SELECT * FROM tb_anggota ORDER BY id_anggota ASC");
         while($i=mysqli_fetch_array($data)){?>

                <td><?=$no++?></td>
                <td><?=$i['id_anggota']?></td>
                <td><?=ucfirst($i['nama'])?></td>
                <td><img src="../gambar/<?=$i['gambar']?>"width="70px" hight="70px"></td>
                <td><?php  if($i['jk']=='L'){
                                echo "Laki-Laki";
                          }elseif ($i['jk']=='P') {
                            echo "Perempuan";
                          }
                              ?>
                </td>
                <td><?=$i['status']?></td>
                <td><?=$i['alamat']?></td>
                <td>
                  <a href="print_anggota.php?id_anggota=<?=$i['id_anggota']?>" target="_blank" type="button" class="btn btn-warning btn-sm">Print</a>
                  <a href="form_edit.php?id_anggota=<?= $i['id_anggota']?>" type="button" class="btn btn-success btn-sm">Ubah</a>
                   <a href="../proses/hapus_anggota.php?id_anggota=<?= $i['id_anggota']?>"  onclick="return confirm('yakin Ingin Menghapus?')" type="button" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th>NO</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                 <th>Status</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </tfoot>
    </table>
  </div>
  </div>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );

</script>
</body>
</html>