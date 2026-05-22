<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content') ?>


<div class="container mt-7">
<h2>Data Periode</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <a href="periode/create" class="btn btn-success mb-3">Tambah Periode</a>
    <a href="/pembina" class="btn btn-secondary mb-3">Kembali</a>


    <table class="table table-bordered">
        <thead class="bg-light">
            <tr>
                <th class="ps-3">Id</th>
                <th>Periode</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($periode as $u) : ?>
                <tr>
                    <td class="ps-3">#<?= $u['id_periode'] ?></td>

                    <td><code><?= $u['periode'] ?></code></td>

                    <td class="text-center">
                        <!-- Tombol Edit -->
                        <a href="<?= base_url('pembina/periode/edit/' . $u['id_periode']) ?>" class="btn btn-sm btn-outline-warning mx-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <!-- Tombol Delete -->
                        <a href="<?= base_url('pembina/periode/delete/' . $u['id_periode']) ?>"
                            class="btn btn-sm btn-outline-danger mx-1"
                            onclick="return confirm('Hapus periode <?= $u['periode'] ?>?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?= $this->endsection(); ?>