<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-7">
    <div class="card">
        <div class="card-header"><h4>Tambah User dari Data Master</h4></div>
        <div class="card-body">
            <form action="<?= base_url('pembina/user/store') ?>" method="post">
                
                <div class="mb-3">
                    <label>Pilih Role</label>
                    <select name="role" id="roleSelect" class="form-control" required onchange="updateDropdown()">
                        <option value="">-- Pilih Role --</option>
                        <option value="pengurus">Pengurus (Username: NIM)</option>
                        <option value="pengajar">Pengajar (Username: No Telp)</option>
                        <option value="peserta">Peserta (Username: NIM)</option>
                    </select>
                </div>

                <div class="mb-3 d-none" id="div_pengurus">
                    <label>Nama Pengurus</label>
                    <select name="id_pengurus" class="form-control">
                        <?php foreach(($pengurus ?? []) as $p): ?>
                            <option value="<?= $p['id_pengurus'] ?>"><?= $p['nama_pengurus'] ?> (<?= $p['nim'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3 d-none" id="div_pengajar">
                    <label>Nama Pengajar</label>
                    <select name="id_pengajar" class="form-control">
                        <?php foreach(($pengajar ?? []) as $p): ?>
                            <option value="<?= $p['id_pengajar'] ?>"><?= $p['nama_pengajar'] ?> (<?= $p['no_telpon'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3 d-none" id="div_peserta">
                    <label>Nama Peserta</label>
                    <select name="id_peserta" class="form-control">
                        <?php foreach(($peserta ?? []) as $p): ?>
                            <option value="<?= $p['id_peserta'] ?>"><?= $p['nama_peserta'] ?> (<?= $p['nim'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Buat User Otomatis</button>
                <a href="<?= base_url('pembina/user') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
function updateDropdown() {
    const role = document.getElementById('roleSelect').value;
    document.getElementById('div_pengurus').classList.add('d-none');
    document.getElementById('div_pengajar').classList.add('d-none');
    document.getElementById('div_peserta').classList.add('d-none');

    if(role === 'pengurus') document.getElementById('div_pengurus').classList.remove('d-none');
    if(role === 'pengajar') document.getElementById('div_pengajar').classList.remove('d-none');
    if(role === 'peserta') document.getElementById('div_peserta').classList.remove('d-none');
}
</script>

<?= $this->endsection() ?>