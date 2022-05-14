<?php
    $kd_obat = $_GET['kd_obat'];
    $sql = $koneksi->query("select * from tb_obat where kd_obat='$kd_obat'");
    $tampil = $sql->fetch_assoc();
?>
<script>
function jumlah(){
    
var hrg_beli = document.getElementById('harga_beli').value;
var hrg_jual = document.getElementById('harga_jual').value;
var hasil = parseInt(hrg_jual) - parseInt(hrg_beli);
if(!isNaN(hasil)){
    document.getElementById('profit').value = hasil;
}

}
</script>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA OBAT
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">

                        <label for="">Kode Obat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $tampil['kd_obat'];?>" class="form-control" readonly />
                            </div>
                        </div>

                        <label for="">Nama Obat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['nm_obat'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="satuan" class="form-control show-tick">
                                    <option value="">--   Pilih Satuan   --</option>
                                    <option value="Tablet" <?php if($tampil['satuan']=='Tablet') echo "selected";?>>Tablet</option>
                                    <option value="Kapsul" <?php if($tampil['satuan']=='Kapsul') echo "selected";?>>Kapsul</option>
                                    <option value="Puyer" <?php if($tampil['satuan']=='Puyer') echo "selected";?>>Puyer</option>
                                    <option value="Sirup" <?php if($tampil['satuan']=='Sirup') echo "selected";?>>Sirup</option>
                                    <option value="Obat Oles/Tetes" <?php if($tampil['satuan']=='Obat Oles/Tetes') echo "selected";?>>Obat Oles/Tetes</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Harga Beli</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="harga_beli" type="number" value="<?php echo $tampil['harga_beli'];?>" onkeyup="jumlah();" name="harga_beli" class="form-control" />
                            </div>
                        </div>

                        <label for="">Harga Jual</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="harga_jual" type="number" value="<?php echo $tampil['harga_jual'];?>" onkeyup="jumlah();" name="harga_jual"class="form-control" />
                            </div>
                        </div>

                        <label for="">Profit</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="profit" type="text" name="profit" value="<?php echo $tampil['profit'];?>" class="form-control" readonly/>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$satuan=$_POST['satuan'];
$isi=$_POST['1'];
$stok=$_POST['10'];
$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$profit=$_POST['profit'];

    $sql=$koneksi->query("update tb_obat set nm_obat='$nama', satuan='$satuan', isi='$isi', stok='$stok',
    harga_beli='$harga_beli', harga_jual='$harga_jual', profit='$profit' where kd_obat='$kode'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=obat";
        </script>
        <?php
    }
}

?>