<?php
    require_once './include/header_control.php';
    require_once './include/header.php';
    require_once './vendor/autoload.php';

    use JS\Jewelary\Model;

    $db = new Model();

    $products = $db->getProducts();
    $action = isset($_GET['action']) ? $_GET['action'] : "";

?>

<section>
    <div class="container">
        <?php
            if($action=='error'){
                echo "<div class='alert alert-warning'>";
                echo "Something went wrong! Please try again.";
                echo "</div>";
            }
        ?>
    </div>
    <div class="banner">
        <div class="banner-img">
            <img src="./asset/img/banner.jpg">
        </div>
        <div class="banner-title">
            <h1><em>Welcome to Our site</em></h1>
        </div>
    </div>
</section>
<section class="new-collection">
    <div class="container">
        <div class="title-style text-center">
            <h1>New Collection</h1>
        </div>
    </div>
    <div class="row">
        <?php
            if(!empty($products)):
                foreach ($products as $product):
                    $product = (object) $product;
        ?>
        <div class="col-md-4">
            <div class="new-collection-img">
                <img src="./asset/img/<?php echo $product->pic;?>">
                <a href='<?php echo strtolower($product->product_type);?>.php'>
                    <button type="button" class="btn-buy">View More</button>
                </a>
                <div class="overlay"></div>
            </div>
        </div>

        <?php endforeach;?>
        <?php else:?>
            <div class="alert alert-danger">
                <p>No product found</p>
            </div>
        <?php endif;?>
    </div>
</section>

<?php
    require_once './include/footer_control.php';
?>

