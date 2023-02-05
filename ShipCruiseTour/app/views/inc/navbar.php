<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand fa fa-ship text-primary" href="<?php echo URLROOT ?>">&nbsp;&nbsp;&nbsp;&nbsp;Ship~Cruise</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if (!isset($_SESSION['admin_id']) && !isset($_SESSION['user_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>">Cruises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>users/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="<?php echo URLROOT ?>users/register">Register</a>
                    </li>
                </ul>
            <?php endif ?>
            <?php if (isset($_SESSION['admin_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>">Cruises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?php echo $_SESSION['admin_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>admins/logout">Logout</a>
                    </li>
                </ul>
            <?php endif ?>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>pages/cruises">Cruises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'users/my_reservations'?>">My Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT . 'users/reserve'?>">Reserve Now</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-auto d-flex gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href=""><?php echo $_SESSION['user_name'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href="<?php echo URLROOT ?>users/logout">Logout</a>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</nav>