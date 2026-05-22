<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-7">
    <h3 class="mb-4">Manajemen Data User</h3>

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

    <div class="card mb-4 border-primary shadow-sm">
        <div class="card-header bg-primary text-white py-2">
            <i class="fas fa-user-plus me-1"></i> <strong>Tambah User Cepat</strong>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pembina/user/store') ?>" method="post" class="row g-3 align-items-end">
                <?= csrf_field() ?>
                
                <div class="col-md-3">
                    <label class="form-label small fw-bold">1. Pilih Role</label>
                    <select name="role" id="roleSelect" class="form-select form-select-sm" required onchange="toggleMasterDropdown()">
                        <option value="">-- Pilih Role --</option>
                        <option value="pengurus">Pengurus (Username: NIM)</option>
                        <option value="pengajar">Pengajar (Username: No Telp)</option>
                        <option value="peserta">Peserta (Username: NIM)</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold">2. Pilih Nama Personil</label>
                    
                    <select name="id_pengurus" id="select_pengurus" class="form-select form-select-sm master-select d-none">
                        <option value="">-- Pilih Nama Pengurus --</option>
                        <?php foreach(($pengurus ?? []) as $p): ?>
                            <option value="<?= $p['id_pengurus'] ?>"><?= $p['nama_pengurus'] ?> (<?= $p['nim'] ?>)</option>
                        <?php endforeach; ?>
                    </select>

                    <select name="id_pengajar" id="select_pengajar" class="form-select form-select-sm master-select d-none">
                        <option value="">-- Pilih Nama Pengajar --</option>
                        <?php foreach(($pengajar ?? []) as $p): ?>
                            <option value="<?= $p['id_pengajar'] ?>"><?= $p['nama_pengajar'] ?> (<?= $p['no_telpon'] ?>)</option>
                        <?php endforeach; ?>
                    </select>

                    <select name="id_peserta" id="select_peserta" class="form-select form-select-sm master-select d-none">
                        <option value="">-- Pilih Nama Peserta --</option>
                        <?php foreach(($peserta ?? []) as $p): ?>
                            <option value="<?= $p['id_peserta'] ?>"><?= $p['nama_peserta'] ?> (<?= $p['nim'] ?>)</option>
                        <?php endforeach; ?>
                    </select>

                    <input type="text" id="placeholder_select" class="form-control form-select-sm" placeholder="Pilih role terlebih dahulu..." disabled>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <i class="fas fa-save me-1"></i> Tambah User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>Username (NIM/Telp)</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)) : ?>
                        <?php $no = 1; foreach ($users as $u) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><strong><?= $u['username'] ?></strong></td>
                            <td><span class="badge bg-info text-dark text-uppercase"><?= $u['role'] ?></span></td>
                            <td>
                                <span class="badge <?= ($u['status']=='aktif')?'bg-success':'bg-danger' ?>">
                                    <?= ucfirst($u['status']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalEdit" 
                                        data-id="<?= $u['id_user'] ?>" 
                                        data-username="<?= $u['username'] ?>" 
                                        data-status="<?= $u['status'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <a href="<?= base_url('pembina/user/delete/'.$u['id_user']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Belum ada data user yang terdaftar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalEditLabel"><i class="fas fa-user-edit me-2"></i>Edit Data User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Username</label>
                        <input type="text" id="edit_username" class="form-control bg-light" readonly>
                        <small class="text-muted italic">*Username mengikuti NIM/No Telpon data master.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status Akun</label>
                        <select name="status" id="edit_status" class="form-select" required>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Non-Aktif</option>
                        </select>
                    </div>
                    <div class="mb-3 border-top pt-3">
                        <label class="form-label fw-bold text-danger">Ganti Password (Opsional)</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin ganti">
                        <small class="text-muted">Isi hanya jika ingin mereset password user ini.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Fungsi untuk memfilter dropdown di header (Tambah Cepat)
function toggleMasterDropdown() {
    const role = document.getElementById('roleSelect').value;
    const allSelects = document.querySelectorAll('.master-select');
    const placeholder = document.getElementById('placeholder_select');

    allSelects.forEach(s => {
        s.classList.add('d-none');
        s.removeAttribute('required');
    });
    placeholder.classList.add('d-none');

    if (role === 'pengurus') {
        const el = document.getElementById('select_pengurus');
        el.classList.remove('d-none');
        el.setAttribute('required', 'required');
    } else if (role === 'pengajar') {
        const el = document.getElementById('select_pengajar');
        el.classList.remove('d-none');
        el.setAttribute('required', 'required');
    } else if (role === 'peserta') {
        const el = document.getElementById('select_peserta');
        el.classList.remove('d-none');
        el.setAttribute('required', 'required');
    } else {
        placeholder.classList.remove('d-none');
    }
}

// Logic untuk mengisi data ke Modal Edit secara otomatis
const modalEdit = document.getElementById('modalEdit');
modalEdit.addEventListener('show.bs.modal', function (event) {
    // Tombol yang memicu modal
    const button = event.relatedTarget;
    
    // Ambil data dari atribut data-*
    const id = button.getAttribute('data-id');
    const username = button.getAttribute('data-username');
    const status = button.getAttribute('data-status');

    // Isi ke dalam form modal
    const form = modalEdit.querySelector('#formEdit');
    const inputUsername = modalEdit.querySelector('#edit_username');
    const selectStatus = modalEdit.querySelector('#edit_status');

    // Update Action URL form agar mengarah ke ID yang benar
    form.action = '<?= base_url('pembina/user/update/') ?>/' + id;
    
    inputUsername.value = username;
    selectStatus.value = status;
});
</script>

<?= $this->endsection() ?>