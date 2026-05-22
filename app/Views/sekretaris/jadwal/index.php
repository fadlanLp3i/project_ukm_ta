<?= $this->extend('layouts/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <a href="/sekretaris/jadwal/create" class="btn btn-primary mb-3">Tambah Jadwal</a>
    
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
                <th>Nama Pelatihan</th>
                <th>Nama Pengajar</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Pertemuan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($jadwal)) : ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data jadwal.</td>
                </tr>
            <?php else: ?>
                <?php $i = 1; foreach($jadwal as $j) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $j['nama_pelatihan']; ?></td>
                    <td><?= $j['nama_pengajar']; ?></td>
                    <td><?= date('d/m/Y', strtotime($j['tanggal_mulai'])); ?></td>
                    <td><?= date('d/m/Y', strtotime($j['tanggal_selesai'])); ?></td>
                    <td><?= $j['total_pertemuan']; ?></td>
                    <td>
                        <span class="badge bg-<?= $j['status'] == 'aktif' ? 'success' : 'danger'; ?>">
                            <?= ucfirst($j['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="/sekretaris/jadwal/edit/<?= $j['id_jadwal']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="/sekretaris/jadwal/delete/<?= $j['id_jadwal']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>