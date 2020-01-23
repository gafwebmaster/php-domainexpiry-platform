<?php

class Passwords extends Controller {

    public function __construct() {
        $this->passwordModel = $this->model('Password');
    }

    //The password resset
    public function index() {
        $data = [
            'metatitle' => 'Password resset',
            'emailRecover' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'emailRecover' => $_POST['emailRecover']
            ];
            if ($data['emailRecover'] == MASTER_EMAIL) {
                $this->view('pages/passwordResset/introduceNewPassword', $data);
            }
        } else {

            $this->view('pages/passwordResset/enterEmail', $data);
        }
    }

    public function passwordChange() {
        $data = [
            'title' => 'Add a new password',
            'newPassword_err' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == POST) {
            $data = [
                'newPassword' => trim($_POST['newPassword']),
                'id' => 1
            ];

            if ((passwordValidate($data['newPassword']) == 1) or ($data['newPassword']) == '123') {
                $data['newPassword'] = password_hash($data['newPassword'], PASSWORD_DEFAULT);
                $this->passwordModel->updatePassword($data);
                flash('password_changed', 'Password changed, you can login using it the new one you set');
                redirect('');
            } else {
                //Password is wrong
                $data = [
                    'newPassword_err' => 'Choose other password'
                ];
                $this->view('pages/passwordResset/introduceNewPassword', $data);
            }
        }
    }

}
