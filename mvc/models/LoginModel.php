<?php
class LoginModel extends DB
{
    public function login($username, $password)
    {
        $sql = "Select * from users where username ='" . $username . "' and password ='" . $password . "'";
        return mysqli_query($this->con, $sql);
    }
    public function checkToken($token)
    {
        $sql = "Select * from users where token ='" . $token . "'";
        return mysqli_query($this->con, $sql);
    }
    public function setToken($id, $token)
    {
        $sql = "Update users Set token = '" . $token . "' Where id =" . $id;
        return mysqli_query($this->con, $sql);
    }
}
