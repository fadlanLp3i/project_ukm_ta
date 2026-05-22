<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>


<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Data Pelatihan</h4>
        </div>
        <div class="card-body">
           <form action="/ketua/pelatihan/update/<?= ($pelatihan['id_pelatihan'] ?? ''); ?>" method="post">
                
                <div class="mb-3">
                    <label class="form-label">Nama Pelatihan</label>
                    <input type="text" class="form-control" name="nama_pelatihan" 
                           value="<?= ($pelatihan['nama_pelatihan'] ?? ''); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih UKM</label>
                    <select name="id_ukm" class="form-select" required>
                        <?php foreach(($ukm ?? []) as $u) : ?>
                            <option value="<?= $u['id_ukm']; ?>" <?= ($u['id_ukm'] == ($pelatihan['id_ukm'] ?? '')) ? 'selected' : ''; ?>>
                                <?= $u['nama_ukm']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya (Rp)</label>
                    <input type="number" class="form-control" name="biaya" 
                           value="<?= ($pelatihan['biaya'] ?? ''); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Periode</label>
                    <select name="id_periode" class="form-select" required>
                        <?php foreach(($periode ?? []) as $p) : ?>
                            <option value="<?= $p['id_periode']; ?>" <?= ($p['id_periode'] == ($pelatihan['id_periode'] ?? '')) ? 'selected' : ''; ?>>
                                <?= $p['periode']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/ketua/pelatihan" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>