<?php
extract($_POST);
include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload Gambar</title>
</head>

<body>
    <h2>Uplaod Gambar</h2>
    <hr>

    <?php
    if (isset($_POST['simpan'])) {
        $fileName = $_FILES['foto']['name'];
        $sql = mysqli_query($con, "INSERT INTO tb_gambar (file) VALUES ('$fileName')");
        move_uploaded_file($_FILES['foto']['tmp_name'], "gambar/" . $_FILES['foto']['name']);
        $_SESSION['pesan'] = "berhasil";
        header('location:data_berat.php');
    }

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><input type="file" accept="image/*" name="foto" id="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" name="simpan" value="Upload"> <input type="reset" name="batal" value="Batal">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>