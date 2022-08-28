<?php
session_start();
$pageTitle = 'Categories';
if (isset($_SESSION['Username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'categories/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'categories/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'categories/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'categories/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'categories/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'categories/delete.php' ?>
        <?php
    } elseif ($do == 'Activate') { ?>
        <?php include 'categories/activate.php' ?>
        <?php
    }


    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
