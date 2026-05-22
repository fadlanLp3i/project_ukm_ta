<?= $this->include('component/layout/header') ?>

<?php



$role = session()->get('role');
$jabatan = session()->get('jabatan');

if ($role == 'pembina') {
    echo $this->include('component/layout/sidebar/pembina');

} elseif ($role == 'peserta') {
    echo $this->include('component/layout/sidebar/peserta');

} elseif ($role == 'pengurus') {

    if ($jabatan == 'ketua') {
        echo $this->include('component/layout/sidebar/ketua');

    } elseif ($jabatan == 'sekretaris') {
        echo $this->include('component/layout/sidebar/sekretaris');

    } elseif ($jabatan == 'bendahara') {
        echo $this->include('component/layout/sidebar/bendahara');

    } else {
        echo $this->include('component/layout/sidebar/default');
    }

} else {
    echo $this->include('component/layout/sidebar/default');
}
?>

<?= session()->get('jabatan') ?>
<?= $this->include('component/layout/body') ?>
<?= $this->include('component/layout/footer') ?>