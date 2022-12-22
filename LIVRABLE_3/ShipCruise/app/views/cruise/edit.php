<?php require_once './includes/header.php' ?>
<?php if(isset($done)): ?>
<p><?php echo $done ?></p>
<?php endif; ?>
<form method="POST" action="<?php echo url('port/update/' . $port['id']); ?>" class="container" style="margin-top:80px; width:46%; display:flex; flex-direction:column; row-gap:30px;">
    <h1 class="text-center">Update A Port</h1>
    <div class="form-group">
        <label class="form-text">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Port's Name" value="<?php echo $port['name'] ?>">
    </div>
    <div class="form-group">
        <label class="form-text">Country</label>
        <input type="text" name="country" class="form-control" placeholder="Enter Port's Country" value="<?php echo $port['country'] ?>">
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </div>
</form>

<?php require_once './includes/footer.php' ?>