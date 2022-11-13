<?php
// konfigurasi database
$host       =   "localhost";
$user       =   "root";
$password   =   "root";
$database   =   "kondisijalan";
// perintah php untuk akses ke database
$con = mysqli_connect($host, $user, $password, $database);
if (!$con) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}