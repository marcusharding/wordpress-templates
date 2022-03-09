<?php 
/**
 * Template for the header
 *
 */
?><!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        
        <a class="fvp-skip-content" href="#main">Skip to main content</a>

        <header class="fvp-header" role="banner">

            <?php boilerplate_site_logo(); ?>

            <!-- Hamburber button function call -->

            <nav class="fvp-nav fvp-nav--sidebar" aria-label="Main navigation" role="navigation">

                <?php boilerplate_site_nav(); ?>
                
            </nav>

        </header>