<?php
include_once 'DataBase.php';
	class Product extends DB{
		public function getAllProducts(){
			$sql = "SELECT a.ART_ID, a.ART_NOMBRE, c.CAT_NOMBRE, b.PRO_NOMBRE, a.ART_PRECIO, a.ART_STOCK 
					FROM articulo a, proveedor b, categoria c
					WHERE a.ID_CATEGORIA=c.CAT_ID AND a.ID_PROVEEDOR=b.PRO_ID
					ORDER BY a.ART_ID ASC";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getAllAvailableProducts(){
			$sql = "SELECT a.ART_ID, a.ART_NOMBRE, c.CAT_NOMBRE, b.PRO_NOMBRE, a.ART_PRECIO, a.ART_STOCK 
					FROM articulo a, proveedor b, categoria c
					WHERE a.ID_CATEGORIA=c.CAT_ID 
					AND a.ID_PROVEEDOR=b.PRO_ID
					AND a.ART_STOCK>'0'
					ORDER BY a.ART_ID ASC";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getProductById($id){
			$sql = "SELECT a.ART_ID, a.ART_NOMBRE, c.CAT_ID,c.CAT_NOMBRE,b.PRO_ID, b.PRO_NOMBRE, a.ART_PRECIO, a.ART_STOCK 
					FROM articulo a, proveedor b, categoria c 
					WHERE a.ID_CATEGORIA=c.CAT_ID AND a.ID_PROVEEDOR=b.PRO_ID AND a.ART_ID='$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getProductPrice($id){
			$sql = "SELECT a.ART_PRECIO 
					FROM articulo a
					WHERE a.ART_ID='$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getProductStock($id){
			$sql = "SELECT a.ART_STOCK 
					FROM articulo a
					WHERE a.ART_ID='$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function updateProduct($id,$name,$idCat,$idProv,$price,$stock){
			$sql = "UPDATE articulo 
					SET ART_NOMBRE='$name',ID_CATEGORIA='$idCat',ID_PROVEEDOR='$idProv',ART_PRECIO='$price',ART_STOCK='$stock'
					WHERE ART_ID='$id'";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function updateProductStock($id,$stock){
			$sql = "UPDATE articulo 
					SET ART_STOCK='$stock'
					WHERE ART_ID='$id'";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function deleteProduct($id){
			$sql = "DELETE FROM articulo WHERE ART_ID = '$id'";
			$result = $this->connect()->query($sql);
			return $result;
		}
		public function newProduct($name,$idCat,$idProv,$price,$stock){
			$sql = "INSERT INTO articulo(ART_NOMBRE, ID_CATEGORIA, ID_PROVEEDOR, ART_PRECIO, ART_STOCK) 
					VALUES ('$name','$idCat','$idProv','$price','$stock')";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
	}

?>