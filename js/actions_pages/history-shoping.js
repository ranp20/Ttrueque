///MOSTRAR PANTALLA DE HSTORIAL VACÍO EN CASO NO HAYA ALGÚN CLIENTE REGISTRADO
$(document).ready(function(){
    $('#contenido-historial').html( `<div class="contenido-histo">
                                        <div class="historial-text">
                                            <h2>Tu historial está vacío</h2>
                                            <h4>Empieza a descubrir todo lo que tenemos para tí. !Hay millones
                                            de produtos que pueden interesarte</h4>
                                        </div>
                                    </div>`);
})