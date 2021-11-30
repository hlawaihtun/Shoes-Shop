<?php

	$id=$_POST['id'];
	$product_brand_name=$_POST['product_brand_name'];
	$product_brand_code=$_POST['product_brand_code'];
	$data=[
		'id'=>$id,
		'product_brand_name' => $product_brand_name,
		'product_brand_code' => $product_brand_code
	];

	include('connection.php');
	$query = "UPDATE product_brands set brand_name=:product_brand_name,brand_code = :product_brand_code where id=:id";

	$stmt=$pdo->prepare($query);
	$rows=$stmt->execute($data);
	//var_dump($rows);
	if($rows){
		header("location:product_brands.php?status=3");
	}else{
		echo "Error!";
	}

?>