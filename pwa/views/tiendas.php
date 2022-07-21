<?php
session_start();

require_once '../php/class/store.php';
$c = new Store();
$dat = $c->select_tienda();
require_once 'header_index.php';

if(!isset($_GET['tipos']) || $_GET['tipos'] == ""){
  header('Location: ./');
}

?>

<body class="body-homepwa">
    <div class="loader-cli">
        <img src="../shop/images/gifs/shopping-loader.gif" alt="Loading...">
    </div>
    <div id="page">
    <?php
        require_once '../php/process_header.php';
        require_once "./headertop-pwa.php";   
    ?>
        <?php
    if (!isset($_GET["tipos"]) || empty($_GET["tipos"])) {
      echo '<script> location.replace("./"); </script>';
    } else {
      $var =  str_replace("-", " ", $_GET["tipos"]);
    }
    ?>
        <input type="hidden" readonly name="tipo" id="tipo" value="<?php echo  empty($var) ? "" : $var;  ?>" />
        <div class="content-ttrk-official-markets-c" id="cont-all-products_namecategories-in-ttrk">
            <div class="contenido-tiendas-off-header">
                <div class="content-title-tiendas">
                    <h3 id="lista_stores">Categorías <?php echo  empty($var) ? "" : $var;  ?></h3>
                    <input type="hidden" id="idtienda_current" value="<?php echo $d[0]['tienda']; ?>">
                </div>
            </div>
            <div class="container-content-off-mrkts">
                <section class='list-all-products-name-categoria' id="classlist_ProdsByNameCategories">
                    
                    <div class='contain__cont--info--btnsiconsadap'>
                        <a href='#ciconfilterprods' class='contain__cont--info--btnsiconsadap--icon'>
                            <img src='./img/iconos_index/svg_icon_filter.svg' alt=''>
                            <span>Filtrar</span>
                        </a>
                    </div>
                    <div class='c-sidebarLeft__filtericons' id='ciconfilterprods'>
                        <div class='contain__cont--info--filter'>
                            <p class='contain__cont--info--filter--titleord'>Ordernar por:</p>
                            <select class='contain__cont--info--filter--selfilter' name='' id='list_filter_products'>
                                <option value='1'>Más vendidos</option>
                                <option value='2'>Precio de menor a mayor</option>
                                <option value='3'>Precio de mayor a menor</option>
                                <option value='4'>Marca</option>
                            </select>
                        </div>
                    </div>
                    <div class='contain__cont--products'>
                        <div id='loader' class='contain__cont--products--loader'> 
                            <img src='./img/Utilities/loader.gif'>
                        </div>
                        <div class='filter_result' id="filter_byNameCategory"></div>
                    </div>
                    <a href="allcategories" class="btn-allCategoriesLinkShow">Ver todas las categorías</a>
                </section>
            </div>
        </div>
        <?php require_once './tabsbottom-pwa.php'; ?>
    </div>
    
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/actions_pages/buy_cart.js"></script>
     
    <script type="text/javascript" src="./js/actions_pages/customs.js"></script>
    <script type="text/javascript" src="./js/actions_pages/all_pages_index.js"></script>
    <script type="text/javascript" src="./js/actions_pages/history-shoping.js"></script>
    <script type="text/javascript" src="./js/actions_pages/listProds_ByNameCategory.js"></script>
     
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
</body>
</html>