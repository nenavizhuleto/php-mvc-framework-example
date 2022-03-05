<?php

namespace app\controllers;

use ihate\mvc\Application;
use ihate\mvc\Controller;
use ihate\mvc\Request;
use ihate\mvc\Response;
use app\models\ContactModel;
use app\models\HeroModel;
use app\models\Photo;

class SiteController extends Controller {

    public function home(Request $request) {
        $this->setLayout('hero');
        $params = [
            'hero' => new HeroModel(),
            'params' => $request->getRouteParams()
        ];
        return $this->render('home', $params);

    }

    public function gallery() {
        $params = [
            'photos' => Photo::find()
        ];
        return $this->render('gallery', $params);
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
                $response->redirect('/');
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