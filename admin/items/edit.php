<?php
$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

$get = new Manage_Items;

$edit = $get->edit($itemid);
$row = $edit->fetch();
$count = $edit->rowCount();

if ($count > 0) {
?>
    <div class="container">
        <h1 class="text-center member-header">Edit Item</h1>
        <form class="edit" action="?do=Update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
            <img src="layout/images/<?php echo $row['Image'] ?>" alt="">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Image</span>
                <input value="<?php echo $row['Image'] ?>" type="file" class="form-control" name="Image" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Name</span>
                <input value="<?php echo $row['Name'] ?>" type="text" class="form-control" name="name" placeholder="Name" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Price</span>
                <input type="text" class="form-control" value="<?php echo $row['Price'] ?>" name="price" placeholder="Price" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Description</span>
                <input type="text" class="form-control" value="<?php echo $row['Description'] ?>" name="desc" placeholder="Description" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Country</span>
                <input type="text" class="form-control" value="<?php echo $row['Country'] ?>" name="country" placeholder="Country" aria-label="Description" required="required">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Status</span>
                <select id="test" name="status">
                    <?php
                    $get_option = new Manage_Items;
                    $get_option->option($row);
                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">User</span>
                <select id="test" name="user">
                    <option value="0"> </option>
                    <?php
                    $get = new Manage_Comments;
                    $get->select_choosen_table($row, 'user_id', 'User_ID', 'users', 'Username')
                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Category</span>
                <select id="test" name="category">
                    <option value="0"> </option>
                    <?php
                    $get = new Manage_Comments;
                    $get->select_choosen_table($row, 'ID', 'Cat_ID', 'categories', 'Name')

                    ?>
                </select>
            </div>
            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Edit Item" />
            </div>
        </form>
    </div>
<?php
} else {
    $error = '<div class="alert alert-danger">This Id Not Found.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'items.php?do=Manage');
}
