<?php
session_start();
if ($_SESSION['level'] == "") {
    header("location:../login/login.php");
}
include 'head.php';
include 'menu.php';
include 'header.php';
include 'koneksi.php';
?>
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Data Kerusakan Baik</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Lokasi</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Data Kerusakan Baik</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ configuration table ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Data Kerusakan</h5>
                                    </div>
                                    <div class="card-block">
                                        <?php
                                        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                            echo
                                            '
                                                    <div class="alert alert-success" role="alert">
                                                        ' . $_SESSION['pesan'] . '
                                                    </div>
                                                ';
                                        }
                                        $_SESSION['pesan'] = '';
                                        ?>
                                        <a href="tambah_baik.php" class="btn btn-info btn-sm">Tambah Data</a>
                                        <br>
                                        <br>
                                        <div class="table-responsive">
                                            <table id="key-act-button"
                                                class="display table nowrap table-striped table-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr align="center" valign="baseline">
                                                        <th>No</th>
                                                        <th>Nama Jalan</th>
                                                        <th>Kordinat</th>
                                                        <th>Gambar</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $noUrut = 0;
                                                    $result = mysqli_query($con, "SELECT * FROM tb_baik 
                                                              JOIN tb_jalan ON tb_baik.id_jalan=tb_jalan.id_jalan
                                                              JOIN tb_kerusakan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan  
                                                                ORDER BY id_baik");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $noUrut++;
                                                    ?>
                                                    <tr align="center" valign="baseline">
                                                        <td><?php echo $noUrut ?></td>
                                                        <td><?php echo $row["nama"]; ?></td>
                                                        <td><?php echo $row["lat"] . ',' . $row["lon"]; ?></td>
                                                        <td>
                                                            <img src="gambar/<?php echo $row['foto']; ?>"
                                                                style="width:100px;height:100px;">
                                                        </td>
                                                        <td>
                                                            <a href="edit_baik.php?id=<?php echo $row['id_baik']; ?>"
                                                                class="btn btn-warning btn-sm feather icon-edit"></a>
                                                            <a href="hapus_baik.php?id=<?php echo $row['id_baik']; ?>"
                                                                class="btn btn-danger btn-sm feather icon-trash"></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ configuration table ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- [ Main Content ] end -->

<?php
include 'foot.php';
?>