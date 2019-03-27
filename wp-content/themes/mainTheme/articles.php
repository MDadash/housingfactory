<?php
/*
Template Name: articles
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
                    $query = new WP_Query( array( 'category_name' => 'articles' ) );
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
                <a href="http://demo.pinofran.com/demo/housingfactory/?page_id=9" class="btn-request">
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
