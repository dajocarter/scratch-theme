<?php

/*
 * Template Name: Style Guide
 */

get_template_part('partials/header'); ?>

<main class="wrap hpad clearfix">
  <header>
    <h1 class="center">Tweek Theme Style Guide</h1>
    <p class="center">To make visible changes to the Style Guide, you'll need to edit <a href="https://github.com/dajocarter/tweek-theme/tree/master/assets/scss/config">the SCSS config files</a> and <a href="https://github.com/dajocarter/tweek-theme/blob/master/page-style_guide.php">page-style_guide.php</a>. View <a href="http://tweektheme.com">the Tweek Theme website</a> for further documentation.</p>
  </header>

  <section>

    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>

    <p>I barely knew Philip, but as a clergyman I have no problem telling his most intimate friends all about him. Ok, we'll go deliver this crate like professionals, and then we'll go ride the bumper cars. Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood! One hundred dollars. Say it in Russian! Who's brave enough to fly into something we all keep calling a death sphere?</p>

    <ul>

      <li>I've got to find a way to escape the <strong>horrible ravages of youth.</strong> Suddenly, I'm going to the bathroom like clockwork, every three hours. And those jerks at Social Security stopped sending me checks. Now I have to pay them!</li>
      <li>Kif, <em>I have mated with a woman.</em> Inform the men.</li>
    </ul>

    <blockquote>
      <p>Good man. Nixon's pro-war and pro-family. <strong>Son, as your lawyer,</strong> I declare y'all are in a <em>12-piece bucket o' trouble.</em> But I done struck you a deal: Five hours of community service cleanin' up that ol' mess you caused.</p>
    </blockquote>

  </section>

  <section class="clearfix">
    <h2 class="center">Colors</h2>
    <div class="threecol first tweek-bg black-bg">
      <div class="white center hvalign">Black</div>
    </div>
    <div class="threecol tweek-bg red-bg">
      <div class="white center hvalign">Red</div>
    </div>
    <div class="threecol tweek-bg orange-bg">
      <div class="white center hvalign">Orange</div>
    </div>
    <div class="threecol last tweek-bg yellow-bg">
      <div class="center hvalign">Yellow</div>
    </div>
  </section>
  <section class="clearfix">
    <div class="threecol first tweek-bg green-bg">
      <div class="white center hvalign">Green</div>
    </div>
    <div class="threecol tweek-bg blue-bg">
      <div class="white center hvalign">Blue</div>
    </div>
    <div class="threecol tweek-bg purple-bg">
      <div class="white center hvalign">Purple</div>
    </div>
    <div class="threecol last tweek-bg gray-bg">
      <div class="center hvalign">Gray</div>
    </div>
  </section>

  <section class="clearfix">
    <h2 class="center">Links</h2>
    <div class="sixcol first tweek-bg gray-bg">
      <div class="center hvalign"><a href="">Normal</a></div>
    </div>
    <div class="sixcol last tweek-bg gray-bg">
      <div class="center hvalign">
        <a href="" class="button">Button</a><br><br>
        <a href="" class="button alt">Button</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('partials/footer'); ?>
