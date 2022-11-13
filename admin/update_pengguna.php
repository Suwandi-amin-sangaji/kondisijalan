<?php 
session_start();
include 'koneksi.php';
 
if (isset($_POST['simpan'])) {
    $id     = $_POST['id'];
    $nama      = $_POST['b'];
    $username  = $_POST['c'];
    $password  = $_POST['d'];
    $level     = $_POST['e'];
   //buat folder bernama gambar
    $tempdir = "assets/images/pengguna/"; 
            if (!file_exists($tempdir))
            mkdir($tempdir,0755); 

            $target_path = $tempdir . basename($_FILES['filegambar']['name']);

            //nama gambar
            $nama_gambar=$_FILES['filegambar']['name'];
            //ukuran gambar
            $ukuran_gambar = $_FILES['filegambar']['size'];  
            if($ukuran_gambar > 1000000000){ 
                $_SESSION['pesan'] = "Ukuran Harus Dibawah 1MB";
                header("location:edit_pengguna.php");
            }else{
                if (move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
                    
                    $sql=mysqli_query($con,"UPDATE tb_pengguna SET level='$level', foto='$nama_gambar', nama='$nama', username='$username', password='$password' WHERE id_pengguna='$id'");
                    $_SESSION['pesan'] = "Data Berhasil Disimpan";
                    header("location:data_pengguna.php");
                } else {
                    $_SESSION['pesan'] = "Data Gagal Disimpan";
                    header("location:edit_pengguna.php");
                }
            } 
}
?> 