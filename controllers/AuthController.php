<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\LoginModel;
use app\models\User;

class AuthController extends Controller {

    public function login(Request $request) {
        $this->setLayout('main');
        $loginModel = new LoginModel();
        if ($request->isPost()) {

            $loginModel->loadData($request->body());

            if ($loginModel->validate() && $loginModel->login()) {
                return 'Login';
            }

            return $this->render('login', [
                'model' => $loginModel
            ]);
        }
        return $this->render('login', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request) {
        $registerModel = new User();
        if ($request->isPost()) {

            $registerModel->loadData($request->body());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

}

?>