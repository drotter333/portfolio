<?php session_start(); ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['products'][$id])) {
        unset($_SESSION['products'][$id]);
    }
}
header('Location: cart.php');
exit;
?>
