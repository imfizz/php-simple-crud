<?php
require_once('class.php');
$fullname = $_GET['fullname'];
$access = $_GET['access'];

$userAccess = $employee->accessLevel($access, $fullname); // administrator
$employee->addEmployee($userAccess);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" required/>
        </div>
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" required/>
        </div>
        <div>
            <label for="age">Age</label>
            <input type="number" name="age" id="age" required/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required/>
        </div>
        <button type="submit" name="add">Add User</button>
    </form>
</body>
</html>