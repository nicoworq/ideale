<section id="home-anios">
    <div id="home-anios-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="home-anios-content">
                    <h2><strong>12 años</strong><br/>brindando confianza</h2>
                    <p class="paragraph-one">
                        Para Ideale Propiedades, los valores personales y de la empresa son más que 
                        importantes y están directamente relacionados con la pasión de concretar buenos
                        negocios, sumando clientes satisfechos y siendo la mejor publicidad, Su

                        Recomendación.
                    </p>
                    <?php
                    if (!is_page(get_page_by_title('Institucional'))) {
                        ?>
                        <a href="<?php echo get_permalink(get_page_by_title('Institucional')) ?>" class="bt-sitio">Acerca de Ideale</a>
                        <?php
                    }
                    ?>

                </div>

            </div>           

        </div>
    </div>

</section>