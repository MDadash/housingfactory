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
                    <h3 class="article__heading"><?php the_title(); ?></h3>
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
                  <p class="txt-grey my-3">Оставьте свой телефон и специальная форма или позвоните сами</p>
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
                  <p class="col-12 txt-grey mt-3">Интересные похожие статьи</p> 
                </div>

                <?php 
                    $query = new WP_Query( array( 'category_name' => 'articles', 'posts_per_page' => 2, ) );
                        while ( $query->have_posts() ) { $query->the_post(); ?>
                            <article class="article row mt-0 mb-0">
                                <div class="col-12 col-lg-4">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="col-12 col-lg-8 mt-3 mt-lg-0">
                                    <h3 class="article__heading"><a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                                    <p class="article__date"><?php the_time("d M Y"); ?></p>
                                    <div class="article__content"> <?php do_excerpt(get_the_excerpt(), 40); ?> </div>
                                </div>                    
                            </article>
                <?php } ?> 

            </div>

            <aside class="col-12 col-md-4">
                <a href="<?php echo get_page_link( 9 ); ?>" class="btn-request">
                    <span class="btn-request__text">Подать заявку в банк</span>
                    <br>
                    <span class="btn-request__text">на ипотеку</span>
                </a>
                <button class="request request--sell request--wider" type="button" data-toggle="modal" data-target="#modal-sale">
                    <span class="request__text">Продать свою квартиру</span>
                </button>
                <img src="<?php bloginfo('template_url') ?>/images/articles-banner.png" alt="" class="banner">
            </aside>
        </div>           
    </section>    
</main>

<div class="modal modal-sell" id="modal-sale">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Продать квартиру</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="name">Ваше имя:</label>
            <input class="form-control"  id="name" name="name" type="text" required>
          </div>
          <div class="form-group">
            <label for="text">Номер телефона</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">+7</div>
              </div>
              <input class="form-control"  id="text" name="tel" type="text"required>
            </div>
          </div>
          <div class="form-group">
            <label for="rooms">Количество комнат</label>
            <div>
              <select class="custom-select" id="rooms" name="rooms" required="required">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="select">Район</label>
            <div>
              <select class="custom-select" id="select" name="select" required="required">
                <option value="Кировский">Кировский</option>
                <option value="Кировский">Кировский</option>
                <option value="Кировский">Кировский</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <button class="btn" name="submit" type="submit">Отправить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php get_footer() ?>
