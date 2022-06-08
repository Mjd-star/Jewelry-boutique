<?php
	require_once './include/header_control.php';
    require_once './include/header.php';
    require_once './vendor/autoload.php';
	
$quantity = (isset($_SESSION['cart_items']['quantity']) &&  !empty($_SESSION['cart_items']['quantity']) ) ? $_SESSION['cart_items']['quantity']: 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
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

        .hero{
            height: 100%;
            width: 100%;
            background:linear-gradient(rgba(218, 207, 212, 0.8),rgba(255,255,255));
            background-position: right;
            background-size: auto;
            background-repeat: repeat;
            position: absolute;

        }
        .about{

            border-radius: 25px;
            width: 450px;
            height: 300px;
            position: left;
            margin: 2% auto;
            padding: 5px;
            overflow: hidden;
            text-align: center;
            padding-top: 100px;

        }
        .title{
            Border-bottom: 5px solid #a38655;

            text-align: center;
            width: 100%;
            height: 150px;
            position: left;
            padding: 5px;
            overflow: hidden;
            text-align: center;
            padding-top: 50px;

        }

        h1,h5{
            color: #926f34;
            font-family: serif;

        }
        p{
            color: #926f34;
            font-family: serif;
            font-size: 100%;
        }

        .contact {
            position: absolute;
            width: 50%;
            bottom: 3px;

        }
        .address{
            text-align: left;
            position: absolute;
            bottom: 0px;
            right: 0;
        }
        img{
            width:25px;
            height:25px;
        }

    </style>

</head>

<body>
<div class="hero">
    <div class="title">
        <h1>About Us</h1>
    </div>

    <div class="row">
        <div class="about">
            <h1>Jewelry Store</h1>
            <p><em>Opened in 2020, the jewelry store offers the most luxurious and finest jewelry in the world,
                    serving all residents of the Kingdom of Saudi Arabia.</em></p>
        </div>
        <div class="about">

            <h1>Our Features</h1>
            <P><em>Delivers to all residents of Saudi Arabia,
                    and offers competitive rates and payment options</em></p>
        </div>
        <div class="about">

            <h1>Our Mission</h1>
            <p><em>We care about customer satisfaction and that is why we offer them the finest jewelry to gain their trust
                    and attention to details</em></p>
        </div>

    </div>

    <div class="contact">
        <h5>contact us
            <a href="https://www.instagram.com"><img src="./asset/img/instgram.jpg"></a>
            <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiYXIifQ%3D%3D%22%7D"><img src="./asset/img/twitter.jpg"></a></h5>


    </div>
    <div>
        <div class="address">
            <h5>address</h5>
            <P>King Faisal Road, King Faisal University City, Dammam 34212</p>
        </div>
    </div>

</body>

</html>
