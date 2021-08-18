<?php 

include '../koneksi.php'; 

 $id_anggota = $_GET['id_anggota'];;


	$sql="DELETE FROM tb_anggota WHERE id_anggota='$id_anggota'";
          
 	$hasil=mysqli_query($koneksi,$sql);
           if($hasil){
           		echo '<script>alert("Data Berhasil Di Hapus"); document.location="../pages/data_anggota.php";</script>';
        	}else{
       	   		echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
 ?>