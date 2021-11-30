<?php
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];

	include('admin/connection.php');
	$query="SELECT * from users where user_email=:user_email and user_password=:user_password";
	$data=['user_email'=>$user_email,
			'user_password'=>$user_password
			];
			$stmt=$pdo->prepare($query);
			$stmt->execute($data);
			$rows=$stmt->fetchAll();
			if(sizeof($rows)){
				session_start();
				$_SESSION['user_loggedin']=true;
				$_SESSION['loggedin_user_id']=$rows[0]['id'];
				$_SESSION['loggedin_user_name']=$rows[0]['user_name'];
				$_SESSION['loggedin_user_email']=$rows[0]['user_email'];
				header("location:index.php");
			}
	

?>