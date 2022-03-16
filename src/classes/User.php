<?php
require_once("classes/DB.php");

class User extends DB
{
    public string $firstname;
    public string $lastname;
    public string $username;
    public string $email;
    public string $password;
    public string $role;
    public string $status;

    public function __construct($firstname, $lastname, $username, $email, $password, $role, $status)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    public function addUser()
    {
        $stmt = DB::getInstance()->prepare("SELECT Email FROM Users");
        //echo $stmt;
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r("hi");
        foreach ($result as $key => $value) {
            if ($value['Email'] == $this->email) {
                echo "Email already exists";
                return;
            }
        }
        DB::getInstance()->exec('INSERT INTO Users(Firstname, Lastname, Username, Email, Password, Role,Status)
            VALUES("' . $this->firstname . '","' . $this->lastname . '","' . $this->username . '","' . $this->email . '","' . $this->password . '","' . $this->role . '","' . $this->status . '");');
        echo "New record added successfully";
    }
    // $email=$_POST['email'];
    // $password=$_POST['password'];
    public function userExists()
    {
        $stmt = DB::getInstance()->prepare("SELECT Email,Password,Role,Status FROM Users WHERE Email = :Email AND Password = :Password");
        //echo $stmt;
        $stmt->bindParam(':Email', $this->email);
        $stmt->bindParam(':Password', $this->password);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $stmt->debugDumpParams();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        #$resultArray = $stmt->fetchAll();



        //print_r($result);
        //die();

        foreach ($result as $k => $v) {
            if ($v['Email'] == $this->email && $v['Password'] == $this->password && $v['Role'] == 'Admin') {
                header("Location:dashboard.php");
                exit(0);
            } else if ($v['Email'] == $this->email && $v['Password'] == $this->password && $v['Role'] == 'User' && $v['Status'] == 'Restricted') {
                echo  "Permission Restricted. Contact administrator";
                //header("Location:login.php");
                exit(0);
            } else if ($v['Email'] == $this->email && $v['Password'] == $this->password && $v['Role'] == 'User' && $v['Status'] == 'Approved') {
                //$this->editProfile();
                header("location:shop.php");
                //return;
                exit(0);
            }
        }
        header("Location:login.php");
        exit(0);
    }
    public function editProfile()
    {
        $stmt = DB::getInstance()->prepare("SELECT Firstname, Lastname, Username, Email, Password FROM Users");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        foreach ($result as $k => $v) {
            if ($v['Email'] == $this->email) {
                $this->firstname = $v['Firstname'];
                $this->lastname = $v['Lastname'];
                $this->username = $v['Username'];
            }
        }
    }

    public function userUpdate()
    {
        $stmt1 = DB::getInstance()->prepare("UPDATE Users SET Firstname='" . $this->firstname . "' , Lastname='" . $this->lastname . "', Username='" . $this->username . "' ,Password='" . $this->password . "' WHERE Email='" . $this->email . "';");
        $stmt1->execute();
    }
}
