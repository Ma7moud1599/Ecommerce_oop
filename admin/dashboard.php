<?php
session_start();
$pageTitle = 'Dashboard';
if (isset($_SESSION['Username'])) {

    include 'init.php';

    $fun = new Func();

    $latestUsersLimit = 5;
    $thaLatestUsers = $fun->getLatest('*', 'users', 'user_id', $latestUsersLimit);

    $latestCategoriesLimit = 5;
    $thaLatestCategories = $fun->getLatest('*', 'categories', 'ID', $latestCategoriesLimit);

    $latestItemLimit = 5;
    $thaLatestItems = $fun->getLatest('*', 'items', 'ID', $latestItemLimit);

    $latestCommentLimit = 5;
    $thaLatestComments = $fun->getLatest('*', 'comments', 'Comment_ID', $latestCommentLimit);

?>
        <?php include 'dashboard/count.php' ?>

        <?php include 'dashboard/latest.php' ?>
<?php
    include $tpl . 'footer.php';
} else {

    header('Location: index.php');
    exit();
}
