
<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="container mt-7">
    <h2>Data UKM</h2>

    
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <a href="ukm/create" class="btn btn-success mb-3">Tambah UKM</a>
    <a href="/pembina" class="btn btn-secondary mb-3">Kembali</a>

    <table class="table table-bordered">
        <tr>
            <th>Id UKM</th>
            <th>Nama UKM</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; foreach($ukm as $u): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $u['nama_ukm'] ?></td>
            <td>
                <a href="ukm/edit/<?= $u['id_ukm'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="ukm/delete/<?= $u['id_ukm'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini')" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?= $this->endSection() ?>