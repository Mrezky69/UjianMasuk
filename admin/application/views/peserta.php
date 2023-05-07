<div class="content-wrapper">

    <section class="content-header">
        <h1 class="text-center">
            peserta
        </h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <button type="button" data-toggle="modal" data-target="#tambahpeserta" class="btn btn-sm btn-flat btn-success"><i class="fa fa-user-plus"></i> Tambah peserta</button>
                <!-- <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pilih File Excel</label>
                        <input type="file" name="fileExcel">
                    </div>
                    <div>
                        <button class='btn btn-success' type="submit">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Import
                        </button>
                    </div>
                </form> -->
            </div>
            <!-- Modal Tambah peserta -->
            <div class="modal fade" id="tambahpeserta">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="fa fa-user"></i> Tambah Data peserta</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('admin/tambah_peserta'); ?>" method="post" role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="Namapeserta">Nama peserta :</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama peserta..." required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Namapeserta">No Register :</label>
                                        <input type="text" name="no_register" class="form-control" placeholder="Masukkan no_register peserta..." required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Namapeserta">jurusan :</label>
                                        <select name="jurusan" id="" class="form-control" required>
                                            <option value="">Pilih jurusan...</option>
                                            <?php foreach ($listjurusan as $lk) { ?>
                                                <option value="<?= $lk->id_jurusan; ?>"><?= $lk->nama_jurusan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="askol">Asal Sekolah :</label>
                                        <input type="text" name="askol" class="form-control" placeholder="Masukkan Asal Sekolah .. " required="">
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
            <?php if (!empty($this->session->flashdata('peserta'))) { ?>
                <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('peserta'); ?></div>
            <?php } elseif (!empty($this->session->flashdata('sukses'))) { ?>
                <div class="alert alert-info" role="alert"><?= $this->session->flashdata('sukses'); ?></div>
            <?php } ?>
            <table id="tabelpeserta" class="table table-bordered table-striped table-hover" id="tabelpeserta">
                <thead>
                    <tr>
                        <th>No.</th>
                        <!-- <th>ID Peserta</th> -->
                        <th>Nama</th>
                        <th>No Register</th>
                        <th>jurusan</th>
                        <th>Asal Sekolah</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody id="datapeserta">
                    <?php
                    $no = 1;
                    foreach ($peserta as $s) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s->nama; ?></td>
                            <td><?= $s->no_register; ?></td>
                            <td><?= $s->nama_jurusan; ?></td>
                            <td><?= $s->askol; ?></td>
                            <td>
                                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#lihatPassword<?= $s->id_peserta; ?>"><i class="fa fa-eye"></i></button>
                                <button type="button" data-toggle="modal" data-target="#editpeserta<?= $s->id_peserta; ?>" class="btn btn-xs btn-warning" href="#"><i class="fa fa-edit"></i></button> &nbsp;
                                <button type="button" data-toggle="modal" data-target="#hapuspeserta<?= $s->id_peserta; ?>" class="btn btn-xs btn-danger" href="#"><i class="fa fa-user-times"></i></button>
                            </td>
                            <!-- <td>
                                </td> -->
                        </tr>
                        <!-- Modal Lihat Password peserta -->
                        <div class="modal fade" id="lihatPassword<?= $s->id_peserta; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> <?= $s->nama; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input value="<?= $s->password; ?>" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                        <!-- Modal Edit peserta -->
                        <div class="modal fade" id="editpeserta<?= $s->id_peserta; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-user"></i> Edit Data peserta</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/edit_peserta/' . $s->id_peserta); ?>" method="post">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="Nama">Nama :</label>
                                                    <input type="text" name="nama" value="<?= $s->nama; ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama">No Register :</label>
                                                    <input type="text" name="no_register" value="<?= $s->no_register; ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama">jurusan :</label>
                                                    <select name="jurusan" id="" class="form-control">
                                                        <option value="<?= $s->jurusan; ?>" selected><?= $s->nama_jurusan; ?></option>
                                                        <?php foreach ($listjurusan as $lk) { ?>
                                                            <option value="<?= $lk->id_jurusan; ?>"><?= $lk->nama_jurusan; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="askol">Asal Sekolah :</label>
                                                    <input type="text" name="askol" value="<?= $s->askol; ?>" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password :</label>
                                                    <input type="text" name="password" value="<?= $s->password; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus peserta -->
                        <div class="modal fade" id="hapuspeserta<?= $s->id_peserta; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Data peserta</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <h4>Anda yakin untuk menghapus peserta <b><?= $s->nama; ?></b> ?</h4>
                                            <p class="text-danger">*Menghapus data peserta terpilih akan menghapus semua data yang terkait seperti nilai dan yang lainnya...</p>
                                        </div>
                                        <div class="box-footer">
                                            <a href="<?= base_url('admin/hapus_peserta/' . $s->id_peserta); ?>" class="btn btn-danger">Ya</a> &nbsp;
                                            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Modal -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
</section>

</div>

<script src="<?= base_url('./../assets/js/datatable/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('./../assets/js/datatable/buttons.flash.min.js'); ?>"></script>
<script src="<?= base_url('./../assets/js/datatable/jszip.min.js'); ?>"></script>
<script src="<?= base_url('./../assets/js/datatable/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('./../assets/js/datatable/vfs_fonts.js'); ?>"></script>
<script src="<?= base_url('./../assets/js/datatable/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('./../assets/js/datatable/buttons.print.min.js'); ?>"></script>

<script>
    $(function() {
        $('#tabelpeserta').DataTable({
            dom: 'Bfrtip',
            'searching': true,
            buttons: ['csv', 'excel', 'pdf'],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
        });
    })
</script>