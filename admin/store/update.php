<?PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Update Store</h1>";

    $id = $_POST['storeid'];
    $name = $_POST['name'];

    $mana = new Manage_Store();
    if (empty($mana->errors($name))) {

        $mana = new Manage_Users();
        $check = $mana->check_user_exist('store', 'Name', 'ID', $name, $id);

        if ($check === 1) {
            $error = '<div class="alert alert-danger">Sorry This Store Is Exist. </div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'store.php?do=Manage');
        } else {

            $mana = new Manage_Store();
            $stmt = $mana->update($name, $id);
        }
    }
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'store.php?do=Manage');
}
echo "<div>";
