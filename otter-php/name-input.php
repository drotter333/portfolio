<?php require 'includes/header.php'; ?>
<?php
$name='';
echo '<form action="name-output.php" method="post" class="nameForm">';
echo '<p>名前を決めてね</p>';
echo '<input type="text" name="name" value="', htmlspecialchars($name), '">';
echo '<input type="submit" value="決定">';
echo '</form>';
?>