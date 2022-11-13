<?php
session_start();
include 'koneksi.php';

$id     = $_POST['id'];
$nama   = $_POST['a'];
$ket     = $_POST['b'];
$foto = $_POST['foto'];

$cek = mysqli_query($con, "UPDATE tb_jalan SET nama='$nama', ket='$ket' WHERE id_jalan='$id'");

if ($cek) {
    $_SESSION['pesan'] = 'Data Berhasil Diubah';
    header("location:data_jalan.php");
} else {
    $_SESSION['pesan'] = "Data Gagal Diubah";
    header("location:edit_jalan.php");
}