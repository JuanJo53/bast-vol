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
			$sql = "SELECT * FROM usuario WHERE USR_ID = '$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}

		public function updateUser($id,$name,$lastname,$phone,$email,$username,$password,$type){
			$sql = "UPDATE usuario SET USR_NOMBRES='$name',USR_APELLIDOS='$lastname',USR_TELEFONO='$phone',USR_CORREO='$email',USR_USER='$username',USR_PASSWORD='$password',USR_TIPO='$type'
					WHERE USR_ID='$id'";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
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