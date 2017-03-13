<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="slider-row">
<?php if(get_sub_field('slides')) : ?>
  <div class="slick">
    <?php while(have_rows('slides')) : the_row(); ?>
      <div class="slide"
          style="background-image: url('<?php the_sub_field('background'); ?>');">
        <div class="overlay clearfix">
          <div class="wrap hpad clearfix hvalign">
            <div class="slide-text center">

              <?php if(get_sub_field('header')): ?>
                <h3><?php the_sub_field('header'); ?></h3>
              <?php endif; ?>

              <?php the_sub_field('blurb'); ?>

              <?php if(get_sub_field('add_button')): ?>
                <p>

                  <?php if (get_sub_field('internal_link')) : ?>

                  <a class="button"
                     href="<?php the_sub_field('button_internal_link'); ?>"
                     title="<?php the_sub_field('button_text'); ?>">
                    <?php the_sub_field('button_text'); ?>
                  </a>

                  <?php else : ?>

                  <a class="button"
                     target="_blank"
                     href="<?php the_sub_field('button_external_link'); ?>"
                     title="<?php the_sub_field('button_text'); ?>">
                    <?php the_sub_field('button_text'); ?>
                  </a>

                  <?php endif; ?>

                </p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
</section>
