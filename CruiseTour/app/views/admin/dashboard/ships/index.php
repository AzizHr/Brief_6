<?php require APPROOT . '/views/inc/navbar.php';  ?>
<div>
    <?= flash('message') ?>
</div>
<div class="container mt-5">
    <a class="btn btn-sm btn-success" href="<?= URLROOT . 'ships/create' ?>"><i class="fa-solid fa-pen-to-square"></i> New Ship</a>

    <div class="mx-auto text-center">
        <table class="container mt-5 table table-hover">
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>NUMBER OF ROOMS</th>
                <th>NUMBER OF PLACES</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                <?php foreach ($data['ships'] as $ship) : ?>
                    <tr>
                        <td><?= $ship->ship_id ?></td>
                        <td><?= $ship->ship_name ?></td>
                        <td><?= $ship->number_of_rooms ?></td>
                        <td><?= $ship->number_of_places ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger m-2" href="<?= URLROOT . 'ships/destroy/' . $ship->ship_id ?>"><i class="fa-solid fa-trash"></i></a>
                            <a class="btn btn-sm btn-warning m-2" href="<?= URLROOT . 'ships/show/' . $ship->ship_id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>