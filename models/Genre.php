<?php
class Genre {
    private $id, $title, $description;
    function __construct($title="", $description="") {
        $this->title = $title;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }
    public function getdescription() {
        return $this->description;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function setdescription($description) {
        $this->description = $description;
    }

}

?>