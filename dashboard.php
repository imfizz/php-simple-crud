<?php
require_once('class.php');
$userData = $employee->getUserData();
$access = $userData['access'];
$fullname = $userData['fullname'];
$id = $userData['id'];

$employee->accessLevel($access, $fullname); // return access = administrator



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th, td {
            padding: 10px 15px;
        }
    </style>
</head>
<body>
    <br/>
    <a href="addEmployee.php?access=<?php echo $access; ?>&fullname=<?php echo $fullname; ?>">Add Employee</a>

    <form method="post">
        <input type="search" name="lastname" placeholder="Search by lastname"/>
        <button type="submit" name="search">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Email</th>
                <th>Access</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(isset($_POST['search'])){
                    $employee->searchEmployee($id);
                } else {
                    $employee->getAllData($id); 
                }
            ?>
        </tbody>
    </table>
</body>
</html>