<?php

$storeid = isset($_GET['storeid']) && is_numeric($_GET['storeid']) ? intval($_GET['storeid']) : 0;

$get_data = new Manage_Store_Items;

$data =  $get_data->get_store_items($storeid);

?>

<div class="container">
    <h1 class="text-center member-header">Store Items</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="storeid" value="<?php echo $storeid ?>">
        <div class="table-responsive mt-5" method="POST">
            <table class="main-table text-center table table-bordered">
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Date</td>
                    <td>Control</td>
                </tr>
                <?php
                $get = new Manage_Store_Items;
                $get->table_item_store($data);
                ?>
            </table>
        </div>
        <div class="manage">
            <a href="store_items.php?do=Add" class="btn btn-primary add-btn mb-5"> Add New Item</a>
        </div>
    </form>
</div>