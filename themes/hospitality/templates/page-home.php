<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 */

get_header();

get_template_part('template-parts/pages/home/inc', 'hero');
get_template_part('template-parts/pages/home/inc', 'about');
?>

<section class="section sec-homeQuyMo" id="id-duan">
    <?php
    get_template_part('template-parts/pages/home/inc', 'company-scale');
    get_template_part('template-parts/pages/home/inc', 'business');
    get_template_part('template-parts/pages/home/inc', 'history');
    get_template_part('template-parts/pages/home/inc', 'core-values');
    ?>
</section>

<?php
get_footer();