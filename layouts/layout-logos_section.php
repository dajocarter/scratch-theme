<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="logos">
  <div class="wrap hpad clearfix">

    <?php if( get_sub_field('header')): ?>
      <h2 class="center"><?php the_sub_field('header'); ?></h2>
    <?php endif; ?>

    <?php the_sub_field('blurb'); ?>

    <?php if (have_rows('logos')) : ?>
      <div class="all-logos">
      <?php while (have_rows('logos')) : the_row(); ?>
        <?php if ( get_sub_field( 'link' ) ) : ?>
        <a target="_blank" href="<?php the_sub_field( 'link' ); ?>">
        <?php endif; ?>

        <?php if ( get_sub_field( 'logo' ) ) : $logo = get_sub_field( 'logo' ); ?>
          <img src="<?php echo $logo['sizes']['thumbnail']; ?>" alt="<?php echo $logo['alt']; ?>">
        <?php endif; ?>

        <?php if ( get_sub_field( 'link' ) ) : ?>
        </a>
        <?php endif; ?>
      <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
