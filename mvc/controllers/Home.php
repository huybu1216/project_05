<?php
class Home extends Controller
{
    public $loginModel;
    public $homeModel;
    function __construct()
    {
        $this->loginModel = $this->model('LoginModel');
        $this->homeModel = $this->model('HomeModel');
    }
    function Load()
    {
        if (isset($_COOKIE['token'])) {
            $result = $this->loginModel->checkToken(md5($_COOKIE['token']. $_SERVER['HTTP_USER_AGENT']));
            if (mysqli_num_rows($result) == 1) {
                $productType = $this->homeModel->getProductType();
                // $dtProductType = array();
                // foreach ($productType as $item) {
                //     array_push($dtProductType, $item["name"]);
                // }
                $this->view('Home', [
                    "productType" => $productType
                ]);
            } else {
                Header('Location: Login');
            }
        } else {
            Header('Location: Login');
        }
    }
}
