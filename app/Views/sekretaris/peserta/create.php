<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Tambah Peserta</h3>
    <form action="<?= base_url('sekretaris/peserta/save') ?>" method="post">
        <?= csrf_field(); ?>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= old('nim'); ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Peserta</label>
            <input type="text" name="nama_peserta" class="form-control" value="<?= old('nama_peserta'); ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?= old('tgl_lahir'); ?>" required>
        </div>
        <div class="mb-3">
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" value="<?= old('prodi'); ?>" required>
        </div>
        <div class="mb-3">
            <label>No. Telpon</label>
            <input type="text" name="no_telpon" class="form-control" value="<?= old('no_telpon'); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/sekretaris/peserta" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>