<?php

	$user_name=$_POST['user_name'];
	$user_email=$_POST['user_email'];
	$user_phone=$_POST['user_phone'];
	$user_address=$_POST['user_address'];
	$user_password=$_POST['user_password'];
	$user_confirm_password=$_POST['user_confirm_password'];

	if($user_name==''|| $user_email==''||$user_phone==''||$user_password==''||$user_confirm_password==''	){
		header("location:register.php?status=2");
	}else if($user_password!==$user_confirm_password){
		header("location:register.php?status=1");
	}
	else{
		include('admin/connection.php');
		$query="INSERT INTO users (user_name,
									user_email,
									user_phone,
									user_address,
									user_password,
									user_role,
									created_by,
									updated_by) values
									(
									:user_name,
									:user_email,
									:user_phone,
									:user_address,
									:user_password,
									:user_role,
									:created_by,
									:updated_by	
									)";

			$data=[
					"user_name"=>$user_name,
					"user_email"=>$user_email,
					"user_phone"=>$user_phone,
					"user_address"=>$user_address,
					"user_password"=>$user_password,
					"user_role"=>1,
					"created_by"=>1,
					"updated_by"=>1
				];

				$stmt=$pdo->prepare($query);
				try{
				$rows=$stmt->execute($data);
				if($rows){
					header("location:login.php?status=1");
				}
			}catch(PDOException $e){
				$return ="Registration Failed".$e->getMessage();

			}
	}

?>