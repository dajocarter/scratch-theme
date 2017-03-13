<?php

/*
 * Template Name: Layouts
 */

get_template_part('partials/header'); the_post(); ?>

<main>

	<?php get_template_part('content', 'layouts'); ?>

</main>

<?php get_template_part('partials/footer'); ?>
