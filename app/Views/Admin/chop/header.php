<header class="navbar sticky-top flex-md-nowrap">
    <div class="col-md-3 col-lg-3 me-0 px-2 fs-6">
        <a class="navbar-brand" href="/AdDash">
            ALLIANZ ADMIN
        </a>
    </div>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <form class="custom-form header-form ms-lg-3 ms-md-3 me-lg-auto me-md-auto order-2 order-lg-0 order-md-0" action="#"
        method="get" role="form">
    </form>

    <div class="navbar-nav me-lg-2">
        <div class="nav-item text-nowrap d-flex align-items-center">
            <!-- <div class="dropdown ps-3">
                <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" id="navbarLightDropdownMenuLink">
                    <i class="bi-bell"></i>
                    <span
                        class="position-absolute start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg-end notifications-block-wrap bg-white shadow"
                    aria-labelledby="navbarLightDropdownMenuLink">
                    <small>Notifications</small>

                    <li class="notifications-block border-bottom pb-2 mb-2">
                        <a class="dropdown-item d-flex  align-items-center" href="#">
                            <div class="notifications-icon-wrap bg-success">
                                <i class="notifications-icon bi-check-circle-fill"></i>
                            </div>

                            <div>
                                <span>Your account has been created successfuly.</span>

                                <p>12 days ago</p>
                            </div>
                        </a>
                    </li>

                    <li class="notifications-block border-bottom pb-2 mb-2">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="notifications-icon-wrap bg-info">
                                <i class="notifications-icon bi-folder"></i>
                            </div>

                            <div>
                                <span>Please check. We have sent a Daily report.</span>

                                <p>10 days ago</p>
                            </div>
                        </a>
                    </li>

                    <li class="notifications-block">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="notifications-icon-wrap bg-danger">
                                <i class="notifications-icon bi-question-circle"></i>
                            </div>

                            <div>
                                <span>Account verification failed.</span>

                                <p>1 hour ago</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div> -->
            <div class="dropdown ps-3">
                <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" id="navbarLightDropdownMenuLink">
                    <i class="bi-bell"></i>
                    <?php if (!empty($notifications)): ?>
                        <span id="notificationCount"
                            class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                            <?= count($notifications); ?>
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg-end notifications-block-wrap bg-white shadow"
                    aria-labelledby="navbarLightDropdownMenuLink">
                    <small>Notifications</small>
                    <?php if (!empty($notifications)): ?>
                        <li class="notifications-block border-bottom pb-2 mb-2">
                            <a href="clearnotif" class="dropdown-item text-center">Mark All as Read</a>
                        </li>
                        <?php foreach ($notifications as $notification): ?>
                            <li class="notifications-block border-bottom pb-2 mb-2 notification-item"
                                data-id="<?= $notification['id']; ?>">
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= $notification['link']; ?>">
                                    <div class="notifications-icon-wrap bg-success">
                                        <i class="notifications-icon bi-check-circle-fill"></i>
                                    </div>
                                    <div>
                                        <span><?= esc($notification['notif']); ?></span>
                                        <p><?= \CodeIgniter\I18n\Time::parse($notification['created_at'])->humanize(); ?></p>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="notifications-block">
                            <div class="dropdown-item d-flex align-items-center">
                                <div class="notifications-icon-wrap bg-info">
                                    <i class="notifications-icon bi-info-circle"></i>
                                </div>
                                <div>
                                    <span>No notifications found.</span>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="dropdown px-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="<?= isset($admin['adminProfile']) && !empty($admin['adminProfile']) ? base_url('/uploads/' . $admin['adminProfile']) : base_url('/uploads/def.png') ?>"
                        class="profile-image img-fluid" alt="">
                </a>
                <ul class="dropdown-menu bg-white shadow">

                    <li>
                        <a class="dropdown-item" href="/AdProfile">
                            <i class="bi-person me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="/AdSetting">
                            <i class="bi-gear me-2"></i>
                            Settings
                        </a>
                    </li>

                    <li class="border-top mt-3 pt-2 mx-4">
                        <a class="dropdown-item ms-0 me-0" href="/logout">
                            <i class="bi-box-arrow-left me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>