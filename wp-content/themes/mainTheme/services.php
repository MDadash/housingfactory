<?php
/*
Template Name: services
*/
?>
<?php get_header(); ?>

    <section class="assistance container">
        <div class="row">

          <div class="category__additionaltext">
            <div class="container">
              <div class="row">
                <h2 class="col-12 additionaltext__heading">Студии в Кировском районе</h2>
                <p class="col-12">Когда вам необходимо продать, обменять или купить квартиру или дом, в этом вопросе вам необходимо найти для себя настоящего специалиста. Этим специалистом, дающим весь комплекс услуг является наше агентство недвижимости в Волгограде «Фабрика Жилья».</p>
              </div>
            </div>
          </div>

            <div class="col-md-6">
                <div class="assistance__wr assistance__wr--seller">
                    <h2 class="assistance__title"><?php echo get_cat_name( 4 ) ?></h2>
                    <!-- <h2 class="assistance__title">Риэлторские услуги</h2> -->
                    <small class="assistance_tiny">Перечень риэлторских услуг</small>
                </div>
                <ul class="assistance__list">
                    <?php 
                        $query = new WP_Query( array( 'category_name' => 'realtor-services' ) );
                            while ( $query->have_posts() ) { $query->the_post(); ?>  
                            <li class="assistance__item">
                                <a class="assistance__link assistance__link--sa" href="<?php echo get_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                    <span><?php the_title(); ?></span></a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="assistance__wr assistance__wr--lawyer">
                    <h2 class="assistance__title"><?php echo get_cat_name( 5 ) ?></h2>
                    <!-- <h2 class="assistance__title">Юридические услуги</h2> -->
                    <small class="assistance_tiny">Перечень Юридических услуг</small>
                </div>
                <ul class="assistance__list assistance__list--lawyer">
                    <?php 
                        $query = new WP_Query( array( 'category_name' => 'legal-services' ) );
                            while ( $query->have_posts() ) { $query->the_post(); ?>  
                                <li class="assistance__item">
                                    <a class="assistance__link assistance__link--rra" href="<?php echo get_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                        <span><?php the_title(); ?></span></a>
                                </li>
                    <?php } ?>
                </ul>
            </div>


          <div class="category__additionaltext mt-2">
            <div class="container">
              <div class="row">
                <h2 class="col-12 additionaltext__heading">Мы помогаем вам приобрести мечту</h2>
                <p class="col-12">Наши риелторы, юристы, оценщики – проведут вас от самого начало пути, до заключения сделки. К нам обращаются собственники недвижимости, для быстрой и безопасной их реализации. Мы знаем в нашем регионе и мы всегда подстраиваемся под требования наших клиентов.</p>
              </div>
            </div>
          </div>

        </div>

    </section>
<?php get_footer(); ?>
