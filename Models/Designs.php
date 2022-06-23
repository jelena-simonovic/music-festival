<?php

namespace Models\Designs;

use Models\Model\Model;

class Designs extends Model
{
    public $title;
    public $img;

    public function __construct($design)
    {
        $this->title = $design['title'];
        $this->img = $design['img'];
    }

    public static function getAllDesigns()
    {
        parent::connection('designs');
        $allDesigns = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $design) {
                $allDesigns[] = new self($design);
            }
        }
        return $allDesigns;
    }
    public function CreateNewDesign($title, $img)
    {
        parent::connection('users');
        if (!empty($title) && !empty($img)) {
            $st = parent::$connection->prepare("INSERT INTO users (title, img) VALUES ('$title', '$img');");
            $st->execute();
        }
    }
}
