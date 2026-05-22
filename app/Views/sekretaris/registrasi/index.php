<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Registrasi UKM</h3>
        <a href="<?= base_url('sekretaris/registrasi/create') ?>" class="btn btn-primary">Tambah Registrasi</a>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered shadow-sm">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>NIM</th>
                <th>UKM</th>
                <th>Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($registrasi as $r) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $r['nama_peserta']; ?></td>
                <td><?= $r['nim']; ?></td>
                <td><?= $r['nama_ukm']; ?></td>
                <td>Rp <?= number_format($r['biaya'], 0, ',', '.'); ?></td>
                <td>
                    <a href="<?= base_url('sekretaris/registrasi/edit/'.$r['id_registrasi']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?= base_url('sekretaris/registrasi/delete/'.$r['id_registrasi']) ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>