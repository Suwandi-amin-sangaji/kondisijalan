<?php 
// koneksi database
session_start();
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
// menghapus data dari database
$cek=mysqli_query($con,"DELETE FROM tb_sedang WHERE id_sedang='$id'");
 
if($cek){
    $_SESSION['pesan'] = 'Data Berhasil Dihapus';
 	header("location:data_sedang.php");
 }else{
 	$_SESSION['pesan'] = 'Data Gagal Dihapus';
 }
?>