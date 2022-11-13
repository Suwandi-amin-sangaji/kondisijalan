<?php
session_start();
include 'koneksi.php';

// if (isset($_POST['simpan'])) {
//     $id = $_POST['id'];
//     $jum_lubang   = $_POST['jum_lubang'];
//     $uk_lubang    = $_POST['uk_lubang'];
//     $bekas_roda   = $_POST['bekas_roda'];

//     $cek = mysqli_query($con, "UPDATE `tb_kerusakan` SET `jum_lubang`='$jum_lubang',`uk_lubang`='$uk_lubang',`bekas_roda`='$bekas_roda'  WHERE id_kerusakan = $id");

//     if ($cek) {
//         $_SESSION['pesan'] = 'Data Berhasil Diubah';
//         header("location:data_kerusakan.php");
//     } else {
//         $_SESSION['pesan'] = "Data Gagal Diubah";
//         header("location:edit_kerusakan.php");
//     }
// }

$id = $_POST['id'];
$jum_lubang   = $_POST['jum_lubang'];
$uk_lubang    = $_POST['uk_lubang'];
$bekas_roda   = $_POST['bekas_roda'];
$foto = $_FILES['foto']['name'];
//cek dulu jika merubah gambar produk jalankan coding ini
if ($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $foto; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query  = "UPDATE `tb_kerusakan` SET `foto`='$nama_gambar_baru', `jum_lubang`='$jum_lubang',`uk_lubang`='$uk_lubang',`bekas_roda`='$bekas_roda'";
        $query .= "WHERE id_kerusakan = '$id'";
        $result = mysqli_query($con, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($con) .
                " - " . mysqli_error($con));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            $_SESSION['pesan'] = 'Data Berhasil DiUbah';
            header('location:data_kerusakan.php');
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_kerusakan.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = "UPDATE tb_kerusakan SET `jum_lubang`='$jum_lubang',`uk_lubang`='$uk_lubang',`bekas_roda`='$bekas_roda'";
    $query .= "WHERE id_kerusakan = '$id'";
    $result = mysqli_query($con, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($con) .
            " - " . mysqli_error($con));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        $_SESSION['pesan'] = 'Data Berhasil DiUbah';
        header('location:data_kerusakan.php');
    }
}