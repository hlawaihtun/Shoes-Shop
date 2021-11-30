<?php
		$dsn="mysql:host=localhost:3307;dbname=myshoesshop";
		$user="root";
		$password="";
		$pdo=new PDO($dsn,$user,$password);
		/*var_dump($pdo);
		$query="select * from gender";
		var_dump($query);

		$stmt = $pdo->query($query,PDO::FETCH_ASSOC);
		var_dump($stmt);
		$rows=$stmt->fetchAll();
		var_dump($rows);
		foreach ($rows as $key => $value) {
			echo "<br>" . $value['id'] . "=>" . $value['name']; 
		}*/

		
?>