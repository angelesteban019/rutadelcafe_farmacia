<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-3 ml-3 mr-3 justify-content-center"> <!-- Centrar todo el contenido horizontalmente -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card bg-primary">
                        <div class="card-body text-white">
                            <p><b><large>Ventas del día</large></b></p>
                            <hr>
                            <p class="text-right"><b><large>
                                <?php 
                                    include 'db_connect.php';
                                    $sales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
                                    echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";
                                ?></large></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card bg-success">
                        <div class="card-body text-white">
                            <p><b><large>Conteo de transacciones</large></b></p>
                            <hr>
                            <p class="text-right"><b><large>
                                <?php 
                                    $sales = $conn->query("SELECT * FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
                                    echo $sales->num_rows > 0 ? number_format($sales->num_rows) : "0";
                                ?></large></b></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center"> <!-- Agregado para centrar horizontalmente -->
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <?php echo "¡Bienvenido ".$_SESSION['login_name']."!"  ?>               
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            Productos vencidos
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php 
                                    $ex = $conn->query("SELECT i.*,p.name,p.measurement,p.sku FROM inventory i inner join product_list p on p.id = i.product_id where date(i.expiry_date) <= '".date('Y-m-d')."' and i.expired_confirmed = 0 ");
                                    while($row= $ex->fetch_array()):
                                ?>
                                <li class="list-group-item bg-danger text-white">
                                    <?php echo $row['name'] ?> <sup><?php echo $row['measurement'] ?></sup>
                                    <hr>
                                    <a href="index.php?page=manage_expired&iid=<?php echo $row['id'] ?>" class="btn badge badge-primary float-right">Confirme Ahora</a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
