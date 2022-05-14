<?php
    $tgl=date("Y-m-d");

    $sql2=$koneksi->query("select * from tb_dokter");

    while ($tampil2=$sql2->fetch_assoc()){
        $jumlah_dokter=$sql2->num_rows;
    }

    $sql3=$koneksi->query("select * from tb_obat");

    while ($tampil3=$sql3->fetch_assoc()){
        $jumlah_obat=$sql3->num_rows;
    }

    $sql4=$koneksi->query("select * from tb_pasien");

    while ($tampil4=$sql4->fetch_assoc()){
        $jumlah_pasien=$sql4->num_rows;
    }

    $sql5=$koneksi->query("select * from tb_rekam_medis where tgl_pemeriksaan='$tgl'");

    while ($tampil5=$sql5->fetch_assoc()){
        $jumlah_rekam_medisr=$sql5->num_rows;
    }
?>

<p align="center"><img src="images/logoKlinik2.png" width="360"></p>
<div class="container-fluid">
    <br><br>
            <div class="block-header">
                <h2 align="center">DASHBOARD</h2>
            </div> 
            <br>

            <!-- Widgets -->
            <div class="row clearfix">
            <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="info-box bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <a href="?page=dokter"><img src="images/table-tick.ico" width="50" height="70"></a>
                        </div>
                        <div class="content">
                            <div class="text">Data Dokter</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <?php echo"$jumlah_dokter"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-box bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <a href="?page=obat"><img src="images/table-tick.ico" width="50" height="70"></a>
                        </div>
                        <div class="content">
                            <div class="text">Data Obat</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php echo"$jumlah_obat"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
            <div class="col-md-3"></div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <a href="?page=pasien"><img src="images/table-tick.ico" width="50" height="70"></a>
                        </div>
                        <div class="content">
                            <div class="text">Data Pasien</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php echo"$jumlah_pasien"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <a href="?page=dokter"><img src="images/table-tick.ico" width="50" height="70"></a>
                        </div>
                        <div class="content">
                            <div class="text">Pasien Hari Ini</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php echo"$jumlah_rekam_medis"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>