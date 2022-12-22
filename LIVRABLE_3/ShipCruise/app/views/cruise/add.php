<?php require_once './includes/header.php' ?>
<?php if(isset($done)): ?>
<p><?php echo $done ?></p>
<?php endif; ?>
<form action="<?php echo url('port/store')  ?>" method="post" class="container" style="margin-top:80px; width:46%; display:flex; flex-direction:column; row-gap:30px;">
    <h1 class="text-center">Add A New Port</h1>
    <div class="form-group">
        <label class="form-text">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Port's Name">
    </div>
    <div class="form-group">
        <label class="form-text">Country</label>
        <input type="text" name="country" class="form-control" placeholder="Enter Port's Country">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit" name="submit">Add</button>
    </div>
</form>

<?php require_once './includes/footer.php' ?>