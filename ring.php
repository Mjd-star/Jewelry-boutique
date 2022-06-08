<?php
    require_once './include/header_control.php';
    require_once './include/header.php';
    require_once './vendor/autoload.php';
    use JS\Jewelary\Model;

    $db = new Model();

    $products = $db->getProducts('', ['product_type' => 'Ring']);
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $name = isset($_GET['name']) ? $_GET['name'] : "";
?>


<section>
    <div class="container">
        <?php
            if($action=='added'){
                echo "<div class='alert alert-info'>";
                echo "<strong>$name</strong> added to your cart!";
                echo "</div>";
            }

            if($action=='error'){
                echo "<div class='alert alert-warning'>";
                echo "Something went wrong! Please try again.";
                echo "</div>";
            }
        ?>
        <div class="row">
            <?php
            if(!empty($products)):
                foreach ($products as $product):
                    $product = (object) $product;
                    ?>
                    <div class="col-md-4">
                        <div class="new-collection-img">
                            <img src="./asset/img/<?php echo $product->pic;?>">
                            <a href="product_details.php?id=<?php echo $product->ID;?>">
                                <button type="button" class="btn-buy">View</button>
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
    </div>
</section>

<?php
require_once './include/footer_control.php';
?>

