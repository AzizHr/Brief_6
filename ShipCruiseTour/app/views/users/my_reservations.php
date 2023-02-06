<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('message'); ?>
<div class="container mt-5">
    <h3>My Reservations</h3>
</div>
<div class="mx-auto text-center">
    <table class="container mt-5 table table-hover">

        <thead>
            <tr>
                <th>Id</th>
                <th>Reservation Date</th>
                <th>Reservation Price</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['my_reservations'] as $my_reservation) : ?>
                <tr>
                    <td><?php echo $my_reservation['id'] ?></td>
                    <td><?php echo $my_reservation['reserved_at'] ?></td>
                    <td><b><?php echo $my_reservation['price'] . ' $' ?></b></td>
                    <td>
                        <a href="<?php echo URLROOT . 'users/cancel/' . $my_reservation['id'] ?>" class="btn btn-sm btn-danger m-2"><i class="fa-solid fa-ban me-1"></i>Cancel</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>