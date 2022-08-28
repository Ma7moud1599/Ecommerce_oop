<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo  "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert Store</h1>";
    $Name = $_POST['name'];

    $fun = new Func();
    $check = $fun->checkItem("Name", "store", $Name);


    if ($check === 1) {
        echo '<div class="alert alert-danger">Sorry This Store Is Exist. </div>';
    } else {

        $mana = new Manage_Store();
        $mana->errors($Name);

        if (empty($mana->errors($Name))) {
            $mana->add($Name);
        }
    }
} else {
    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun->redirectToHome($error, 3, 'index.php');
}
echo "</div>";
