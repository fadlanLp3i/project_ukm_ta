<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <h3>Daftar Pengajar</h3>
    <a href="<?= base_url('sekretaris/pengajar/create') ?>" class="btn btn-primary mb-3">Tambah Pengajar</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengajar</th>
                <th>No Telpon</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($pengajar as $p) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $p['nama_pengajar']; ?></td>
                <td><?= $p['no_telpon']; ?></td>
                <td><?= $p['tgl_lahir']; ?></td>
                <td>
                    <a href="<?= base_url('sekretaris/pengajar/edit/'.$p['id_pengajar']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?= base_url('sekretaris/pengajar/delete/'.$p['id_pengajar']) ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>