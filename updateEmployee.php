<?php
require_once('class.php');
$id = $_GET['id'];

$userEditDetails = $employee->populateFields($id);
$employee->editEmployee($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" value="<?= $userEditDetails['firstname']; ?>" required/>
        </div>
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" value="<?= $userEditDetails['lastname']; ?>" required/>
        </div>
        <div>
            <label for="age">Age</label>
            <input type="number" name="age" id="age" value="<?= $userEditDetails['age']; ?>" required/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $userEditDetails['email']; ?>" autocomplete="off" required/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="<?= $userEditDetails['password']; ?>" required/>
        </div>
        <button type="submit" name="edit">Edit User</button>
    </form>
</body>
</html>
