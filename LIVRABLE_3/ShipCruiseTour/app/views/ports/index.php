<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
<h4><?php echo isset($data['success']) ? $data['success'] : '' ?></h4>
<a href="<?php echo URLROOT;  ?>ports/add" class="btn btn-sm btn-success"><i class="fa fa-plus me-2"></i>Add New Port</a>
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
            <?php foreach ($data['ports'] as $port) : ?>
                <tr>
                    <td><?php echo $port['id'] ?></td>
                    <td><?php echo $port['name'] ?></td>
                    <td><?php echo $port['country'] ?></td>
                    <td>
                        <a href="<?php echo URLROOT . 'ports/edit/' . $port['id'] ?>" class="btn btn-sm btn-warning m-2"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo URLROOT . 'ports/delete/' . $port['id'] ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>