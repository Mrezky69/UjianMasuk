<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">
            Soal </h1>
    </section>
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <!-- Modal Tambah soal -->
                <a href="<?= base_url('tsoal'); ?>"><button type="button" data-toggle="modal" class="btn btn-sm btn-flat btn-success"><i class="fa fa-list-alt"></i> Tambah Soal</button></a>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover" id="tabelsoal">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kegiatan</th>
                                <th>Tahun</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($soal as $k) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $k->nama_kegiatan; ?></td>
                                    <td><?= $k->kegiatan; ?></td>
                                    <td><?= $k->soal; ?></td>
                                    <td><?= $k->jawaban; ?></td>
                                    <td>
                                        <button class="btn btn-xs btn-info m2px" data-toggle="modal" data-target="#info<?= $k->id_soal; ?>"><i class="fa fa-info"></i> Info</button>
                                        <a href="<?= base_url('editsoal/' . $k->id_soal); ?>" class="btn btn-xs btn-warning m2px"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapussoal<?= $k->id_soal; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Info Soal -->
                                <div class="modal fade" id="info<?= $k->id_soal; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-list-alt"></i> Info Soal</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <?php
                                                    $ex = explode(".", $k->media);
                                                    $ex = strtolower(end($ex));
                                                    if ($ex == 'jpg' || $ex == "png") { ?>
                                                        <img src="<?= base_url('./../media/' . $k->media); ?>" class="img-thumbnail">
                                                    <?php }
                                                    if ($ex == 'mp3' || $ex == 'wav') { ?>
                                                        <audio src="<?= base_url('./../media/' . $k->media); ?>" controls></audio>
                                                    <?php } ?>
                                                    <div class="box box-solid with-border info-soal">
                                                        <div class="box-body">
                                                            <h5>Soal :</h5>
                                                            <p><?= $k->soal; ?></p>
                                                            <hr>
                                                            <h5>Opsi A :</h5>
                                                            <p><?= $k->opsi_a; ?></p>
                                                            <h5>Opsi B :</h5>
                                                            <p><?= $k->opsi_b; ?></p>
                                                            <h5>Opsi C :</h5>
                                                            <p><?= $k->opsi_c; ?></p>
                                                            <h5>Opsi D :</h5>
                                                            <p><?= $k->opsi_d; ?></p>
                                                            <h5>Opsi E</h5>
                                                            <p><?= $k->opsi_e; ?></p>
                                                            <h4>Jawaban : </h4>
                                                            <p><?= $k->jawaban; ?></p>
                                                        </div>
                                                        <!-- <div class="box-footer">
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus soal-->
                                <div class="modal fade" id="hapussoal<?= $k->id_soal; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data soal</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <h4>Anda yakin akan menghapus soal <?= $k->soal; ?>?</h4>
                                                    <p class="text-danger">*Menghapus data peserta terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                                </div>
                                                <div class="box-footer">
                                                    <a href="<?= base_url('admin/hapus_soal/' . $k->id_soal); ?>" class="btn btn-danger">Ya</a> &nbsp;
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
    $(document).ready(function() {
        $('#pilihkegiatan').on('change', function() {
            var id = $(this).val();
            location.href = '<?= base_url("soal/" . $jurusan['id_jurusan'] . "/"); ?>' + id;
        })
        $('#tabelSoal').DataTable();
    })
</script>