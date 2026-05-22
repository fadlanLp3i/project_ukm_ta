<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url('dashboard') ?>" class="text-nowrap logo-img">
                <img src="<?= base_url('assets/images/logos/logo.svg') ?>" width="180" alt="" />
            </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <!-- TITLE -->
                <li class="nav-small-cap">
                    <span class="hide-menu">SEKRETARIS MENU</span>
                </li>

                <!-- DASHBOARD -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('dashboard') ?>">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- DOKUMEN -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/dokumen') ?>">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Kelola Dokumen</span>
                    </a>
                </li>

                <!-- JADWAL -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/jadwal') ?>">
                        <span>
                            <i class="ti ti-calendar-event"></i>
                        </span>
                        <span class="hide-menu">Kelola Jadwal</span>
                    </a>
                </li>

                <!-- PENGAJAR -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/pengajar') ?>">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Kelola Pengajar</span>
                    </a>
                </li>

                <!-- PESERTA -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/peserta') ?>">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Kelola Peserta</span>
                    </a>
                </li>

                <!-- REGISTRASI -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/registrasi') ?>">
                        <span>
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">Kelola Registrasi</span>
                    </a>
                </li>

                                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/laporan_keuangan') ?>">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Laporan Keuangan</span>
                    </a>
                </li>

                                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('sekretaris/laporan_kegiatan') ?>">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Laporan Kegiatan</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>