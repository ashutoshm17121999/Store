<?php
require_once("classes/DB.php");

class Product extends DB
{
    public $id;
    public $name;
    public $price;
    public $quantity;
    public $image;
    public $category;

    public function __construct($id, $name, $price, $quantity, $image, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->category = $category;
    }
    public function addProduct()
    {
        $q = 'INSERT INTO Products(product_id, product_name, product_price, product_quantity, Image, Category)
        VALUES("' . $this->id . '","' .
            $this->name . '","' . $this->price . '","' . $this->quantity . '","' . $this->image . '","' .
            $this->category . '");';
        //echo $q;
        DB::getInstance()->exec($q);
        header("location:add-product.php");
    }
}
