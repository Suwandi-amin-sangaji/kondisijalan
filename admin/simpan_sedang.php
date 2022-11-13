<?php  
session_start();
include 'koneksi.php';

$lat 		= $_POST['lats'];
$lon 		= $_POST['lngs'];
$id_jalan	= $_POST['id_jalan'];
$keterangan = $_POST['b'];

$cek=mysqli_query($con,"SELECT * FROM tb_sedang WHERE id_jalan='$id_jalan'");

    if(mysqli_num_rows($cek)>0) {
        $_SESSION['pesan'] = "Oops! Nama Jalan Sudah Ada";
        header("location:tambah_sedang.php");
    }
    elseif ($cek) {   
        $cek=mysqli_query($con,"INSERT INTO tb_sedang VALUES ('','$id_jalan','$keterangan','$lat','$lon')");
        $_SESSION['pesan'] = 'Data Berhasil Disimpan';
        header("location:data_sedang.php");
    }
?>