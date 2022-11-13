<?php  
    session_start();
    if($_SESSION['level']==""){
        header("location:../login/login.php");
    } 
    include 'head.php';
    include 'menu.php';
    include 'header.php';
    include 'koneksi.php';
?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Edit Pengguna</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#!">Pengguna</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Edit Pengguna</a></li>
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
                                <div class="col-sm-12">
                                </div>
                                <!-- [ form-element ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php
                                                        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                                        echo 
                                                        '
                                                            <div class="alert alert-danger" role="alert">
                                                                '.$_SESSION['pesan'].'
                                                            </div>
                                                        ';
                                                        }
                                                        $_SESSION['pesan'] = '';
                                                    ?>
                                                    <?php 
                                                      $id = $_GET['id'];
                                                      $data = mysqli_query($con,"SELECT * FROM tb_pengguna WHERE id_pengguna='$id'");
                                                      while($d = mysqli_fetch_array($data))
                                                      {
                                                    ?>
                                                    <form action="update_pengguna.php" method="post" enctype='multipart/form-data'>
                                                        <div class="form-group">
                                                            <label>Foto</label>
                                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                                            <input type="file" class="form-control" placeholder="" name="filegambar" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" placeholder="Nama" name="b" required value="<?php echo $d['nama']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" placeholder="Username" name="c" required value="<?php echo $d['username']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="text" class="form-control" placeholder="Password" name="d" required value="<?php echo $d['password']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Level</label>
                                                        <select class="form-control" name="e">
                                                            <option <?php if ($d['level'] == 'Administrator') { echo 'selected'; }?> value="Administrator">Administrator</option>
                                                            <option <?php if ($d['level'] == 'Pemantau') { echo 'selected'; }?> value="Pemantau">Pemantau</option>
                                                      </select>
                                                    </div>
                                                        <center>
                                                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                                            <a class="btn btn-danger" href="data_pengguna.php">Kembali</a>
                                                        </center>
                                                    </form>
                                                    <?php  
                                                        }
                                                    ?>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ form-element ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
<?php  
    include 'foot.php';
?>