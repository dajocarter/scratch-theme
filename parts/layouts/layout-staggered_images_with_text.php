<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="staggered">
  <?php while(has_sub_field('rows')) { ?>

    <?php $icon_or_image = get_sub_field('icon_or_image') ? 'image' : 'icon'; ?>

    <div class="hpad row">
      <div class="wrap pad clearfix">

        <div class="fivecol first">
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
        </div>

        <div class="sevencol last">
          <div class="content valign">

            <?php if(get_sub_field('header')): ?>
              <h3><?php the_sub_field('header'); ?></h3>
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
          </div>
        </div>

      </div>
    </div>
  <?php } ?>
</section>
