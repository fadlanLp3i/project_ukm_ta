<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <h3>Edit Pengajar</h3>
    <form action="<?= base_url('sekretaris/pengajar/update/' . $pengajar['id_pengajar']); ?>" method="post">
        <?= csrf_field(); ?>
        
        <div class="form-group mb-3">
            <label>Nama Pengajar</label>
            <input type="text" name="nama_pengajar" class="form-control" value="<?= $pengajar['nama_pengajar']; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>No Telepon</label>
            <input type="text" name="no_telpon" class="form-control" value="<?= $pengajar['no_telpon']; ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?= $pengajar['tgl_lahir']; ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= base_url('sekretaris/pengajar'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection(); ?>