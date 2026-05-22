<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <a href="/sekretaris/dokumen/create" class="btn btn-primary mb-3">Tambah Dokumen</a>
    
    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>UKM</th>
                <th>Jenis Dokumen</th>
                <th>File Dokumen</th>
                <th>Pengesahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($dokumen)) : ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data dokumen untuk UKM Anda.</td>
                </tr>
            <?php else: ?>
                <?php $i = 1; foreach($dokumen as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $d['nama_ukm']; ?></td>
                    <td><?= $d['jenis_dokumen']; ?></td>
                    <td>
                        <a href="/uploads/dokumen/<?= $d['upload']; ?>" target="_blank" class="btn btn-info btn-sm text-white">
                            Lihat File
                        </a>
                    </td>
                    <td><?= $d['pengesahan']; ?></td>
                    <td>
                        <a href="/sekretaris/dokumen/edit/<?= $d['id_dokumen']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="/sekretaris/dokumen/delete/<?= $d['id_dokumen']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus dokumen ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>