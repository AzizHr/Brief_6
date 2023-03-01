<?php require APPROOT . '/views/inc/navbar.php';  ?>
<div>
    <?= flash('message') ?>
</div>
<div class="container mt-5">
    <a class="btn btn-sm btn-success" href="<?= URLROOT . 'cruises/create' ?>"><i class="fa-solid fa-pen-to-square"></i> New Cruise</a>

    <div class="mx-auto text-center">
        <table class="container mt-5 table table-hover">
            <thead>
                <th>ID</th>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>PRICE</th>
                <th>ITINERARY</th>
                <th>STARTS AT</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                <?php foreach ($data['cruises'] as $cruise) : ?>
                    <tr>
                        <td><?= $cruise->cruise_id ?></td>
                        <td><?= $cruise->image ?></td>
                        <td><?= $cruise->title ?></td>
                        <td><?= $cruise->cruise_price . ' $' ?></td>
                        <td><?= $cruise->itinerary ?></td>
                        <td><?= $cruise->starts_at ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger m-2" href="<?= URLROOT . 'cruises/destroy/' . $cruise->cruise_id ?>"><i class="fa-solid fa-trash"></i></a>
                            <a class="btn btn-sm btn-warning m-2" href="<?= URLROOT . 'cruises/show/' . $cruise->cruise_id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>