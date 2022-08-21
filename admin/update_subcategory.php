<?php
  /*COMPROBACION DE ERRORES*/
  session_start();

  if(!isset($_SESSION["user_admin"])){
    header("Location: index.php");
  }

  require_once '../php/class/all.php';
  $a = new All();
  $cat = $a->get_categorias();

  if(isset($_GET['id'])){
    require_once("../php/class/categoria.php");
    $c = new Categoria();
    $id = $_GET['id'];
    $sub_id = $c->get_subcategory($id);

    if(count($sub_id) == 0){
        header('Location: manage-subcategory.php');
    }
  }
    else{
        header('Location: manage-subcategory.php');
    }

?>
<!doctype html>
<html lang="es">
<head>
  <?php require_once 'includes/header_links.php'?>
  <title>Trueque | Actualizar Subcategoría</title>
</head>
<body>
<?php require_once 'includes/adm_header-top.php';?>
<div class="ts-main-content">
  <?php require_once 'includes/adm_sidebar-left.php';?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- TÍTULO DEL ITEM Y BOTON DE AGREGADO -->
          <div id="content-title-updates">
            <h2 class="page-title">Editar Subcategoría <i class="fa fa-pencil"></i></h2>
            <div>
              <a href="manage-subcategory.php" id="button-back-left-list-titles"><i class="fa fa-list" id="icon-btn-list"></i>Lista de Subcategorías</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">Campos de formulario</div>
                <div class="panel-body">
                <form action="../php/process_admin_update_subcategory.php" method="POST" class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $sub_id[0]["id_subcategoria"] ?>">
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Categoria
                    </label>
                    <div class="col-sm-5">
                        <select name="categorias" id="categorias" class="form-control">
                          <option value="<?php echo $sub_id[0]['id_categoria']; ?>"><?php echo $sub_id[0]['nombre_categoria']; ?></option>
                        <?php   
                          foreach ($cat as $val) { 
                          echo "<option value='{$val['id_categoria']}'>{$val['nombre_categoria']}</option>";  
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Subcategoria
                      </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="subcategoria" value="<?php echo $sub_id[0]["nombre_subcategoria"] ?>" required>
                      </div>
                    </div>
                    <div class="hr-dashed">
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-4">
                        <button class="btn btn-primary col-sm-3" name="save_sub" type="submit">Guardar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Loading Scripts -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/fileinput.js"></script>
  <script type="text/javascript" src="js/chartData.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
