<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h2>Add A Port</h2>
            <p>Please fill out this form to add a port</p>
            <form action="<?php echo URLROOT . 'ports/add' ?>" method="post" enctype="multipart\form-data">
                <div class="form-group mt-3">
                    <label for="name">Port Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                </div>
                <div class="form-group mt-3">
                    <label for="country">Port Country: <sup>*</sup></label>
                    <input type="text" name="country" class="form-control form-control-lg <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['country'] ; ?>">
                    <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
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