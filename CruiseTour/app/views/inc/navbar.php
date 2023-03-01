<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand fa fa-ship text-primary" href="<?php echo URLROOT ?>">&nbsp;Cruise Tour</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if (!isset($_SESSION['client_id']) && !isset($_SESSION['admin_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'pages/cruises' ?>">Cruises</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>clients/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="<?php echo URLROOT ?>clients/register">Register</a>
                    </li>
                </ul>
            <?php endif ?>
            <?php if (isset($_SESSION['client_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'pages/cruises' ?>">Cruises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'pages/cruises' ?>">Book Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'clients/my_reservations' ?>">My Reservations</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?= $_SESSION['client_full_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="<?php echo URLROOT ?>clients/logout">Logout</a>
                    </li>
                </ul>
            <?php endif ?>

            <?php if (isset($_SESSION['admin_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URLROOT . 'cruises/index' ?>">Cruises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'ships/index' ?>">Ships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'ports/index' ?>">Ports</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?= $_SESSION['admin_full_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark" href="<?php echo URLROOT ?>admin/logout">Logout</a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</nav>