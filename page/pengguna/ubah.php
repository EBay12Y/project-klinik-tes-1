<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("select * from tb_pengguna where id='$id'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA DOKTER
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username" value="<?php echo $tampil['username'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Pengguna</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nama'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Passsword</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="password" value="<?php echo $tampil['password'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Level</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="level" value="<?php echo $tampil['level'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="foto" value="<?php echo $tampil['foto'];?>" class="form-control" />
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