<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Peserta</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('sekretaris/peserta/update/' . $peserta['id_peserta']); ?>" method="post">
                <?= csrf_field(); ?>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group mb-3">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim"
                        value="<?= (old('nim')) ? old('nim') : $peserta['nim']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="nama_peserta">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_peserta" name="nama_peserta"
                        value="<?= (old('nama_peserta')) ? old('nama_peserta') : $peserta['nama_peserta']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                        value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : $peserta['tgl_lahir']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi"
                        value="<?= (old('prodi')) ? old('prodi') : $peserta['prodi']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="no_telpon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telpon" name="no_telpon"
                        value="<?= (old('no_telpon')) ? old('no_telpon') : $peserta['no_telpon']; ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="/sekretaris/peserta" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>