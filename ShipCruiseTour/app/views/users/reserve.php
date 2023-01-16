<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <h2>Reserve Your Cruise Now</h2>
      <p>Please fill out this form to reserve a cruise</p>
      <form action="<?php echo URLROOT; ?>users/reserve" method="POST">
        <select class="form-select mt-3" aria-label="Default select example" name="room_id">
          <?php foreach ($data['roomTypes'] as $roomType) : ?>
            <option value="<?php echo $roomType['id'] ?>" selected><?php echo $roomType['room_number'] . ' - ' . $roomType['rt_name'] ?></option>
          <?php endforeach ?>
        </select>

        <select name="cruise_id" id="cruise_id" class="form-select mt-3" aria-label="Default select example" >
          <?php foreach ($data['cruises'] as $cruise) : ?>
            <option value="<?php echo $cruise['id'] ?>" selected><?php echo $cruise['id'] . '  -  ' . $cruise['price'] . ' $' ?></option>
          <?php endforeach ?>
        </select>

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