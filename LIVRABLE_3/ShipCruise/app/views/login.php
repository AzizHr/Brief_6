<?php require_once './includes/header.php' ?>

<form action="<?php echo BASE_URL . 'client/authentification' ?>" method="post" class="container" style="margin-top:80px; width:46%; display:flex; flex-direction:column; row-gap:30px;">
    <h1 class="text-center">Login Now</h1>
    <div class="form-group">
        <label class="form-text">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label class="form-text">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="login" type="submit">Login</button>
    </div>
</form>

<?php require_once './includes/footer.php' ?>