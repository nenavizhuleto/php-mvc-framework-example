<?php

namespace app\controllers;

use app\models\Photo;
use app\models\UploadModel;
use ihate\mvc\Application;
use ihate\mvc\Controller;
use ihate\mvc\middlewares\AuthMiddleware;
use ihate\mvc\Request;
use ihate\mvc\Response;

class PostController extends Controller {

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['upload']));
    }

    public function post(Request $request, Response $response) {

        $params = $request->getRouteParams();
        $photo = Photo::findOne(['id' => $params['id']]);

        return $this->render('post', [
            'photo' => $photo
        ]);

    }

    public function upload(Request $request, Response $response) {


        $photoModel = new Photo();
        
        if($request->isPost()) {
            $photoModel->loadData($request->body());

            if ($photoModel->validate() && $photoModel->save()) {
                Application::$app->session->setFlash('success', 'Photo successfully uploaded!');
                $response->redirect('/');
                return;
            }

            return $this->render('upload', [
                'model' => $photoModel
            ]);

        }
        
        $params = [
            'model' => $photoModel
        ];

        return $this->render('upload', $params);

    }

    public function edit(Request $request, Response $response) {
        $params = $request->getRouteParams();
        $photo = Photo::findOne(['id' => $params['id']]);

        if ($request->isPost()) {
            $photo->loadData($request->body());

            if ($photo->validate() && $photo->update()) {
                Application::$app->session->setFlash('success', 'Photo successfully edited!');
                $response->redirect("/post/$photo->id");
                return;
            }

            return $this->render('edit', [
                'photo' => $photo
            ]);
        }

        return $this->render('edit', [
            'photo' => $photo
        ]);
    }

    public function delete(Request $request, Response $response) {
        $params = $request->getRouteParams();
        Photo::findOne(['id' => $params['id']])->delete();
        $response->redirect('/gallery');
    }
    

}

?>