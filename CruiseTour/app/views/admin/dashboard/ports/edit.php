<div class="container mt-5">
    <a class="btn btn-sm btn-dark" style="margin-left: 210px;" href="<?= URLROOT . 'cruises/index' ?>"><i class="fa-solid fa-house"></i> Back </a>
<div class="container d-flex justify-content-center mt-5">
    <form id="port_form" style="width: 70%" action="<?= URLROOT . 'ports/update/' . $data['port']->port_id ?>" method="post">
        <h3>Editing a Port</h3>
        <div class="form-group">
            <label>Name : </label>
            <input class="form-control" type="text" name="port_name" id="port_name" placeholder="Port Name" value="<?= $data['port']->port_name ?>">
            <span id="port_name_error"></span>
        </div>
        <div class="form-group mt-2">
            <label>Country : </label>
            <input class="form-control" type="text" name="country" id="country" placeholder="Country" value="<?= $data['port']->country ?>">
            <span id="country_error"></span>
        </div>
        <input class="btn btn-dark mt-4" type="submit" value="Update" id="Update">
    </form>
</div>
<script src="<?php echo URLROOT; ?>js/port_validation.js"></script>