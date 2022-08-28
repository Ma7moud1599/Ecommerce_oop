<?php
$get = new Manage_Users();

$sort = $get->sort();

$store = new Manage_Store();

$data = $store->get_data($sort)
?>

<div class="container">
    <h1 class="text-center member-header">Manage Store</h1>
    <div class="table-responsive mt-5">
        <table class="main-table text-center table table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Date</td>
                <td>Control</td>
            </tr>
            <?php
            $get = new Manage_Store();
            $get->table($data);
            ?>
        </table>
    </div>
    <div class="manage">
        <a href="store.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Store</a>
        <div class="ordering">
            <a href="?sort=ASC" class="asc"> Asc</a>
            <a href="?sort=DESC" class="desc"> Desc</a>
        </div>
    </div>
</div>