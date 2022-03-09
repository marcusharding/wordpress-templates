<?php 
/**
 * Template for the index 
 *
 */

get_header(); ?>

    <main class="fvp-content" aria-label="main content" id="main" tabindex="-1">
    
        <?php  if (have_posts()) : while (have_posts()) : the_post();

                the_content();
            
            endwhile;
        endif; ?>

        <div class="fvp-header__section">
        
        </div>

    </main>