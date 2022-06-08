<?php
	require_once './include/header_control.php';
    require_once './include/header.php';
    require_once './vendor/autoload.php';
	
$quantity = (isset($_SESSION['cart_items']['quantity']) &&  !empty($_SESSION['cart_items']['quantity']) ) ? $_SESSION['cart_items']['quantity']: 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            
        }
        .contact iframe {
            
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
        <h1>Contact Us</h1>
    </div>

    <div class="row">
        <div class="about"></div>
        <div class="about">
			<P>King Faisal Road, King Faisal University City, Dammam 34212</p>
        </div>
        <div class="about"></div>

    </div>

    <div class="contact container">
    <div class="row">
    <div class="col-md-12 mb-5 pb-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14295.800354234589!2d50.1925873!3d26.3928001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7b2db98f2941c78c!2sImam%20Abdulrahman%20Bin%20Faisal%20University!5e0!3m2!1sen!2ssa!4v1652724064842!5m2!1sen!2ssa" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>
    </div>

</body>

</html>
