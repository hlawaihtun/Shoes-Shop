<?php 

	$id=$_POST['id'];
	$old_photo=$_POST['old_photo'];
	$my_uploaded_path=$old_photo;
	$product_category_id=$_POST['product_category_id'];
	$product_brand_id=$_POST['product_brand_id'];
	$product_code=$_POST['product_code'];
	$product_name=$_POST['product_name'];
	$product_price=$_POST['product_price'];
	$product_size=$_POST['product_size'];
	$gender=$_POST['gender'];
	$product_detail=$_POST['product_detail'];
	if(isset($_FILES['product_photo'])){
		$product_photo=$_FILES['product_photo']['name'];
		if($product_photo){
		$ext = pathinfo($product_photo, PATHINFO_EXTENSION);
	//do 1.jpg

		$my_uploaded_name=uniqid().'.'.$ext;
		$my_uploaded_path='img/'.$my_uploaded_name;
		if(
		!move_uploaded_file($_FILES['product_photo']['tmp_name'],$my_uploaded_path)){
		echo "File Uploaded Error";
		}else{
			unlink($old_photo);
		}
		}
	}
	include('connection.php');
	$query="UPDATE products set 
			product_code=:product_code,
			product_name=:product_name,
			product_category_id=:product_category_id,
			product_photo=:product_photo,
			product_price=:product_price,
			product_detail=:product_detail,
			product_brand_id=:product_brand_id,
			product_size=:product_size,
			product_gender_id=:product_gender_id WHERE id=:id";
	//var_dump($product_photo);
	$data=[
		"id"=>$id,
		"product_code"=>$product_code,
		"product_name"=>$product_name,
		"product_category_id"=>$product_category_id,
		"product_photo"=>$my_uploaded_path,
		"product_price"=>$product_price,
		"product_detail"=>$product_detail,
		"product_brand_id"=>$product_brand_id,
		"product_size"=>$product_size,
		"product_gender_id"=>$gender,
	];

	$stmt=$pdo->prepare($query);
	$rows=$stmt->execute($data);

	//var_dump($rows);
	if($rows){
		header("location:product_list.php?status=1");
	}

?>