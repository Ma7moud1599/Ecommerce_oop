<?php
session_start();
$pageTitle = 'Store Items';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'store_items/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'store_items/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'store_items/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'store_items/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'store_items/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'store_items/delete.php' ?>
        <?php
    } elseif ($do == 'Buy') { ?>
        <?php include 'store_items/buy.php' ?>
        <?php
    } elseif ($do == 'Buy_Now') { ?>
        <?php include 'store_items/buy_now.php' ?>
        <?php
    }

    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
