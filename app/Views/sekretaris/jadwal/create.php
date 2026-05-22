<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <hr>

    <form action="/sekretaris/jadwal/save" method="post" class="col-md-6">
        <?= csrf_field(); ?>
        
        <div class="mb-3">
            <label class="form-label">Pelatihan</label>
            <select name="id_pelatihan" class="form-select" required>
                <option value="">-- Pilih Pelatihan --</option>
                <?php foreach ($pelatihan as $p) : ?>
                    <option value="<?= $p['id_pelatihan']; ?>"><?= $p['nama_pelatihan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Pengajar</label>
            <select name="id_pengajar" class="form-select" required>
                <option value="">-- Pilih Pengajar --</option>
                <?php foreach ($pengajar as $p) : ?>
                    <option value="<?= $p['id_pengajar']; ?>"><?= $p['nama_pengajar']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Pertemuan</label>
            <input type="number" name="total_pertemuan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="aktif">Aktif</option>
                <option value="non aktif">Non Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/sekretaris/jadwal" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>