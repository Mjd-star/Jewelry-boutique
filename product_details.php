<?php
require_once './include/header_control.php';
require_once './include/header.php';
require_once './vendor/autoload.php';

use JS\Jewelary\Model;
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";

$db = new Model();
$productInfo = $db->getProductById($id);
if($productInfo['status']){
   $info = (object)$productInfo["data"];
}else{
	header("Location: index.php?action=error");
}

$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
?>

<section>
    <div class="container">
		<div class="row">
			<div class="col-md-6 product">
				<div class="product-img new-collection-img">
					<img src="./asset/img/<?php echo $info->pic;?>">
				</div>
			</div>
			<div class="col-md-6 pt-5">
				<div class="product-info mt-5">
					<h4><?php echo $info->name;?></h4>
					<h5 class="text-warning">SAR<?php echo $info->price;?></h5>
					<p><?php echo $info->Description;?></p>
					<p><?php echo $info->stock;?> in stock</p>
					<form class="form" id="search_form" action="add_to_cart.php" method="GET">
					<label for="quantity" class="w-25 d-inline mr-3" style="margin-right: 10px;">Quantity: </label>
					<input type="hidden" name="id" value="<?php echo $id;?>" />
					<input type="number" class="form-control w-25 d-inline" id="quantity" name="quantity" value="1" min="1" required />
					<p><button type="submit" class="btn btn-block btn-outline-success w-100 mt-3">Add to cart</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php
require_once './include/footer_control.php';
?>
