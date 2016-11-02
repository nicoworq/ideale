<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Villber
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">        
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <nav class="navbar" role="navigation">
            <div class="secondary-nav">
              (0341) 449-5342 -  Entre Ríos 548 1° Piso Of. 10 (2000) Rosario, Santa Fé
            </div>
            <div class="container">
                <div class="col-md-12">
                    <div class="navbar-header">

                        <a id="call-mobile" href="tel:3416280427" data-ref-bt="Llamar header mobile">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="36px" height="36px" viewBox="0 0 389.65 389.65" enable-background="new 0 0 389.65 389.65" xml:space="preserve">
                            <g>
                            <path d="M194.777,25.724c93.485,0,169.557,76.072,169.557,169.557s-76.072,169.557-169.557,169.557
                                  S25.22,288.767,25.22,195.282S101.292,25.724,194.777,25.724 M194.777,1.5C87.761,1.5,0.996,88.265,0.996,195.282
                                  c0,107.012,86.765,193.782,193.782,193.782c107.012,0,193.782-86.77,193.782-193.782C388.559,88.265,301.789,1.5,194.777,1.5
                                  L194.777,1.5z M302.81,260.069l-1.091-3.312c-2.554-7.613-10.973-15.564-18.736-17.693l-28.644-7.828
                                  c-7.758-2.107-18.827,0.731-24.531,6.435l-10.36,10.36c-37.659-10.198-67.202-39.74-77.373-77.4l10.36-10.36
                                  c5.677-5.677,8.516-16.747,6.409-24.531l-7.806-28.644c-2.102-7.763-10.102-16.182-17.715-18.736l-3.268-1.091
                                  c-7.64-2.554-18.543,0.026-24.22,5.725l-15.52,15.52c-2.764,2.742-4.538,10.618-4.538,10.645
                                  c-0.521,49.249,18.779,96.677,53.6,131.521c34.724,34.724,81.99,54.003,131.07,53.578c0.263,0,8.376-1.727,11.144-4.494
                                  l15.516-15.52C302.784,278.595,305.341,267.687,302.81,260.069L302.81,260.069z"/>
                            </g>
                            </svg>
                        </a>

                        <a class="navbar-brand" href="<?php echo get_site_url(); ?>">

                            <img src="<?php echo get_template_directory_uri() . '/img/ideale-logo.svg' ?>" alt="Ideale Propiedades" />
                            
                   
                        </a>
                        <button id="mobile-menu-bt" type="button" class="navbar-toggle collapsed">
                            <span class="icon-bar"></span>
                            <span class="icon-bar hideBar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">

                        <!--
                        <div id="navbar-header-mobile">
                            <a class="navbar-mobile-brand" href="<?php echo get_site_url(); ?>">
                                <img src="<?php echo get_template_directory_uri() . '/img/durand_logo_negativo.svg' ?>" alt="Durand Design" />
                            </a>
                            
                        </div>-->
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>

                    </div><!--/.navbar-collapse -->
                </div>

            </div>
        </nav>

