<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Data UKM</h4>
                </div>
                <div class="card-body">
                    <form action="/pembina/ukm/save" method="post">
                        <?= csrf_field(); ?>

                        

                        <div class="mb-3">
                            <label for="id_ukm" class="form-label">Id UKM</label>
                            <input type="text" class="form-control" id="id_ukm" name="id_ukm" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nama_ukm" class="form-label">Nama UKM</label>
                            <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" required autofocus>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/pembina/ukm" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>