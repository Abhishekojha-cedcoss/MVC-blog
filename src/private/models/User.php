<?php

use App\Libraries\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db=new Database;
    }
    public function checkUser($email, $password)
    {
        $this->db->query("SELECT * FROM Users");
        $result = $this->db->resultSet();
        if (empty($email) || empty($password)) {
            return array("role"=>'', "status"=>'');
        }
        foreach ($result as $k => $v) {
            if ($v["email"] == $email && $v["password"] == $password) {
                $email=$v["email"];
                $password=$v["password"];
                $id=$v["user_id"];
                $user_name=$v["username"];
                $firstName=$v["firstName"];
                $lastname=$v["lastname"];
                $role=$v["role"];
                $status=$v["Status"];
                $arr=array("role"=>$role, "status"=>$status, "email"=>$email, "password"=>$password,
                "id"=>$id, "username"=>$user_name, "firstName"=>$firstName, "lastname"=>$lastname);
                return $arr;
            }
        }
        return array("role"=>'no', "status"=>'no');
    }
    public function getAllUsers()
    {
        $this->db->query("SELECT * FROM Users");
        $result = $this->db->resultSet();
        return $result;
    }
    public function updateStatus($id)
    {
        $this->db->query("SELECT Status FROM Users WHERE user_id='$id'");
        $result = $this->db->resultSet();
        return $result;
    }
    public function statusApproved($id)
    {
        $this->db->query("UPDATE Users SET Status='approved' WHERE user_id='$id'");
        $this->db->execute();
    }
    public function statusPending($id)
    {
        $this->db->query("UPDATE Users SET Status='pending' WHERE user_id='$id'");
        $this->db->execute();
    }
    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM Users WHERE user_id='$id'");
        $this->db->execute();
    }
    public function updateUserDetails($fname, $lname, $password, $email)
    {
        $this->db->query("UPDATE Users 
        SET `password`='$password',firstName='$fname',lastname='$lname' 
        WHERE email='$email'");
        $this->db->execute();
    }
    public function addUSer($username, $firstname, $lastname, $password, $email)
    {
        try {
            $this->db->query("INSERT INTO 
            Users(username,`password`,email,`Status`,firstName,lastname,`role`) 
            VALUES('$username','$password','$email','pending',
            '$firstname','$lastname','user');");
            $this->db->execute();
            return "Wait for the admin to accept the request";
        } catch (\Exception $e) {
            return "You are already registered! Please Login";
        }
    }
}
