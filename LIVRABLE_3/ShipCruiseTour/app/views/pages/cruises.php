<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container-fluid main_image">
    <h1 class="main_title">ShipCruise</h1>
    <p class="main-description">Forget What’s Called Work & Travel Now</p>
</div>

<div class="container mt-5">
    <div class="row mt-5 gap-5 justify-content-center">
    <?php foreach ($data['cruises'] as $cruise) : ?>
        <div class="col-lg-3 col-md-5 col-sm-12">
            <div class="card" style="width: 18rem; height: 400px;">
                <img class="card-img-top" src="<?php echo URLROOT ?>img/card_img1.jpg" alt="Card image cap" style="height:60%;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cruise['id'] ?></h5>
                    <a href="<?php URLROOT . 'cruise/index' ?>" class="card_btn">Book Now</a>
                </div>
            </div>
        </div>
            <?php endforeach ?>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>