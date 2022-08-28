<?php
echo  "<div class='container'>";
echo "<h1 class='text-center member-header'>Delete Store Item</h1>";

$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;


$fun = new Func();
$check = $fun->checkItem('ID', 'storeitems', $itemid);

if ($check > 0) {
    $mana = new Manage_Store_Items();
    $stmt = $mana->delete($itemid, 'storeitems', ':zuser');
} else {
    $error = '<div class="alert alert-danger">This item Dosen\'t Exist.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'items.php?do=Manage');
}
echo "</div>";
