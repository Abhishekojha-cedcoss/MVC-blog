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
        $this->db->query("SELECT `user_id`,email,password,role,Status FROM Users");
        $result = $this->db->resultSet();
        if (empty($email) || empty($password)) {
            return array("role"=>'', "status"=>'');
        }
        foreach ($result as $k => $v) {
            if ($v["email"] == $email && $v["password"] == $password) {
                $role=$v["role"];
                $status=$v["Status"];
                $arr=array("role"=>$role, "status"=>$status);
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
}
