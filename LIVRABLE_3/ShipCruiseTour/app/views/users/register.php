<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <h2>Create An Account</h2>
      <p>Please fill out this form to register with us</p>
      <form action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="form-group mt-3">
          <label for="first_name">First Name: <sup>*</sup></label>
          <input type="text" name="first_name" class="form-control form-control-lg <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
        </div>
        <div class="form-group mt-3">
          <label for="last_name">Last Name: <sup>*</sup></label>
          <input type="text" name="last_name" class="form-control form-control-lg <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>">
          <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
        </div>
        <div class="form-group mt-3">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group mt-3">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="form-group mt-3">
          <label for="confirm_password">Confirm Password: <sup>*</sup></label>
          <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="row mt-3">
          <div class="col">
            <input type="submit" value="Register" class="btn btn-success btn-block">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-link btn-light btn-block">Have an account? Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>