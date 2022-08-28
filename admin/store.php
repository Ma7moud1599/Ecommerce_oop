<?php
session_start();
$pageTitle = 'Store';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'store/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'store/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'store/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'store/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'store/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'store/delete.php' ?>
        <?php
    } elseif ($do == 'Activate') { ?>
        <?php include 'store/activate.php' ?>
        <?php
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
