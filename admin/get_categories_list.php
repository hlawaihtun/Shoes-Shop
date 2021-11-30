<?php
	
	include('connection.php');
	$query="SELECT * from product_categories";
	$stmt=$pdo->query($query);
	$rows=$stmt->fetchAll();
	//var_dump($rows[0]['category_code']);
	echo '<select name="product_category_id" class="form-control category_id">';
			foreach ($rows as $key => $category) {
				$id=$category['id'];
				$name=$category['category_name'];
				$code=$category['category_code'];
				//$show_name=$name.'-'.$code;
				if(isset($product_category_id)){
					if($product_category_id==$id){
						echo "<option value=$id data-code='$code' selected='selected'>$name</option>";
					}else{
						echo "<option value=$id data-code='$code'>$name</option>";

					}
				}else{
						echo "<option value=$id data-code='$code'>$name</option>";

				}
			}

	echo'</select>';

?>