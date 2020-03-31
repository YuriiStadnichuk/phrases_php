<?php
require_once('template/header_delete.php');

if (isset($_GET['id']) and $_GET['id'] != ''){
    $data = deleteArticle($conn,$_GET['id']);
    if ($data === true) {
        header('Location: admin.php ');
         }
    else {
        header('Location: error.php ');
    }
}
require_once 'template/header_html.php';
close($conn);
?>

