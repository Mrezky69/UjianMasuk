<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Jurusan
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambah-jurusan" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i> Tambah Jurusan</button>
                <!-- Modal Tambah jurusan -->
                <div class="modal fade" id="tambah-jurusan">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                <h4><i class="fa fa-th-large"></i> Tambah Data Jurusan</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= site_url('admin/tambah_jurusan'); ?>" method="post" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Jurusan">Kode Jurusan :</label>
                                            <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Kode Jurusan..." required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="Jurusan">Nama Jurusan :</label>
                                            <input type="text" name="namajurusan" class="form-control" placeholder="Masukkan Nama Jurusan..." required="">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal -->
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover" id="tabeljurusan">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jurusan as $k) {
                        ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $k->jurusan; ?></td>
                                <td><?= $k->nama_jurusan; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editJurusan<?= $k->id_jurusan; ?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusJurusan<?= $k->id_jurusan; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal Edit jurusan -->
                            <div class="modal fade" id="editJurusan<?= $k->id_jurusan; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-th-large"></i> Edit Data Jurusan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/edit_jurusan/' . $k->id_jurusan); ?>" method="post" role="form">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="Jurusan">Jurusan :</label>
                                                        <input type="text" name="jurusan" class="form-control" value="<?= $k->jurusan; ?>" placeholder="Masukkan Kode Jurusan..." required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Jurusan">Nama Jurusan :</label>
                                                        <input type="text" name="namajurusan" class="form-control" value="<?= $k->nama_jurusan; ?>" placeholder="Masukkan Nama Jurusan..." required="">
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Modal -->
                            <!-- Modal Hapus jurusan-->
                            <div class="modal fade" id="hapusJurusan<?= $k->id_jurusan; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data Jurusan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body">
                                                <h4>Anda yakin akan menghapus Jurusan <?= $k->nama_jurusan; ?>?</h4>
                                                <p class="text-danger">*Menghapus data peserta terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                            </div>
                                            <div class="box-footer">
                                                <a href="<?= base_url('admin/hapus_jurusan/' . $k->id_jurusan); ?>" class="btn btn-danger">Ya</a> &nbsp;
                                                <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End Modal-->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
    $(function() {
        $('#tabelJurusan').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    })
</script>