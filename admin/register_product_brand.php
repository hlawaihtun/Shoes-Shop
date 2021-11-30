<?php


	$product_brand_name = $_POST['product_brand_name'];
	$product_brand_code = $_POST['product_brand_code'];
	//echo $product_category_name . "=>" . $product_category_code;
	include('connection.php');

	$query = "INSERT INTO product_brands(brand_name,brand_code)VALUES(:product_brand_name,:product_brand_code)";
	$stmt=$pdo->prepare($query);
	$data=[
		'product_brand_name' => $product_brand_name,
		'product_brand_code' => $product_brand_code,
	];

	$rows=$stmt->execute($data);
	if($rows){
		header("location:product_brands.php?status=2");
	}else{
		echo "Error";
	}

?>