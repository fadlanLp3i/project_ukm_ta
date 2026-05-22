<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3>Daftar Peserta UKM</h3>
    <a href="/sekretaris/peserta/create" class="btn btn-primary mb-3">Tambah Peserta</a>
    
    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Peserta</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($peserta)) : ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada peserta.</td>
                </tr>
            <?php else: ?>
                <?php $i = 1; foreach($peserta as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['nim']; ?></td>
                    <td><?= $p['nama_peserta']; ?></td>
                    <td><?= $p['prodi']; ?></td>
                    <td>
                    <a href="/sekretaris/peserta/edit/<?= $p['id_peserta']; ?>" class="btn btn-warning btn-sm">Edit</a>

                    
                    <form action="/sekretaris/peserta/delete/<?= $p['id_peserta']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>