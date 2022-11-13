<?php
// konfigurasi database
// $host       =   "localhost";
// $user       =   "root";
// $password   =   "root";
// $database   =   "kondisijalan";
// // perintah php untuk akses ke database
// $con = mysqli_connect($host, $user, $password, $database);
// if (!$con) {
//     die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
const DBHOST = 'localhost';
const DBUSER = 'root';
const DBPASS = 'root';
const DBNAME = 'kondisijalan';

$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($con->connect_error) {
    die('Could not connect to the database!' . $conn->connect_error);
}