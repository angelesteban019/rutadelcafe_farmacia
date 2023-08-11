<!DOCTYPE html>
<html>
<head>
  <!-- Agrega los enlaces a los archivos de Bootstrap CSS y JS aquí -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  <style>
    /* Ajuste para el logo */
    .logo {
      margin-top:10px;
      max-width: 80px; /* Reducir el ancho máximo del logo */
      height: auto; /* Mantener la proporción */
    }
    /* Ajuste para la topbar */
    .topbar {
      z-index: 1000;
    }
    /* Ajuste para el margen en pantalla pequeña */
    .small-screen-margin {
      margin-top: 60px; /* Reducir el margen superior */
      margin-bottom: 20px; /* Margen inferior entre la topbar y los elementos debajo */
    }
    .dropdown-menu {
      font-size: 14px;
    }
    .navbar{
      height:70px;
    }
  </style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0;">
    <div class="container-fluid mt-1 mb-1">
      <div class="col-md-1 col-4 float-left">
        <a class="navbar-brand" href="index.php?page=home">
          <img class="logo" src="assets/img/logo3.png" alt="Logo">
        </a>
      </div>
     
      <div class="col-md-11 float-right">
          <div class="float-right">
            <div class="dropdown mr-4">
              <a href="#" class="text-white dropdown-toggle" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Editar Cuenta</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>



<script>
  $('#manage_my_account').click(function(){
    uni_modal("Editar cuenta","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  });
</script>

</body>
</html>
