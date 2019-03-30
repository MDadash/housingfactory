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
          <h2 class="col-12 mb-3"><?php the_title(); ?></h2>

          <div class="col-12 about_content"><?php the_content(); ?></div>

          <div class="col-12 my-3 about_photo">
              <?php echo do_shortcode('[slick-slider category="47" design="design-1"]'); ?>
          </div>

        <div class="col-12 my-3">
            <?php echo do_shortcode('[slick-carousel-slider category="48" autoplay="false" design="design-6" centermode="true" slidestoshow="2"]'); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>



	</section>
</main>

<?php get_footer() ?>