<div>
    <?= flash('message') ?>
</div>
<div class="container d-flex justify-content-center mt-5">
    <form id="login" style="width: 70%" action="<?= URLROOT . 'clients/login' ?>" method="post">
        <h3>Welcome Again! Login</h3>
        <div class="form-group mt-3">
            <label>Email : </label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email">
            <span id="email_error"></span>
        </div>

        <div class="form-group mt-3">
            <label>Password : </label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
            <span id="password_error"></span>
        </div>

        <input class="btn btn-dark mt-4" type="submit" value="Login" id="Login">
    </form>
</div>
<script src="<?php echo URLROOT; ?>js/auth_validation.js"></script>