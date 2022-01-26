<?php
require_once('class.php');
$employee->login();

if(isset($_GET['message'])){
    echo $_GET['message'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autocomplete="off" required/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="off" required/>
        </div>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>