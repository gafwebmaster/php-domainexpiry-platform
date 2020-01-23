<?php

class Logins extends Controller {

    public function __construct() {
        $this->loginModel = $this->model('Login');
        $ip = visitorIp();
    }

    //The default homepage
    public function index() {

        //If is blocked ip redirect to blacklist 404 view
        $this->checkForBlock($ip);

        //Check for pass
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data           
            $data = [
                'metatitle' => 'Login',
                'password' => trim($_POST['password']),
                'id' => '1',
                'password_err' => '',
                'ip' => $ip
            ];
            $loggedIn = $this->loginModel->login($data);

            //Validate password
            if ((empty($data['password'])) or!$loggedIn) {
                $data['password_err'] = 'Please enter password';
            }

            if ($loggedIn) {
                $_SESSION['user_id'] = USER;
                redirect('domains');
            } else {
                //If the attempt will be = 3 will load 
                $this->addIp($data);

                //Else
                $this->view('pages/loginform', $data);
            }
        } else {
            //Load the view            
            $this->view('pages/loginform', $data);
        }
    }

    //Check if the ip it apears with 3 atempts faild login, if yes, redirect to blacklist
    public function checkForBlock($ip) {
        $ip = visitorIp();
        $data = [
            'ip' => $ip
        ];
        //Check if the ip is in bd added. If is not, add it
        $isIp = $this->loginModel->checkIp($ip);
        if ($isIp) {
            //If it is in bd, count the atempts
            $theAtempts = $this->loginModel->atemptsNumber($ip);

            if ($theAtempts == 3) {
                redirect('blacklist');
            }
        }
    }

    //Add the ip to blacklist
    public function addIp() {
        $ip = visitorIp();
        $data = [
            'ip' => $ip,
            'atempts' => 0
        ];

        //Check if the ip is in bd added. If is not, add it
        $isIp = $this->loginModel->checkIp($data['ip']);
        if ($isIp) {
            //If it is in bd, count the atempts
            $theAtempts = $this->loginModel->atemptsNumber($ip);

            if ($theAtempts < 3) {
                //Increment with one                
                $theAtempts++;
                $incrementedAtempt = $this->loginModel->addIncremented($theAtempts, $ip);
            } else {
                $this->view('pages/404', $data);
            }
        } else {
            //Add it in bd
            $this->loginModel->addIp($data);
        }
    }

}
