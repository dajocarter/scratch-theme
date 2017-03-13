<?php get_template_part('partials/header'); the_post(); ?>

<main>

  <section class="wrap hpad clearfix">

    <article id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>>

      <header>
        <h1><?php the_title(); ?></h1>
      </header>

      <?php the_content(); ?>

    </article>

  </section>

</main>

<?php get_template_part('partials/footer'); ?>