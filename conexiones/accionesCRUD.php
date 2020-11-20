<?php
include 'conexion.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$imagen=$_FILES['imagen'];
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$descripcion=$_POST['descripcion'];

		if($imagen["type"]=="image/jpg" OR $imagen["type"]=="image/jpeg"){
			$dir="img/".$_FILES["imagen"]["name"];
			move_uploaded_file($_FILES["imagen"]["tmp_name"],$dir);
			
			$sql = "INSERT INTO `soda`( `imagen`, `nombre`,`precio`,`descripcion`) VALUES ('$dir','$nombre','$precio','$descripcion')";
			
			$consulta = mysqli_query($conn, $sql);
			//print $consulta;
			if ($consulta) {
				//echo json_encode(array("statusCode"=>200));
			} 
			else {
				//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['id'];
		//$imagen=$FILES['imagen'];
		$nombre=$_POST['nombre'];
		$precio=$_POST['precio'];
		$descripcion=$_POST['descripcion'];
		$sql = "UPDATE `soda` SET `nombre`='$nombre',`precio`='$precio',`descripcion`='$descripcion' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['id'];
		$sql = "DELETE FROM `soda` WHERE id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>