<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller {

    public function home() {

        $params = [
            "name" => "Arire Weekwood"
        ];
        return $this->render('home', $params);

    }

    public function contact() {
        return $this->render('contact');
    }

    public function handleContact(Request $request) {
        $body = $request->body();
        return "Handling Contact Data";
    }
}

?>