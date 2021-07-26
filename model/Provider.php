<?php
include_once 'DataBase.php';
	class Provider extends DB{
		public function getAllProviders(){
			$sql = "SELECT * FROM proveedor";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getProviderById($id){
			$sql = "SELECT * FROM proveedor WHERE PRO_ID = '$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}

		public function updateProvider($id,$name,$email,$phone,$city,$country){
			$sql = "UPDATE proveedor SET PRO_NOMBRE='$name',PRO_CORREO='$email',PRO_TELEFONO='$phone',PRO_CIUDAD='$city',PRO_PAIS='$country'
					WHERE PRO_ID='$id'";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function deleteProvider($id){
			$sql = "DELETE FROM proveedor WHERE PRO_ID = '$id'";
			$result = $this->connect()->query($sql);
			return $result;
		}
		public function newProvider($name,$email,$phone,$city,$country){
			$sql = "INSERT INTO proveedor(PRO_NOMBRE, PRO_CORREO, PRO_TELEFONO, PRO_CIUDAD, PRO_PAIS) 
			VALUES ('$name','$email','$phone','$city','$country')";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
	}

?>