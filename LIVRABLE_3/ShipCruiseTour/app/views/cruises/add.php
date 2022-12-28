<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h2>Add A Cruise</h2>
            <p>Please fill out this form to add a cruise</p>
            <form action="<?php echo URLROOT; ?>cruises/add" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label for="price">Cruise Price: <sup>*</sup></label>
                    <input type="number" name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>" min="1">
                    <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="cruise_img">Cruise Image: <sup>*</sup></label>
                    <input type="file" name="cruise_img" class="form-control form-control-lg <?php echo (!empty($data['cruise_img_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['cruise_img']; ?>">
                    <span class="invalid-feedback"><?php echo $data['cruise_img_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="nights_number">Nights Number: <sup>*</sup></label>
                    <input type="number" name="nights_number" class="form-control form-control-lg <?php echo (!empty($data['nights_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nights_number']; ?>" min="1">
                    <span class="invalid-feedback"><?php echo $data['nights_number_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="starting_date">Starting Date: <sup>*</sup></label>
                    <input type="date" name="starting_date" class="form-control form-control-lg <?php echo (!empty($data['starting_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['starting_date']; ?>">
                    <span class="invalid-feedback"><?php echo $data['starting_date_err']; ?></span>
                </div>
                <select class="form-select mt-3" aria-label="Default select example" name="ship_id">
                    <?php foreach ($data['ships'] as $ship) : ?>
                        <option value="<?php echo $ship['id'] ?>" selected><?php echo $ship['name'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="row mt-3">
                    <div class="col">
                        <input type="submit" value="Add" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>