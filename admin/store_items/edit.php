<?php
$get = new Manage_Store_Items();
$itemid = isset($_GET["itemid"]) && is_numeric($_GET["itemid"]) ? intval($_GET["itemid"]) : 0;

$edit = $get->edit($itemid);
$row = $edit->fetch();
$count = $edit->rowCount();

if ($count > 0) {
?>
    <div class="container">
        <h1 class="text-center member-header">Edit Item Quantity</h1>
        <form class="edit" action="?do=Update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Quantity</span>
                <input value="<?php echo $row['Quantity'] ?>" type="text" class="form-control" name="quant" placeholder="Quantity" autocomplete='off' required="required">
            </div>
            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Edit Item Quantity" />
            </div>
        </form>
    </div>
<?php
} else {
    $error = '<div class="alert alert-danger">This Id Not Found.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'store.php?do=Manage');
}
