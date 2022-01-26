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
            echo $row->firstname." ".$row->lastname."<br/>";
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
        if($access == 'user'){
            header('Location: index.php');
        } else if($access == 'administrator') {
            echo 'Welcome Admin: '. $fullname;
        } else {
            header('Location: index.php');
        }
    }

}

$employee = new Employee;

?>