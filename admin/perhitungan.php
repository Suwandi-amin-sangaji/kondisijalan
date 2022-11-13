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

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                                <div class="row">
                                <!-- [ sample-page ] start -->
                                <div class="col-sm-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Perhitungan</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#!">Analisa</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Perhitungan</a></li>
                                    </ul>
                                    <div class="card">
                                        <div class="card-block">
                                            <center>
                                                <p>Mulai perhitungan?</p>
                                                <a class="btn btn-primary" href="iterasi_awal.php">Mulai</a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ sample-page ] end -->
                            </div>
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