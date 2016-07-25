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


<?php if (get_post_type(get_the_ID()) === 'propiedad') { ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdYmuKuunNouV8UBR4nqnYzEDyClTy0zg&callback=initMap">
    </script>

    <script type="text/javascript">

        function render_map($el) {
            var $markers = $el.find('.marker');

            var args = {
                zoom: 16,
                scrollwheel: false,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // create map	        	
            var map = new google.maps.Map($el[0], args);

            // add a markers reference
            map.markers = [];

            // add markers
            $markers.each(function () {

                add_marker(jQuery(this), map);

            });

            // center map
            center_map(map);

        }


        function add_marker($marker, map) {

            // var
            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

            // create marker
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });

            // add to array
            map.markers.push(marker);

            // if marker contains HTML, add it to an infoWindow
            if ($marker.html())
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function () {

                    infowindow.open(map, marker);

                });
            }

        }


        function center_map(map) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            jQuery.each(map.markers, function (i, marker) {

                var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                bounds.extend(latlng);

            });

            // only 1 marker?
            if (map.markers.length == 1)
            {
                // set center of map
                map.setCenter(bounds.getCenter());
                map.setZoom(16);
            } else
            {
                // fit to bounds
                map.fitBounds(bounds);
            }

        }

        function initMap() {
            jQuery('.ideale-map').each(function () {
                render_map(jQuery(this));
            });
        }


    </script>

<?php } ?>


<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-34294796-12', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>