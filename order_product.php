<?php 

	session_start();
	$loggedin_user_id=$_SESSION['loggedin_user_id'];

	//var_dump($loggedin_user_id);
	
	$my_cart=$_POST['my_cart'];
	//echo $my_cart;	
	// json string to php object
	$my_cart_obj=json_decode($my_cart);
	//get product_list from object
	$product_list=$my_cart_obj->product_list;

	//var_dump($product_list);

	date_default_timezone_set('Asia/Rangoon');
	$now=date('Ymd-His');
	$voucher_id=$now.'-'.rand(1001,9999);
	include('admin/connection.php');
		foreach ($product_list as $key => $product) {
			//echo $product->id . $product->name . $product->price . $product->quantity . '<br>';
			$product_id=$product->id;
			$product_price=$product->price;
			$product_quantity=$product->quantity;
			$data=[
					"product_id"=>$product_id,
					"product_price"=>$product_price,
					"product_quantity"=>$product_quantity,
					"created_by"=>$loggedin_user_id,
					"voucher_id"=>$voucher_id,

				];
				$query="INSERT INTO order_detail (voucher_id,product_id,product_price,product_quantity,created_by,updated_by)VALUES
				(:voucher_id,:product_id,:product_price,:product_quantity,:created_by,0)";
				$stmt=$pdo->prepare($query);
				$stmt->execute($data);
	}
			$today=date('Y-m-d');
			$order_data=[
				"voucher_id" => $voucher_id,
				"user_id" => $loggedin_user_id,
				"order_date" => $today,
				"created_by" => $loggedin_user_id
			];
			$query="INSERT INTO orders(voucher_id,user_id,order_date,created_by,updated_by)VALUES (:voucher_id,:user_id,:order_date,:created_by,0)";
			$stmt=$pdo->prepare($query);
			$rows=$stmt->execute($order_data);
			if($rows){
				echo true;
			}else{
				echo false;
			}

?>

