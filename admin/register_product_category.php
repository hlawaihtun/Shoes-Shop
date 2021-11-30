<?php


	$product_category_name = $_POST['product_category_name'];
	$product_category_code = $_POST['product_category_code'];
	//echo $product_category_name . "=>" . $product_category_code;
	include('connection.php');

	$query = "INSERT INTO product_categories(category_name,category_code)VALUES(:product_category_name,:product_category_code)";
	$stmt=$pdo->prepare($query);
	$data=[
		'product_category_name' => $product_category_name,
		'product_category_code' => $product_category_code,
	];

	$rows=$stmt->execute($data);
	//var_dump($rows);
	if($rows){
		header("location:product_categories.php?status=2");
	}else{
		echo "Error";
	}
?>