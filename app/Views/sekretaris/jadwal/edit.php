<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <hr>

    <form action="/sekretaris/jadwal/update/<?= $jadwal['id_jadwal']; ?>" method="post" class="col-md-6">
        <?= csrf_field(); ?>
        
        <div class="mb-3">
            <label class="form-label">Pelatihan</label>
            <select name="id_pelatihan" class="form-select" required>
                <?php foreach ($pelatihan as $p) : ?>
                    <option value="<?= $p['id_pelatihan']; ?>" <?= ($p['id_pelatihan'] == $jadwal['id_pelatihan']) ? 'selected' : ''; ?>>
                        <?= $p['nama_pelatihan']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengajar</label>
            <select name="id_pengajar" class="form-select" required>
                <?php foreach ($pengajar as $p) : ?>
                    <option value="<?= $p['id_pengajar']; ?>" <?= ($p['id_pengajar'] == $jadwal['id_pengajar']) ? 'selected' : ''; ?>>
                        <?= $p['nama_pengajar']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= $jadwal['tanggal_mulai']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="<?= $jadwal['tanggal_selesai']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Pertemuan</label>
            <input type="number" name="total_pertemuan" class="form-control" value="<?= $jadwal['total_pertemuan']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="aktif" <?= ($jadwal['status'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                <option value="non aktif" <?= ($jadwal['status'] == 'non aktif') ? 'selected' : ''; ?>>Non Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/sekretaris/jadwal" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>