<div class="content-wrapper">
    <section class="content-header">
        <h1 class="text-center">Tambah Soal</h1>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">
                <a href="<?= base_url('soal'); ?>" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Kembali</a>
            </div>
            <div class="box-body">
                <form action="admin/act_tsoal" enctype="multipart/form-data" method="POST">
                    <div class="col-md-4 form-group">
                        <label for="kegiatan">kegiatan :</label>
                        <select name="kegiatan" class="form-control" required="">
                            <option value="">Pilih kegiatan...</option>
                            <?php foreach ($listkegiatan as $lm) { ?>
                                <option value="<?= $lm->id_kegiatan; ?>"><?= $lm->nama_kegiatan; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="Soal">Soal :</label>
                        <textarea id="fieldSoal" name="soal" required=""></textarea>
                    </div>
                    <!-- <div class="col-md-12 form-group">
                        <label for="Media">Media :</label>
                        <input type="file" name="media">
                    </div> -->
                    <div class="col-md-6 form-group">
                        <label for="A">Opsi A</label>
                        <input type="text" name="a" class="form-control" placeholder="Jawaban A" required="">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="B">Opsi B</label>
                        <input type="text" name="b" class="form-control" placeholder="Jawaban B" required="">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="C">Opsi C</label>
                        <input type="text" name="c" class="form-control" placeholder="Jawaban C" required="">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="D">Opsi D</label>
                        <input type="text" name="d" class="form-control" placeholder="Jawaban D" required="">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="E">Opsi E</label>
                        <input type="text" name="e" class="form-control" placeholder="Jawaban E" required="">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="Jawaban">Jawaban</label>
                        <select name="jawaban" id="" class="form-control" required="">
                            <option value="">Pilih Jawaban...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                        <input type="hidden" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Tambah</button>
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