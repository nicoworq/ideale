<section id="home-anios">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="home-anios-content">
                    <h2><strong>12 años</strong><br/>brindando confianza</h2>
                    <p class="paragraph-one">
                        Lorem Ipsum has been the industry's star
                        dard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
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