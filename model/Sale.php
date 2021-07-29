<?php
include_once 'DataBase.php';
	class Sale extends DB{
		public function getAllSales($startDate,$endDate){
			$sql = "SELECT v.VEN_ID, u.USR_NOMBRES, c.CLI_NOMBRE, c.CLI_NIT, a.ART_NOMBRE, dv.DV_CANTIDAD, v.VEN_TOTAL, v.VEN_FECHA
					FROM venta v, detalleventa dv, usuario u, cliente c, articulo a
					WHERE v.VEN_ID=dv.ID_VENTA 
					AND v.ID_USUARIO=u.USR_ID 
					AND v.ID_CLIENTE=c.CLI_ID 
					AND dv.ID_ARTICULO=a.ART_ID
					AND dv.ID_VENTA=v.VEN_ID
					AND v.VEN_FECHA BETWEEN '$startDate' and '$endDate'
					AND dv.ID_VENTA=v.VEN_ID					
					GROUP BY v.VEN_ID
					ORDER BY v.VEN_ID ASC";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getSalesDetails($startDate,$endDate){
			$sql = "SELECT v.VEN_ID, dv.DV_ID, u.USR_NOMBRES, c.CLI_NOMBRE, c.CLI_NIT, a.ART_NOMBRE, dv.DV_CANTIDAD, dv.DV_SUBTOTAL, v.VEN_FECHA, v.VEN_TOTAL
					FROM venta v, detalleventa dv, usuario u, cliente c, articulo a
					WHERE v.VEN_ID=dv.ID_VENTA 
					AND v.ID_USUARIO=u.USR_ID 
					AND v.ID_CLIENTE=c.CLI_ID 
					AND dv.ID_ARTICULO=a.ART_ID
					AND dv.ID_VENTA=v.VEN_ID
					AND v.VEN_FECHA BETWEEN '$startDate' and '$endDate'
					AND dv.ID_VENTA=v.VEN_ID
					ORDER BY v.VEN_ID ASC";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getSaleById($id){
			$sql = "SELECT v.VEN_ID, u.USR_NOMBRES, c.CLI_NOMBRE, a.ART_NOMBRE, dv.DV_CANTIDAD, v.VEN_TOTAL, v.VEN_FECHA 
					FROM venta v, detalleventa dv, usuario u, cliente c, articulo a
					WHERE v.VEN_ID=dv.ID_VENTA 
					AND v.ID_USUARIO=u.USR_ID 
					AND v.ID_CLIENTE=c.CLI_ID 
					AND dv.ID_ARTICULO=a.ART_ID
					AND v.VEN_ID='$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function getSaleProducts($id){
			$sql = "SELECT dv.DV_ID, a.ART_NOMBRE, a.ART_PRECIO, dv.DV_CANTIDAD, dv.DV_SUBTOTAL
					FROM detalleventa dv, articulo a
					WHERE dv.ID_ARTICULO=a.ART_ID
					AND dv.ID_VENTA='$id'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function updateSale($date, $idSale, $idCli, $total, $idProd, $quantity){
			$sql = "UPDATE venta 
					SET VEN_FECHA='$date',ID_CATEGORIA='$idSale',ID_CLIENTE='$idCli',VEN_TOTAL='$total'
					WHERE VEN_ID='$id';
					UPDATE detalleventa 
					SET ID_ARTICULO='$idProd',DV_CANTIDAD='$quantity',DV_SUBTOTAL='$total'
					WHERE ID_VENTA='$id';";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function deleteSale($id){
			$sql = "DELETE FROM venta WHERE VEN_ID = '$id';";
			$result = $this->connect()->query($sql);
			return $result;
		}
		public function deleteSaleDetail($id){
			$sql = "DELETE FROM detalleventa WHERE ID_VENTA = '$id';";
			$result = $this->connect()->query($sql);
			return $result;
		}
		public function newSale($date,$idUser,$idClient,$total){
			$sql = "INSERT INTO venta(VEN_FECHA, ID_USUARIO, ID_CLIENTE, VEN_TOTAL) 
						VALUES ('$date','$idUser','$idClient','$total');";
			$result = $this->connect();
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function newSaleDetail($idProd,$quantity,$idSale,$total){			
			$sql = "INSERT INTO detalleventa(ID_ARTICULO, DV_CANTIDAD, ID_VENTA, DV_SUBTOTAL) 
						VALUES ('$idProd','$quantity','$idSale','$total');";			
			$result = $this->connect();			
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
		public function getLastSale($usrId){			
			$sql = "SELECT MAX(VEN_ID)
					FROM venta
					WHERE ID_USUARIO = '$usrId'";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0){
				return $result;
			}else{
				return false;
			}
		}
		public function updateLastSaleTotal($id,$total){			
			$sql = "UPDATE venta 
					SET VEN_TOTAL='$total'
					WHERE VEN_ID='$id';";
			$result = $this->connect()->query($sql);
			if(mysqli_query($result, $sql)){
				return 'Exito!';
			}else{
				return "Error: " . $sql . "<br>" . mysqli_error($result);
			}
		}
	}

?>