<?php
echo  "<div class='container'>";
echo "<h1 class='text-center member-header'>Delete Store</h1>";

$storeid = isset($_GET['storeid']) && is_numeric($_GET['storeid']) ? intval($_GET['storeid']) : 0;


$fun = new Func();
$check = $fun->checkItem('ID', 'store', $storeid);

if ($check > 0) {
    $mana = new Manage_Users();
    $stmt = $mana->delete($storeid, 'store', 'ID', ':store');
} else {
    $error = '<div class="alert alert-danger">This Store Dosen\'t Exist.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'store.php?do=Manage');
}
echo "</div>";
