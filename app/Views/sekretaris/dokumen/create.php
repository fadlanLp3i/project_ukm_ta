<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <hr>

    <form action="/sekretaris/dokumen/save" method="post" enctype="multipart/form-data" class="col-md-6">
        <?= csrf_field(); ?>
        
        <div class="mb-3">
            <label class="form-label">Jenis Dokumen</label>
            <input type="text" name="jenis_dokumen" class="form-control" placeholder="Contoh: Proposal Kegiatan, LPJ" value="<?= old('jenis_dokumen'); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload File Dokumen</label>
            <input type="file" name="upload" class="form-control" required>
            <div class="form-text">Pilih file proposal/dokumen pendukung.</div>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengesahan</label>
            <input type="text" name="pengesahan" class="form-control" placeholder="Contoh: Disetujui Pembina, Proses" value="<?= old('pengesahan'); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/sekretaris/dokumen" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>