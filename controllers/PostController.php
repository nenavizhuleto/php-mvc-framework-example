<?php

namespace app\controllers;

use app\models\Photo;
use app\models\UploadModel;
use ihate\mvc\Application;
use ihate\mvc\Controller;
use ihate\mvc\Request;
use ihate\mvc\Response;

class PostController extends Controller {

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
                var_dump($photoModel);
                exit();
                Application::$app->session->setFlash('success', 'Photo successfully uploaded!');
                $response->redirect('/');
                return;
            }
        }
        
        $params = [
            'model' => $photoModel
        ];

        return $this->render('upload', $params);

    }
    

}

?>