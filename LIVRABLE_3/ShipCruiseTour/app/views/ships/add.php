<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h2>Add A Ship</h2>
            <p>Please fill out this form to add a ship</p>
            <form action="<?php echo URLROOT . 'ships/add' ?>" method="post" enctype="multipart\form-data">
                <div class="form-group mt-3">
                    <label for="name">Ship Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="rooms_number">Rooms Number: <sup>*</sup></label>
                    <input type="number" name="rooms_number" class="form-control form-control-lg <?php echo (!empty($data['rooms_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['rooms_number'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['rooms_number_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="places_number">Places Number: <sup>*</sup></label>
                    <input type="number" name="places_number" class="form-control form-control-lg <?php echo (!empty($data['places_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['places_number'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['places_number_err']; ?></span>
                </div>
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