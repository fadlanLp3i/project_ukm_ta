<!-- Sidebar Start -->
<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url('/') ?>" class="text-nowrap logo-img">
                <img src="<?= base_url('assets/images/logos/logo.svg') ?>" alt="" />
            </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <span class="hide-menu">MENU</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link"
                        href="<?= base_url('pembina/user') ?>">
                        <span class="hide-menu">User</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link"
                        href="<?= base_url('dashboard') ?>">
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
<!-- Sidebar End -->