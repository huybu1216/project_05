<?php
class RegisterModel extends DB
{
    public function checkUser($username)
    {
        $sql = "Select id, username from users where username ='" . $username . "'";
        return mysqli_query($this->con, $sql);
    }
    public function addUser($username, $password)
    {
        $sql = "Insert users (username, password)
        values ('" . $username . "', '" . $password . "')";
        return mysqli_query($this->con, $sql);
    }
}
