<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginModel;
use app\models\User;

class AuthController extends Controller {

    public function login(Request $request, Response $response) {
        $this->setLayout('main');
        $loginModel = new LoginModel();
        if ($request->isPost()) {

            $loginModel->loadData($request->body());

            if ($loginModel->validate() && $loginModel->login()) {
                $response->redirect('/');
                return;
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
        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->body());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response) {

        Application::$app->logout();
        $response->redirect('/');

    }

}

?>