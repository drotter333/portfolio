<?php session_start(); ?>
<?php
if (isset($_POST['id'], $_POST['count'])) {
    $id = $_POST['id'];
    $count = $_POST['count'];

    if (isset($_SESSION['products'][$id])) {
        $_SESSION['products'][$id]['count'] = $count;
    }
}
header('Location: cart.php');
exit;
?>

