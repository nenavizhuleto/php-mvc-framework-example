<?php


class PostAction {

    public static $ACTION_POST = 'PostAction::POST';
    public static $ACTION_CREATEPOST = 'PostAction::CREATEPOST';


    public static function POST($val=null) {
        include_page('post');
    }

    public static function CREATEPOST($val=null) {

        $title = $_POST['title'];
        $desc = $_POST['desc'];

        

        $target_dir = "./resources/photos/";
        $imageFileType = strtolower(pathinfo($_FILES["imageUpload"]["name"],PATHINFO_EXTENSION));
        $target_file = $target_dir . basename(uniqid("img_", false).".".$imageFileType);
        $uploadOk = 1;


        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        var_dump($target_file);

        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["imageUpload"]["name"])). " has been uploaded.";
                header('Location: .');
                exit();
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }

        

    }

}

?>