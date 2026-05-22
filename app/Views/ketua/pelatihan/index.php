<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-7">
    <h3 class="mb-4">Manajemen Data Pelatihan</h3>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-triangle me-2"></i><?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="fas fa-plus-circle me-1"></i> Tambah Pelatihan
            </button>
            <a href="<?= base_url('ketua/dashboard') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Nama Pelatihan</th>
                        <th>Periode</th>
                        <th>Biaya</th>
                        <th>UKM</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pelatihan)) : ?>
                        <?php $no = 1; foreach ($pelatihan as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><strong><?= $p['nama_pelatihan'] ?></strong></td>
                                <td><span class="badge bg-info text-dark"><?= $p['periode'] ?></span></td>
                                <td>Rp <?= number_format($p['biaya'], 0, ',', '.') ?></td>
                                <td><?= $p['nama_ukm'] ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-warning mx-1" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEdit"
                                            data-id="<?= $p['id_pelatihan'] ?>"
                                            data-nama="<?= $p['nama_pelatihan'] ?>"
                                            data-biaya="<?= $p['biaya'] ?>"
                                            data-periode="<?= $p['id_periode'] ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <a href="<?= base_url('ketua/pelatihan/delete/' . $p['id_pelatihan']) ?>" 
                                       class="btn btn-sm btn-outline-danger mx-1"
                                       onclick="return confirm('Hapus data pelatihan <?= $p['nama_pelatihan'] ?>?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">Belum ada data pelatihan untuk UKM ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('ketua/pelatihan/store') ?>" method="post" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-plus me-2"></i>Tambah Pelatihan Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Pelatihan</label>
                    <input type="text" name="nama_pelatihan" class="form-control" placeholder="Masukkan nama pelatihan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Biaya (Rp)</label>
                    <input type="number" name="biaya" class="form-control" placeholder="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Periode</label>
                    <select name="id_periode" class="form-select" required>
                        <option value="">-- Pilih Periode --</option>
                        <?php foreach(($periode ?? []) as $per): ?>
                            <option value="<?= $per['id_periode'] ?>"><?= $per['periode'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pelatihan</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEdit" method="post" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header bg-warning">
                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Data Pelatihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Pelatihan</label>
                    <input type="text" name="nama_pelatihan" id="edit_nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Biaya (Rp)</label>
                    <input type="number" name="biaya" id="edit_biaya" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Periode</label>
                    <select name="id_periode" id="edit_periode" class="form-select" required>
                        <?php foreach(($periode ?? []) as $per): ?>
                            <option value="<?= $per['id_periode'] ?>"><?= $per['periode'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Update Pelatihan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modalEdit = document.getElementById('modalEdit');
    modalEdit.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        
        // Ambil data dari atribut data-*
        const id = btn.getAttribute('data-id');
        const nama = btn.getAttribute('data-nama');
        const biaya = btn.getAttribute('data-biaya');
        const periode = btn.getAttribute('data-periode');

        // Set action form ke route update
        document.getElementById('formEdit').action = '<?= base_url('ketua/pelatihan/update') ?>/' + id;
        
        // Isi nilai input modal
        document.getElementById('edit_nama').value = nama;
        document.getElementById('edit_biaya').value = biaya;
        document.getElementById('edit_periode').value = periode;
    });
</script>

<?= $this->endSection() ?>