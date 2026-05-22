<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-body">

            <h3>Tambah Periode</h3>

            <form action="<?= base_url('pembina/periode/store') ?>" method="post">

                <div class="mb-3">
                    <label>Periode</label>
                    <input
                        type="text"
                        name="periode"
                        class="form-control"
                        required>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <a href="<?= base_url('pembina/periode') ?>"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>