<?php
$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

$get = new Manage_Store_Items;
$edit = $get->Select_To_Buy($itemid);

$row = $edit->fetch();
?>
<div class="container">
    <h1 class="text-center member-header">Add New Item In The Store</h1>
    <form class="edit" action="?do=Buy_Now" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
        <div class="input-group flex-nowrap">
            <input value="<?php echo $row['item'] ?>" type="hidden" class="form-control" name="item_id" placeholder="Quantity" autocomplete='off' required="required">
            <span class="input-group-text" id="addon-wrapping">Item</span>
            <input value="<?php echo $row['it_name'] ?>" type="text" class="form-control" name="item" placeholder="item" autocomplete='off' required="required">
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Store</span>
            <input value="<?php echo $row['store'] ?>" type="hidden" class="form-control" name="store_id" placeholder="Quantity" autocomplete='off' required="required">
            <select id="test" name="store">
                <option value="0"> </option>
                <?php
                $get_data = new Manage_Store_Items;

                $data =  $get_data->select_item($itemid);
                ?>
            </select>
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Quantity</span>
            <input value="<?php echo $row['Quantity'] ?>" type="hidden" class="form-control" name="oldquant" placeholder="Quantity" autocomplete='off' required="required">
            <input type="text" class="form-control" name="newquant" placeholder="Quantity" required="required">
        </div>
        <div class="input-group flex-nowrap">
            <input class="btn btn-primary save" type="submit" value="Buy Now" />
        </div>
    </form>
</div>