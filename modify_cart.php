<?php
session_start();
 
// get the product id
$id     = isset($_GET['id']) ? $_GET['id'] : "";
$type   = isset($_GET['type']) ? $_GET['type'] : "";

if(array_key_exists($id, $_SESSION['cart_items']['data'])){
    if($type === 'increase'){
        $_SESSION['cart_items']['quantity'] += 1;
        $_SESSION['cart_items']['data'][$id]['quantity'] += 1;
        $arr = array(
            'total_quantity' => $_SESSION['cart_items']['quantity'],
            'item_quantity' => $_SESSION['cart_items']['data'][$id]['quantity']
        );
    }else{
        $_SESSION['cart_items']['quantity'] -= 1;
        $_SESSION['cart_items']['data'][$id]['quantity'] -= 1;

        if($_SESSION['cart_items']['quantity'] < 0)
            $_SESSION['cart_items']['quantity'] = 0;

        if($_SESSION['cart_items']['data'][$id]['quantity'] < 0){
            $_SESSION['cart_items']['data'][$id]['quantity'] = 0;
            unset($_SESSION['cart_items']['data'][$id]);
        }

        $arr = array(
            'total_quantity' => $_SESSION['cart_items']['quantity'],
            'item_quantity' => $_SESSION['cart_items']['data'][$id]['quantity']
        );
    }
    echo json_encode(array(
        'status' => true,
        'data' => $arr
    ));
    exit;
}else{
    echo json_encode(array(
        'status' => false,
        'message' => 'Something went wrong! try again'
    ));
    exit;
}
?>
