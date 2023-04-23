<?php
class Product {
    private $id;
    private $name;
    private $category;
    private $description;
    private $price;
    private $img_uri;

   
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getImgUri() {
        return $this->img_uri;
    }

    public function setImgUri($img_uri) {
        $this->img_uri = $img_uri;
    }
}
?>
