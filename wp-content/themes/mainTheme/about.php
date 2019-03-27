<?php
/*
Template Name: about
*/
?>

<?php get_header() ?>

<main>
  <section class="container container--articles">
    <div class="row">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <h2 class="col-12"><?php the_title(); ?></h2>
          <div class="col-12"><?php the_content(); ?></div>
      <?php endwhile; endif; ?>
    </div>

    <div class="row filter__wrap">
      <div class="col-10">
        <h2>Количество комнат</h2>

      </div>
      <div class="col-2">
        <h2>Район</h2>

      </div>
    </div>
	</section>
</main>

<?php get_footer() ?>