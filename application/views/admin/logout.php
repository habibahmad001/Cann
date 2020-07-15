<?php 
session_start();
session_unset('user_id');
session_unset('username');
session_unset('isadmin');
header('Location: index.php');
?>