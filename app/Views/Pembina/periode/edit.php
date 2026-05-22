<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-body">

        <h3>Edit Periode</h3>

        <form action="<?= base_url('pembina/periode/update/' . $periode['id_periode']) ?>" method="post">

            <div class="mb-3">
                <label>Periode</label>
                <input
                    type="text"
                    name="periode"
                    class="form-control"
                    value="<?= $periode['periode'] ?>"
                    required>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="<?= base_url('pembina/periode') ?>"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

<?= $this->endSection() ?>