<?php
/*
Template Name: employees
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

    <div class="row">
      <div class="col-12 col-md-8 ">
          <?php
          $query = new WP_Query( array( 'category_name' => 'employees' ) );
          while ( $query->have_posts() ) { $query->the_post(); ?>
            <article class="article row mt-0 mb-0">
              <div class="col-12 col-lg-4">
                  <?php the_post_thumbnail(); ?>
              </div>
              <div class="col-12 col-lg-8 mt-3 mt-lg-0">
                <h3 class="article__heading"><?php the_title(); ?></h3>
<!--                <p class="article__date">--><?php //the_time("d M Y"); ?><!--</p>-->
                <div class="article__content"> <?php do_excerpt(get_the_excerpt(), 40); ?> </div>
              </div>
            </article>
          <?php } ?>
      </div>
      <aside class="col-12 col-md-4">
        <a href="<?php echo get_page_link(7112); ?>" class="btn-request">
          <span class="btn-request__text">Подать заявку в банк</span>
          <br>
          <span class="btn-request__text">на ипотеку</span>
        </a>
        <button class="request request--sell request--wider" type="button" data-toggle="modal" data-target="#modal-sale">
          <span class="request__text">Продать свою квартиру</span>
        </button>
                <ul class="assistance__list assistance__list--lawyer">
                    <?php 
                        $query = new WP_Query( array( 'category_name' => 'legal-services','posts_per_page' => 6 ) );
                            while ( $query->have_posts() ) { $query->the_post(); ?>  
                                <li class="assistance__item">
                                    <a class="assistance__link assistance__link--rra" href="<?php echo get_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                        <span><?php the_title(); ?></span></a>
                                </li>
                    <?php } ?>
                </ul>
      </aside>
    </div>


  </section>
</main>

<?php get_footer() ?>
