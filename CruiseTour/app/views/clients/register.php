<div class="container d-flex justify-content-center mt-5">
    <form id="register" style="width: 70%" action="<?= URLROOT . 'clients/register' ?>" method="post">
        <h3>Create your account now</h3>
        <div class="form-group mt-3">
            <label>First Name : </label>
            <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Enter your first name">
            <span id="first_name_error"></span>
        </div>
        <div class="form-group mt-3">
            <label>Last Name : </label>
            <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter your last name">
            <span id="last_name_error"></span>
        </div>

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
        <input class="btn btn-dark mt-4" type="submit" value="Register" id="Register">
    </form>
</div>
<script src="<?php echo URLROOT; ?>js/register_validation.js"></script>