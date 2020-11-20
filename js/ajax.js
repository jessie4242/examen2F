
//Nav
$(()=>{
    $('#ham').click(()=>{
      $('nav').toggleClass('active');
    })
});

  
$(document).on('click','#btn-add',function(e) {
	var data = new FormData($("#user_form")[0]);
	$.ajax({
		data: data,
		type: "post",
		contentType: false,
		processData: false,
		url: "conexiones/accionesCRUD.php",
		success: function(dataResult){
			//(dataResult);
			$('#agregarModal').modal('hide');
			location.reload();	
		}
	});
	//alert(data);
});

	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		//var imagen=$(this).attr("data-imagen");
		var nombre=$(this).attr("data-nombre");
		var precio=$(this).attr("data-precio");
		var descripcion=$(this).attr("data-descripcion");
		$('#idM').val(id);
		//$('#imagenM').val(imagen);
		$('#nombreM').val(nombre);
		$('#precioM').val(precio);
		$('#descripcionM').val(descripcion);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "conexiones/accionesCRUD.php",
			success: function(dataResult){
				$('#editarModal').modal('hide');
                location.reload();						
			}
		});
	});
	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "conexiones/accionesCRUD.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#eliminarModal').modal('hide');
					$("#"+dataResult).remove();
			}
		});
	});