<?php 
session_start();
include 'koneksi.php';

    $id         = $_POST['id'];
    $jalan      = $_POST['id_jalan'];
    $lat        = $_POST['lats'];
    $lon        = $_POST['lngs'];
    $ket        = $_POST['b'];

    $cek      = mysqli_query($con,"UPDATE tb_berat SET id_jalan='$jalan', keterangan='$ket', lat='$lat', lon='$lon' WHERE id_berat='$id'" );
    if($cek){
        $_SESSION['pesan'] = 'Data Berhasil Diubah';
        header("location:data_berat.php");
    }else{ 
       $_SESSION['pesan'] = "Oops! Gagal";
        header("location:edit_berat.php");
    }
?>