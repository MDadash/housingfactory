<?php
/*
Template Name: service
Template Post Type: post
*/
?>
<?php get_header() ?>

<main>
    <section class="container container--articles">

        <div class="row">
            <div class="col-12 col-md-8 ">

                <article class="article article--single clearfix mt-0 mb-0">
                    <h1 class="article__heading"><?php the_title(); ?></h1>
<!--                   <div class="col-md-6 pl-0 pr-0 pr-md-3 float-left">
                      <?php the_post_thumbnail(); ?>
                  </div> -->
                  <div class="col-md-12 pl-0 pr-0">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="article__content mt-0"> <?php the_content(); ?> </div>
                      <?php endwhile; endif; ?>
                  </div>                    
                </article>

                <div class="service-form service-form--border clearfix">
                  <h3 class="service-form__heading">Закажите эту услугу у наших специалистов</h3>
                  <p class="txt-grey my-3">Оставьте свой телефон в специальной форме или позвоните сами</p>
                      <?php echo do_shortcode('[contact-form-7 id="43" title="Contact form 2"]'); ?>        
                </div>

                <div class="social-icons">
                    <p class="social-icons__info txt-grey">Поделиться или сохранить ссылку</p>
                    <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter"></a>
                    <a href="http://vk.com/" class="social-icons__vk fab fa-vk"></a>
                    <a href="https://ok.ru/" class="fab fa-odnoklassniki"></a>
                    <a href="https://plus.google.com/" class="fab fa-google-plus"></a>
                </div>

                <div class="row mt-3">
                  <h2 class="col-12">Рекомендуем почитать</h2>
                  <p class="col-12 txt-grey mt-3">Похожие услуги</p> 
                </div>

                <?php 
                    $query = new WP_Query( array( 'category_name' => 'realtor-services', 'posts_per_page' => 2, ) );
                        while ( $query->have_posts() ) { $query->the_post(); ?>
                            <article class="article row mt-0 mb-0">
                                <div class="col-12 col-lg-2 article__image">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="col-12 col-lg-8 mt-3 mt-lg-0">
                                    <h3 class="article__heading"><a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                                    <!-- <p class="article__date"><?php the_time("d M Y"); ?></p> -->
                                    <div class="article__content"> <?php do_excerpt(get_the_excerpt(), 40); ?> </div>
                                </div>                    
                            </article>
                <?php } ?> 

            </div>

            <aside class="col-12 col-md-4">
                <a href="<?php echo get_page_link( 7112 ); ?>" class="btn-request">
                    <span class="btn-request__text">Подать заявку в банк</span>
                    <br>
                    <span class="btn-request__text">на ипотеку</span>
                </a>
                <button class="request request--sell request--wider" type="button" data-toggle="modal" data-target="#modal-sale">
                    <span class="request__text">Продать свою квартиру</span>
                </button>
                    <?php
                      $query = new WP_Query( array( 'category_name' => 'employees', 'posts_per_page' => 4 ) );
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
            </aside>
        </div>           
    </section>    
</main>

<?php get_footer() ?>
