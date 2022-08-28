<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert Category</h1>";
    $Name = $_POST['name'];
    $desc = $_POST['desc'];

    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));


    $fun = new Func();
    $check = $fun->checkItem("Name", "items", $Name);

    if ($check === 1) {
        echo
        '<div class="alert alert-danger">Sorry This Category Exist. </div>';
    } else {
        $mana = new Manage_Cate;
        $mana->errors($Name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize);

        if (empty($mana->errors($Name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize))) {
            $image = rand(0, 100000000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);
            $mana->add($Name, $desc, $image);
        }
    }
} else {
    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'index.php');
}
echo "</div>";
