<!DOCTYPE html>
<html>
<head>
  <style>
    .logo {
      margin: auto;
      font-size: 20px;
      padding: 5px 13px;
      color: #000000b3;
    }
    .navbar {
      background: #93ED66;
    }
    /* Ajuste para hacer el logo más grande */
    .logo img {
      width: 80px; /* Ajusta el ancho del logo según tu preferencia */
    }
    /* Ajuste para la topbar */
    .topbar {
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }
    /* Ajuste para el margen en pantalla pequeña */
    .small-screen-margin {
      margin-top: 100px; /* Ajusta el valor según tus necesidades */
      margin-bottom: 20px; /* Margen inferior entre la topbar y los elementos debajo */
    }
  </style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
  <nav class="navbar navbar-expand-lg navbar-dark" style="padding: 0;">
    <div class="container-fluid mt-2 mb-2">
      <div class="row"> <!-- Cambio aquí: Usamos una fila para dividir la topbar y el contenido -->
        <div class="col-md-1 float-left">
          <div class="logo">
            <img src="assets/img/logo3.png" alt="Logo">
          </div>
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

<!-- Espacio para evitar que el contenido se superponga al encabezado -->
<div class="small-screen-margin"></div>

<!-- Contenido de la página -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>
</div>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  });
</script>

</body>
</html>
