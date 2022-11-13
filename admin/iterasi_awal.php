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
                                        <h5 class="m-b-10">Perhitungan</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#!">Analisa</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Perhitungan</a></li>
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
                                            <div class="table-responsive">
                                                <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr align="center" valign="baseline">
                                                            <th>No</th>
                                                            <th>Nama Jalan</th>
                                                            <th>Jumlah Lubang</th>
                                                            <th>Ukuran Lubang</th>
                                                            <th>Bekas Roda</th>
                                                            <th>Cluster</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $a = mysqli_query($con, "SELECT * FROM tb_kerusakan
                                                                JOIN tb_jalan ON tb_kerusakan.id_jalan=tb_jalan.id_jalan
                                                                ORDER BY id_kerusakan ASC");
                                                            $noUrut = 0;
                                                            while($row = mysqli_fetch_array($a))
                                                            {
                                                                $noUrut++;
                                                                //C1
                                                                $a1 = $row['jum_lubang'];
                                                                $b1 = $row['uk_lubang'];
                                                                $c1 = $row['bekas_roda'];

                                                                $y2 = mysqli_query($con,"SELECT * FROM tb_centroid WHERE cluster = 'C1'");
                                                                $z2 = mysqli_fetch_array($y2);
                                                                $c1a = $z2['jum_lubang'];
                                                                $c1b = $z2['uk_lubang'];
                                                                $c1c = $z2['bekas_roda'];
                                                                
                                                                $y22 = mysqli_query($con,"SELECT * FROM tb_centroid WHERE cluster = 'C2'");
                                                                $z22 = mysqli_fetch_array($y22);                  
                                                                $c2a = $z22['jum_lubang'];
                                                                $c2b = $z22['uk_lubang'];
                                                                $c2c = $z22['bekas_roda'];
                                                                
                                                                $y222 = mysqli_query($con,"SELECT * FROM tb_centroid WHERE cluster = 'C3'");
                                                                $z222 = mysqli_fetch_array($y222);                  
                                                                $c3a = $z222['jum_lubang'];
                                                                $c3b = $z222['uk_lubang'];
                                                                $c3c = $z222['bekas_roda'];
                                                                               

                                                                //C1                        
                                                                $x = round(sqrt(pow($a1-$c1a,2)+pow($b1-$c1b,2)+pow($c1-$c1c,2)),2);

                                                                //C2                            
                                                                $y = round(sqrt(pow($a1-$c2a,2)+pow($b1-$c2b,2)+pow($c1-$c2c,2)),2);

                                                                //C3                            
                                                                $z = round(sqrt(pow($a1-$c3a,2)+pow($b1-$c3b,2)+pow($c1-$c3c,2)),2) ;

                                                                //Pengclusteran
                                                                if ($x<$y && $x<$z) {
                                                                    $cluster='C1';
                                                                    $ket = 'Berat';
                                                                }elseif ($y<$x && $y<$z) {
                                                                    $cluster='C2';
                                                                    $ket = 'Baik';
                                                                }elseif ($z<$x && $z<$y) {
                                                                    $cluster='C3';
                                                                    $ket = 'Sedang';
                                                                }

                                                                mysqli_query($con,"UPDATE tb_kerusakan SET cluster = '$cluster' WHERE id_jalan='$row[id_jalan]'");     
                                                        ?>
                                                            <tr align="center" valign="baseline">
                                                                <td><?php echo $noUrut ?></td>
                                                                <td><?php echo $row["nama"]; ?></td>
                                                                <td><?php echo round($x,2); ?></td>
                                                                <td><?php echo round($y,2); ?></td>
                                                                <td><?php echo round($z,2); ?></td>
                                                                <td><?php echo $cluster; ?></td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <table id="zero-configuration" class="display table nowrap table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr align="center" valign="baseline">
                                                            <th>No</th>
                                                            <th>Cluster</th>
                                                            <th>Jumlah Lubang</th>
                                                            <th>Ukuran Lubang</th>
                                                            <th>Bekas Roda</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $a = mysqli_query($con, "SELECT * FROM tb_centroida");
                                                            $noUrut = 0;
                                                            while($row = mysqli_fetch_array($a))
                                                            {
                                                                $noUrut++;
                                                                //rata-rata C1
                                                                $c1 = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_kerusakan WHERE cluster='C1'"));
                                                                //$c1 = mysqli_fetch_array($x);
                                                                $jumlah_c1 = mysqli_query ($con,"SELECT COUNT(cluster) FROM tb_kerusakan WHERE cluster='C1'");
                                                                $d = mysqli_fetch_array($jumlah_c1);

                                                                mysqli_query($con, "SELECT SUM(tb_kerusakan.jum_lubang) AS jum_lubang FROM tb_kerusakan WHERE cluster = 'C2'");
                                                                                
                                                        ?>
                                                            <tr align="center" valign="baseline">
                                                                <td><?php echo $noUrut ?></td>
                                                                <td><?php echo $row["cluster"]; ?></td>
                                                                <td>
                                                                    <?php
                                                                        $tes = mysqli_query($con,"SELECT COUNT(tb_kerusakan.cluster) AS total, SUM(tb_kerusakan.jum_lubang) AS jum_lubang FROM tb_kerusakan WHERE cluster = '$row[cluster]'");
                                                                        $c1 = mysqli_fetch_array($tes);

                                                                        $q1 = $c1['jum_lubang'];
                                                                        $q2 = $c1['total'];

                                                                        $hasilk1 = $q1/$q2;

                                                                        $kk1 = round($hasilk1,2);

                                                                        mysqli_query($con,"UPDATE tb_centroidp SET jum_lubang = '$kk1' WHERE cluster='$row[cluster]'");

                                                                        echo round($hasilk1,2);
                                                                    ?>  
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        $coba = mysqli_query($con,"SELECT COUNT(tb_kerusakan.cluster) AS total, SUM(tb_kerusakan.uk_lubang) AS uk_lubang FROM tb_kerusakan WHERE cluster = '$row[cluster]'");
                                                                        $c2 = mysqli_fetch_array($coba);

                                                                        $p1 = $c2['uk_lubang'];
                                                                        $p2 = $c2['total'];

                                                                        $hasilk2 = $p1/$p2;

                                                                        $kk2 = round($hasilk2,2);

                                                                        mysqli_query($con,"UPDATE tb_centroidp SET uk_lubang = '$kk2' WHERE cluster='$row[cluster]'");

                                                                        echo round($hasilk2,2);
                                                                    ?>  
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        $kah = mysqli_query($con,"SELECT COUNT(tb_kerusakan.cluster) AS total, SUM(tb_kerusakan.bekas_roda) AS bekas_roda FROM tb_kerusakan WHERE cluster = '$row[cluster]'");
                                                                        $c3 = mysqli_fetch_array($kah);

                                                                        $r1 = $c3['bekas_roda'];
                                                                        $r2 = $c3['total'];

                                                                        $hasilk3 = $r1/$r2;

                                                                        $kk3 = round($hasilk3,2);

                                                                        mysqli_query($con,"UPDATE tb_centroidp SET bekas_roda = '$kk3' WHERE cluster='$row[cluster]'");

                                                                        echo round($hasilk3,2);
                                                                    ?>  
                                                                </td>
                                                            </tr>

                                                            <?php
                                                                }
                                                            ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <center>
                                                <a class="btn btn-primary" href="iterasi_lanjutan.php">Iterasi Selanjutnya</a><br><br>
                                                </center>
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
