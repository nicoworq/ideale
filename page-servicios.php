<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>

<section id="servicios" class="page-header">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>NUESTROS <br/>
                    SERVICIOS</h1>
            </div>
        </div>
    </div>


</section>


<section id='servicios-detalle'>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul id='servicios-tabs'>
                    <li>
                        <a href='#' class='active' data-tab='1'>
                            Intermediación en Compra/venta de inmuebles
                        </a>
                    </li><li>
                        <a href='#' data-tab='2'>
                            Administración
                        </a>
                    </li><li>
                        <a href='#' data-tab='3'>
                            Saneamiento edilicio y jurídico de inmuebles
                        </a>
                    </li>
                </ul>

                <div id='servicios-container'>
                    <div id='tab1' class='servicio-tab active'>
                        Nuestro principal compromiso es conocer las necesidades de nuestros clientes y

                        procurar su plena satisfacción ofreciendo asesoramiento integral en temas jurídico,

                        económicos y financiero, que permitan adquirir o desprenderse de un inmueble en el

                        momento y forma adecuada.
                    </div>
                    <div id='tab2' class='servicio-tab '>
                        La cordialidad y el afecto de nuestros clientes, que en algún momento nos confiaron

                        su patrimonio, es el mayor aliciente para decidirnos hoy “ pensar en grande “. Creemos

                        que “ grande “ es el caudal de servicios que procuramos volcar cada día a ellos, es

                        nuestra sana obsesión. <br/>Cumplimiento en el pago, en los reclamos de los locatarios ( un

                        locatario que se siente oído y apoyado en sus reclamos, aumenta sensiblemente las

                        posibilidades de continuar la locación ) y liquidaciones claras y transparentes, son

                        algunas de las cualidades que pretendemos nos caractericen.
                    </div>
                    <div id='tab3' class='servicio-tab '>
                        En todos estos años, hemos detectado innumerables casos en los que muchos

                        propietarios poseen inmuebles menoscabados, ya sea en el aspecto jurídico ( por

                        ejemplo, ocupaciones ilegítimas, condóminos en desacuerdo, etc. ) y/o en el aspecto

                        edilicio ( por ejemplo, cuando su estado de conservación hace difícil o imposible

                        volcarlo al mercado para obtener una renta o, directamente su realización ), por lo que

                        creímos necesarios dar apoyo financiero y/o jurídico que ayuden a la puesta a punto

                        de los mismos.
                    </div>
                </div>
            </div>
        </div>



    </div>
    <?php get_template_part('template-parts/content', 'valores'); ?>
</section>


<?php get_template_part('template-parts/content', '12-anios'); ?>
<?php get_template_part('template-parts/content', 'form-contacto'); ?>

<?php
get_footer();
