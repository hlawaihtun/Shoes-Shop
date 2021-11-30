<?php
	
	include('connection.php');
	$query="SELECT * from product_brands";
	$stmt=$pdo->query($query);
	$rows=$stmt->fetchAll();
	//var_dump($rows[0]['category_code']);
	echo '<select name="product_brand_id" class="form-control brand_id">';
			foreach ($rows as $key => $brand) {
				$id=$brand['id'];
				$name=$brand['brand_name'];
				$code=$brand['brand_code'];
				//$show_name=$name.'-'.$code;
				if(isset($product_brand_id)){
					if($product_brand_id==$id){
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