<?php

Class Employee
{

    private $username = 'root';
    private $password = '';
    
    private $dns = "mysql:host=localhost;dbname=emprecord";
    protected $pdo;

    public function con()
    {
        $this->pdo = new PDO($this->dns, $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $this->pdo;
    }



    public function getAllData()
    {
        $sql = "SELECT * FROM empdetails";
        $stmt = $this->con()->query($sql);
        // fetchAll = array
        // fetch = obj
        while($row = $stmt->fetch()){
            echo "<tr>
                    <td>$row->id</td>
                    <td>$row->firstname</td>
                    <td>$row->lastname</td>
                    <td>$row->age</td>
                    <td>$row->email</td>
                    <td>$row->access_level</td>
                  <tr/>";
        }
    }

    public function login()
    {
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($email) && empty($password)){
                echo 'Email and Password is required to login';
            } else {

                $sql = "SELECT * FROM empdetails WHERE email = ? AND password = ?";
                $stmt = $this->con()->prepare($sql);
                $stmt->execute([$email, $password]);
                $users = $stmt->fetch();
                $countRow = $stmt->rowCount();

                if($countRow > 0){
                    session_start();
                    $_SESSION['userdetails'] = array('fullname' => $users->firstname." ".$users->lastname, 'access' => $users->access_level);
                    header('Location: dashboard.php');
                    return $_SESSION['userdetails'];
                } else {
                    echo 'No account exists';
                }
            }
        }
    }

    public function getUserData()
    {
        session_start();
        if($_SESSION['userdetails']){
            return $_SESSION['userdetails'];
        }
    }

    public function accessLevel($access, $fullname)
    {
        $message = 'you are not allowed to enter the system';
        if($access == 'user'){
            header("Location: index.php?message=$message");
        } else if($access == 'administrator') {
            echo 'Welcome Admin: '. $fullname;
            return $access;
        } else {
            header("Location: index.php?message=$message");
        }
    }


    public function addEmployee($userAccess)
    {
        if(isset($_POST['add'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            if(empty($firstname) &&
               empty($lastname) &&
               empty($age) &&
               empty($email) &&
               empty($password)   
            ){
                echo 'All input fields are required';
            } else {
                if($userAccess == 'administrator'){
                    
                    $userLevel = 'user';

                    $sql = "INSERT INTO empdetails(`firstname`, `lastname`, `age`, `email`, `password`, `access_level`)
                    VALUES(?, ?, ?, ?, ?, ?)";
                    $stmt = $this->con()->prepare($sql);
                    $stmt->execute([$firstname, $lastname, $age, $email, $password, $userLevel]);
                    $countRow = $stmt->rowCount();

                    if($countRow > 0){
                        echo 'New data was added';
                    } else {
                        echo 'There was an error to our code';
                    }

                } else {
                    echo 'You are not allowed to add employee';
                    header('Location: index.php');
                }
            }
        }
    }

}

$employee = new Employee;

?>