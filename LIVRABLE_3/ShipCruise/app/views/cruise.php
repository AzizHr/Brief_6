<?php require_once './includes/header.php' ?>
<link rel="stylesheet" href="<?php echo url('assets/style.css') ?>">

<div class="container-fluid main_image">
    <h1 class="main_title">ShipCruise</h1>
    <p class="main-description">Browse Available Cruises Now</p>
</div>

<h4 class="text-center mt-5">Book Your First Cruise Now</h4>



<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Port
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($ports as $port) : ?>
                        <li><button class="dropdown-item" type="button"><?php echo $port['name'] ?></button></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>

        <div class="col">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ship
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($ships as $ship) : ?>
                        <li><button class="dropdown-item" type="button"><?php echo $ship['name'] ?></button></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>

        <div class="col">
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Month
                </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button">1</button></li>
                    <li><button class="dropdown-item" type="button">2</button></li>
                    <li><button class="dropdown-item" type="button">3</button></li>
                    <li><button class="dropdown-item" type="button">4</button></li>
                    <li><button class="dropdown-item" type="button">5</button></li>
                    <li><button class="dropdown-item" type="button">6</button></li>
                    <li><button class="dropdown-item" type="button">7</button></li>
                    <li><button class="dropdown-item" type="button">8</button></li>
                    <li><button class="dropdown-item" type="button">9</button></li>
                    <li><button class="dropdown-item" type="button">10</button></li>
                    <li><button class="dropdown-item" type="button">11</button></li>
                    <li><button class="dropdown-item" type="button">12</button></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row mt-5 gap-5 justify-content-center">
        <?php foreach ($cruises as $cruise) : ?>
            <div class="col-lg-3 col-md-5 col-sm-12">
                <div class="card" style="width: 17rem; height: 440px;">
                    <img class="card-img-top" src="<?php echo url('assets/' . $cruise['image']) ?>" alt="Card image cap" style="height:60%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cruise['starting_date'] ?></h5>
                        <h5 class="card-title"><?php echo $cruise['price'] . '$' ?></h5>
                        <a href="<?php echo BASE_URL . 'reservation/index' ?>" class="card_btn">Book Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<?php require_once './includes/footer.php' ?>