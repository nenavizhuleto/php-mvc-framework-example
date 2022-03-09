<?php

namespace app\models;

use ihate\mvc\Application;
use ihate\mvc\db\DbModel;
use ihate\mvc\validation\Required;

class Photo extends DbModel {

    public ?int $id = null;
    public string $title = '';
    public string $description = '';
    public string $date = '';
    public string $img = '';
    public ?int $user_id = null;
    public ?Author $author;

    public function __construct()
    {
        if ($this->user_id) {
            $this->author = Author::findOne(['id' => $this->user_id]);
        }
    }
    

    public static function tableName(): string {
        return 'photos';
    }

    public function attributes(): array
    {
        return ['id', 'title', 'description', 'date', 'img', 'user_id'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function labels(): array
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'date' => 'Date',
            'img' => 'Image',
            'user_id' => 'Author'
        ];
    }


    public function rules(): array {
        return [
            'title' => [Required::class],
            'description' => [Required::class]
        ];
    }

    public function save() {
        $this->date = date('Y-m-d', time());
        $this->user_id = Application::$app->session->get('user');

        $target_dir = "uploads/{$this->user_id}";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $imageFileType = strtolower(pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION));
        $target_file = $target_dir . '/' . basename(uniqid("img_", false).".".$imageFileType);
        $uploadOk = 1;

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }


        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $this->img = $target_file;
                return parent::save();
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }

    }


}

?>