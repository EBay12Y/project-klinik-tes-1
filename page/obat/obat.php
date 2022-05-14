<!-- Basic Examples -->
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA OBAT
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode</th>
                                            <th>Nama Obat</th>
                                            <th>Jenis</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Profit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        $sql=$koneksi->query("select * from tb_obat");
                                        while($data=$sql->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $data['kd_obat'];?></td>
                                                <td><?php echo $data['nm_obat'];?></td>
                                                <td><?php echo $data['satuan'];?></td>
                                                <td><?php echo $data['harga_beli'];?></td>
                                                <td><?php echo $data['harga_jual'];?></td>
                                                <td><?php echo $data['profit'];?></td>
                                                <td>
                                                    <a href="?page=obat&aksi=ubah&kd_obat=<?php echo $data['kd_obat']; ?>" 
                                                    class="btn btn-success"><img src="images/edit.ico" width="15"></a>
                                                    <a onclick="return confirm ('Anda yakin akan menghapus data ini?')" 
                                                    href="?page=obat&aksi=hapus&kd_obat=<?php echo $data['kd_obat'];?>"
                                                    class="btn btn-danger"><img src="images/delete.ico" width="15"></a>
                                            </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                                <a href="?page=obat&aksi=tambah" class="btn btn-primary">
                                    <img src="images/edit_add.png" width="15"> Tambah
                                </a>
                                <br> <br> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->