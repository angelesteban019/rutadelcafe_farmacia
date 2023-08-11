<nav id="sidebar" class='mx-lt-3 bg-dark' style="width: 200px;">
  <div class="sidebar-list" style="padding-top: 10px; max-height: calc(100vh - 100px); overflow-y: auto;">
    <a href="index.php?page=home" class="nav-item nav-home" style="margin-top: 10px;"><span class='icon-field'><i class="fa fa-home"></i></span> Inicio</a>
    <a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span> Inventario</a>
    <a href="index.php?page=sales" class="nav-item nav-sales"><span class='icon-field'><i class="fa fa-coins"></i></span> Ventas</a>
    <a href="index.php?page=receiving" class="nav-item nav-receiving nav-manage_receiving"><span class='icon-field'><i class="fa fa-file-alt"></i></span> Recibido</a>
    <a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Categorias de Medicina</a>
    <a href="index.php?page=types" class="nav-item nav-types"><span class='icon-field'><i class="fa fa-th-list"></i></span> Tipo de Medicina</a>
    <a href="index.php?page=product" class="nav-item nav-product"><span class='icon-field'><i class="fa fa-boxes"></i></span> Lista de Productos</a>
    <a href="index.php?page=expired_product" class="nav-item nav-expired_product"><span class='icon-field'><i class="fa fa-list"></i></span> Lista de Vencimiento</a>
    <a href="index.php?page=supplier" class="nav-item nav-supplier"><span class='icon-field'><i class="fa fa-truck-loading"></i></span> Lista de Proovedores</a>
    <a href="index.php?page=customer" class="nav-item nav-customer"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Lista de Clientes</a>
    <?php if($_SESSION['login_type'] == 1): ?>
      <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Usuarios</a>
    <?php endif; ?>
  </div>
</nav>
<script>
  $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php if($_SESSION['login_type'] != 1): ?>
<style>
  .nav-item {
    display: none!important;
  }

  .nav-sales,
  .nav-home,
  .nav-inventory {
    display: block!important;
  }

  /* Ajustar la altura máxima para que quepa en la pantalla */
  .sidebar-list {
    max-height: calc(100vh - 100px);
  }
</style>
<?php endif ?>

