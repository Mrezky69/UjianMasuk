<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center"> Nilai</small></h1>
    </section>

    <section class="content">
        <div class="box box-info box-solid">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <table id="tabelnilai" class="table table-striped table-bordered table-hover" id="tabelnilai">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No Register</th>
                            <th>Nama Peserta</th>
                            <th>Kegiatan</th>
                            <th>Tanggal Ujian</th>
                            <th>Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="datanilai">
                        <?php
                        $no = 1;
                        if (!empty($nilai)) {
                            foreach ($nilai as $n) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $n->no_register; ?></td>
                                    <td><?= $n->nama; ?></td>
                                    <td><?= $n->nama_ujian; ?></td>
                                    <td><?= $n->tanggal; ?></td>
                                    <td><?= $n->nilai; ?></td>
                                    <td><button class="btn btn-hapus<?= $n->id_peserta; ?> btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>
                                    <script>
                                        $(document).ready(function() {
                                            $('.btn-hapus<?= $n->id_peserta; ?>').on('click', function() {
                                                Swal.fire({
                                                    title: 'Hapus Nilai',
                                                    text: 'Anda yakin akan menghapus nilai tersebut ?',
                                                    type: 'question',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Hapus'
                                                }).then((result) => {
                                                    if (result.value) {
                                                        location.href = '<?= base_url("admin/hapus_nilai/" . $n->id_tes); ?>';
                                                    }
                                                })
                                            })
                                        })
                                    </script>
                                </tr>
                        <?php }
                        } ?>
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
    $(document).ready(function() {
        $('#pilihkegiatan').on('change', function() {
            var id = $(this).val();
            location.href = '<?= base_url("nilai/" . $jurusan['id_jurusan'] . "/"); ?>' + id;
        });
        $('.table').DataTable({
            dom: 'Bfrtip',
            'searching': true,
            buttons: ['csv', 'excel', 'pdf']
        });
    })
</script>

<script>
    $(function() {
        $('#tabelnilai').DataTable({
            dom: 'Bfrtip',
            'searching': true,
            buttons: ['csv', 'excel', 'pdf'],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    })
</script>