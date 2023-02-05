<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <h2>Reserve Your Cruise Now</h2>
      <p>Please fill out this form to reserve a cruise</p>
      <form action="<?php echo URLROOT; ?>users/reserve" method="POST">
        <select class="form-select mt-3" aria-label="Default select example" name="type_of_room">
          <?php foreach ($data['room_types'] as $room_type) : ?>
            <option value="<?php echo $room_type['id'] ?>" selected><?php echo $room_type['name'] ?></option>
          <?php endforeach ?>
        </select>

        <div class="form-group mt-3">
          <label for="last_name">Cruise Name: <sup>*</sup></label>
          <input type="text" name="cruise_id" class="form-control">
        </div>

        <div class="row mt-3">
          <div class="col">
            <input type="submit" value="Reserve" class="btn btn-success btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>