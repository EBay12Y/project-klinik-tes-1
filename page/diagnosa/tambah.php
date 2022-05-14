<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA DIAGNOSA
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">Kode</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" class="form-control" />
                            </div>
                        </div>

                        <label for="">Nama Diagnosa</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Diagnosa ICD10</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="diagnosaicd10" class="form-control" />
                            </div>
                        </div>

                        
                        <label for="">Jenis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="jenis" class="form-control show-tick">
                                    <option value="">--   Pilih Jenis   --</option>
                                    <option value="Penyakit Dalam">Penyakit Dalam</option>
                                    <option value="Penyakit Luar">Penyakit Luar</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jenis=$_POST['jenis'];
$diagnosaicd10=$_POST['diagnosaicd10'];


    $sql=$koneksi->query("insert into tb_diagnosa values('$kode','$nama','$diagnosaicd10','$jenis')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=diagnosa";
        </script>
        <?php
    }
}

?>