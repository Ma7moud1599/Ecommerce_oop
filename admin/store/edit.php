<?php
$get = new Manage_Store();
$storeid = isset($_GET["storeid"]) && is_numeric($_GET["storeid"]) ? intval($_GET["storeid"]) : 0;

$edit = $get->edit($storeid);
$row = $edit->fetch();
$count = $edit->rowCount();

if ($count > 0) {
?>
    <div class="container">
        <h1 class="text-center member-header">Edit User</h1>
        <form class="edit" action="?do=Update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="storeid" value="<?php echo $storeid ?>">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Username</span>
                <input value="<?php echo $row['Name'] ?>" type="text" class="form-control" name="name" placeholder="Name" autocomplete='off' required="required">
            </div>
            <div class="input-group flex-nowrap">
                <input class="btn btn-primary save" type="submit" value="Edit Store" />
            </div>
        </form>
    </div>
<?php
} else {
    $error = '<div class="alert alert-danger">This Id Not Found.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'store.php?do=Manage');
}
