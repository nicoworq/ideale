<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Villber
 */
?>


<footer>
    <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="navbar-footer" class="navbar-collapse collapse">

                    <form id="form-suscribir-footer">
                        <input type="text" name="sex"/>
                        <input type="hidden" name="action" value="suscribir"/>
                        <input type="email" placeholder="Ingresa tu email..." name="email"/>
                        <button class="bt-sitio">Suscribirme</button>
                    </form>
          
                    <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_id' => 'footer-menu')); ?>

                    <a href="#" id="footer-logo">
                        <img src="<?php echo get_template_directory_uri() . '/img/ideale-logo.svg' ?>" alt="Ideale Propiedades" />
                    </a>
                </div>
            </div>
        </div>


    </div>

    <div id="footer-copyright">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy;<?php echo date('Y'); ?> Ideale Propiedades.  <a href="http://worq.com.ar"  target="blank"> Desarrolla WORQ</a>
                </div>
            </div>
        </div>

    </div>
</footer>


<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34294796-12', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>