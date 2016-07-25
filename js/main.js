
(function ($) {

    $(document).ready(function () {


        /* -----------
         *  TAB SERVICIOS
         * ----------- */

        $('#servicios-tabs a').click(function (e) {
            e.preventDefault();




            if ($(this).hasClass('active')) {
                return false;
            }

            var tabClicked = $(this).attr('data-tab');

            $('#servicios-tabs a').removeClass('active');

            $(this).addClass('active');

            $('.servicio-tab.active').fadeOut(function () {

                $('.servicio-tab').removeClass('active');

                $('#tab' + tabClicked).fadeIn().addClass('active');

            });


        });


        /* -----------
         *  SLIDER HOME
         * ----------- */

        $('#slider-worq-slides').slick({arrows: false, dots: true, appendDots: '#dots-container', slidesToShow: 1});

        /* -----------
         *  IMAGE LIGHTBOX
         * ----------- */

        var selectorF = '.categoria-ejemplo-producto-galeria a';
        var instanceF = $('.categoria-ejemplo-producto-galeria a').imageLightbox(
                {
                    onStart: function () {
                        overlayOn(instanceF);
                        closeButtonOn(instanceF);
                        arrowsOn(instanceF, selectorF);
                    },
                    onEnd: function () {
                        overlayOff();
                        closeButtonOff();
                        arrowsOff();
                        activityIndicatorOff();
                    },
                    onLoadStart: function () {
                        activityIndicatorOn();
                    },
                    onLoadEnd: function () {
                        activityIndicatorOff();
                        $('.imagelightbox-arrow').css('display', 'block');
                    }
                });



        /* -----------
         *  IMAGE LIGHTBOX EXTRAS
         * ----------- */

        var activityIndicatorOn = function ()
        {
            $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
        },
                activityIndicatorOff = function ()
                {
                    $('#imagelightbox-loading').remove();
                },
                // OVERLAY

                overlayOn = function (instanceF)
                {
                    var overlay = $('<div id="imagelightbox-overlay"></div>');
                    overlay.appendTo('body').click(function () {
                        instanceF.quitImageLightbox();
                    });

                    setTimeout(function () {
                        overlay.addClass('mostrar');
                    }, 100);

                },
                overlayOff = function ()
                {
                    $('#imagelightbox-overlay').removeClass('mostrar');
                    setTimeout(function () {
                        $('#imagelightbox-overlay').remove();
                    }, 200);
                },
                // CLOSE BUTTON

                closeButtonOn = function (instance)
                {
                    $('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on('click touchend', function () {
                        $(this).remove();
                        instance.quitImageLightbox();
                        return false;
                    });
                },
                closeButtonOff = function ()
                {
                    $('#imagelightbox-close').remove();
                },
                // ARROWS
                arrowsOn = function (instance, selector) {


                    if (typeof selector === 'object') {
                        selector = selector.selector;
                    }

                    var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>');

                    $arrows.appendTo('body');

                    $arrows.on('click touchend', function (e)
                    {
                        e.preventDefault();

                        var $this = $(this),
                                $target = $(selector + '[href="' + $('#imagelightbox').attr('src') + '"]'),
                                index = $target.index(selector);

                        if ($this.hasClass('imagelightbox-arrow-left'))
                        {
                            index = index - 1;
                            if (!$(selector).eq(index).length)
                                index = $(selector).length;
                        } else
                        {
                            index = index + 1;
                            if (!$(selector).eq(index).length)
                                index = 0;
                        }

                        instance.switchImageLightbox(index);
                        return false;
                    });
                },
                arrowsOff = function ()
                {
                    $('.imagelightbox-arrow').remove();
                };




        /* -----------
         *  IMAGENES CATEGORIA PRODUCTO
         * ----------- */

        $('.categoria-ejemplo-producto-galeria').slick({slidesToShow: 4, arrows: false, responsive: [
                {
                    breakpoint: 540, settings: {slidesToShow: 1}
                }

            ]});









        /*
         * MENU MOBILE TOGGLE
         */

        $('#mobile-menu-bt').click(function () {
            $('#navbar').toggleClass('collapse');
            $('body').toggleClass('noScroll');
        });



        /*
         * MAPA
         */

        if ($('#mapa-contacto').length > 0) {
            var mapOptions = {center: new google.maps.LatLng(-32.975424, -60.6680259), zoom: 12, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false};
            var map = new google.maps.Map(document.getElementById("mapa-contacto-map"), mapOptions);


            var latLngMarker = new google.maps.LatLng(-33.007651, -60.655996, 17);
            var marker = new google.maps.Marker({
                position: latLngMarker,
                map: map,
                icon: Ideale.themeUrl + '/img/map_pin.png',
                scrollwheel: false
            });

            google.maps.event.addListener(marker, 'click', function () {
                map.setZoom(16);
                map.setCenter(marker.getPosition());
            });

        }





        /*
         * FORM CONTACTO
         */

        $('#form-contacto input[type=text] , #form-contacto textarea').keydown(function () {
            $(this).removeClass('input-error');
        });

        $('#form-contacto').submit(function (event) {
            event.preventDefault();

            var form = $(this);
            var formOK = true;

            form.find('input[type=text],textarea').not('input[name=sex]').each(function () {
                $(this).removeClass('input-error');
                if ($(this).val() === '') {
                    formOK = false;
                    $(this).addClass('input-error');
                }
            });

            if (!formOK) {
                swal("Oops...", "Debe completar todos los campos", "error");
                return false;
            }


            if (!validateEmail(form.find('input[name=email]').val())) {
                form.find('input[name=email]').addClass('input-error');

                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }


            $('#contacto .ajaxing, #form-contacto-paginas .ajaxing').show();

            $.post(Ideale.ajaxUrl, $('#form-contacto').serialize(), function (json) {
                $('#contacto  .ajaxing , #form-contacto-paginas .ajaxing').hide();
                if (json.enviado) {
                    swal("Gracias!", "Se ha enviado tu consulta. Nos comunicaremos a la brevedad", "success");
                    form[0].reset();
                } else {
                    swal("Oops...", "Error al enviar tu consulta!", "error");

                }
            });

        });


        $('input,textarea').keydown(function () {
            $(this).removeClass('input-error');
            $(this).parent().removeClass('input-error');
        })


        /* -----------
         *  NEWSLETTER SUSCRIBE
         * ----------- */

        $('#form-suscribir-footer input[name=email]').focus(function () {
            $('#form-suscribir-footer').addClass('focus');
        });
        $('#form-suscribir-footer input[name=email]').blur(function () {
            $('#form-suscribir-footer').removeClass('focus');
        });

        $('#form-suscribir-footer input[name=email]').keyup(function () {
            $('#form-suscribir-footer').removeClass('input-error');
        });

        $('#form-suscribir-footer').submit(function (event) {
            event.preventDefault();

            if (!validateEmail($('#form-suscribir-footer input[name=email]').val())) {
                $('#form-suscribir-footer').addClass('input-error');
                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }



            $('footer .ajaxing').fadeIn();

            $.post(Ideale.ajaxUrl, $('#form-suscribir-footer').serialize(), function (json) {
                $('footer .ajaxing').fadeOut();
                if (json.enviado) {
                    swal("Gracias!", "Te has suscrito a nuestro newsletter!", "success");
                    $('#form-suscribir-footer')[0].reset();
                } else {
                    swal("Oops...", "Error al generar tu suscripcion!", "error");
                }
            });

        });


        /* -----------
         *  FORM CONTACTO PROPIEDAD
         * ----------- */
        $('#form-contacto-propiedad').submit(function (event) {
            event.preventDefault();

            var formOK = true;

            $('#form-contacto-propiedad input[type=text], #form-contacto-propiedad textarea').not('input[name=sex]').each(function () {
                $(this).removeClass('input-error');
                if ($(this).val() === '') {
                    formOK = false;
                    $(this).addClass('input-error');
                }
            });

            if (!formOK) {
                swal("Oops...", "Debe completar todos los campos", "error");
                return false;
            }


            if (!validateEmail($('#form-contacto-propiedad input[name=email]').val())) {
                $('#form-contacto-propiedad input[name=email]').addClass('input-error');
                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }

            $('.propiedad-contacto .ajaxing').fadeIn();

            $.post(Ideale.ajaxUrl, $('#form-contacto-propiedad').serialize(), function (json) {
                $('.propiedad-contacto .ajaxing').fadeOut();
                if (json.enviado) {
                    swal("Gracias!", "Se ha enviado tu consulta. Nos comunicaremos a la brevedad", "success");

                    $('#form-contacto-propiedad')[0].reset();

                } else {
                    swal("Oops...", "Error al enviar tu consulta!", "error");

                }
            });

        });

    });

})(jQuery);


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


