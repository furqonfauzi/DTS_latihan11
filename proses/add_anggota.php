<?php 	

include '../koneksi.php';
$id_anggota =$_POST['id_anggota'];
$nama =$_POST['nama'];
$jk =$_POST['jk'];
$alamat =$_POST['alamat'];
$status = "Tidak Meminjam";

if (isset($_POST['add'])) {
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];
	if(!empty($nama_file)){
		
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
		$file_foto = $id_anggota.".".$tipe_file;

		//tempat upload
		$folder = "../gambar/$file_foto";

		//suksess
		move_uploaded_file($lokasi_file,"$folder");
	}else
		$file_foto = "-";

		$sql = "INSERT INTO tb_anggota VALUES ('$id_anggota','$nama','$jk','$alamat','$status','$file_foto')";
		$hasil = mysqli_query($koneksi,$sql);

		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil menambahkan data."); document.location="../pages/data_anggota.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        


	}
}


 ?>