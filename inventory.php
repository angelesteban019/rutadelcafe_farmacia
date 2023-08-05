<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4><b>Inventario</b></h4>
					</div>
					<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Nombre producto</th>
								<th class="text-center">Entrada</th>
								<th class="text-center">Salida</th>
								<th class="text-center">Vencido</th>
								<th class="text-center">Quedan</th>
							</thead>
							<tbody>
							<?php 
								$i = 1;
								$product = $conn->query("SELECT * FROM product_list r order by name asc");
								while($row=$product->fetch_assoc()):
								$inn = $conn->query("SELECT sum(qty) as inn FROM inventory where type = 1 and product_id = ".$row['id']);
								$inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
								$out = $conn->query("SELECT sum(qty) as `out` FROM inventory where type = 2 and product_id = ".$row['id']);
								$out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;

								$ex = $conn->query("SELECT sum(qty) as ex FROM expired_product where product_id = ".$row['id']);
								$ex = $ex && $ex->num_rows > 0 ? $ex->fetch_array()['ex'] : 0;

								$available = $inn - $out- $ex;
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo $row['name'] ?> <sup><?php echo $row['measurement'] ?></sup></td>
									<td class="text-right"><?php echo $inn > 0 ? $inn : 0 ?></td>
									<td class="text-right"><?php echo $out > 0 ? $out : 0 ?></td>
									<td class="text-right"><?php echo $ex > 0 ? $ex : 0 ?></td>
									<td class="text-right"><?php echo $available ?></td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<script>
	$('table').dataTable({
		responsive: true,
		autoWidth: false,
		
		"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No encontrado",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
			"search": "Buscar:",
			"paginate":{
				"next": "Siguiente",
				"previous": "Anterior"
			}
        }
	})
	$('#new_receiving').click(function(){
		location.href = "index.php?page=manage_receiving"
	})
	$('.delete_receiving').click(function(){
		_conf("Está seguro de eliminar estos datos?","delete_receiving",[$(this).attr('data-id')])
	})
	function delete_receiving($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_receiving',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Datos eliminados correctamente",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	
</script>