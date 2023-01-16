<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
<h4><?php echo isset($data['success']) ? $data['success'] : '' ?></h4>
<a href="<?php echo URLROOT;  ?>cruises/add" class="btn btn-sm btn-success"><i class="fa fa-plus me-2"></i>Add New Cruise</a>
</div>
<div class="mx-auto text-center">
    <table class="container mt-5 table table-hover">
    
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Price</th>
                <th>Nights Number</th>
                <th>Starting Date</th>
                <th>Ship</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['cruises'] as $cruise) : ?>
                <tr>
                    <td><?php echo $cruise['id'] ?></td>
                    <td><img style="width: 80px; height:80px;" src="<?php echo URLROOT . 'uploads/' . $cruise['image'] ?>" alt=""></td>
                    <td><?php echo $cruise['price'] ?></td>
                    <td><?php echo $cruise['nights_number'] ?></td>
                    <td><?php echo $cruise['starting_date'] ?></td>
                    <td><?php echo $cruise['ship_name'] ?></td>
                    <td>
                        <a href="<?php echo URLROOT . 'cruises/get/' . $cruise['id'] ?>" class="btn btn-sm btn-warning m-2"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo URLROOT . 'cruises/delete/' . $cruise['id'] ?>" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

