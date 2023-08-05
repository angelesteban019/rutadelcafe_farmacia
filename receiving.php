<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			
		</div>
		<style>
			.btn{
				background:#93ED66;
			}
			</style>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Lista de entradas</b>
							<button class="col-md-2 float-right btn btn-sm" id="new_receiving"><i class="fa fa-plus"></i> Nueva entrada</button>
					</div>
					<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Fecha</th>
								<th class="text-center">Referencia #</th>
								<th class="text-center">Proveedor</th>
								<th class="text-center">Accion</th>
							</thead>
							<tbody>
							<?php 
								$supplier = $conn->query("SELECT * FROM supplier_list order by supplier_name asc");
								while($row=$supplier->fetch_assoc()):
									$sup_arr[$row['id']] = $row['supplier_name'];
								endwhile;
								$i = 1;
								$receiving = $conn->query("SELECT * FROM receiving_list r order by date(date_added) desc");
								while($row=$receiving->fetch_assoc()):
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo date("M d, Y",strtotime($row['date_added'])) ?></td>
									<td class=""><?php echo $row['ref_no'] ?></td>
									<td class=""><?php echo isset($sup_arr[$row['supplier_id']])? $sup_arr[$row['supplier_id']] :'N/A' ?></td>
									<td class="text-center">
										<a class=" btn-sm btn-primary" href="index.php?page=manage_receiving&id=<?php echo $row['id'] ?>">Editar</a>
										<a class=" btn-sm btn-danger delete_receiving" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Eliminar</a>
									</td>
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