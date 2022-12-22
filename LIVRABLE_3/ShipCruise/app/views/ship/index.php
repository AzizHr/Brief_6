<?php require_once './includes/header.php' ?>

<div class="container mt-5">
<a href="<?php echo url('port/add') ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
</div>
<div class="mx-auto text-center" style="width: 70%;">
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
            <?php foreach ($ships as $ship) : ?>
                <tr>
                    <td><?php echo $ship['id'] ?></td>
                    <td><?php echo $ship['name'] ?></td>
                    <td><?php echo $ship['rooms_number'] ?></td>
                    <td><?php echo $ship['places_number'] ?></td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning mt-3"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-sm btn-danger mt-3"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require_once './includes/footer.php' ?>