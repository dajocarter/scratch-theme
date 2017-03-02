<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="slider-row">
  <div class="wrap hpad clearfix">
    <?php if(get_sub_field('slides')) { ?>
      <div class="slick">
        <?php while(have_rows('slides')) { the_row(); ?>
          <div class="slide"
              style="background-image: url('<?php the_sub_field('background'); ?>');">
            <div class="overlay clearfix">
              <div class="slide-text center valign-always">
                <?php if(get_sub_field('header')): ?>
                  <h3><?php the_sub_field('header'); ?></h3>
                <?php endif; ?>
                <?php the_sub_field('blurb'); ?>
                <?php if(get_sub_field('cta_link') && get_sub_field('cta_text')): ?>
                  <p>
                    <a class="button"
                       href="<?php the_sub_field('cta_link'); ?>"
                       title="<?php the_sub_field('cta_text'); ?>">
                      <?php the_sub_field('cta_text'); ?>
                    </a>
                  </p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>
