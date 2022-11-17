<?php

class Register extends Controller
{
    public $registerModel;

    function __construct()
    {
        $this->registerModel = $this->model('RegisterModel');
        // $this->loginModel = $this->model('LoginModel');
    }

    function Load()
    {
        // if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        //     $result = $this->loginmodel->login($_COOKIE['username'], $_COOKIE['password']);
        //     if (mysqli_num_rows($result) == 1) {
        //         header('Location: Home');
        //     }
        // }

        $this->view('Register');
    }

    function Submit()
    {
        if (isset($_POST['submit'])) {
            $username = htmlspecialchars(isset($_POST['username']) ? $_POST['username'] : '');
            $password = htmlspecialchars(isset($_POST['password']) ? $_POST['password'] : '');
            $captcha = htmlspecialchars(isset($_POST['recaptcha']) ? $_POST['recaptcha'] : '');
            if ($captcha) {
                $secret = '6LekqeMiAAAAAI2h_kjg6geHcgY8zY0CwVIk1IBJ'; //Your secret key
                $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['recaptcha']);
                $response_data = json_decode($verify_response);
                if ($response_data->success) {
                    if ($username && $password) {
                        $user = $this->registerModel->checkUser($username);
                        if (mysqli_num_rows($user) == 1) {
                            $array = array(
                                'title' => 'Thất bại',
                                'message' => 'Tên tài khoản đã được sử dụng',
                                'type' => 'error',
                                'duration' => 3000
                            );

                            echo json_encode($array);
                        } else {
                            $dtUser = mysqli_fetch_array($user);
                            $token = md5(md5(time()) . $dtUser['id'] . time());
                            //Insert User
                            $this->registerModel->addUser($username, $password, md5($token. $_SERVER['HTTP_USER_AGENT']));
                            //Setcookie
                            setcookie('token', $token, time() + 24 * 3600, "/");
                            echo 'success';
                            //Deletecookie
                            // setcookie('username', '', time() - 72 * 3600);
                            // setcookie('password', '', time() - 72 * 3600);
                            // header('Location: Home');
                        }
                    } else {
                        $array = array(
                            'title' => 'Thất bại',
                            'message' => 'Vui lòng nhập đầy đủ thông tin',
                            'type' => 'error',
                            'duration' => 3000
                        );

                        echo json_encode($array);
                    }
                } else {
                    $array = array(
                        'title' => 'Thất bại',
                        'message' => 'Mã captcha không chính xác vui lòng kiểm tra',
                        'type' => 'error',
                        'duration' => 3000
                    );

                    echo json_encode($array);
                }
            }
        }
    }
}
