<?php
    session_start();

    if(!isset($_SESSION['users']) || empty(isset($_SESSION['users']))){
        echo "<script> window.location.href='login.php' </script>";
    }

    $products = (isset($_SESSION['cart_items']['data']) &&  !empty($_SESSION['cart_items']['data']) ) ? $_SESSION['cart_items']['data']: [];
    $_quantity = (isset($_SESSION['cart_items']['quantity']) &&  !empty($_SESSION['cart_items']['quantity']) ) ? $_SESSION['cart_items']['quantity']: 0;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
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

        h1,h2{
            text-align: center;
        }
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }



        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 40%;
            margin-bottom: 20px;
            margin-left:30%;
            margin-right:30%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {

            margin-left:15%;
            margin-right:15%;
            display: block;
        }

        .btn {
            background-color: rgba(218, 207, 212, 0.8);
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 30%;
            border-radius: 20px;
            cursor: pointer;
            font-size: 17px;
            margin-left:35%;
            margin-right:30%;
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
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href='contact-us.php'>
                                <button class="dropbtn">Contact Us</button>
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
<br>
<br>
<form action="./order-recived.php" method="POST">
    <h1>Shipping Details</h1>
    <label for="country">Country</label>
    <input type="text" id="country" name="country" required>
    <label for="city">City</label>
    <input type="text" id="city" name="city" required>

    <h2>Payment Information</h2>

    <label for="cname">Name on Card</label>
    <input type="text" id="cname" name="cardname">
    <label for="ccnum">Credit card number</label>
    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
    <label for="expmonth">Exp Month</label>
    <input type="text" id="expmonth" name="expmonth" placeholder="September">
    <div class="row">
        <div class="col-50">
            <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="2018">
        </div>
        <div class="col-50">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352">
        </div>
    </div>

    <input type="submit" value="Continue to checkout" class="btn">
</form>
</body>
</html>

