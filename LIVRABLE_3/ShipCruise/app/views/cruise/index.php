<?php require_once './includes/header.php' ?>
<?php if(isset($done)): ?>
<p><?php echo $done ?></p>
<?php endif; ?>

<div class="container mt-5">
<a href="<?php echo url('port/add') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
</div>
<div class="mx-auto text-center">
    <table class="container mt-5 table table-hover">
    
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Country</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ports as $port) : ?>
                <tr>
                    <td><?php echo $port['id'] ?></td>
                    <td><?php echo $port['name'] ?></td>
                    <td><?php echo $port['country'] ?></td>
                    <td>
                        <a href="<?php echo url('port/edit/' . $port['id']) ?>" class="btn btn-sm btn-warning m-2"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo url('port/delete/' . $port['id']) ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require_once './includes/footer.php' ?>