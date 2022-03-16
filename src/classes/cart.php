<?php
require_once("classes/DB.php");
class cart extends DB
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
    public function addPro($pro)
    {

        // echo '<pre>';
        // print_r($_SESSION['cart']);
        // echo '<pre>';
        // die();
        $cart = $_SESSION['cart'] ?? array();
        // print_r($cart);
        // print_r($pro);
        // die();
        $broken = false;
        if (count($cart) > 0) {
            foreach ($_SESSION['cart'] as $k => $v) {
                $p = json_decode($v);
                //echo "ppp";
                // print_r($p);
                // die();
                if ($p->id == $pro->id) {
                    $p->quantity += 1;
                    //$p->price = 100;
                    //$p->price *= $p->quantity;
                    $cart[$k]= json_encode($p);
                    $broken = true;
                    break;
                }
            }
            if (!$broken) {
                array_push($cart, json_encode($pro));
            }
        } else {
            array_push($cart, json_encode($pro));
        }
        //print_r($cart);
        $_SESSION['cart'] = $cart;
    }
}
