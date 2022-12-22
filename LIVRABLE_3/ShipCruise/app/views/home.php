<?php require_once './includes/header.php' ?>
<link rel="stylesheet" href="<?php echo url('assets/style.css') ?>">

<div class="container-fluid main_image">
    <h1 class="main_title">ShipCruise</h1>
    <p class="main-description">Forget What’s Called Work & Travel Now</p>
</div>

<h4 class="text-center mt-5">Register Now & Book Your First Cruise</h4>
<p class="text-center">already have an account ,<a href="<?php BASE_URL . 'login/index' ?>" class="btn btn-link">login here</a></p>

<div class="container mt-5">
    <div class="row mt-5 gap-5 justify-content-center">
        <div class="col-lg-3 col-md-5 col-sm-12">
            <div class="card" style="width: 18rem; height: 400px;">
                <img class="card-img-top" src="../../public/assets/card_img1.jpg" alt="Card image cap" style="height:60%;">
                <div class="card-body">
                    <h5 class="card-title">Cruise To Island</h5>
                    <a href="<?php BASE_URL . 'cruise/index' ?>" class="card_btn">Book Now</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-12">
            <div class="card" style="width: 18rem; height: 400px;">
                <img class="card-img-top" src="../../public/assets/card_img2.jpg" alt="Card image cap" style="height:60%;">
                <div class="card-body">
                    <h5 class="card-title">Cruise To Island</h5>
                    <a href="<?php BASE_URL . 'port/index' ?>" class="card_btn">Book Now</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-12">
            <div class="card" style="width: 18rem; height: 400px;">
                <img class="card-img-top" src="../../public/assets/card_img3.jpg" alt="Card image cap" style="height:60%;">
                <div class="card-body">
                    <h5 class="card-title">Cruise To Island</h5>
                    <a href="<?php BASE_URL . 'cruise/index' ?>" class="card_btn">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container justify-content-center" style="margin-top: 100px;">
    <div class="row mt-5 gap-1">
        <div class="col-lg-7 col-md-5 col-sm-11">
            <img src="../../public/assets/img1.jpg" style="width: 100%; border-radius:10px; height:320px;" alt="">
        </div>
        <div class="col-lg-4 col-md-5 col-sm-11">
            <img src="../../public/assets/img2.jpg" style="width: 100%; border-radius:10px; height:320px;" alt="">
        </div>
        <div class="col-lg-4 col-md-5 col-sm-11">
            <img src="../../public/assets/img3.jpg" style="width: 100%; border-radius:10px; height:320px;" alt="">
        </div>
        <div class="col-lg-4 col-md-5 col-sm-11">
            <img src="../../public/assets/img4.jpg" style="width: 100%; border-radius:10px; height:320px;" alt="">
        </div>
        <div class="col-lg-3 col-md-5 col-sm-11">
            <img src="../../public/assets/img5.jpg" style="width: 100%; border-radius:10px; height:320px;" alt="">
        </div>
    </div>
</div>

<?php require_once './includes/footer.php' ?>