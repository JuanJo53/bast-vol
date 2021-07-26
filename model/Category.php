<?php
include_once 'DataBase.php';
	class Category extends DB{
		public function getAllCategories(){
			$sql = "SELECT * FROM categoria";
			$result = $this->connect()->query($sql);
			$numrows = $result->num_rows;
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getCategoryById($id){
			$sql = "SELECT * FROM categoria WHERE CAT_ID = '$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}

		public function updateCategory($id,$name){
			$sql = "UPDATE categoria SET CAT_NOMBRE='$name'	WHERE CAT_ID='$id'";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function deleteCategory($id){
			$sql = "DELETE FROM categoria WHERE CAT_ID = '$id'";
			$result = $this->connect()->query($sql);
			return $result;
		}
		public function newCategory($name){
			$sql = "INSERT INTO categoria (CAT_NOMBRE) VALUES ('$name')";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
	}

?>