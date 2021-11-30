<?php

	$id=$_POST['id'];
	$product_category_name=$_POST['product_category_name'];
	$product_category_code=$_POST['product_category_code'];
	$data=[
		'id'=>$id,
		'c_name' => $product_category_name,
		'c_code' => $product_category_code
	];

	include('connection.php');
	$query = "UPDATE product_categories set category_name=:c_name,category_code = :c_code where id=:id";

	$stmt=$pdo->prepare($query);
	$rows=$stmt->execute($data);
	//var_dump($rows);
	if($rows){
		header("location:product_categories.php?status=3");
	}else{
		echo "Error!";
	}

?>