<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo  "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert Store Item</h1>";

    $item = $_POST['item'];

    $store = $_POST['store'];

    $quant = $_POST['quant'];

    $fun = new Func();
    $check = $fun->checkStoreItem("item", "store", "storeitems", $item, $store);

    if ($check == 1) {
        $error = '<div class="alert alert-danger">Sorry This Item Exist. </div>';
        $fun->redirectToHome($error, 3, 'store_items.php?do=Add');
    } else {
        $mana = new Manage_Store_Items();

        if (empty($mana->errors($item, $store))) {

            $mana->add($item, $store, $quant);
        }
    }
} else {
    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun->redirectToHome($error, 3, 'index.php');
}
echo "</div>";
