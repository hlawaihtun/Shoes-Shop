<?php

	$id=$_POST['id'];
	include('connection.php');
	$query="SELECT p.*,pb.brand_name,pc.category_name,g.name as gender_name FROM `products` p inner join `product_brands` pb ON p.product_brand_id=pb.id INNER JOIN `product_categories` pc ON
pc.id=product_category_id INNER JOIN `gender` g ON g.id=p.product_gender_id where p.id=:id";
	
		$data=['id'=>$id];
		$stmt=$pdo->prepare($query);
		$stmt->execute($data);
		$rows=$stmt->fetchAll();
		if(sizeof($rows)){
			//var_dump($rows[0]);
			$product_array=$rows[0];
			$product_json=json_encode($product_array);
			echo $product_json;
		}

?>