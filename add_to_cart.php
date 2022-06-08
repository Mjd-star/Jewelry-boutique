<?php
session_start();
require_once './vendor/autoload.php';

use JS\Jewelary\Model;
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items']['data'] = array();
    $_SESSION['cart_items']['quantity'] = 0;
}

// check if the item is in the array, if it is, increase quantity
if(array_key_exists($id, $_SESSION['cart_items']['data'])){
    $_SESSION['cart_items']['data'][$id]['quantity'] = $_SESSION['cart_items']['data'][$id]['quantity'] +$quantity;
    $_SESSION['cart_items']['quantity'] = $_SESSION['cart_items']['quantity'] + $quantity;
    $productInfo = $_SESSION['cart_items']['data'][$id]['product'];
    $page = strtolower($productInfo->product_type);
    header("Location: $page.php?action=added&name=$productInfo->name");
}


else{
    $db = new Model();
    $productInfo = $db->getProductById($id);
    if($productInfo['status']){
       $info = (object)$productInfo["data"];
       $_SESSION['cart_items']['data'][$id] = array('product' => $info, 'quantity' => $quantity);
       $_SESSION['cart_items']['quantity'] = $_SESSION['cart_items']['quantity'] + $quantity;
       $page = strtolower($info->product_type);
       header("Location: $page.php?action=added&name=$info->name");
    }else{
        header("Location: index.php?action=error");
    }
}

