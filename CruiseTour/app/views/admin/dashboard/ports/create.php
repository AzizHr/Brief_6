<div class="container mt-5">
    <a class="btn btn-sm btn-dark" style="margin-left: 210px;" href="<?= URLROOT . 'ports/index' ?>"><i class="fa-solid fa-house"></i> Back </a>
<div class="container d-flex justify-content-center mt-5">
    <form id="port_form" style="width: 70%" action="<?= URLROOT . 'ports/create' ?>" method="post">
        <h3>Adding New Port</h3>
        <div class="form-group">
            <label>Name : </label>
            <input class="form-control" type="text" name="port_name" id="port_name" placeholder="Port Name">
            <span id="port_name_error"></span>
        </div>
        <div class="form-group mt-2">
            <label>Country : </label>
            <input class="form-control" type="text" name="country" id="country" placeholder="Country">
            <span id="country_error"></span>
        </div>

        <input class="btn btn-dark mt-4" type="submit" value="Add" id="Add">
    </form>
</div>
</div>
<script src="<?php echo URLROOT; ?>js/port_validation.js"></script>