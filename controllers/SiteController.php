<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactModel;

class SiteController extends Controller {

    public function home() {

        $params = [
            "name" => "Arire Weekwood"
        ];
        return $this->render('home', $params);

    }

    public function gallery() {
        return $this->render('gallery');
    }

    public function about() {
        return $this->render('about');
    }

    public function contact(Request $request, Response $response) {

        $contactModel = new ContactModel();
        if($request->isPost()) {
            $contactModel->loadData($request->body());

            if ($contactModel->validate() && $contactModel->send()) {
                Application::$app->session->setFlash('success', 'Message sent successfully');
                $response->redirect('/contact');
                return;
            }

            return $this->render('contact', [
                'model' => $contactModel
            ]);
        }

        return $this->render('contact', [
            'model' => $contactModel
        ]);
    }

}

?>