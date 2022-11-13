<?php 
session_start();
include 'koneksi.php';

    $id         = $_POST['id'];
    $jalan      = $_POST['id_jalan'];
    $lat        = $_POST['lats'];
    $lon        = $_POST['lngs'];
    $ket        = $_POST['b'];

    $cek      = mysqli_query($con,"UPDATE tb_sedang SET id_jalan='$jalan', keterangan='$ket', lat='$lat', lon='$lon' WHERE id_sedang='$id'" );
    if($cek){
        $_SESSION['pesan'] = 'Data Berhasil Diubah';
        header("location:data_sedang.php");
    }else{
       $_SESSION['pesan'] = "Oops! Gagal";
        header("location:edit_sedang.php");
    }
?>