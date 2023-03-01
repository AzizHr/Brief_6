<div class="container mt-5">
    <a class="btn btn-sm btn-dark" style="margin-left: 210px;" href="<?= URLROOT . 'cruises/index' ?>"><i class="fa-solid fa-house"></i> Back </a>
<div class="container d-flex justify-content-center mt-5">
    <form id="cruise_form" style="width: 70%" action="<?= URLROOT . 'cruises/update/' . $data['cruise']->cruise_id ?>" method="post" enctype="multipart/form-data">
        <h3>Editing a cruise</h3>
        <div class="form-group">
            <label>Title : </label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $data['cruise']->title ?>">
            <span id="title_error"></span>
        </div>
        <div class="form-group">
            <label>Price : </label>
            <input class="form-control" type="text" name="cruise_price" id="cruise_price" value="<?= $data['cruise']->cruise_price ?>">
            <span id="cruise_price_error"></span>
        </div>
        <div class="form-group">
            <label>Image : </label>
            <input class="form-control" type="file" name="image" id="image">
            <span id="image_error"></span>
        </div>
        <div class="form-group">
            <label>Number of nights : </label>
            <input class="form-control" type="number" name="number_of_nights" id="number_of_nights" value="<?= $data['cruise']->number_of_nights ?>">
            <span id="number_of_nights_error"></span>
        </div>
        <div>
            <label>Starting Port : </label>
            <select class="form-select" name="starting_port" id="starting_port">
                <?php foreach ($data['ports'] as $port) : ?>
                    <option value="<?= $port->port_id ?>"><?= $port->port_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label>Ship : </label>
            <select class="form-select" name="ship_id" id="ship_id">
                <?php foreach ($data['ships'] as $ship) : ?>
                    <option value="<?= $ship->ship_id ?>"><?= $ship->ship_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>Itinerary : </label>
            <input class="form-control" type="text" name="itinerary" id="itinerary" value="<?= $data['cruise']->itinerary ?>">
            <span id="itinerary_error"></span>
        </div>
        <div class="form-group">
            <label>Starts at : </label>
            <input class="form-control" type="date" name="starts_at" id="starts_at" value="<?= $data['cruise']->starts_at ?>">
            <span id="starts_at_error"></span>
        </div>
        <input class="btn btn-dark mt-4" type="submit" value="Update" id="Update">
    </form>
</div>
</div>
<script src="<?php echo URLROOT; ?>js/cruise_validation_update.js"></script>