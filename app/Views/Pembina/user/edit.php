<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit User</h2>

    <form action="<?= base_url('pembina/user/update/' . $user['id_user']) ?>" method="post">
        <?= csrf_field() ?>

        <?php
        $selectedRole = old('role', $user['role']);
        $selectedStatus = old('status', $user['status']);
        $selectedUsername = old('username', $user['username']);

        $selectedPeserta = old(
            'id_peserta',
            isset($user['id_peserta']) ? (string)$user['id_peserta'] : ''
        );

        $selectedPengajar = old(
            'id_pengajar',
            isset($user['id_pengajar']) ? (string)$user['id_pengajar'] : ''
        );

        $selectedPengurus = old(
            'id_pengurus',
            isset($user['id_pengurus']) ? (string)$user['id_pengurus'] : ''
        );
        ?>

        <!-- ROLE -->
        <!-- ROLE -->
        <div class="mb-3">
            <label>Role</label>

            <select
                name="role"
                id="role"
                class="form-control"
                required
                onchange="toggleDropdown()">

                <option value="">-- Pilih Role --</option>

                <option value="peserta" <?= ($selectedRole === 'peserta') ? 'selected' : '' ?>>
                    Peserta
                </option>

                <option value="pengajar" <?= ($selectedRole === 'pengajar') ? 'selected' : '' ?>>
                    Pengajar
                </option>

                <option value="pengurus" <?= ($selectedRole === 'pengurus') ? 'selected' : '' ?>>
                    Pengurus
                </option>

            </select>

        </div>

        <!-- PESERTA -->
        <div class="mb-3" id="peserta_box" style="display:none;">
            <label>Pilih Peserta</label>

            <select name="id_peserta" class="form-control">
                <option value="">-- Pilih Peserta --</option>

                <?php foreach ($peserta as $p): ?>
                    <option
                        value="<?= $p['id_peserta'] ?>"
                        <?= ((string)$selectedPeserta === (string)$p['id_peserta']) ? 'selected' : '' ?>>

                        <?= $p['nama_peserta'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- PENGAJAR -->
        <div class="mb-3" id="pengajar_box" style="display:none;">
            <label>Pilih Pengajar</label>

            <select name="id_pengajar" class="form-control">

                <?php foreach ($pengajar as $pg): ?>
                    <option value="<?= $pg['id_pengajar'] ?>">-- Pilih Pengajar --</option>
                    <option
                        value="<?= $pg['id_pengajar'] ?>"
                        <?= ((string)$selectedPengajar === (string)$pg['id_pengajar']) ? 'selected' : '' ?>>

                        <?= $pg['nama_pengajar'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- PENGURUS -->
        <div class="mb-3" id="pengurus_box" style="display:none;">
            <label>Pilih Pengurus</label>

            <select name="id_pengurus" class="form-control">
                <option value="">-- Pilih Pengurus --</option>

                <?php foreach ($pengurus as $pn): ?>
                    <option
                        value="<?= $pn['id_pengurus'] ?>"
                        <?= ((string)$selectedPengurus === (string)$pn['id_pengurus']) ? 'selected' : '' ?>>

                        <?= $pn['nama_pengurus'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- USERNAME -->
        <div class="mb-3">
            <label>Username</label>

            <input
                type="text"
                name="username"
                class="form-control"
                value="<?= $selectedUsername ?>"
                required>
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <label>Password (Kosongkan jika tidak ingin ganti)</label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password baru...">
        </div>

        <!-- STATUS -->
        <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-control" required>
                <option
                    value="aktif"
                    <?= ($selectedStatus == 'aktif') ? 'selected' : '' ?>>

                    Aktif
                </option>

                <option
                    value="nonaktif"
                    <?= ($selectedStatus == 'nonaktif') ? 'selected' : '' ?>>

                    Nonaktif
                </option>
            </select>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn btn-warning">
            Update Data
        </button>

        <a href="<?= base_url('pembina/user') ?>" class="btn btn-secondary">
            Batal
        </a>

    </form>
</div>

<script>
    function toggleDropdown() {
        const role = document.getElementById('role').value;

        document.getElementById('peserta_box').style.display = 'none';
        document.getElementById('pengajar_box').style.display = 'none';
        document.getElementById('pengurus_box').style.display = 'none';

        if (role === 'peserta') {
            document.getElementById('peserta_box').style.display = 'block';
        }

        if (role === 'pengajar') {
            document.getElementById('pengajar_box').style.display = 'block';
        }

        if (role === 'pengurus') {
            document.getElementById('pengurus_box').style.display = 'block';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        toggleDropdown();
    });
</script>

<?= $this->endSection() ?>