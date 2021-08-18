<?php 
session_start();
$_SESSION['session_login'] = NULL;

include '../koneksi.php';
	if (isset($_POST['login'])) {
		
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$querry   = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'");
		$session_login = mysqli_num_rows($querry);

		if ($session_login == 1) {
			
			$data_admin = mysqli_fetch_array($querry);
			$_SESSION['id_admin'] = $data_admin['id_admin'];
			$_SESSION['session_login'] = $data_admin['nama'];

			echo '<script>alert("Berhasil Login");</script>';
			echo "<meta http-equiv='refresh' content='0; url=../dasboard.php?username=$session_login'>";

		}else{

			echo "<meta http-equiv='refresh' content='0 url=../index.php'>";
			echo '<script>alert("Gagal Login");</script>';
			
		}
	}else{
		include "../index.php";
	}

 ?>

