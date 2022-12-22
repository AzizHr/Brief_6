<?php require_once './includes/header.php' ?>
<?php if(isset($done)): ?>
<p><?php echo $done ?></p>
<?php endif; ?>
<form action="<?php echo url('ship/store')  ?>" method="post" class="container" style="margin-top:80px; width:46%; display:flex; flex-direction:column; row-gap:30px;">
    <h1 class="text-center">Add A New Ship</h1>
    <div class="form-group">
        <label class="form-text">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Ship's Name" required>
    </div>
    <div class="form-group">
        <label class="form-text">Rooms Number</label>
        <input type="number" name="roomsNumber" class="form-control" placeholder="Enter Rooms Number" required min="1">
    </div>
    <div class="form-group">
        <label class="form-text">Places NUmber</label>
        <input type="number" name="placesNumber" class="form-control" placeholder="Enter Places Number" required min="1">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit" name="submit">Add</button>
    </div>
</form>

<?php require_once './includes/footer.php' ?>