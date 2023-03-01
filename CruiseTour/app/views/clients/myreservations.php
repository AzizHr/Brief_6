<?php require APPROOT . '/views/inc/navbar.php';  ?>
<div>
    <?= flash('message') ?>
</div>
<div class="container mt-5">
    <div class="mx-auto text-center">
        <table class="container mt-5 table table-hover">
            <thead>
                <th>ID</th>
                <th>RESERVED AT</th>
                <th>PRICE</th>
                <th>ROOM TYPE</th>
                <th>CRUISE</th>
                <th>OPERATIONS</th>
            </thead>
            <tbody>
                <?php foreach ($data['my_reservations'] as $my_reservation) : ?>
                    <tr>
                        <td><?= $my_reservation->reservation_id ?></td>
                        <td><?= $my_reservation->reserved_at ?></td>
                        <td><?= $my_reservation->price ?></td>
                        <td><?= $my_reservation->type_of_room ?></td>
                        <td><?= $my_reservation->cruise_title ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="<?= URLROOT . 'clients/cancel/' . $my_reservation->reservation_id ?>"><i class="fa-sharp fa-solid fa-ban"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>