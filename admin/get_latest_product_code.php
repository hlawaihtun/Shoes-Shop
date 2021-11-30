<?php

	$first_part = $_POST['first_part'];
	$default_code = $first_part."001";
	$query_code=$first_part."%";
	//echo $default_code;
	include('connection.php');
	$query="SELECT * FROM products WHERE product_code LIKE :product_code order by id 
	desc LIMIT 1 ";
	$stmt=$pdo->prepare($query);
	$data=["product_code"=>$query_code];
	$stmt->execute($data);
	//var_dump($stmt);
	$rows=$stmt->fetchAll(); //data result from query
	if(sizeof($rows)){
		//var_dump($rows);
		$latest_product_code=$rows[0]['product_code'];
		$product_code_array=explode('-',$latest_product_code);
		//var_dump($product_code_array);
		$latest_code=++$product_code_array[2];
		$latest_code =sprintf('%03u',$latest_code);
		$default_code=$first_part.$latest_code;
		echo $default_code;
	}else{
		echo $default_code;
	}
	
?>