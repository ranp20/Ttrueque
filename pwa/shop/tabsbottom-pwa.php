<section id="tabspwa-ttrq" class="tabspwa-ttrq">
    <div class="tabspwa-ttrq__content container-maxwidth">
        <a href="../login" class="tabspwa-ttrq__content__item">
            <div class="tabspwa-ttrq__content__item--img">
                <img src="../img/icons/icon-home.svg" alt="" class="tabspwa-ttrq__content__item--img--icon">
            </div>
            <span class='tabspwa-ttrq__content__item--info'>Inicio</span>
        </a>
        <a href="../categorias" class="tabspwa-ttrq__content__item">
            <div class="tabspwa-ttrq__content__item--img">
                <img src="../img/icons/icon-category.svg" alt="" class="tabspwa-ttrq__content__item--img--icon">
            </div>
            <span class="tabspwa-ttrq__content__item--info">Categorías</span>
        </a>
        <!-- <?php   
      /*require_once 'controllers/get_namestore-by-id.php';
      $getName = new getNameStore();
      $name = $getName->getnamestore($_SESSION['user']);
      
     ?>
    <?php 
      foreach ($name as $val){
        echo "
          <a href='categories.php?store={$val['nombre_tienda']}' class='tabspwa-ttrq__content__item'>
            <div class='tabspwa-ttrq__content__item--img'>
              <img src='../img/icons/icon-store.svg' alt='' class='tabspwa-ttrq__content__item--img--icon'>
            </div>
            <span class='tabspwa-ttrq__content__item--info'>Tienda</span>
          </a>
        ";
      }*/
    ?> -->
        <a href="shop" class="tabspwa-ttrq__content__item">
            <div class="tabspwa-ttrq__content__item--img">
                <img src="../img/icons/icon-hearth.svg" alt="" class="tabspwa-ttrq__content__item--img--icon">
            </div>
            <span class="tabspwa-ttrq__content__item--info">Manager</span>
        </a>
        <a href="../cart" class="tabspwa-ttrq__content__item">
            <div class="tabspwa-ttrq__content__item--img">
                <img src="../img/icons/icon-bag-shopping.svg" alt="" class="tabspwa-ttrq__content__item--img--icon">
                <span class="tabspwa-ttrq__content__item--img--infoquantity" id="count-product-cart">0</span>
            </div>
            <span class="tabspwa-ttrq__content__item--info">Carro</span>
        </a>
        <a href="../profile" class="tabspwa-ttrq__content__item">
            <div class="tabspwa-ttrq__content__item--img">
                <img src="../img/icons/icon-user.svg" alt="" class="tabspwa-ttrq__content__item--img--icon">
            </div>
            <span class="tabspwa-ttrq__content__item--info">Mi cuenta</span>
        </a>
    </div>
</section>