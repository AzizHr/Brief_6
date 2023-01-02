<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto">
      <?php flash('register_success'); ?>
      <h2>Admin Authentification</h2>
      <p>Please fill in your credentials to log in</p>
      <form action="<?php echo URLROOT; ?>admins/auth" method="POST">
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
        <div class="row mt-3">
          <div class="col">
            <input type="submit" name="login" value="Login" class="btn btn-success btn-block">
          </div>
      </form>
    </div>
  </div>
</div>

</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>