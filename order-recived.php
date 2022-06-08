<?php
    require_once './vendor/autoload.php';
    use JS\Jewelary\Model;

    session_start();

    if(!isset($_SESSION['users']) || empty($_SESSION['users'])){
        echo "<script> window.location.href='login.php' </script>";
    }

    $products = (isset($_SESSION['cart_items']['data']) &&  !empty($_SESSION['cart_items']['data']) ) ? $_SESSION['cart_items']['data']: [];
    $_quantity = (isset($_SESSION['cart_items']['quantity']) &&  !empty($_SESSION['cart_items']['quantity']) ) ? $_SESSION['cart_items']['quantity']: 0;
    $error = $success = '';

    if(empty($products)){
        echo "<script> window.location.href='index.php' </script>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db = new Model();
        $order = $db->place_order($_POST);

        if(!$order){
            $error 	= 'error';
        }else{
            unset($_SESSION['cart_items']);
            $success = 'success';
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Received</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropbtn {
            background: white;
            color: grey;
            padding: 13px;
            margin-top:8px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: lightgrey;}

        .dropdown:hover .dropdown-content {display: block;
            background-color: white;
        }

        .dropdown:hover .dropbtn {background-color: lightgrey;}
        h3{
            font-family: serif;
            color: #926f34;
            text-align: center;
            margin-top: 5%;
        }
    </style>

</head>
<body>
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img src = "./asset/img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">

                        <div class="dropdown">
                            <a href='./index.php'>
                                <button class="dropbtn">Home</button>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">

                        <div class="dropdown">
                            <button class="dropbtn">Products</button>
                            <div class="dropdown-content">
                                <a href="./earring.php">Earring</a>
                                <a href="./ring.php">Ring</a>
                                <a href="./bracelet.php">Bracelet</a>
                                <a href="./necklace.php">Necklace</a>
                            </div>

                        </div>

                    </li>


                    <li class="nav-item">
                            <div class="dropdown">
                                <a href='help.php'>
                                    <button class="dropbtn">Help</button>
                                </a>
                            </div>
                        </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href='about-us.php'>
                                <button class="dropbtn">About Us</button>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
            <ul class="right-menu ml-auto">
                <?php
                if(isset($_SESSION['users']) && !empty(isset($_SESSION['users']))):
                    $user = (object) $_SESSION['users'];
                    ?>
                    <li class="nav-item">

                        <div class="dropdown">
                            <button class="dropbtn"><?php echo $user->F_name.' '.$user->L_name; ?></button>
                            <div class="dropdown-content">
                                <a href="./cart.php">Cart (<?php echo $_quantity;?>)</a>
                                
                                <a href="./logout.php">Logout</a>
                            </div>

                        </div>

                    </li>
                <?php endif;?>
            </ul>
        </div>
    </nav>

</section>
<?php if($error):?>
    <h3>Something went wrong! Please try again.</h3>
<?php else:?>
    <h3>Your Order Received Successfully!</h3>
<?php endif;?>

</body>
</html>
