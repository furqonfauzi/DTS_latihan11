<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title>Cetak Kartu </title>
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
 <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header bg-success">
                <h5 class="card-title"><center><img src="../gambar/<?=$foto?>" class="rounded mx-auto d-block"> <br><small> Kartu Anggota ( <b><?=ucfirst($nama)?> </b>)</small></center>  </h5>
                   
                </div>               
                <div class="container">
                  <div class="alert alert-none" role="alert">
                  	<div class="form-row">
                      <div class="form-group col-md-6">
                       
                        <input type="hidden" class="form-control" id="foto" name="foto" value="<?=$foto?>" placeholder="Masukan Gambar Anda" required>
                      </div>
                    </div>
                    <div class="form-row">
                      
                      <div class="form-group col-md-12">
                        <label for="id_anggota">ID Anggota </label>
                        <input type="hidden" name="id" id="id" value="<?=$id?>">
                        <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?=$id_anggota?>" placeholder="Masukan Id Anggota Anda" required readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="umur">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"   value="<?=$nama?>" placeholder="Masukan Nama Anda" required readonly>
                      </div>
                      <div class="form-group col-md-12">
                         <label>Gender</label>
                         <?php 
                         if ($jk == "L") {
                         	echo '<input type="text" class="form-control" id="nama" name="nama"   value="Laki - Laki"readonly>';
                         }elseif ($jk == "P") {
                         	echo '<input type="text" class="form-control" id="nama" name="nama"   value="Perempuan"readonly>';
                         }

                         ?>
                            
                              </div>
                            </div>
                  <div class="form-row">          
                    <div class="form-group col-md-12">
                      <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required readonly> <?=$alamat?> </textarea>
                    </div>
                  </div>
                  
              </div>
            </div>
          </div>
        </section>
        </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	
	window.print();
</script>
</body>
</html>