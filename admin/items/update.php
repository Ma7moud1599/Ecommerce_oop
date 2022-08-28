<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo  "<div class='container'>";
    echo "<h1 class='text-center member-header'>Update Item</h1>";
    // get variabules from form 
    $id = $_POST['itemid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $country = $_POST['country'];
    $stat = $_POST['status'];
    $user = $_POST['user'];
    $cate = $_POST['category'];

    $imageName = $_FILES['Image']['name'];
    $imageSize = $_FILES['Image']['size'];
    $imageTmp = $_FILES['Image']['tmp_name'];
    $imageType = $_FILES['Image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));

    $manage = new Manage_Items();
    if (empty($manage->errors($name, $imageExtension, $imageAllowedExtension, $imageSize))) {
        $mana = new Manage_Users();
        $check = $mana->check_user_exist('items', 'Name', 'ID', $name, $id);
        if ($check == 1) {
            $error = '<div class="alert alert-danger">Sorry This Item Is Exist. </div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'items.php?do=Manage');
        } else {
            $image = rand(0, 100000000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);

            $manage = new Manage_Items();
            $stmt = $manage->update($name, $price, $desc, $stat, $country, $user, $cate, $image, $id);
        }
    }
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'items.php?do=Manage');
}
echo  "<div>";
