<?php
class Song {
    private $id, $title, $artist, $category, $date, $feature, $image, $file;
    function __construct($title="", $artist="", $category="", $date="", $feature="", $image="", $file="") {
        $this->title = $title;
        $this->artist = $artist;
        $this->category = $category;
        $this->date = $date;
        $this->feature = $feature;
        $this->image = $image;
        $this->file = $file;
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
    public function getArtist() {
        return $this->artist;
    }
    public function getCategory() {
        return $this->category;
    }
    public function getDate() {
        return $this->date;
    }
    public function getFeature() {
        return $this->feature;
    }
    public function getImage() {
        return $this->image;
    }
    public function getFile() {
        return $this->file;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setArtist($artist) {
        $this->artist = $artist;
    }
    public function setCategory($category) {
        $this->category = $category;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setFeature($feature) {
        $this->feature = $feature;
    }
    public function setImage($image) {
        $this->image = $image;
    }
    public function setFile($file) {
        $this->file = $file;
    }
}




?>