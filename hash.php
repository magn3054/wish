<?php
$password = 'YOURPASSWORD123';
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo $hashedPassword;
?>
