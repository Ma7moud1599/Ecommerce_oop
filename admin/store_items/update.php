<?PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Update Store Item</h1>";

    $id = $_POST['itemid'];
    $quant = $_POST['quant'];

    $mana = new Manage_Store_Items();
    $stmt = $mana->update($quant, $id);
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'store.php?do=Manage');
}
echo "<div>";
