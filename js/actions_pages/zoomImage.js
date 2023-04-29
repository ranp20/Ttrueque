// ------------ ZOOM INTO PRODUCT
function zoomImage(){
  var container = document.querySelector("#c-pdetail__imgzoom");

  if(!container){
    console.error('Por favor, especifique la clase correcta de su galería.');
    return;
  }else{
    console.log('asdasdasd');
  }

  var firstSmallImage = container.querySelector('.small-preview');
  var zoomedImage = firstSmallImage.nextElementSibling;

  if(!zoomedImage){
    console.error('Agregue un elemento .zoomed-image a su galería.');
    return;
  }

  if(!firstSmallImage){
    console.error('Agregue imágenes con la clase .small-preview a su galería.');
    return;
  }else{
    zoomedImage.style.backgroundImage = 'url(' + firstSmallImage.src + ')';
  }

  container.addEventListener("click", function(evento){
    var elem = event.target;

    if(elem.classList.contains("small-preview")){
      zoomedImage.style.backgroundImage = 'url(' + elem.src + ')';
    }
  });

  zoomedImage.addEventListener('mouseenter', function(e){
    this.classList.add('active');
    this.style.backgroundSize = "250%" ;
  }, false);

  zoomedImage.addEventListener('mousemove', function(e){

    var dimentions = this.getBoundingClientRect ();

    var x = e.clientX - dimentions.left;
    var y = e.clientY - dimentions.top;

    var xpercent = Math.round( 100 / (dimentions.width / x));
    var ypercent = Math.round( 100 / (dimentions.height / y));

    this.style.backgroundPosition = xpercent + '%' + ypercent + '%' ;

  }, false);

  zoomedImage.addEventListener('mouseleave', function(e){
    this.classList.remove('active');
    this.style.backgroundSize = "cover"; 
    this.style.backgroundPosition = "center";
  }, false);
}