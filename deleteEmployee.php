<?php
require_once('class.php');
$id = $_GET['id'];
$employee->deleteEmployee($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee</title>
</head>
<body>
    <form method="post">
        <h3>Are you sure you want to delete this employee?</h3>
        <button type="submit" name="cancel">Cancel</button>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>