<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container-fluid main_image">
    <h1 class="main_title">ShipCruise</h1>
    <p class="main-description">Forget What’s Called Work & Travel Now</p>
</div>

<div class="container mt-5">
<div class="row mt-5">
    <div class="col">
    <select name="port_name" class="form-select" aria-label="Default select example">
    <?php foreach ($data['ports'] as $port) : ?>
        <a href="<?php URLROOT . 'cruises/filterCruiseByPort' . $port['name'] ?>"><option value="<?php echo $port['name'] ?>"><?php echo $port['name'] ?></option></a>
    <?php endforeach ?>
</select>
    </div>

    <div class="col">
    <select name="port_name" class="form-select" aria-label="Default select example">
    <?php foreach ($data['ships'] as $ship) : ?>
        <a href="<?php URLROOT . 'cruises/filterCruiseByPort' . $ship['name'] ?>"><option value="<?php echo $port['name'] ?>"><?php echo $ship['name'] ?></option></a>
    <?php endforeach ?>
</select>
    </div>

    <div class="col">
    <select name="port_name" class="form-select" aria-label="Default select example">
    <?php for($i = 1 ; $i <= 12 ; $i++) : ?>
        <a href="<?php URLROOT . 'cruises/filterCruiseByPort' . $i ?>"><option value="<?php echo $port['name'] ?>"><?php echo $i ?></option></a>
    <?php endfor ?>
</select>
    </div>
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