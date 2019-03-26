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
	</section>
</main>

<?php get_footer() ?>