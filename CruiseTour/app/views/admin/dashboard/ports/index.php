<?php require APPROOT . '/views/inc/navbar.php';  ?>
<div>
    <?= flash('message') ?>
</div>
<div class="container mt-5">
    <a class="btn btn-sm btn-success" href="<?= URLROOT . 'ports/create' ?>"><i class="fa-solid fa-pen-to-square"></i> New Port</a>

    <div class="mx-auto text-center">
        <table class="container mt-5 table table-hover">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>COUNTRY</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                <?php foreach ($data['ports'] as $port) : ?>
                    <tr>
                        <td><?= $port->port_id ?></td>
                        <td><?= $port->port_name ?></td>
                        <td><?= $port->country ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger m-2" href="<?= URLROOT . 'ports/destroy/' . $port->port_id ?>"><i class="fa-solid fa-trash"></i></a>
                            <a class="btn btn-sm btn-warning m-2" href="<?= URLROOT . 'ports/show/' . $port->port_id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>