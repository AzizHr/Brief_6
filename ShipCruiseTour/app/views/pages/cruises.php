<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container-fluid main_image">
    <h1 class="main_title">ShipCruise</h1>
    <p class="main-description">Forget What’s Called Work & Travel Now</p>
</div>

<div class="container mt-5">
    <div>
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Port
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php foreach ($data['ports'] as $port) : ?>
                <li style="color: black;"><a href="<?php echo URLROOT; ?>cruises/filterCruiseByPort/<?php echo $port['name'] ?>"><?php echo $port['name'] ?></a></li><br>
            <?php endforeach ?>
        </ul>
    </div>

    <div>
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ship
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php foreach ($data['ships'] as $ship) : ?>
                <li style="color: black;"><a href="<?php echo URLROOT; ?>cruises/filterCruiseByShip/<?php echo $ship['name'] ?>"><?php echo $ship['name'] ?></a></li><br>
            <?php endforeach ?>
        </ul>
    </div>

    <div>
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Month
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <?php for($i = 1 ; $i <= 12 ; $i++) : ?>
                <li style="color: black;"><a href="<?php echo URLROOT; ?>cruises/filterCruiseByMonth/<?php echo $i ?>"><?php echo $i ?></a></li><br>
            <?php endfor ?>
        </ul>
    </div>
</div>

</div>
<div class="container mt-5">
    <div class="row mt-5 gap-5 justify-content-center">
        <?php foreach ($data['cruises'] as $cruise) : ?>
            <div class="col-lg-3 col-md-5 col-sm-12">
                <div class="card" style="width: 18rem; height: 400px;">
                    <img class="card-img-top" src="<?php echo URLROOT ?>img/card_img1.jpg" alt="Card image cap" style="height:60%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cruise['id'] ?></h5>
                        <a href="<?php URLROOT ?>users/reserve" class="card_btn">Book Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>