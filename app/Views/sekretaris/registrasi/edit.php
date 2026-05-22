<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="card col-md-6 shadow">
        <div class="card-body">
            <h4 class="card-title mb-4">Edit Data Registrasi</h4>
            
            <form action="<?= base_url('sekretaris/registrasi/update/' . $registrasi['id_registrasi']); ?>" method="post">
                <?= csrf_field(); ?>
                
                <div class="form-group mb-3">
                    <label>Nama Peserta</label>
                    <select name="id_peserta" class="form-control" required>
                        <option value="">-- Pilih Peserta --</option>
                        <?php foreach($peserta as $p) : ?>
                            <option value="<?= $p['id_peserta']; ?>" <?= ($p['id_peserta'] == $registrasi['id_peserta']) ? 'selected' : ''; ?>>
                                <?= $p['nama_peserta']; ?> - <?= $p['nim']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Biaya Pendaftaran</label>
                    <input type="number" name="biaya" class="form-control" 
                           value="<?= $registrasi['biaya']; ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Update Data</button>
                    <a href="<?= base_url('sekretaris/registrasi'); ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>