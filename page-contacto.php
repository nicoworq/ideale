<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>

<section id="contacto" class="section-contacto">
    <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="row">

            <div class="col-md-6">

                <h1>Contáctenos</h1>

                <h2>En Ideale Propiedades, nos importa tu tranquilidad, es por eso que<br/>
                    te ofrecemos propiedades a tu medida, sin vueltas ni complicaciones.</h2>

                <ul class="datos-contacto">       
                    <li><i class="contacto-icon contacto-icon-mail"></i>contacto@idealepropiedades.com</li>   
                    <li><i class="contacto-icon contacto-icon-tel"></i>(0341) 449-5342</li>
                    <li><i class="contacto-icon contacto-icon-dir"></i>Entre Ríos 548 1° Piso Of. 10 (2000) Rosario, Santa Fé</li>
                </ul>
            </div>
            <div class="col-md-6">


                <form id="form-contacto">
                    <input type="hidden" name="action" value="contacto" placeholder="Nombre *"/>
                    <input type="text" name="sex" value="" placeholder="Sex *"/>
                    <div class="fila-contacto">
                        <input type="text" name="nombre" placeholder="Nombre y Apellido *"/>
                        <input  type="text" name="telefono" placeholder="Teléfono *"/>                  
                    </div>
                    <div class="fila-contacto">
                        <input type="text" name="email" placeholder="Email *"/>
                        <input type="text" name="localidad" placeholder="Localidad *"/>
                    </div>

                    <div class="fila-contacto">
                        <textarea name="mensaje" placeholder="Mensaje *"></textarea>
                    </div>
                    <div class="fila-contacto">
                        <button class="bt-sitio">Enviar consulta</button>
                    </div>

                </form>


            </div>
        </div>
        <div class="row">
            <div id="mapa-contacto">
                <div class="col-md-12">
                    <div id="mapa-contacto-map"></div>
                </div>
            </div>
        </div>
    </div>


</section>





<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo"></script>

<?php

get_footer();
