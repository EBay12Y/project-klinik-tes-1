<?php
    $kode=$_GET['koderm'];
?>
<!-- Basic Examples -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                                <form method="POST">
                                    <div>
                                        <label for="">No. ID</label>
                                        <div class="row clearfix">
                                            <div class="col-md-2">
                                                <input type="text" name="kode" value="<?php echo $kode;?>" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" id="no_pasien" name="no_pasien" class="form-control" data-toggle="modal"
                                                data-target="#myModal" required="">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" name="simpan" value="Cari Pasien" class="btn btn-primary">
                                            </div>
                                        </div>
                                        <label for="">Pilih Dokter</label>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                            <select class="form-control show-tick" name="dokter">
                                                <?php
                                                    $lbl = '<option value=""> --  Pilih Dokter  -- </option>';
                                                    $dokter=$koneksi->query("select * from tb_dokter order by kd_dokter");
                                                    while($d_dokter=$dokter->fetch_assoc()){
                                                        echo "<option value='$d_dokter[kd_dokter]'>$d_dokter[nm_dokter]</option>";
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
</div>
<?php
    if(isset($_POST['simpan'])){
        date_default_timezone_set('Asia/Jakarta');
        $date=date("Y-m-d H:i:s");
        $no_rm=$_POST['kode'];
        $no_pasien=$_POST['no_pasien'];
        $kddokter=$_POST['dokter'];

        
        $rekam_medis =$koneksi->query("SELECT * FROM tb_rekam_medis WHERE no_pasien='$no_pasien'");

        if(mysqli_num_rows($rekam_medis) <= 0){
            $koneksi->query("INSERT INTO tb_rekam_medis (no_rm, no_pasien, diagnosa, tgl_pemeriksaan, ket, status, statusobat, kd_dokter) 
                                VALUES('$no_rm','$no_pasien','-','$date','-','Dalam Antrian','Dalam Antrian' ,'$kddokter')");
            $koneksi->query("UPDATE tb_pasien SET status='A' where no_pasien='$no_pasien'");
            ?>
            <script type="text/javascript">
                alert("tes tes");
                
                window.location.href="?page=rekam_medis&koderm=<?php echo $kode;?>";
            </script>
            <?php
        }else {
            ?>
            <script type="text/javascript">
                alert("Pasien sudah terdaftar");
                window.location.href="?page=rekam_medis&koderm=<?php echo $kode;?>";
            </script>
            <?php
            
           
        }

        
    }
?>

<?php
function hitung_umur($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
	
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y." tahun";
}

?>

<form action="" method="POST">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PASIEN
                            </h2>
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Usia</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Status</th>
                                            <th>Pekerjaan</th>
                                            <th>Agama</th>
                                            <th>Tgl Daftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        $sql=$koneksi->query("SELECT tb_pasien.no_pasien, nm_pasien, j_kel, tgl_lhr, agama, no_tlp,
                                        alamat FROM tb_pasien, tb_rekam_medis where tb_rekam_medis.no_pasien=tb_pasien.no_pasien
                                        AND no_rm='$kode'");
                                        while($data=$sql->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $data['no_pasien'];?></td>
                                                <td><?php echo $data['nm_pasien'];?></td>
                                                <td><?php echo $data['j_kel'];?></td>
                                                <td><?php echo $data['tgl_lhr'];?></td>
                                                <td><?php echo hitung_umur($data['tgl_lhr']);?></td>
                                                <td><?php echo $data['alamat'];?></td>
                                                <td><?php echo $data['no_tlp'];?></td>
                                                <td><?php echo $data['status'];?></td>
                                                <td><?php echo $data['pekerjaan'];?></td>
                                                <td><?php echo $data['agama'];?></td>
                                                <td><?php echo $data['tgldaftar'];?></td>
                                                <td>
                                                    <a href="?page=rekam_medis&aksi=hapus&no_pasien=<?php echo $data['no_pasien'];?>
                                                    $no_rm=<?php echo $data['no_rm'];?>"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table> 
                                <br> <br> 
                                <input type="submit" name="simpanawal" value="Simpan" class="btn btn-primary">
                                <br> <br> 
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- #END# Basic Examples -->
                   
<!-- Awal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       
                         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h1 class="modal-title" id="myModalLabel">
                                DATA PASIEN
                            </h1>
                            
                        </div>
                        <div class="modal-body">
                            
                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <!--<th>No.</th>-->
                                            <th>Nomor Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Kelamin</th>
                                            <th>Usia</th>
                                             <th>Alamat</th>
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    
                                    $sql= $koneksi->query("select * from tb_pasien");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr class="pilih" data-nopasien="<?php echo $data['no_pasien']; ?>">
                                        
                                        <td><?php echo $data['no_pasien']?></td>
                                        <td><?php echo $data['nm_pasien']?></td>
                                        <td><?php echo $data['j_kel']?></td>
                                        <td><?php echo hitung_umur($data['tgl_lhr']);?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                       
            </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
                // jika dipilih, no_pasien akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("no_pasien").value = $(this).attr('data-nopasien');
                $('#myModal').modal('hide');
            });
            

// tabel lookup pasien
            $(function () {
                $("#lookup").dataTable();
            });
        
        </script>

<!--Akhir Modal-->