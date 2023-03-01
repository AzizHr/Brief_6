<div class="container d-flex justify-content-center mt-5">
    <form id="ship_form" style="width: 70%" action="<?= URLROOT . 'ships/create' ?>" method="post">
        <h3>Adding New Ship</h3>
        <div class="form-group">
            <label>Name : </label>
            <input class="form-control" type="text" name="ship_name" id="ship_name" placeholder="Ship Name">
            <span id="ship_name_error"></span>
        </div>
        <div class="form-group mt-1">
            <label>Number of rooms : </label>
            <input class="form-control" type="number" name="number_of_rooms" id="number_of_rooms" placeholder="Number of rooms" min="1">
            <span id="number_of_rooms_error"></span>
        </div>

        <div class="form-group mt-1">
            <label>Number of places : </label>
            <input class="form-control" type="number" name="number_of_places" id="number_of_places" placeholder="Number of places" min="1">
            <span id="number_of_places_error"></span>
        </div>

        <input class="btn btn-dark mt-3" type="submit" value="Add" id="Add">
    </form>
</div>
<script src="<?php echo URLROOT; ?>js/ship_validation.js"></script>