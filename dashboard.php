<?php
require_once('class.php');
$userData = $employee->getUserData();
$employee->accessLevel($userData['access'], $userData['fullname']);
?>