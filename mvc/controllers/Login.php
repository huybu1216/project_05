<?php

class Login extends Controller
{
    public $loginModel;
    function __construct()
    {
        $this->loginModel = $this->model('LoginModel');
    }

    function Load()
    {
        $this->view('Login');
    }
    function Submit()
    {
        if (isset($_POST['submit'])) {
            $username = htmlspecialchars(isset($_POST['username']) ? $_POST['username'] : '');
            $password = htmlspecialchars(isset($_POST['password']) ? $_POST['password'] : '');

            $user = $this->loginModel->login($username, $password);
            if (mysqli_num_rows($user) == 1) {
                $dtUser = mysqli_fetch_array($user);
                $token = md5(md5(time()) . $dtUser['id'] . time());
                $this->loginModel->setToken($dtUser['id'], md5($token. $_SERVER['HTTP_USER_AGENT']));
                //Setcookie
                setcookie('token', $token, time() + 24 * 3600, "/");
                echo ('success');
            } else {
                $array = array(
                    'title' => 'Thất bại',
                    'message' => 'Tài khoản hoặc mật khẩu không chính xác',
                    'type' => 'error',
                    'duration' => 3000
                );

                echo json_encode($array);
            }
        }
    }
}
