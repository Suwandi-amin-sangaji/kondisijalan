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
                                        <h5 class="m-b-10">Data Grafik</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#!">Grafik</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Data Grafik</a></li>
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
                                        <div class="card-block">
                                            <center>
                                                <canvas id="myChart2"></canvas>
                                            </center>
                                            <script>
                                                var ctx = document.getElementById("myChart2").getContext('2d');
                                                var myChart = new Chart(ctx, {
                                                    type: 'pie',
                                                    data: {
                                                        labels: ["Berat", "Sedang", "Baik"],
                                                        datasets: [{
                                                            label: '',
                                                            data: [
                                                            <?php 
                                                            $jumlah_sr = mysqli_query($con,"SELECT * FROM tb_kerusakan WHERE cluster='C1'");
                                                            echo mysqli_num_rows($jumlah_sr);
                                                            ?>, 
                                                            <?php 
                                                            $jumlah_cr = mysqli_query($con,"SELECT * FROM tb_kerusakan WHERE cluster='C3'");
                                                            echo mysqli_num_rows($jumlah_cr);
                                                            ?>, 
                                                            <?php 
                                                            $jumlah_tr = mysqli_query($con,"SELECT * FROM tb_kerusakan WHERE cluster='C2'");
                                                            echo mysqli_num_rows($jumlah_tr);
                                                            ?>
                                                            ],
                                                            backgroundColor: [
                                                            'rgb(205, 92, 92)',
                                                            'rgb(218, 165, 32)',
                                                            'rgb(46, 139, 87)',
                                                            ],
                                                            borderColor: [
                                                            'rgb(205, 92, 92)',
                                                            'rgb(218, 165, 32)',
                                                            'rgb(46, 139, 87)',
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero:true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                            </script>
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
