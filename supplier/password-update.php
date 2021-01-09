<?php
if(!isset($_SESSION)){
    session_start();
}
include('../dbcon.php');
include('session.php');

$new_password  = $_POST['new_password'];

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $new_password);
$lowercase = preg_match('@[a-z]@', $new_password);
$number    = preg_match('@[0-9]@', $new_password);
$specialChars = preg_match('@[^\w]@', $new_password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    mysqli_query($conn,"update users set password = '$new_password' where user_id = '$session_id'");
}
?>