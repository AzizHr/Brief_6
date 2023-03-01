<div class="container d-flex justify-content-center mt-5">
    <form style="width: 70%" action="<?= URLROOT . 'clients/reserve' ?>" method="post">
        <h3>Booking!</h3>
        <div>
            <label>Choose Room Type : </label>
            <select class="form-select" name="room_type">
                <?php foreach ($data['room_types'] as $room_type) : ?>
                    <option value="<?= $room_type->room_type_id ?>"><?= $room_type->room_type_name ?></option>
                <?php endforeach ?>
            </select>
        </div> <br>
        <div class="form-group">
            <label>Cruise Title : </label>
            <input class="form-control" type="text" value="<?= $data['cruise']->title ?>">
            <input type="text" name="cruise_id" value="<?= $data['cruise']->cruise_id ?>" hidden>
        </div>
        <input class="btn btn-dark mt-4" type="submit" value="Reserve" id="Reserve">
    </form>
</div>