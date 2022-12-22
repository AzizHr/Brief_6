<?php require_once './includes/header.php' ?>

<form action="" method="post" class="container" style="margin-top:80px; width:50%; display:flex; flex-direction:column; row-gap:30px;">
    <h1 class="text-center">Create an account now</h1>
    <div class="form-group">
        <label class="form-text">First Name</label>
        <input type="text" class="form-control" placeholder="Enter your first name">
    </div>
    <div class="form-group">
        <label class="form-text">Last Name</label>
        <input type="text" class="form-control" placeholder="Enter your last name">
    </div>
    <div class="form-group">
        <label class="form-text">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label class="form-text">Password</label>
        <input type="password" class="form-control" placeholder="Enter your password">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Register</button>
    </div>
</form>

<?php require_once './includes/footer.php' ?>