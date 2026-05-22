<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <hr>

    <form action="/sekretaris/dokumen/update/<?= $dokumen['id_dokumen']; ?>" method="post" enctype="multipart/form-data" class="col-md-6">
        <?= csrf_field(); ?>
        
        <div class="mb-3">
            <label class="form-label">Jenis Dokumen</label>
            <input type="text" name="jenis_dokumen" class="form-control" value="<?= $dokumen['jenis_dokumen']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">File Dokumen Saat Ini</label>
            <div class="mb-2">
                <a href="/uploads/dokumen/<?= $dokumen['upload']; ?>" target="_blank" class="text-decoration-none">
                    📄 Lihat Dokumen Aktif
                </a>
            </div>
            <label class="form-label">Ganti File Baru (Kosongkan jika tidak diganti)</label>
            <input type="file" name="upload" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Pengesahan</label>
            <input type="text" name="pengesahan" class="form-control" value="<?= $dokumen['pengesahan']; ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/sekretaris/dokumen" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>