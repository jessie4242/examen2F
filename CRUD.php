<?php
include 'conexiones/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Practica 3 </title>
	<link rel="shortcut icon"type="image/x-icon"href="img/logo.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

    <link rel ="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> 
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/ajax.js"></script>


</head>
<body>
	<header>
		  <div class="t">
		  	<a href="#"><img src="img/logo.png" width="90px" height="50px"></a>
        	<div class="menu" id = "ham"><a href="#">&#9776;</a></div>
          </div>
		  <nav>
            <ul>
             <li><a href="index.html">Inicio</a></li>
              <li><a href="productos.php">Productos</a></li>
              <li><a href="CRUD.php">Tabla de Registro</a></li>   
            </ul>
          </nav>
    </header>
    <div class="container">
	<div class = "titulo">
    	<h1>Registro.<span>&#160;</span></h1>
  	</div>
    
            <div class="table-title">
                <div class="row">
					<div class="col-sm-6">
						<a href="#agregarModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Agregar nuevo Producto</span></a>
					</div>
                </div>
			</div>
	
            <table class="table table-striped table-hover" id="tabla">
                <thead style="background-color: #00416d; color: #f5f1da; font-size: 18px">
                    <tr>
						<th style="font-size: 18px">ID</th>
                        <th style="font-size: 18px">IMAGEN</th>
                        <th style="font-size: 18px">NOMBRE</th>
						<th style="font-size: 18px">PRECIO</th>
                        <th style="font-size: 18px">DESCRIPCION</th>
                        <th style="font-size: 18px">ACCIONES</th>
                    </tr>
                </thead>
				<tbody style="font-size: 15px;">
				
					<?php
					$result = mysqli_query($conn,"SELECT * FROM soda");
						$i=1;
						while($row = mysqli_fetch_array($result)) {
					?>
					<tr id="<?php echo $row["id"]; ?>">
						<td style="color: black;"><?php echo $i; ?></td>
						<td style="color: black;"><?php echo $row["imagen"]; ?></td>
						<td style="color: black;"><?php echo $row["nombre"]; ?></td>
						<td style="color: black;"><?php echo $row["precio"]; ?></td>
						<td style="color: black;"><?php echo $row["descripcion"]; ?></td>

						<td>
							<a href="#editarModal" class="edit" data-toggle="modal">
								<i class="btn btn-success update" data-toggle="tooltip" 
								data-id="<?php echo $row["id"]; ?>"
								data-imagen="<?php echo $row["imagen"]; ?>"
								data-nombre="<?php echo $row["nombre"]; ?>"
								data-precio="<?php echo $row["precio"]; ?>"
								data-descripcion="<?php echo $row["descripcion"]; ?>"
								title="Edit">Editar</i>

							</a>
							<a href="#eliminarModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="btn btn-danger" data-toggle="tooltip" title="Delete">Eliminar</i></a>
						</td>
					</tr>
					<?php
					$i++;
					}
					?>
				</tbody>
			</table>
			

	<div id="agregarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" enctype="multipart/formdata" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Imagen</label>
							<input type="file" name="imagen" class="form-control" id="imagen"  accept="image/*" required>
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="nombre" name="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio</label>
							<input type="number" id="precio" name="precio" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" id="descripcion" name="descripcion" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="editarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form" enctype="multipart/formdata" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="idM" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Nombre</label>
							<input type="email" id="nombreM" name="nombre" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio</label>
							<input type="number" id="precioM" name="precio" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" id="descripcionM" name="descripcion" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="eliminarModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>¿Seguro que desea eliminar el producto?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Eliminar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	 <!--   Datatables-->
	 
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>                
	  <!-- extension responsive -->
	  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	  
	  <script>
	  $(document).ready(function() {
		  $('#tabla').DataTable({
			  responsive: true
		  });
	  } );  
	  
	  </script>

</body>
</html>  


