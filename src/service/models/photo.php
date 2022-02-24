<?php

require_once("./src/service/service.php");

class Photo {

    public function __construct($id, $title, $desc, $date, $img, $tag)
    {
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->date = $date;
        $this->img = 'data:image/jpeg;base64,' . base64_encode($img);
        $this->tag = $tag;
    }

    public final static function find(callable $filter=null) {

        $result = [];

        $result = $GLOBALS['service']->fetch_all('photos', function ($row) {
            return new Photo($row['photo_id'], $row['photo_title'], $row['photo_description'], $row['photo_date'], $row['photo_img'], $row['photo_tag']);
        });
        
        if ($filter != null) {
            $result = array_filter($result, $filter);
        } 


        return array_values($result);
    }
}


?>