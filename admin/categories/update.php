<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Update Category</h1>";

    $id = $_POST['cateid'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];


    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));

    $mana = new Manage_Cate;
    $mana->errors($name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize);

    if (empty($mana->errors($name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize))) {
        $mana = new Manage_Users();
        $check = $mana->check_user_exist('items', 'Name', 'ID', $name, $id);

        if ($check === 1) {
            $error = '<div class="alert alert-danger">Sorry This User Is Exist. </div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'categories.php?do=Manage');
        } else {
            $image = rand(0, 100000000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);
            $manage = new Manage_Cate;
            $stmt = $manage->update($name, $desc, $image, $id);
        }
    }
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'categories.php?do=Manage');
}
echo "<div>";
