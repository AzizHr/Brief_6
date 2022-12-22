<?php require_once './includes/header.php' ?>

<form action="" method="post" class="container" style="margin-top:80px; width:50%; display:flex; flex-direction:column; row-gap:30px;">
    <h1 class="text-center">Book A Reservation Now</h1>
    <div class="form-group">
        <label class="form-text">Reservation Date</label>
        <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
    </div>
    <div class="form-group">
        <label class="form-text">Reservation Price</label>
        <input type="text" class="form-control" placeholder="Enter your last name">
    </div>

    <select class="form-select" aria-label="Default select example">
        <option selected>Choose a cruise</option>
        <?php foreach ($ships as $ship) : ?>
            <option value="<?php $ctr = 0;
                            $ctr++; ?>"><?php echo $ship['name'] ?></option>
        <?php endforeach ?>
    </select>

    <select class="form-select" aria-label="Default select example">
        <option selected>Choose a room type</option>
        <?php foreach ($room_type as $rt) : ?>
            <option value="<?php $ctr = 0;
                            $ctr++; ?>"><?php echo $rt['name'] . ' - ' . $rt['price'] ?></option>
        <?php endforeach ?>
    </select>
    <div class="form-group">
        <button class="btn btn-primary">Reserve</button>
    </div>
</form>

<?php require_once './includes/footer.php' ?>