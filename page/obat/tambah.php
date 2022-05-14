<?php
 
// menghubungkan dengan koneksi database
$koneksi=new mysqli("localhost","root","","db_klinik");
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kd_obat) as kodeTerbesar FROM tb_obat");
$data = mysqli_fetch_array($query);
$noobat = $data['kodeTerbesar'];
 
// mengambil angka dari nmor pasien terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($noobat, 3, 5);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk nomor pasien baru
// perintah sprintf("%05s", $urutan); berguna untuk membuat string menjadi 5 karakter
// misalnya perintah sprintf("%05s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya OBT
$huruf = "OBT";
$noobat = $huruf . sprintf("%05s", $urutan);
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
                                TAMBAH DATA OBAT
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $noobat; ?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Obat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="satuan" class="form-control show-tick">
                                    <option value="">--   Pilih Satuan   --</option>
                                    <option value="Tablet">Tablet</option>
                                    <option value="Kapsul">Kapsul</option>
                                    <option value="Puyer">Puyer</option>
                                    <option value="Sirup">Sirup</option>
                                    <option value="Obat Oles/Tetes">Obat Oles/Tetes</option>
                                </select>
                            </div>
                        </div>

                        <label for="">Harga Beli</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="harga_beli" type="number" onkeyup="jumlah();" name="harga_beli" class="form-control" />
                            </div>
                        </div>

                        <label for="">Harga Jual</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="harga_jual" type="number" onkeyup="jumlah();" name="harga_jual"class="form-control" />
                            </div>
                        </div>

                        <label for="">Profit</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="profit" type="text" name="profit" class="form-control" readonly/>
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
$stok=$_POST['1'];
$harga_beli=$_POST['harga_beli'];
$harga_jual=$_POST['harga_jual'];
$profit=$_POST['profit'];

    $sql=$koneksi->query("insert into tb_obat values('$kode','$nama','$satuan','$isi','$stok','$harga_beli','$harga_jual','$profit')");
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