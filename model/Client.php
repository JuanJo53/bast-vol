<?php
include_once 'DataBase.php';
	class Client extends DB{
		public function getAllClients(){
			$sql = "SELECT * FROM cliente";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getClientById($id){
			$sql = "SELECT * FROM cliente WHERE CLI_ID = '$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function updateClient($id,$name,$nit,$phone,$email){
			$sql = "UPDATE cliente SET CLI_NOMBRE='$name',CLI_NIT='$nit',CLI_TELEFONO='$phone',CLI_CORREO='$email'	
					WHERE CLI_ID='$id'";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function deleteClient($id){
			$sql = "DELETE FROM cliente WHERE CLI_ID = '$id'";
			$result = $this->connect()->query($sql);
			return $result;
		}
		public function newClient($name,$nit,$phone,$email){
			$sql = "INSERT INTO cliente(CLI_NOMBRE, CLI_NIT, CLI_TELEFONO, CLI_CORREO) 
					VALUES ('$name','$nit','$phone','$email')";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
	}

?>