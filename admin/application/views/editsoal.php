<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Edit Soal</h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <a href="<?= base_url('soal') ?>" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url('admin/act_esoal/' . $soal->id_soal); ?>" enctype="multipart/form-data" method="POST">
                    <div class="col-md-4 form-group">
                        <label for="Kegiatan">Kegiatan :</label>
                        <select name="kegiatan" class="form-control" required="">
                            <option value="<?= $soal->id_kegiatan; ?>"><?= $soal->nama_kegiatan; ?></option>
                            <?php foreach ($listkegiatan as $lm) { ?>
                                <option value="<?= $lm->id_kegiatan; ?>"><?= $lm->nama_kegiatan; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="Soal">Soal :</label>
                        <textarea id="fieldSoal" name="soal" required=""><?= $soal->soal; ?></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <!-- <label for="Media">Media :</label>
                        <input type="file" name="media"> -->
                        <?php
                        $ex = explode(".", $soal->media);
                        $ex = strtolower(end($ex));
                        if ($ex == 'jpg' || $ex == 'png') { ?>
                            <img src="<?= base_url('./../media/' . $soal->media); ?>" class="img-esoal">
                        <?php }
                        if ($ex == 'mp3' || $ex == 'wav') { ?>
                            <audio src="<?= base_url('./../media/' . $soal->media); ?>" controls></audio>
                        <?php } ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="A">Opsi A</label>
                        <input type="text" name="a" class="form-control" placeholder="Jawaban A" required="" value="<?= $soal->opsi_a; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="B">Opsi B</label>
                        <input type="text" name="b" class="form-control" placeholder="Jawaban B" required="" value="<?= $soal->opsi_b; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="C">Opsi C</label>
                        <input type="text" name="c" class="form-control" placeholder="Jawaban C" required="" value="<?= $soal->opsi_c; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="D">Opsi D</label>
                        <input type="text" name="d" class="form-control" placeholder="Jawaban D" required="" value="<?= $soal->opsi_d; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="E">Opsi E</label>
                        <input type="text" name="e" class="form-control" placeholder="Jawaban E" required="" value="<?= $soal->opsi_e; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="Jawaban">Jawaban</label>
                        <select name="jawaban" id="" class="form-control" required="">
                            <option value="<?= $soal->jawaban; ?>"><?= $soal->jawaban; ?></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                        <input type="hidden" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script async="defer">
    $(function() {
        CKEDITOR.replace('fieldSoal')
    })
</script>

<?php
if ($this->session->flashdata('soal')) { ?>
    <script>
        Swal.fire('Sukses!', 'Soal berhasil ditambahkan', 'success');
    </script>
<?php
}
?>

<!-- CK Editor -->
<script src="<?= base_url('./../assets/adminlte/bower_components/ckeditor/ckeditor.js'); ?>"></script>