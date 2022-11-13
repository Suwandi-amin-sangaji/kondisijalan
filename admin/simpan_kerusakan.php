<?php

session_start();
include 'koneksi.php';

// $id_jalan   = $_POST['a'];
// $jum_lubang   = $_POST['b'];
// $uk_lubang    = $_POST['c'];
// $bekas_roda   = $_POST['d'];
// $cekjalan=mysqli_query($con,"SELECT * FROM tb_kerusakan WHERE id_jalan='$id_jalan'");

//     if(mysqli_num_rows($cekjalan)>0) {
//         $_SESSION['pesan'] = "Oops! Nama Jalan Sudah Ada";
//         header("location:tambah_kerusakan.php");
//     }
//     elseif ($cekjalan) {   
//         mysqli_query($con,"INSERT INTO tb_kerusakan VALUES('','$id_jalan','$jum_lubang','$uk_lubang','$bekas_roda','')");
//         $_SESSION['pesan'] = 'Data Berhasil Disimpan';
//         header("location:data_kerusakan.php");
//     }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $id_jalan   = $_POST['a'];
    $jum_lubang   = $_POST['b'];
    $uk_lubang    = $_POST['c'];
    $bekas_roda   = $_POST['d'];
    $gambar = $_FILES['foto']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];

    if (!empty($gambar)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

            //Mengupload gambar
            move_uploaded_file($file_tmp, 'gambar/' . $gambar);

            $sql = "INSERT INTO `tb_kerusakan`(`id_kerusakan`, `id_jalan`, `foto`, `jum_lubang`, `uk_lubang`, `bekas_roda`, `cluster`) VALUES ('','$id_jalan','$gambar','$jum_lubang','$uk_lubang','$bekas_roda','')";

            $simpan = mysqli_query($con, $sql);

            if ($simpan) {
                $_SESSION['pesan'] = 'Berhasil menyimpan Data';
                header("Location:data_kerusakan.php");
            } else {
                header("Location:data_kerusakan.php");
            }
        }
    } else {
        $gambar = "data_kerusakan.png";
    }
}