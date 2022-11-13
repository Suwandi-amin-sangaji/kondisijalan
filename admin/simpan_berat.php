<?php
// session_start();
include 'koneksi.php';
// Mengambil data dari form lalu ditampung didalam variabel
$id_jalan    = $_POST['id_jalan'];
$keterangan = $_POST['keterangan'];
$lat         = $_POST['lat'];
$lon         = $_POST['lon'];
$cek = mysqli_query($con, "SELECT * FROM tb_berat WHERE id_jalan='$id_jalan'");

if (mysqli_num_rows($cek) > 0) {
    $_SESSION['pesan'] = "Oops! Nama Jalan Sudah Ada";
    header("location:tambah_berat.php");
} elseif ($cek) {
    $sql1 = mysqli_query($con, "INSERT INTO tb_berat (id_berat, id_jalan, keterangan, lat, lon) VALUES ('$id_berat','$id_jalan','$keterangan','$lat','$lon')");
    $_SESSION['pesan'] = 'Data Berhasil Disimpan';
    header("location:data_berat.php");
}
// Ambil Data yang Dikirim dari Form