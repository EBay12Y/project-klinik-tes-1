<?php
 
// menghubungkan dengan koneksi database
$koneksi=new mysqli("localhost","root","","db_klinik");
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(id) as kodeTerbesar FROM tb_pengguna");
$data = mysqli_fetch_array($query);
$nopengguna = $data['kodeTerbesar'];
$nopengguna++;
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PENGGUNA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">

                        <label for="">ID</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id" value="<?php echo $nopengguna; ?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Username</label>
                        <div class="form-group" >
                            <div class="form-line">
                                <input type="text" name="username" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Pengguna</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                        </div>

                        <label for="">Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>

                        <label for="">Level</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="level" class="form-control show-tick">
                                    <option value="">--   Pilih Level   --</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="apoteker">Apoteker</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="foto" class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$id=$_POST['id'];
$username=$_POST['username'];
$nama=$_POST['nama'];
$password=$_POST['password'];
$level=$_POST['level'];
$foto=$_POST['foto'];


    $sql=$koneksi->query("insert into tb_pengguna values('$id','$username','$nama','$password','$level','$foto')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=pengguna";
        </script>
        <?php
    }
}

?>