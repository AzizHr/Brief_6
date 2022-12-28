<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <h2>Reserve Your Cruise Now</h2>
      <p>Please fill out this form to reserve a cruise</p>
      <form action="<?php echo URLROOT; ?>/users/reserve" method="post">
        <div class="form-group mt-3">
          <label for="reservation_date">Reservation Date: <sup>*</sup></label>
          <input type="date" name="reservation_date" class="form-control form-control-lg <?php echo (!empty($data['reservation_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Date('Y-m-d')//$data['reservation_date']; ?>">
          <span class="invalid-feedback"><?php echo $data['reservation_date_err']; ?></span>
        </div>
        <select class="form-select mt-3" aria-label="Default select example" name="room_type">
          
                    <?php foreach ($data['roomTypes'] as $roomType) : ?>
                        <option value="<?php echo $roomType['id'] ?>" selected><?php echo $roomType['name'] ?></option>
                    <?php endforeach ?>
        </select>
        <div class="form-group mt-3">
          <label for="reservation_price">Reservation Price: <sup>*</sup></label>
          <input type="text" name="reservation_price" class="form-control form-control-lg <?php echo (!empty($data['reservation_price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reservation_price']; ?>">
          <span class="invalid-feedback"><?php echo $data['reservation_price_err']; ?></span>
        </div>

        <select class="form-select mt-3" aria-label="Default select example" name="room_type">
                    <?php foreach ($data['cruises'] as $cruise) : ?>
                        <option value="" selected><?php echo $cruise['name'] ?></option>
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