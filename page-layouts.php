<?php

/*
 * Template Name: Layouts
 */

get_template_part('partials/header'); the_post(); ?>

<main>

	<?php get_template_part('partials/content', 'layouts'); ?>

</main>

<?php get_template_part('partials/footer'); ?>
