<?php
include_once 'db.php';
	class User extends DB{
		var $sql2;
		public function login($user,$pass){
			$sql = "SELECT identificador FROM user where nombre = '$user' and contraseña = '$pass'";
			$result = $this->connect()->query($sql);
			$row2 = $result->fetch_assoc();
            $valor=$row2['identificador'];
            return $valor;
		}
		public function getUserById($id){
			$sql = "SELECT * FROM user where nombre = '$user' and contraseña = '$pass'";
			$result = $this->connect()->query($sql);
			$numrows = $result->num_rows;
			if($numrows == 1){
				return true;
			}else{
				return false;
			}
		}
		public function getAllUsers(){
			$sql2 = "SELECT * FROM user where nombre = '$user' and contraseña = '$pass' and identificador = 'ACA'";
			$result2 = $this->connect()->query($sql2);
			//$numrows2 = $result2->num_rows;
			$row2 = $result2->fetch_assoc();
			$name2=$row2['iduser'];
			return $name2;
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
		public function newUser($user,$pass){
			$sql5 = "SELECT * FROM user where nombre = '$user' and contraseña = '$pass' and identificador = 'ADM'";
			$result5 = $this->connect()->query($sql5);
			//$numrows5 = $result5->num_rows;
			$row5 = $result5->fetch_assoc();
			$name5=$row5['iduser'];
			return $name5;
		}
	}

?>