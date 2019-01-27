<?php
	// get users name by id
	function getName($id){
		global $connection;

		$sql="SELECT * FROM users WHERE id='{$id}'";
		$query=mysqli_query($connection, $sql);
		$name=NULL;

		if(mysqli_num_rows($query)==1){
			while($row=mysqli_fetch_array($query)){
				$name=$row['name'];
			}
		}
		return $name;
	}
?>