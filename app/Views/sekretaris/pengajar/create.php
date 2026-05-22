<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Pengajar</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengajar</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('sekretaris/pengajar/save'); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group mb-3">
                    <label for="nama_pengajar">Nama Pengajar</label>
                    <input type="text" class="form-control" id="nama_pengajar" name="nama_pengajar" 
                           placeholder="Masukkan nama lengkap pengajar" value="<?= old('nama_pengajar'); ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="no_telpon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telpon" name="no_telpon" 
                           placeholder="Contoh: 08123456789" value="<?= old('no_telpon'); ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" 
                           value="<?= old('tgl_lahir'); ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="<?= base_url('sekretaris/pengajar'); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>