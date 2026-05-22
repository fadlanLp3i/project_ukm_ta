<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <p class="text-muted">Halaman kontrol semua dokumen dari seluruh unit kegiatan mahasiswa.</p>
    
    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Asal UKM</th>
                <th>Jenis Dokumen</th>
                <th>File Dokumen</th>
                <th>Status Pengesahan</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($dokumen)) : ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data dokumen dari UKM manapun.</td>
                </tr>
            <?php else: ?>
                <?php $i = 1; foreach($dokumen as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><span class="badge bg-primary p-2"><?= $d['nama_ukm']; ?></span></td>
                    <td><?= $d['jenis_dokumen']; ?></td>
                    <td>
                        <a href="/uploads/dokumen/<?= $d['upload']; ?>" target="_blank" class="btn btn-info btn-sm text-white">
                            👁️ Unduh / Lihat File
                        </a>
                    </td>
                    <td>
                        <span class="badge bg-secondary p-2">
                            <?= $d['pengesahan']; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>