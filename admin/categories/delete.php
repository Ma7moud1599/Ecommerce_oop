<?php
echo "<div class='container'>";
echo "<h1 class='text-center member-header'>Delete category</h1>";

$cateid = isset($_GET['cateid']) && is_numeric($_GET['cateid']) ? intval($_GET['cateid']) : 0;


$fun = new Func();
$check = $fun->checkItem('ID', 'categories', $cateid);

if ($check > 0) {
    $mana = new Manage_Users;
    $stmt = $mana->delete($cateid, 'categories', 'ID', ':cate');
} else {
    $error = '<div class="alert alert-danger">This User Dosen\'t Exist.</div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'categories.php?do=Manage');
}
echo "</div>";
