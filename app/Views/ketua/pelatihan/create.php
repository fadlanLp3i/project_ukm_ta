

<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Jadwal Pelatihan (Ketua UKM)</h4>
        </div>
        <div class="card-body">
            <form action="/ketua/pelatihan/save" method="post">
                <?= csrf_field(); ?>
                
                <div class="mb-3">
                    <label class="form-label">Nama Pelatihan</label>
                    <input type="text" class="form-control" name="nama_pelatihan" placeholder="Contoh: Pelatihan Desain Grafis" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih UKM</label>
                    <select name="id_ukm" class="form-select" required>
                        <option value="">-- Pilih UKM --</option>
                        <?php foreach(($ukm ?? []) as $u) : ?>
                            <option value="<?= $u['id_ukm']; ?>"><?= $u['nama_ukm']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya (Rp)</label>
                    <input type="number" class="form-control" name="biaya" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Periode</label>
                    <select name="id_periode" class="form-select" required>
                        <option value="">-- Pilih Periode --</option>
                        <?php foreach(($periode ?? []) as $p) : ?>
                            <option value="<?= $p['id_periode']; ?>"><?= $p['periode']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/ketua/pelatihan" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Pelatihan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>