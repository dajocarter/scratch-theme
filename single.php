<?php get_template_part('partials/header'); the_post(); ?>

<main>

  <section class="wrap hpad clearfix">

    <article id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>
             itemscope itemtype="http://schema.org/BlogPosting">

      <header>
        <h1 itemprop="headline">
          <?php the_title(); ?>
        </h1>

        <p class="info">Posted on <span class="date"><meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y'); ?></span> by <span rel="author"><?php the_author_posts_link(); ?><span>.</p>
      </header>

      <div itemprop="articleBody">
        <?php the_content(); ?>
      </div>

    </article>

    <?php if (comments_open() ) : ?>

      <?php comment_form(); ?>

      <div class="comments">
        <?php comments_template(); ?>
      </div>

    <?php endif; ?>

  </section>

</main>

<?php get_template_part('partials/footer'); ?>
