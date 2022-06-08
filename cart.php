<?php
    session_start();

    $products = (isset($_SESSION['cart_items']['data']) &&  !empty($_SESSION['cart_items']['data']) ) ? $_SESSION['cart_items']['data']: [];
    $_quantity = (isset($_SESSION['cart_items']['quantity']) &&  !empty($_SESSION['cart_items']['quantity']) ) ? $_SESSION['cart_items']['quantity']: 0;

    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $name = isset($_GET['name']) ? $_GET['name'] : "";
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
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

        .cart{
            margin: 0;
            padding: 0;
            background:linear-gradient(rgba(218, 207, 212, 0.8),rgba(255,255,255));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .CartContainer{
            width: 70%;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 10px 20px #1687d933;
        }

        .Header{
            margin: auto;
            width: 90%;
            height: 15%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .Heading{
            font-size: 20px;
            font-family: 'Open Sans';
            font-weight: 700;
            color: #2F3841;
        }

        .Action{
            font-size: 14px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #E44C4C;
            cursor: pointer;
            border-bottom: 1px solid #E44C4C;
        }

        .Cart-Items{
            margin: auto;
            width: 90%;
            height: 30%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .image-box{
            width: 15%;
            text-align: center;
        }
        .about{
            height: 40%;
            width: 24%;
        }
        .title{
            padding-top: 10px;
            line-height: 10px;
            font-size: 25px;
            font-family: 'Open Sans';
            font-weight: 800;
            color: #202020;
        }
        .subtitle{
            line-height: 10px;
            font-size: 18px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #909090;
        }

        .counter{
            width: 15%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-family: 'Open Sans';
            font-weight: 900;
            color: #202020;
            cursor: pointer;
        }
        .count{
            font-size: 20px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #202020;
        }

        .prices{
            height: 60%;
            text-align: right;
        }
        .amount{
            padding-top: 20px;
            font-size: 26px;
            font-family: 'Open Sans';
            font-weight: 800;
            color: #202020;
        }
        .save{
            padding-top: 5px;
            font-size: 14px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #1687d9;
            cursor: pointer;
        }
        .remove{
            padding-top: 5px;
            font-size: 14px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #E44C4C;
            cursor: pointer;
        }

        .pad{
            margin-top: 5px;
        }

        hr{
            width: 66%;
            float: right;
            margin-right: 5%;
        }
        .checkout{
            float: right;
            margin-right: 5%;
            width: 28%;
        }
        .total{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .Subtotal{
            font-size: 22px;
            font-family: 'Open Sans';
            font-weight: 700;
            color: #202020;
        }
        .items{
            font-size: 16px;
            font-family: 'Open Sans';
            font-weight: 500;
            color: #909090;
            line-height: 10px;
        }
        .total-amount{
            font-size: 30px;
            font-family: 'Open Sans';
            font-weight: 800;
            color: #202020;
            position:absolute;
            right: 240px;
        }
        .button{
            margin-top: 10px;
            width: 100%;
            height: 40px;
            border: none;
            background:rgba(218, 207, 212, 0.8);
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Open Sans';
            font-weight: 600;
            color: #202020;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            width: 300px;
            height: 300px;
            padding: 10px;
            background-color: white;
        }


        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
        .location{
            background-color: rgba(218, 207, 212, 0.8);
            color: white;
            height: 40px;

            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
            position: relative;
            top: 70px;
            border-radius: 20px;

        }
        label{
            margin-left: 5%;
            margin-right: 5%;

        }
    </style>
    <link rel="stylesheet" href="./asset/fontawesome-free/css/all.min.css">
</head>

<header>
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
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href='./cart.php'>
                                <button class="dropbtn"><i class="fa fa-cart-arrow-down"></i>(<?php echo $_quantity;?>)</button>
                            </a>
                        </div>
                    </li>
                    <li>
                        <form class="form" id="search_form" action="search.php" method="POST">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="search" placeholder="search" aria-label="search" aria-describedby="basic-addon2" required>
								<div class="input-group-append">
									<button type="submit" class="input-group-text" id="basic-addon2"><img src = "./asset/img/search.png" width = "25" height = "25"></button>
								</div>
							</div>
						</form>
                    </li>
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
</header>



<body>
<div class="cart">
    <div class="CartContainer mb-3">
        <div class="Header">
            <h3 class="Heading">Shopping Cart</h3>
            <h5 class="Action">Remove all</h5>
        </div>

        <?php
        if($action=='removed'){
            echo "<div class='alert alert-info'>";
            echo "<strong>$name</strong> removed from your cart!";
            echo "</div>";
        }

        if($action=='error'){
            echo "<div class='alert alert-warning'>";
            echo "Something went wrong! Please try again.";
            echo "</div>";
        }
        ?>

        <?php
            if(!empty($products)):
                $items = $total = 0;
                foreach ($products as $product):
                    $quantity = $product['quantity'];
                    $product = $product['product'];
                    $total = $total + ($product->price * $quantity);
                    $items = $items + $quantity;
        ?>

        <div class="Cart-Items">
            <div class="image-box">
                <img src="./asset/img/<?php echo $product->pic;?>" style={{ height="120px" }} />
            </div>
            <div class="about">
                <h1 class="title"><?php echo $product->name;?></h1>

            </div>
            <div class="unit-price">
                <div class="amount"><?php echo $product->price;?>SAR</div>
            </div>
            <div class="counter">
                <div class="btn btn-xs btn-success change-amount" data-type="increase" data-id="<?php echo $product->ID;?>" data-price="<?php echo $product->price;?>" data-quantity="<?php echo $quantity;?>">+</div>
                <div class="count"><span id="new_quantity_<?php echo $product->ID;?>"><?php echo $quantity;?></span></div>
                <div class="btn btn-xs btn-danger change-amount" data-type="decrease" data-id="<?php echo $product->ID;?>" data-price="<?php echo $product->price;?>" data-quantity="<?php echo $quantity;?>">-</div>
            </div>
            <div class="prices">
                <div class="amount"><span id="new_amount_<?php echo $product->ID;?>"><?php echo $product->price * $quantity;?></span> SAR</div>
                <a href="./remove_from_cart.php?id=<?php echo $product->ID;?>" class="remove"><u>Remove</u></a>
            </div>
        </div>

        <?php endforeach;?>
                <hr>
                <div class="checkout mb-4">
                    <div class="total">
                        <div>
                            <div class="Subtotal">Sub-Total</div>
                            <div class="items"><?php echo $items;?> items</div>
                        </div>
                        <div class="total-amount"><?php echo $total;?> SAR</div>
                    </div>
                    <a href="./checkout.php">
                        <button class="button">Checkout</button>
                    </a>
                </div>
        <?php else:?>
            <div class="alert alert-danger">
                <p>No product found</p>
            </div>
        <?php endif;?>
    </div>

    <script src="./asset/js/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
            $(document).on('click', '.change-amount', function (e) {
                let type    = $(this).data('type');
                let id      = $(this).data('id');
                let price   = parseInt($(this).data('price'));
                let quantity= $(this).data('quantity');
                let root    = $(this);

                if(quantity > 0){
                    $.ajax({
                        url: 'modify_cart.php?id='+id+'&type='+type,
                        type: 'POST',
                        data: {},
                        beforeSend: function () {

                        },
                        success: function (response) {
                            let data = JSON.parse(response)
                            if (data.status) {
                                let product = data.data;
                                if(parseInt(product.item_quantity) > 0){
                                    root.attr('data-quantity', parseInt(product.item_quantity));
                                    $("#new_quantity_"+id).text(product.item_quantity);
                                    $("#new_amount_"+id).text(parseInt(product.item_quantity) * price);
                                }else{

                                }
                            }
                        },
                        error: function (xhr) {

                        },
                        complete: function () {

                        }
                    });
                }

            })
        });
    </script>
</body>
</html>
