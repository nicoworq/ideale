<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>

<section id="venta" class="page-header">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Propiedades <br/>
                    En alquiler</h1>
            </div>
        </div>
    </div>


</section>


<section id="venta-contenido">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id="form-buscar-propiedad">
                    <input type="text" placeholder="Buscar"/>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="propiedad propiedad-listado">
                    <div class="propiedad-imagen" style="background-image: url(<?php echo get_template_directory_uri() . '/img/img-propiedad.jpg' ?>)">

                        <div class="propiedad-triangulo1"></div>
                        <div class="propiedad-triangulo2"></div>

                        <div class="propiedad-tipo-operacion">
                            Venta 
                        </div>
                        <div class="propiedad-precio">
                            $1.564.500
                        </div>
                    </div>

                    <div class="propiedad-datos">
                        <div class="propiedad-ubicacion">
                            Rosario, Santa Fé.
                        </div>
                        <div class="propiedad-direccion">
                            Av. San Martin 2950.
                            Piso 5 Dto:A.
                        </div>
                        <ul class="propiedad-info">
                            <li class="propiedad-zona">
                                <span class="icono-zona"></span> Centro
                            </li>
                            <li class="propiedad-superficie">
                                <span class="icono-medida"></span>140 mts2 | Dormitorios: 3
                            </li>

                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="propiedad propiedad-listado">
                    <div class="propiedad-imagen" style="background-image: url(<?php echo get_template_directory_uri() . '/img/img-propiedad2.jpg' ?>)">

                        <div class="propiedad-triangulo1"></div>
                        <div class="propiedad-triangulo2"></div>

                        <div class="propiedad-tipo-operacion">
                            Venta 
                        </div>
                        <div class="propiedad-precio">
                            $1.564.500
                        </div>
                    </div>

                    <div class="propiedad-datos">
                        <div class="propiedad-ubicacion">
                            Rosario, Santa Fé.
                        </div>
                        <div class="propiedad-direccion">
                            Avenida Pellegrini 1230.
                        </div>
                        <ul class="propiedad-info">
                            <li class="propiedad-zona">
                                <span class="icono-zona"></span> Centro
                            </li>
                            <li class="propiedad-superficie">
                                <span class="icono-medida"></span>140 mts2 | Dormitorios: 3
                            </li>

                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="propiedad propiedad-listado">
                    <div class="propiedad-imagen" style="background-image: url(<?php echo get_template_directory_uri() . '/img/img-propiedad3.jpg' ?>)">
                        <div class="propiedad-triangulo1"></div>
                        <div class="propiedad-triangulo2"></div>

                        <div class="propiedad-tipo-operacion">
                            Venta 
                        </div>
                        <div class="propiedad-precio">
                            $1.564.500
                        </div>
                    </div>

                    <div class="propiedad-datos">
                        <div class="propiedad-ubicacion">
                            Rosario, Santa Fé.
                        </div>
                        <div class="propiedad-direccion">
                            Avenida del Rosario 2950.
                            Piso 5 Dto:A.
                        </div>
                        <ul class="propiedad-info">
                            <li class="propiedad-zona">
                                <span class="icono-zona"></span> Centro
                            </li>
                            <li class="propiedad-superficie">
                                <span class="icono-medida"></span>140 mts2 | Dormitorios: 3
                            </li>

                        </ul>
                    </div>
                </a>
            </div>


        </div>
    </div>
</section>



<?php get_template_part('template-parts/content', 'home-blog'); ?>
<?php get_template_part('template-parts/content', 'form-contacto'); ?>



<?php
get_footer();
