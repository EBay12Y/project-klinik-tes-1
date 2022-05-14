<?php

    $no_pasien = $_GET['no_pasien'];
    $sql = $koneksi->query("select * from tb_pasien where no_pasien='$no_pasien'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PASIEN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <!-- <label for="">Kode Pasien</label> -->
                        <!-- <div class="form-group"> -->
                            <!-- <div class="form-line"> -->
                                <input type="hidden" name="no_pasien" value="<?php echo $tampil['no_pasien'];?>" class="form-control" readonly/>
                            <!-- </div> -->
                        <!-- </div> -->

                        <label for="">Nama Pasien</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_pasien'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="j_kel" class="form-control show-tick">
                                    <option value="">--   Pilih Jenis Kelamin   --</option>
                                    <option value="L"<?php if($tampil['j_kel']=='L') echo "selected";?>>Laki-Laki</option>
                                    <option value="P"<?php if($tampil['j_kel']=='P') echo "selected";?>>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Tanggal Lahir</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lhr'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">No Telp</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="no_telp" value="<?php echo $tampil['no_tlp'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Status</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="status" class="form-control show-tick">
                                    <option value="">--   Pilih Jenis Kelamin   --</option>
                                    <option value="A"<?php if($tampil['status']=='A') echo "selected";?>>Aktif</option>
                                    <option value="TA"<?php if($tampil['status']=='TA') echo "selected";?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Pekerjaan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="pekerjaan" value="<?php echo $tampil['pekerjaan'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Agama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="agama" class="form-control show-tick">
                                    <option value="">--   Pilih Agama   --</option>
                                    <option value="Islam"<?php if($tampil['agama']=='Islam') echo "selected";?>>Islam</option>
                                    <option value="Protestan"<?php if($tampil['agama']=='Protestan') echo "selected";?>>Protestan</option>
                                    <option value="Katolik"<?php if($tampil['agama']=='Katolik') echo "selected";?>>Katolik</option>
                                    <option value="Hindu"<?php if($tampil['agama']=='Hindu') echo "selected";?>>Hindu</option>
                                    <option value="Buddha"<?php if($tampil['agama']=='Buddha') echo "selected";?>>Buddha</option>
                                    <option value="Khonghucu"<?php if($tampil['agama']=='Khonghucu') echo "selected";?>>Khonghucu</option>
                                </select>
                            </div>
                        </div>


                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$username=$_POST['username'];
$nama=$_POST['nama'];
$password=$_POST['password'];
$level=$_POST['level'];
$foto=$_POST['foto'];


    $sql=$koneksi->query("update tb_pengguna set username='$username',nama='$nama',password='$password',level='$level',foto='$foto' where id='$id'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Ubah");
        window.location.href="?page=pengguna";
        </script>
        <?php
    }
}

?>