<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('message') ?>
<div class="container mt-5">
<a href="<?php echo URLROOT;  ?>ships/add" class="btn btn-sm btn-success"><i class="fa fa-plus me-2"></i>Add New Ship</a>
</div>
<div class="mx-auto text-center">
    <table class="container mt-5 table table-hover">
    
    <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Rooms Number</th>
                <th>Places Number</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['ships'] as $ship) : ?>
                <tr>
                    <td><?php echo $ship['id'] ?></td>
                    <td><?php echo $ship['name'] ?></td>
                    <td><?php echo $ship['number_of_rooms'] ?></td>
                    <td><?php echo $ship['reserved_rooms'] ?></td>
                    <td>
                        <a href="<?php echo URLROOT . 'ships/get/' . $ship['id'] ?>" class="btn btn-sm btn-warning m-2"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo URLROOT . 'ships/delete/' . $ship['id'] ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>