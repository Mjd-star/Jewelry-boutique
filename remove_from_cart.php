<?php
session_start();
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";

if(array_key_exists($id, $_SESSION['cart_items']['data'])){
    $_SESSION['cart_items']['quantity'] = $_SESSION['cart_items']['quantity'] - $_SESSION['cart_items']['data'][$id]['quantity'];
    $productInfo = $_SESSION['cart_items']['data'][$id]['product'];
    $page = strtolower($productInfo->product_type);
    // remove the item from the array
    unset($_SESSION['cart_items']['data'][$id]);
    header("Location: cart.php?action=removed&name=$productInfo->name");
}else{
    header("Location: cart.php?action=error");
}
?>
