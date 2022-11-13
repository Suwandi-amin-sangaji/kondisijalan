<?php 
session_start();
include 'koneksi.php';
 
$id 	      = $_POST['id'];
$cluster      = $_POST['a'];
$jum_lubang   = $_POST['b'];
$uk_lubang    = $_POST['c'];
$bekas_roda   = $_POST['d'];
$ket          = $_POST['e'];
 
$cek=mysqli_query($con,"UPDATE tb_centroid SET cluster='$cluster', jum_lubang='$jum_lubang', uk_lubang='$uk_lubang', bekas_roda='$bekas_roda', ket='$ket' WHERE id_centroid='$id'");

    if($cek) {
    	$_SESSION['pesan'] = 'Data Berhasil Diubah';
        header("location:data_centroid.php");
    }
    else{   
        $_SESSION['pesan'] = "Data Gagal Diubah";
        header("location:edit_centroid.php");
    }
?>