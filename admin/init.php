<?php

include 'database.php';
include 'users/manage_users.php';
include 'comments/manage_comments.php';
include 'items/manage_items.php';
include 'categories/manage_cate.php';
include 'store/manage_store.php';
include 'store_items/manage_store_items.php';


$tpl = 'includes/templates/';
$lang = 'includes/languages/';
$func = 'includes/functions/';
$css = 'layout/css/';
$js = 'layout/js/';


include  $func . 'functions.php';
include  $lang . 'english.php';
include  $tpl . 'header.php';

if (!isset($noNavbar)) {
  include $tpl . 'navbar.php';
}
