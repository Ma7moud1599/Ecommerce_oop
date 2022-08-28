<?PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Buy Items</h1>";

    $id = $_POST['itemid'];
    $item = $_POST['item_id'];
    $store = $_POST['store_id'];
    $oldquant = $_POST['oldquant'];
    $newquant = $_POST['newquant'];

    $updateQuant = $oldquant - $newquant;

    $error = new Manage_Store_Items();
    $error->error($oldquant, $newquant);

    if (empty($error->error($oldquant, $newquant))) {
        $mana = new Manage_Store_Items();

        $stmt = $mana->updateNewQuant($updateQuant, $item, $store);
    } else {
        $error = new Manage_Store_Items();
        $error->error($oldquant, $newquant);
    }
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'items.php?do=Manage');
}
echo "<div>";
