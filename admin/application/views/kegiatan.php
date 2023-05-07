<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Kegiatan
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <button type="button" data-toggle="modal" data-target="#tambah-kegiatan" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i> Tambah kegiatan</button>

                <!-- Modal Tambah Pelajaran -->
                <div class="modal fade" id="tambah-kegiatan">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-clone"></i> Tambah Kegiatan</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_kegiatan'); ?>" method="post" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="KodeKegiatan">Tahun Kegiatan :</label>
                                            <input type="text" name="kegiatan" class="form-control" placeholder="Masukkan Tahun Kegiatan..." required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="KodeKegiatan">Kegiatan :</label>
                                            <input type="text" name="nama_kegiatan" class="form-control" placeholder="Masukkan Kegiatan..." required="">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Modal Tambah Pelajaran -->
            </div>
            <div class="box-body">
                <table id="tabelkegiatan" class="table table-bordered table-striped table-hover" id="tabelkegiatan">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tahun Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kegiatan as $d) {
                        ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $d->kegiatan; ?></td>
                                <td><?= $d->nama_kegiatan; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editkegiatan<?= $d->id_kegiatan; ?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapuskegiatan<?= $d->id_kegiatan; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal Edit kegiatan -->
                            <div class="modal fade" id="editkegiatan<?= $d->id_kegiatan; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-clone"></i> Edit Data Kegiatan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/edit_kegiatan/' . $d->id_kegiatan); ?>" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="KodeKegiatan">Tahun :</label>
                                                        <input type="text" name="kegiatan" class="form-control" value="<?= $d->kegiatan ?>" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="KodeKegiatan">Kegiatan :</label>
                                                        <input type="text" name="nama_kegiatan" class="form-control" value="<?= $d->nama_kegiatan ?>" required="">
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
                            <!-- Modal Hapus Kegiatan -->
                            <div class="modal fade" id="hapuskegiatan<?= $d->id_kegiatan; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Kegiatan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body">
                                                <h4>Anda yakin akan menghapus Kegiatan <b><?= $d->kegiatan; ?></b> ?</h4>
                                                <p class="text-danger">*Menghapus Kegiatan terpilih dapat menghapus semua data yang terkait termasuk guru, soal, maupun nilai</p>
                                            </div>
                                            <div class="box-footer">
                                                <a href="<?= base_url('admin/hapus_kegiatan/' . $d->id_kegiatan); ?>" class="btn btn-danger">Ya</a> &nbsp;
                                                <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
    $(function() {
        $('#tabelkegiatan').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    })
</script>