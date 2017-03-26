<?php
if(!function_exists('tweek_bg_position')) {
  function tweek_bg_position() {
    $string = null;
    if(get_sub_field('image_position_y') === 'Top') {
      $string = 'top';
    } elseif(get_sub_field('image_position_y') === 'Middle') {
      $string = 'center';
    } elseif(get_sub_field('image_position_y') === 'Bottom') {
      $string = 'bottom';
    }
    if(get_sub_field('image_position_x') === 'Left') {
      $string .= ' left;';
    } elseif(get_sub_field('image_position_x') === 'Center') {
      $string .= ' center;';
    } elseif(get_sub_field('image_position_x') === 'Right') {
      $string .= ' right;';
    }
    echo $string;
  }
}
?>

<?php global $layout_count; ?>
<section id="tweek-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="hero-unit">
  <div class="tweek-bg"
          style="background-image: url('<?php the_sub_field('image'); ?>'); background-position: <?php tweek_bg_position(); ?>">
    <div class="overlay clearfix">
      <?php
        if(get_sub_field('text_align') === 'Left') {
          $text_align_class = 'left';
        } elseif(get_sub_field('text_align') === 'Right') {
          $text_align_class = 'right';
        } else {
          $text_align_class = 'center';
        }
      ?>
      <div class="wrap <?php echo $text_align_class; ?> hpad clearfix white">
        <div class="content"
             style="padding: <?php the_sub_field('text_margin'); ?>em;">

          <?php if(get_sub_field('header')): ?>
            <h2><?php the_sub_field('header'); ?></h2>
          <?php endif; ?>

          <?php the_sub_field('blurb'); ?>

          <?php if(get_sub_field('add_button')): ?>

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

          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
