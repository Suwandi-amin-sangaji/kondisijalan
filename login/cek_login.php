<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con,"SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="Administrator"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Administrator";
		$_SESSION['nama'] =$data['nama'];
		$_SESSION['foto'] =$data['foto'];
		// alihkan ke halaman dashboard admin
		header("location:../admin/index.php");

	// cek jika user login sebagai pegawai
	}elseif($data['level']=="Pemantau"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Pemantau";
		$_SESSION['nama'] =$data['nama'];
		$_SESSION['foto'] =$data['foto'];
		// alihkan ke halaman dashboard admin
		header("location:../pemantau/index.php");
	}else{

		// alihkan ke halaman login kembali
		$_SESSION['pesan'] = "Gagal Login";
        header("location:login.php");
	}

	
}else{
	$_SESSION['pesan'] = "Data Salah";
    header("location:login.php");
}



?>