<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="card col-md-6 shadow">
        <div class="card-body">
            <h4 class="card-title mb-4">Tambah Registrasi Baru</h4>
            <form action="<?= base_url('sekretaris/registrasi/save'); ?>" method="post">
                <?= csrf_field(); ?>
                
                <div class="form-group mb-3">
                    <label>Pilih Peserta (Mahasiswa)</label>
                    <select name="id_peserta" class="form-control" required>
                        <option value="">-- Pilih Peserta --</option>
                        <?php foreach($peserta as $p) : ?>
                            <option value="<?= $p['id_peserta']; ?>"><?= $p['nama_peserta']; ?> - <?= $p['nim']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Biaya Pendaftaran</label>
                    <input type="number" name="biaya" class="form-control" placeholder="Masukan nominal biaya" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Registrasi</button>
                <a href="<?= base_url('sekretaris/registrasi'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>