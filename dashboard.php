<?php
require_once('class.php');
$userData = $employee->getUserData();
$access = $userData['access'];
$fullname = $userData['fullname'];

$employee->accessLevel($access, $fullname);

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

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Firstname</td>
                <td>Lastname</td>
                <td>Age</td>
                <td>Email</td>
                <td>Access</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php $employee->getAllData(); ?>
        </tbody>
    </table>
</body>
</html>