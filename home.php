<?php get_template_part('partials/header'); ?>

<main class="wrap clearfix">

  <section class="eightcol first hpad">

  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

    <article id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>
             itemscope itemtype="http://schema.org/BlogPosting">

      <header>
        <h2 itemprop="headline">
          <a href="<?php the_permalink(); ?>"
             title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>

        <p class="info">Posted on <span class="date"><meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y'); ?></span> by <span rel="author"><?php the_author_posts_link(); ?><span>.</p>
      </header>

      <div itemprop="articleBody">
        <?php the_excerpt(); ?>
      </div>

    </article>

    <?php endwhile; else: ?>

      <p>No posts here.</p>

  <?php endif; ?>

  </section>

  <?php get_template_part('partials/sidebar'); ?>

</main>

<?php get_template_part('partials/footer'); ?>
