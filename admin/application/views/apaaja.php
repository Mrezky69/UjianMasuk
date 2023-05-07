<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            Kegiatan
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <!-- Modal Tambah Pelajaran -->
                <div class="modal fade" id="tambah-apa">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-clone"></i> Tambah Apaaja</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('admin/tambah_bebasaja'); ?>" method="post" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama_apa">Nama Apa :</label>
                                            <input type="text" name="nama_apa" class="form-control" placeholder="Masukkan Nama APA..." required="">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="KodeKegiatan">Kegiatan :</label>
                                            <input type="text" name="nama_kegiatan" class="form-control" placeholder="Masukkan Kegiatan..." required="">
                                        </div> -->
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
                <button type="button" data-toggle="modal" data-target="#tambah-apa" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i> Tambah kegiatan</button>
                <?php if (!empty($this->session->flashdata('message'))) { ?>
                    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('message'); ?></div>
                <?php } elseif (!empty($this->session->flashdata('sukses'))) { ?>
                    <div class="alert alert-info" role="alert"><?= $this->session->flashdata('sukses'); ?></div>
                <?php } ?>
                <table id="tabelkegiatan" class="table table-bordered table-striped table-hover" id="tabelkegiatan">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Apaaja</th>
                            <th>BUTTON</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($aajalah as $d) {
                        ?>
                            <tr>
                                <td><?= $no++; ?>.</td>
                                <td><?= $d->nama_apa; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editapa<?= $d->id_apa; ?>"><i class="fa fa-edit"></i> Edit</button> &nbsp;
                                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapusapaaja<?= $d->id_apa; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal Edit kegiatan -->
                            <div class="modal fade" id="editapa<?= $d->id_apa; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-clone"></i> Edit Data Kegiatan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/edit_bebasaja/' . $d->id_apa); ?>" method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="nama_apa">Nama APA :</label>
                                                        <input type="text" name="nama_apa" class="form-control" value="<?= $d->nama_apa ?>" required="">
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
                            <div class="modal fade" id="hapusapaaja<?= $d->id_apa; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus APA</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body">
                                                <h4>Anda yakin akan menghapus APA <b><?= $d->nama_apa; ?></b> ?</h4>
                                                <p class="text-danger">*Menghapus Kegiatan terpilih dapat menghapus semua data yang terkait termasuk guru, soal, maupun nilai</p>
                                            </div>
                                            <div class="box-footer">
                                                <a href="<?= base_url('admin/hapus_bebasaja/' . $d->id_apa); ?>" class="btn btn-danger">Ya</a> &nbsp;
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
        $('#tabelapa').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    })
</script>