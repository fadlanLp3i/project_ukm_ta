<h3>Data UKM</h3>

<a href="/pembina/ukm/create" class="btn btn-success mb-3">Tambah UKM</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Ketua</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php foreach($ukm as $u): ?>
    <tr>
        <td><?= $u['nama_ukm'] ?></td>
        <td><?= $u['nama_ketua'] ?></td>
        <td><?= $u['status'] ?></td>
        <td>
            <a href="/pembina/ukm/edit/<?= $u['id_ukm'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="/pembina/ukm/delete/<?= $u['id_ukm'] ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>