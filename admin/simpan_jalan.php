<?php 

session_start();
include 'koneksi.php';

$nama   = $_POST['a'];
$ket 	= $_POST['b'];
 
$cekjalan=mysqli_query($con,"SELECT * FROM tb_jalan WHERE nama='$nama'");

    if(mysqli_num_rows($cekjalan)>0) {
        $_SESSION['pesan'] = "Oops! Nama Jalan Sudah Ada";
        header("location:tambah_jalan.php");
    }
    elseif ($cekjalan) {   
        mysqli_query($con,"INSERT INTO tb_jalan VALUES('','$nama','$ket')");
        $_SESSION['pesan'] = 'Data Berhasil Disimpan';
        header("location:data_jalan.php");
    }