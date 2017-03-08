<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="flexible-columns">
  <div class="wrap hpad clearfix center">

    <?php if( get_sub_field('header')): ?>
      <h2><?php the_sub_field('header'); ?></h2>
    <?php endif; ?>

    <?php the_sub_field('blurb'); ?>

    <?php if(get_sub_field('add_button')): ?>
      <p class="button-wrapper">

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

    <?php
      $columns = get_sub_field('use_custom_columns') ? 'custom' : 4;
      tweek_layout_declare(get_sub_field('columns'), $columns);

      while(has_sub_field('columns')):
        $icon_or_image = get_sub_field('icon_or_image') ? 'image' : 'icon';
        tweek_layout_start();
    ?>

      <?php if(get_sub_field('column_add_button')): ?>

        <?php if(get_sub_field('column_internal_link')): ?>
          <a href="<?php the_sub_field('column_button_internal_link'); ?>">
        <?php else : ?>
          <a target="_blank" href="<?php the_sub_field('column_button_external_link'); ?>">
        <?php endif; ?>

      <?php endif; ?>

        <?php if($icon_or_image === 'icon'): ?>

          <?php if(get_sub_field('icon')): ?>
            <div class="circle center">
              <i class="fa <?php the_sub_field('icon'); ?> hvalign"></i>
            </div>
          <?php endif; ?>

        <?php else: ?>

          <?php if(get_sub_field('image')): ?>
            <div class="tweek-bg circle"
                 style="background-image: url('<?php the_sub_field('image'); ?>');">
            </div>
          <?php endif; ?>

        <?php endif; ?>

        <?php if(get_sub_field('header')): ?>
          <h3><?php the_sub_field('header'); ?></h3>
        <?php endif; ?>

      <?php if(get_sub_field('column_add_button')): ?>
        </a>
      <?php endif; ?>

      <?php the_sub_field('blurb'); ?>

      <?php if(get_sub_field('column_add_button')): ?>
        <p class="button-wrapper">

          <?php if (get_sub_field('column_internal_link')) : ?>

          <a class="button"
             href="<?php the_sub_field('column_button_internal_link'); ?>"
             title="<?php the_sub_field('column_button_text'); ?>">
            <?php the_sub_field('column_button_text'); ?>
          </a>

          <?php else : ?>

          <a class="button"
             target="_blank"
             href="<?php the_sub_field('column_button_external_link'); ?>"
             title="<?php the_sub_field('column_button_text'); ?>">
            <?php the_sub_field('column_button_text'); ?>
          </a>

          <?php endif; ?>

        </p>
      <?php endif; ?>

    <?php
        tweek_layout_end();
      endwhile;
    ?>
  </div>
</section>
