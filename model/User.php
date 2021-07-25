<?php
	include_once 'DataBase.php';
	class User extends DB{
		public function login($user,$pass){
			$sql = 'SELECT * FROM usuario WHERE USR_USER="'.$user.'"';
			$result = $this->connect()->query($sql);
            return $result;
		}	
		public function getAllUsers(){
			$sql = "SELECT * FROM usuario";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getUserById($id){
			$sql = "SELECT * FROM usuario where nombre = '$user' and contraseña = '$pass'";
			$result = $this->connect()->query($sql);
			$numrows = $result->num_rows;
			if($numrows == 1){
				return true;
			}else{
				return false;
			}
		}

		public function updateUser($id){
			$sql3 = "SELECT * FROM user where nombre = '$user' and contraseña = '$pass' and identificador = 'MOD'";
			$result3 = $this->connect()->query($sql3);
			//$numrows3 = $result3->num_rows;
			$row3 = $result3->fetch_assoc();
			$name3=$row3['iduser'];
			return $name3;
		}
		public function deleteUser($id){
			$sql4 = "SELECT * FROM user where nombre = '$user' and contraseña = '$pass' and identificador = 'PRO'";
			$result4 = $this->connect()->query($sql4);
			//$numrows4 = $result4->num_rows;
			$row4 = $result4->fetch_assoc();
			$name4=$row4['iduser'];
			return $name4;
		}
		public function newUser($name,$lastname,$phone,$email,$username,$password,$type){
			$sql = "INSERT INTO usuario(USR_NOMBRES, USR_APELLIDOS, USR_TELEFONO, USR_CORREO, USR_USER, USR_PASSWORD, USR_TIPO) 
			VALUES ('$name','$lastname','$phone','$email','$username','$password','$type')";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
	}

?>