<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="text-center mt-5">Contact Us Now</h1>
<div class="container py-5 mt-5">
<div class="row">
    <div class="col-lg-6 col-md-12 mt-3">
        <div class="form-group">
            <label>First Name :</label>
            <input type="text" class="form-control" placeholder="Enter your first name">
        </div>
    </div>
    <div class="col-lg-6 col-md-12 mt-3">
        <div class="form-group">
            <label>Last Name :</label>
            <input type="text" class="form-control" placeholder="Enter your last name">
        </div>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="form-group">
            <label>Phone Number :</label>
            <input type="text" class="form-control" placeholder="Enter your phone number">
        </div>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="form-group">
            <label>Email :</label>
            <input type="email" class="form-control" placeholder="Enter your email">
        </div>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="form-group">
            <label>Message :</label>
            <textarea class="form-control" cols="30" rows="10" placeholder="Enter your message"></textarea>
        </div>
    </div>
    <div class="col-lg-12 mt-3">
    <button class="btn btn-primary">Send</button>
    </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>