<?php

	$id=$_POST['id'];
	include('connection.php');
	$query= "DELETE FROM product_categories WHERE id =:id "; //data bind :id<-
	$stmt=$pdo->prepare($query);
	$data=['id'=>$id];
	$row=$stmt->execute($data);
	//var_dump($row);

	if($row){
		header("location:product_categories.php?status=1");
	}else{
		echo "Error";
	}

?>