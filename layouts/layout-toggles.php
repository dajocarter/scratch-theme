<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="toggles">
  <div class="wrap hpad clearfix">

    <?php if( get_sub_field('header')): ?>
      <h2 class="center"><?php the_sub_field('header'); ?></h2>
    <?php endif; ?>

    <?php the_sub_field('blurb'); ?>

    <?php if (have_rows('toggles')) : ?>
      <?php while (have_rows('toggles')) : the_row(); ?>
        <?php if (get_sub_field('toggle_header') && get_sub_field('toggle_content')) : ?>
          <h5 class="toggle-heading" data-direction="down"><?php the_sub_field('toggle_header'); ?></h5>
          <div class="toggle-content">
            <?php the_sub_field('toggle_content'); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
